<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct(){
    	parent:: __construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('student_model');
    	$data = array();
    }

    public function addstudent(){
		$data['title']      = 'Add New Student';
		$data['header']     = $this->load->view('inc/header', $data, TRUE);
		$data['sidebar']    = $this->load->view('inc/sidebar', '', TRUE);
		$data['studentadd'] = $this->load->view('inc/studentadd', '', TRUE);
		$this->load->view('addstudent', $data);
    }	
    public function addStudentForm(){
    	$data['name']  = $this->input->post('name');
    	$data['dep']   = $this->input->post('dep');
    	$data['roll']  = $this->input->post('roll');
    	$data['reg']   = $this->input->post('reg');

    	$name = $data['name'];
    	$dep  = $data['dep'];
    	$roll = $data['roll'];
    	$reg  = $data['reg'];
    	if (empty($name) && empty($dep) && empty($roll) && empty($reg)) {
    		$sdata = array();
    		$sdata['msg'] = '<span style="color:red">Field Must not be Empty !</span>';
    		$this->session->set_flashdata($sdata);
    		redirect("student/addstudent");
    	}else{
    		$this->student_model->saveStudent($data);
    		$sdata = array();
    		$sdata['msg'] = '<span style="color:green">Data Added Successfully !</span>';
    		$this->session->set_flashdata($sdata);
    		redirect("student/addstudent");
    	}
    }

    public function studentlist(){
    	$data['title']      = 'Student List';
		$data['header']     = $this->load->view('inc/header', $data, TRUE);
		$data['sidebar']    = $this->load->view('inc/sidebar', '', TRUE);
		$data['studentdata'] = $this->student_model->getAllStudentData();
		$data['liststudent'] = $this->load->view('inc/liststudent', $data, TRUE);
		$this->load->view('studentlist', $data);
    }   
     public function editstudent($sid){
    	$data['title']      = 'Edit Student';
		$data['header']     = $this->load->view('inc/header', $data, TRUE);
		$data['sidebar']    = $this->load->view('inc/sidebar', '', TRUE);
		$data['stuById'] = $this->student_model->getStudentById($sid);
		$data['editstudent'] = $this->load->view('inc/studentedit', $data, TRUE);
		$this->load->view('editstudent', $data);
    }
    public function updateStudent(){
    	$data['sid']   = $this->input->post('sid');
    	$data['name']  = $this->input->post('name');
    	$data['dep']   = $this->input->post('dep');
    	$data['roll']  = $this->input->post('roll');
    	$data['reg']   = $this->input->post('reg');

    	$sid  = $data['sid'];
    	$name = $data['name'];
    	$dep  = $data['dep'];
    	$roll = $data['roll'];
    	$reg  = $data['reg'];
    	if (empty($name) && empty($dep) && empty($roll) && empty($reg)) {
    		$sdata = array();
    		$sdata['msg'] = '<span style="color:red">Field Must not be Empty !</span>';
    		$this->session->set_flashdata($sdata);
    		redirect("student/editstudent/".$sid);
    	}else{
    		$this->student_model->updateStudentData($data);
    		$sdata = array();
    		$sdata['msg'] = '<span style="color:green">Data Updated Successfully !</span>';
    		$this->session->set_flashdata($sdata);
    		redirect("student/editstudent/".$sid);
    	}
    }
    public function delstudent($sid){
       $this->student_model->delStudentByid($sid); 
       $sdata = array();
            $sdata['msg'] = '<span style="color:green">Data Deleted Successfully !</span>';
            $this->session->set_flashdata($sdata);
            redirect("student/studentlist");
        }
    }
   

