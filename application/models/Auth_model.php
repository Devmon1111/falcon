<?php
class Auth_model extends CI_Model
{
    public function get_new_by_id($id)
    {
        if ($id == 0) {
            $query = $this->db->get('users');
            return $query->result_array();
        }

        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row_array();
    }

    public function edit_profile($post)
    {
        $this->db->where('id', $post['user_id']);
        $this->db->update('users', array('firstname' => $post['firstname'], 'lastname' => $post['lastname']));
        return true;
    }
}
