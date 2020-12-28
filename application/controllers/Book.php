<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

    public function __construct(){
    	parent:: __construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->model('book_model');
        $this->load->model('dep_model');
    	$data = array();
    }
    public function addbook(){
		$data['title']      = 'Add New Book';
		$data['header']     = $this->load->view('inc/header', $data, TRUE);
		$data['sidebar']    = $this->load->view('inc/sidebar', '', TRUE);
		$data['depdata']    = $this->dep_model->getAllDepartmentData();
		$this->load->view('addbook', $data);
	}
}