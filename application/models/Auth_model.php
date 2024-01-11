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

    public function add_user($d)
    {
        $string = array(
            'firstname' => $d['firstname'],
            'lastname' => $d['lastname'],
            'email' => $d['email'],
            'password' => $d['password'],
            'role' => $d['role'],
            'status' => $d['status'],
            'banned_users' => $d['banned_users']
        );
        $q = $this->db->insert_string('users', $string);
        $this->db->query($q);
        return $this->db->insert_id();
    }

    public function is_duplicate($email)
    {
        $this->db->get_where('users', array('email' => $email), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;
    }
}
