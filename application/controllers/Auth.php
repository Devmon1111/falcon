<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    public function change_password()
    {
        if (empty($this->session->userdata['email'])) {
            redirect(site_url() . 'auth/login');
        } else {

            $data = $this->session->userdata;
            $this->load->model('auth_model');

            $dataInfo = array(
                'id' => $data['id']
            );

            $this->form_validation->set_rules('oldpassword', 'Current Password', 'required|min_length[5]');
            $this->form_validation->set_rules('newpassword', 'New Password', 'required|min_length[5]');
            $this->form_validation->set_rules('confnewpassword', 'Confirm Password Confirmation', 'required|matches[newpassword]');

            $data['groups'] = $this->auth_model->get_user_info($dataInfo['id']);

            if ($this->form_validation->run() == FALSE) {

                $this->load->view('navbar');
                $this->load->view('auth/change_password', $data);
            } else {

                $post = $this->input->post(NULL, TRUE);
                $cleanPost = $this->security->xss_clean($post);
                $hash_old = md5($this->input->post('oldpassword'));
                $hash_new = md5($this->input->post('newpassword'));
                $cleanPost['user_id'] = $dataInfo['id'];
                $cleanPost['oldpassword'] = $hash_old;
                $cleanPost['newpassword'] = $hash_new;

                if ($hash_old == $hash_new) {
                    $this->session->set_flashdata('fail_message','Fail to change password');
                } else {
                    $this->auth_model->update_password($cleanPost);
                    $this->session->set_flashdata('success_message','success to Change password');
                }
                redirect('auth/change_password');
            }

        }
    }

    
}
