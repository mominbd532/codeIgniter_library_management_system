<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('student_model');
        $this->load->model('department_model');
        $this->load->model('user_model');
        $data= array();
    }

    public function login(){
        $this->load->view('login');
    }

    public function userLogin(){
        $data['email']=$this->input->post('email');
        $data['password']=$this->input->post('password');

        $check = $this->user_model->checkUser($data);

        if($check){
            $sdata = array();
            $sdata['id']= $check->id;
            $sdata['userLogin'] = TRUE;
            $this->session->set_userdata($sdata);
            redirect('library');

        }else{

            $sData = array();
            $sData['msg']=' <a class="btn btn-danger">Email or Password not matched!!!</a>';
            $this->session->set_flashdata($sData);
            redirect("user/login");

        }

    }


    public function logout(){
        $this->session->unset_userdata('id');
        $this->session->set_userdata('userLogin',FALSE);
        $this->session->sess_destroy();

        redirect('user/login');

    }




}
