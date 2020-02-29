<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library extends CI_Controller {


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
