<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 笔记控制器
 */
class Notes extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        $this->load->library('login');
        $this->login->jump();
        
    }

	public function index()
	{	
		$this->load->library('session'); 
		$a = $this->session->userdata('user');
		//var_dump($a);
		$this->load->helper('url');
		$this->load->view('comm/header');
		$this->load->view('comm/nav');
		$this->load->view('notes/notes_index.php');
		$this->load->view('comm/footer');
	}

}