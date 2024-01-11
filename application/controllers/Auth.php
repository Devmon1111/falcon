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
