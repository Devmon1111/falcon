<?php
class Auth_model extends CI_Model
{
    
    public function check_login($post)
    {
        $this->db->select('*');
        $this->db->where('email', $post['email']);
        $this->db->where('password', $post['password']);
        $query = $this->db->get('users');
        $userInfo = $query->row();
        $count = $query->num_rows();
        
        if ($count == 1) {
            if (!md5($post['password'], $userInfo->password)) {
                error_log('Unsuccessful login attempt(' . $post['email'] . ')');
                return false;
            }
        } else {
            error_log('Unsuccessful login attempt(' . $post['email'] . ')');
            return false;
        }
        
        unset($userInfo->password);
        return $userInfo;
    }
   
}
