<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book_Model extends CI_Model {

    public function saveBook($data){
        $this->db->insert('book', $data);
    }

    public function bookData(){
        $this->db->select('*');
        $this->db->from('book');
        $this->db->order_by('bookId');
        $qresule=$this->db->get();
        $result =$qresule->result();
        return $result;

    }

    public function bookInfo($bookId){
        $this->db->select('*');
        $this->db->from('book');
        $this->db->where('bookId',$bookId);
        $qresule=$this->db->get();
        $result =$qresule->row();
        return $result;
    }

    public function updateBook($data){
        $this->db->set('bookName',$data['bookName']);
        $this->db->set('ISBN',$data['ISBN']);
        $this->db->set('dptID',$data['dptID']);
        $this->db->set('authorID',$data['authorID']);
        $this->db->where('bookID',$data['bookID']);
        $this->db->update('book');

    }

    public function deleteBook($bookID){
        $this->db->where('bookID',$bookID);
        $this->db->delete('book');
    }







}
