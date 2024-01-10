<?php
class Auth_model extends CI_Model
{
  public function add_user($d)
  {
    $string = array(
      'firstname' => $d['firstname'],
      'lastname' => $d['lastname'],
      'email' => $d['email'],
      'password' => md5($d['password']),
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
