<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department_Model extends CI_Model {

    public function saveDepartment($data){
        $this->db->insert('department', $data);
    }

    public function departmentData(){
        $this->db->select('*');
        $this->db->from('department');
        $this->db->order_by('dptID');
        $qresule=$this->db->get();
        $result =$qresule->result();
        return $result;

    }

    public function departmentInfo($dptID){
        $this->db->select('*');
        $this->db->from('department');
        $this->db->where('dptID',$dptID);
        $qresule=$this->db->get();
        $result =$qresule->row();
        return $result;
    }

    public function updateDepartment($data){
        $this->db->set('dptName',$data['dptName']);
        $this->db->where('dptID',$data['dptID']);
        $this->db->update('department');

    }

    public function deleteDepartment($dptID){
        $this->db->where('dptID',$dptID);
        $this->db->delete('department');
    }





}
