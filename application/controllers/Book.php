<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('student_model');
        $this->load->model('department_model');
        $this->load->model('author_model');
        $this->load->model('book_model');
        $data= array();
    }

    public function addBook(){
        $data['title']= 'Add Book';
        $data['header']=$this->load->view('layout/header',$data,TRUE );
        $data['footer']=$this->load->view('layout/footer','',TRUE );
        $data['sidebar']=$this->load->view('layout/sidebar','',TRUE );
        $data['departmentData']=$this->department_model->departmentData();
        $data['authorData']=$this->author_model->authorData();
        $this->load->view('book/add_book',$data);
    }

    public function saveBook(){

        $data['bookName']=$this->input->post('bookName');
        $data['ISBN']=$this->input->post('ISBN');
        $data['dptID']=$this->input->post('dptID');
        $data['authorID']=$this->input->post('authorID');

        $name= $data['bookName'];
        $ISBN= $data['ISBN'];
        $dptID= $data['dptID'];
        $authorID= $data['authorID'];

        if(empty($name) || empty($ISBN) || empty($dptID) || empty($authorID)){
            $sData = array();
            $sData['error']='Field must be not empty';
            $this->session->set_flashdata($sData);
            redirect("book/addBook");

        }else{
            $this->book_model->saveBook($data);
            $sData = array();
            $sData['success']='Book Added Successfully';
            $this->session->set_flashdata($sData);
            redirect("book/viewBook");
        }


    }

    public function viewBook(){
        $data['title']= 'Book List';
        $data['header']=$this->load->view('layout/header',$data,TRUE );
        $data['footer']=$this->load->view('layout/footer','',TRUE );
        $data['sidebar']=$this->load->view('layout/sidebar','',TRUE );
        $data['bookData']=$this->book_model->bookData();
        $data['departmentData']=$this->department_model->departmentData();
        $data['authorData']=$this->author_model->authorData();
        $this->load->view('book/view_book',$data);
    }

    public function editBook($bookId){
        $data['title']= 'Edit Book';
        $data['header']=$this->load->view('layout/header',$data,TRUE );
        $data['footer']=$this->load->view('layout/footer','',TRUE );
        $data['sidebar']=$this->load->view('layout/sidebar','',TRUE );
        $data['bookInfo']=$this->book_model->bookInfo($bookId);
        $data['departmentData']=$this->department_model->departmentData();
        $data['authorData']=$this->author_model->authorData();
        $this->load->view('book/edit_book',$data);

    }

    public function updateBook($bookID){
        $data['bookID']=$bookID;
        $data['bookName']=$this->input->post('bookName');
        $data['ISBN']=$this->input->post('ISBN');
        $data['dptID']=$this->input->post('dptID');
        $data['authorID']=$this->input->post('authorID');

        $name= $data['bookName'];
        $ISBN= $data['ISBN'];
        $dptID= $data['dptID'];
        $authorID= $data['authorID'];

        if(empty($name) || empty($ISBN) || empty($dptID) ||  empty($authorID)){
            $sData = array();
            $sData['error']='Field must be not empty ';
            $this->session->set_flashdata($sData);
            redirect("book/viewBook");

        }else{
            $this->book_model->updateBook($data);
            $sData = array();
            $sData['success']='Book Updated Successfully';
            $this->session->set_flashdata($sData);
            redirect("book/viewBook");
        }


    }

    public function deleteBook($bookID){
        $this->book_model->deleteBook($bookID);
        $sData = array();
        $sData['error']='Book Deleted Successfully';
        $this->session->set_flashdata($sData);
        redirect("book/viewBook");
    }





}
