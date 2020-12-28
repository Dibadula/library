<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
    	parent:: __construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('user_model');
    	
    }
    public function login(){
    	$this->load->view('login');
    }
     public function loginForm(){
     	$data = array();
		$data['user']     = $this->input->post('user');
		$data['pass']     = $this->input->post('pass');
		$check= $this->user_model->checkUser($data);
		if ($check) {
			$sdata = array();
			$sdata['userid']    = $check->userid;
			$sdata['userlogin'] = TRUE;
			$this->session->set_userdata($sdata);
			redirect('Library');
		}else{
    		$sdata = array();
    		$sdata['msg'] = '<span style="color:green">Email or Password not Matched !</span>';
    		$this->session->set_flashdata($sdata);
    		redirect("user/login");
		}
}
}