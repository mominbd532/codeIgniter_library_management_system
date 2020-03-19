<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('department_model');
        $data= array();
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
            redirect("department/addDepartment");
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

    public function deleteDepartment($stdId){
        $this->department_model->deleteDepartment($stdId);
        $sData = array();
        $sData['error']='Department Deleted Successfully';
        $this->session->set_flashdata($sData);
        redirect("department/viewDepartment");
    }





}
