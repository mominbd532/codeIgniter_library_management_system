<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issue_Book_Model extends CI_Model {

    public function issueBook($data){
        $this->db->insert('issued_book', $data);
    }

    public function issuedBookData(){
        $this->db->select('*');
        $this->db->from('issued_book');
        $this->db->where('status', 1);
        $this->db->order_by('id');
        $qresule=$this->db->get();
        $result =$qresule->result();
        return $result;

    }

    public function returnBook($id){
        $this->db->set('status', 0);
        $this->db->where('id',$id);
        $this->db->update('issued_book');
    }

    public function returnBookData(){
        $this->db->select('*');
        $this->db->from('issued_book');
        $this->db->where('status', 0);
        $this->db->order_by('id');
        $qresule=$this->db->get();
        $result =$qresule->result();
        return $result;

    }


    public function deleteIssueBook($id){
        $this->db->where('id',$id);
        $this->db->delete('issued_book');
    }








}
