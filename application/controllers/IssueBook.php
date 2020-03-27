<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IssueBook extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('student_model');
        $this->load->model('department_model');
        $this->load->model('author_model');
        $this->load->model('book_model');
        $this->load->model('issue_book_model');
        $data= array();
    }

    public function index(){
        $data['title']= 'Issue Book';
        $data['header']=$this->load->view('layout/header',$data,TRUE );
        $data['footer']=$this->load->view('layout/footer','',TRUE );
        $data['sidebar']=$this->load->view('layout/sidebar','',TRUE );
        $data['departmentData']=$this->department_model->departmentData();
        $data['studentData']=$this->student_model->studentData();
        $this->load->view('issue_book/issue_book_index',$data);

    }

    public function issueToStudent(){


        $data['stdId']=$this->input->post('stdId');
        $data['bookID']=$this->input->post('bookID');
        $data['status']= 1;


        $stdId= $data['stdId'];
        $bookID= $data['bookID'];


        if(empty($stdId) || empty($bookID) ){
            $sData = array();
            $sData['error']='Field must be not empty';
            $this->session->set_flashdata($sData);
            redirect("issueBook");

        }else{
            $this->issue_book_model->issueBook($data);
            $sData = array();
            $sData['success']='Book issued Successfully';
            $this->session->set_flashdata($sData);
            redirect("issueBook");
        }


    }

    public function issuedBookList(){
        $data['title']= 'Issued Book List';
        $data['header']=$this->load->view('layout/header',$data,TRUE );
        $data['footer']=$this->load->view('layout/footer','',TRUE );
        $data['sidebar']=$this->load->view('layout/sidebar','',TRUE );
        $data['studentData']=$this->student_model->studentData();
        $data['departmentData']=$this->department_model->departmentData();
        $data['bookData']=$this->book_model->bookData();
        $data['issuedBookData']=$this->issue_book_model->issuedBookData();
        $this->load->view('issue_book/issued_book_list',$data);

    }

    public function returnBook($id){

        $this->issue_book_model->returnBook($id);
        $sData = array();
        $sData['success']='Book return Successfully';
        $this->session->set_flashdata($sData);
        redirect("issueBook/returnBookList");

    }

    public function returnBookList(){
        $data['title']= 'Return Book List';
        $data['header']=$this->load->view('layout/header',$data,TRUE );
        $data['footer']=$this->load->view('layout/footer','',TRUE );
        $data['sidebar']=$this->load->view('layout/sidebar','',TRUE );
        $data['studentData']=$this->student_model->studentData();
        $data['departmentData']=$this->department_model->departmentData();
        $data['bookData']=$this->book_model->bookData();
        $data['returnBookData']=$this->issue_book_model->returnBookData();
        $this->load->view('issue_book/return_book_list',$data);

    }

    public function deleteData($id){
        $this->issue_book_model->deleteIssueBook($id);
        $sData = array();
        $sData['error']='Issue Book Deleted Successfully';
        $this->session->set_flashdata($sData);
        redirect("issueBook/returnBookList");
    }





}
