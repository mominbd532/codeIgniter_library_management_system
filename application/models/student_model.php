<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_Model extends CI_Model {

    public function saveStudent($data){
        $this->db->insert('student', $data);
    }

    public function studentData(){
        $this->db->select('*');
        $this->db->from('student');
        $this->db->order_by('stdId');
        $qresule=$this->db->get();
        $result =$qresule->result();
        return $result;

    }




}
