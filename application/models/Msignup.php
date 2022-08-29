<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Msignup extends CI_Model {

    public function get_user_uname($email){
        $this->db->where('username', $email);
        $result = $this->db->get('admin')->row();
        return $result;
    }

    public function get_count($where=NULL){
        $this->db->select('count(*) as found');
        
        if ($where){ $this->db->where($where); }
        
        $row = $this->db->get('admin')->row();
        
        return $row->found;
    }
}