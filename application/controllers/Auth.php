<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('auth_model');
        $this->status = $this->config->item('status');
        $this->banned_users = $this->config->item('banned_users');
    }
    
    public function index()
    {
      
    }
    public function register()
    {
        if (empty($this->session->userdata['email'])) {
            $data = $this->session->userdata;
            $this->load->model('auth_model');

            $this->form_validation->set_rules('firstname', 'Firstname Name', 'required');
            $this->form_validation->set_rules('lastname', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

            $data['title'] = "Add User";
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('auth/register', $data);
            } else {
                if ($this->auth_model->is_duplicate($this->input->post('email'))) {
                    $this->session->set_flashdata('flash_message', 'User email already exists');
                    redirect(site_url() . 'auth/register');
                } else {
                    $post = $this->input->post(NULL, TRUE);
                    $cleanPost = $this->security->xss_clean($post);

                    $cleanPost['email'] = $this->input->post('email');
                    $cleanPost['role'] = '4';
                    $cleanPost['status'] = '1';
                    $cleanPost['firstname'] = $this->input->post('firstname');
                    $cleanPost['lastname'] = $this->input->post('lastname');
                    $cleanPost['banned_users'] = 'unban';
                    $cleanPost['password'] = md5($this->input->post("password"));
                    unset($cleanPost['passconf']);

                    //insert to database
                    if (!$this->auth_model->add_user($cleanPost)) {
                        $this->session->set_flashdata('flash_message', 'There was a problem add new user');
                    } else {
                        $this->session->set_flashdata('success_message', 'New user has been added.');
                    }
                    $this->session->sess_destroy();
                    redirect(site_url() . 'auth/completed');
                };
            }
        } else {
            redirect(site_url() . 'auth/login');
        }
    }

    public function completed()
    {
        $this->load->view('auth/register_completed');
    }
    
    public function login()
    {
        $data = $this->session->userdata;
        //เช็คว่ามีอีเมลอยู่ใน session ไม
        //ถ้ายังไม่มีให้ไปหน้า login
        if (!empty($data['email'])) {
            redirect(site_url() . '');
        } else {
            
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            if ($this->form_validation->run() == FALSE) {
                //โหลด view หน้า login
                $this->load->view('auth/login', $data);
            } else {
                //กระบวนการ login
                $post = $this->input->post();
                $clean = $this->security->xss_clean($post);
                $hash = md5($clean['password']);
                
                $clean['email'] = $this->input->post('email');
                $clean['password'] = $hash;
                
                $userInfo = $this->auth_model->check_login($clean);
                
                //เช็คว่ามีข้อผิดพลาดหรือไม
                if (!$userInfo) {
                    $this->session->set_flashdata('flash_message', 'Wrong password or email.');
                    redirect(site_url() . 'auth/login');
                } elseif ($userInfo->banned_users == "ban") {
                    $this->session->set_flashdata('danger_message', 'You’re temporarily banned from our website!');
                    redirect(site_url() . 'auth/login');
                } elseif ($userInfo && $userInfo->banned_users == "unban") //recaptcha check, success login, ban or unban
                {
                    foreach ($userInfo as $key => $val) {
                        $this->session->set_userdata($key, $val);
                    }
                    redirect(site_url() . 'auth/login');
                } else {
                    $this->session->set_flashdata('flash_message', 'Something Error!');
                    redirect(site_url() . 'auth/login');
                    exit;
                }
            }
        }
    }
    
}
