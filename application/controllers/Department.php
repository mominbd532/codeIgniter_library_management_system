<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

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

    public function addDepartment(){
        $data['title']= 'Add Department';
        $data['header']=$this->load->view('layout/header',$data,TRUE );
        $data['footer']=$this->load->view('layout/footer','',TRUE );
        $data['sidebar']=$this->load->view('layout/sidebar','',TRUE );
        $this->load->view('department/add_department',$data);
    }

    public function saveDepartment(){
        $data['dptName']=$this->input->post('dptName');


        $dptName= $data['dptName'];


        if(empty($dptName)){
            $sData = array();
            $sData['error']='Field must be not empty';
            $this->session->set_flashdata($sData);
            redirect("department/addDepartment");

        }else{
            $this->department_model->saveDepartment($data);
            $sData = array();
            $sData['success']='Department Added Successfully';
            $this->session->set_flashdata($sData);
            redirect("department/viewDepartment");
        }


    }

    public function viewDepartment(){
        $data['title']= 'Department List';
        $data['header']=$this->load->view('layout/header',$data,TRUE );
        $data['footer']=$this->load->view('layout/footer','',TRUE );
        $data['sidebar']=$this->load->view('layout/sidebar','',TRUE );
        $data['departmentData']=$this->department_model->departmentData();
        $this->load->view('department/view_department',$data);
    }

    public function editDepartment($dptID){
        $data['title']= 'Edit Department';
        $data['header']=$this->load->view('layout/header',$data,TRUE );
        $data['footer']=$this->load->view('layout/footer','',TRUE );
        $data['sidebar']=$this->load->view('layout/sidebar','',TRUE );
        $data['departmentInfo']=$this->department_model->departmentInfo($dptID);
        $this->load->view('department/edit_department',$data);

    }

    public function updateDepartment($dptID){
        $data['dptID']=$dptID;
        $data['dptName']=$this->input->post('dptName');


        $name= $data['dptName'];


        if(empty($name)){
            $sData = array();
            $sData['error']='Field must be not empty ';
            $this->session->set_flashdata($sData);
            redirect("department/viewDepartment");

        }else{
            $this->department_model->updateDepartment($data);
            $sData = array();
            $sData['success']='Department Updated Successfully';
            $this->session->set_flashdata($sData);
            redirect("department/viewDepartment");
        }


    }

    public function deleteDepartment($dptId){
       $exist = $this->student_model->studentInfoBydptID($dptId);

        if($exist){
            $sData = array();
            $sData['error']='Department not Deleted!!! Student exist in the department';
            $this->session->set_flashdata($sData);
            redirect("department/viewDepartment");



        }else{
            $this->department_model->deleteDepartment($dptId);
            $sData = array();
            $sData['error']='Department Deleted Successfully';
            $this->session->set_flashdata($sData);
            redirect("department/viewDepartment");


        }


    }





}
