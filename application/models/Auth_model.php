<?php
class Auth_model extends CI_Model
{
    public function logout()
    {
        $this->session->set_userdata(array('id' => '', 'firstname' => '', 'status' => ''));
        $this->session->sess_destroy();
        redirect('');
    }
}
