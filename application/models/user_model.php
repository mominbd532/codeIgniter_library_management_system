<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {

    public function checkUser($data){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email',$data['email']);
        $this->db->where('password',md5($data['password']));
        $qresule=$this->db->get();
        $has =$qresule->num_rows();
        if($has === 1){
            $result =$qresule->row();
            return $result;
        }

    }







}
