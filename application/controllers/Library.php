<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('student_model');
        $this->load->model('department_model');
        $this->load->model('author_model');
        $this->load->model('book_model');
        $data= array();
        if(!$this->session->userdata('userLogin')){
            $sData = array();
            $sData['msg']=' <a class="btn btn-danger">Need to login first</a>';
            $this->session->set_flashdata($sData);
            redirect('user/login');
        }
    }


    public function index()
    {
        $this->home();
    }

    public function home(){
        $data = array();
        $data['title']= 'Online Library Management System';
        $data['header']=$this->load->view('layout/header',$data,TRUE );
        $data['footer']=$this->load->view('layout/footer','',TRUE );
        $data['sidebar']=$this->load->view('layout/sidebar','',TRUE );
        $this->load->view('home',$data);

    }
}
