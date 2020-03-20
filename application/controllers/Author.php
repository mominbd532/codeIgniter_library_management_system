<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('student_model');
        $this->load->model('department_model');
        $this->load->model('author_model');
        $data= array();
    }

    public function addAuthor(){
        $data['title']= 'Add Author';
        $data['header']=$this->load->view('layout/header',$data,TRUE );
        $data['footer']=$this->load->view('layout/footer','',TRUE );
        $data['sidebar']=$this->load->view('layout/sidebar','',TRUE );
        $this->load->view('author/add_author',$data);
    }

    public function saveAuthor(){
        $data['authorName']=$this->input->post('authorName');


        $authorName = $data['authorName'];


        if(empty($authorName)){
            $sData = array();
            $sData['error']='Field must be not empty';
            $this->session->set_flashdata($sData);
            redirect("author/addAuthor");

        }else{
            $this->author_model->saveAuthor($data);
            $sData = array();
            $sData['success']='Author Added Successfully';
            $this->session->set_flashdata($sData);
            redirect("author/viewAuthor");
        }


    }

    public function viewAuthor(){
        $data['title']= 'Author List';
        $data['header']=$this->load->view('layout/header',$data,TRUE );
        $data['footer']=$this->load->view('layout/footer','',TRUE );
        $data['sidebar']=$this->load->view('layout/sidebar','',TRUE );
        $data['authorData']=$this->author_model->authorData();
        $this->load->view('author/view_author',$data);
    }

    public function editAuthor($authorID){
        $data['title']= 'Edit Author';
        $data['header']=$this->load->view('layout/header',$data,TRUE );
        $data['footer']=$this->load->view('layout/footer','',TRUE );
        $data['sidebar']=$this->load->view('layout/sidebar','',TRUE );
        $data['authorInfo']=$this->author_model->authorInfo($authorID);
        $this->load->view('author/edit_author',$data);

    }

    public function updateAuthor($authorID){
        $data['authorID']=$authorID;
        $data['authorName']=$this->input->post('authorName');


        $name= $data['authorName'];


        if(empty($name)){
            $sData = array();
            $sData['error']='Field must be not empty ';
            $this->session->set_flashdata($sData);
            redirect("author/viewAuthor");

        }else{
            $this->author_model->updateAuthor($data);
            $sData = array();
            $sData['success']='Author Updated Successfully';
            $this->session->set_flashdata($sData);
            redirect("author/viewAuthor");
        }


    }

    public function deleteAuthor($authorId){

            $this->author_model->deleteAuthor($authorId);
            $sData = array();
            $sData['error']='Author Deleted Successfully';
            $this->session->set_flashdata($sData);
            redirect("author/viewAuthor");


    }





}
