<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
    }

    public function edit_profile()
    {
        $data = $this->session->userdata;
        if (empty($data['email'])) {
            redirect(site_url() . 'auth/login');
        } else {

            $dataInfo = array(
                'id' => $data['id']
            );

            $data['news_item'] = $this->auth_model->get_new_by_id($dataInfo['id']);

            $this->form_validation->set_rules('firstname', 'First Name', 'required|min_length[2]');
            $this->form_validation->set_rules('lastname', 'Last Name', 'required|min_length[2]');

            if ($this->form_validation->run() == FALSE) {

                $this->load->view('navbar');
                $this->load->view('auth/edit_profile', $data);
            } else {

                $post = $this->input->post(NULL, TRUE);
                $cleanPost = $this->security->xss_clean($post);

                $cleanPost['user_id'] = $dataInfo['id'];
                $cleanPost['firstname'] = $this->input->post('firstname');
                $cleanPost['lastname'] = $this->input->post('lastname');

                if ($this->auth_model->edit_profile($cleanPost)) {
                    $this->session->set_flashdata('success_message', 'Profile Updated successfully.');
                } else {
                }
                redirect(site_url() . 'auth/edit_profile');
            }
        }
    }
}
