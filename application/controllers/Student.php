<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('student_model');
        $this->load->model('department_model');
        $data= array();
        if(!$this->session->userdata('userLogin')){
            $sData = array();
            $sData['msg']=' <a class="btn btn-danger">Need to login first</a>';
            $this->session->set_flashdata($sData);
            redirect('user/login');
        }
    }

    public function addStudent(){
        $data['title']= 'Add Student';
        $data['header']=$this->load->view('layout/header',$data,TRUE );
        $data['footer']=$this->load->view('layout/footer','',TRUE );
        $data['sidebar']=$this->load->view('layout/sidebar','',TRUE );
        $data['departmentData']=$this->department_model->departmentData();
        $this->load->view('student/add_student',$data);
    }

    public function saveStudent(){

        $data['name']=$this->input->post('name');
        $data['dptID']=$this->input->post('dptID');
        $data['roll']=$this->input->post('roll');
        $data['reg']=$this->input->post('reg');

        $name= $data['name'];
        $dptID= $data['dptID'];
        $roll= $data['roll'];
        $reg= $data['reg'];

        if(empty($name) || empty($dptID) || empty($roll) || empty($reg)){
            $sData = array();
            $sData['error']='Field must be not empty';
            $this->session->set_flashdata($sData);
            redirect("student/addStudent");

        }else{
            $this->student_model->saveStudent($data);
            $sData = array();
            $sData['success']='Student Added Successfully';
            $this->session->set_flashdata($sData);
            redirect("student/viewStudent");
        }


    }

    public function viewStudent(){
        $data['title']= 'Student List';
        $data['header']=$this->load->view('layout/header',$data,TRUE );
        $data['footer']=$this->load->view('layout/footer','',TRUE );
        $data['sidebar']=$this->load->view('layout/sidebar','',TRUE );
        $data['studentData']=$this->student_model->studentData();
        $data['departmentData']=$this->department_model->departmentData();
        $this->load->view('student/view_student',$data);
    }

    public function editStudent($stdId){
        $data['title']= 'Edit Student';
        $data['header']=$this->load->view('layout/header',$data,TRUE );
        $data['footer']=$this->load->view('layout/footer','',TRUE );
        $data['sidebar']=$this->load->view('layout/sidebar','',TRUE );
        $data['studentInfo']=$this->student_model->studentInfo($stdId);
        $data['departmentData']=$this->department_model->departmentData();
        $this->load->view('student/edit_student',$data);

    }

    public function updateStudent($stdId){
        $data['stdId']=$stdId;
        $data['name']=$this->input->post('name');
        $data['dptID']=$this->input->post('dptID');
        $data['roll']=$this->input->post('roll');
        $data['reg']=$this->input->post('reg');

        $name= $data['name'];
        $dptID= $data['dptID'];
        $roll= $data['roll'];
        $reg= $data['reg'];

        if(empty($name) || empty($dptID) || empty($roll) ||  empty($reg)){
            $sData = array();
            $sData['error']='Field must be not empty ';
            $this->session->set_flashdata($sData);
            redirect("student/viewStudent");

        }else{
            $this->student_model->updateStudent($data);
            $sData = array();
            $sData['success']='Student Updated Successfully';
            $this->session->set_flashdata($sData);
            redirect("student/viewStudent");
        }


    }

    public function deleteStudent($stdId){
        $this->student_model->deleteStudent($stdId);
        $sData = array();
        $sData['error']='Student Deleted Successfully';
        $this->session->set_flashdata($sData);
        redirect("student/viewStudent");
    }





}
