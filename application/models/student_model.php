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

    public function studentInfo($stdId){
        $this->db->select('*');
        $this->db->from('student');
        $this->db->where('stdId',$stdId);
        $qresule=$this->db->get();
        $result =$qresule->row();
        return $result;
    }

    public function updateStudent($data){
        $this->db->set('name',$data['name']);
        $this->db->set('dpt',$data['dpt']);
        $this->db->set('roll',$data['roll']);
        $this->db->set('reg',$data['reg']);
        $this->db->where('stdId',$data['stdId']);
        $this->db->update('student');

    }

    public function deleteStudent($stdId){
        $this->db->where('stdId',$stdId);
        $this->db->delete('student');
    }





}
