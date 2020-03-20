<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author_Model extends CI_Model {

    public function saveAuthor($data){
        $this->db->insert('author', $data);
    }

    public function authorData(){
        $this->db->select('*');
        $this->db->from('author');
        $this->db->order_by('authorID');
        $qresule=$this->db->get();
        $result =$qresule->result();
        return $result;

    }

    public function authorInfo($authorID){
        $this->db->select('*');
        $this->db->from('author');
        $this->db->where('authorID',$authorID);
        $qresule=$this->db->get();
        $result =$qresule->row();
        return $result;
    }

    public function updateAuthor($data){
        $this->db->set('authorName',$data['authorName']);
        $this->db->where('authorID',$data['authorID']);
        $this->db->update('author');

    }

    public function deleteAuthor($authorID){
        $this->db->where('authorID',$authorID);
        $this->db->delete('author');
    }





}
