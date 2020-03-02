<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('student_model');
        $data= array();
    }

    public function addStudent(){
        $data['title']= 'Add Student';
        $data['header']=$this->load->view('layout/header',$data,TRUE );
        $data['footer']=$this->load->view('layout/footer','',TRUE );
        $data['sidebar']=$this->load->view('layout/sidebar','',TRUE );
        $this->load->view('student/add_student',$data);
    }

    public function saveStudent(){
        $data['name']=$this->input->post('name');
        $data['dpt']=$this->input->post('dpt');
        $data['roll']=$this->input->post('roll');
        $data['reg']=$this->input->post('reg');

        $name= $data['name'];
        $dpt= $data['dpt'];
        $roll= $data['roll'];
        $reg= $data['reg'];

        if(empty($name)&&empty($dpt)&&empty($roll)&&empty($reg)){
            $sData = array();
            $sData['msg']='<span style="color: red;">Field must be not empty1</span> ';
            $this->session->set_flashdata($sData);
            redirect("student/addStudent");

        }else{
            $this->student_model->saveStudent($data);
            $sData = array();
            $sData['msg']='<span style="color: green;">Student Added Successfully</span> ';
            $this->session->set_flashdata($sData);
            redirect("student/addStudent");
        }


    }

    public function viewStudent(){
        $data['title']= 'Student List';
        $data['header']=$this->load->view('layout/header',$data,TRUE );
        $data['footer']=$this->load->view('layout/footer','',TRUE );
        $data['sidebar']=$this->load->view('layout/sidebar','',TRUE );
        $data['studentData']=$this->student_model->studentData();
        $this->load->view('student/view_student',$data);
    }




}
