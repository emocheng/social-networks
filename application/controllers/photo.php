<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 相册控制器
 */
class Photo extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        $this->load->library('login');
        $this->load->library('common');
        $this->login->jump();
        
    }

    //公开
	public function index()
	{	
		$user = $this->login->get_uid();
		$data = array();
		
		
		$this->common->leadTemp('photo/photo_index.php',$data);
	}

	//相册详情页
	public function photoDetail()
	{
		$user = $this->login->get_uid();
		$data = array();

		$this->common->leadTemp('photo/photo_detail.php',$data);
	}

	public function secret()
	{
		$this->load->library('session'); 
		$a = $this->session->userdata('user');
		$this->load->helper('url');
		$this->load->view('comm/header');
		$this->load->view('comm/nav');
		$this->load->view('photo/photo_secret.php');
		$this->load->view('comm/footer');
	}

	public function opt()
	{
		$this->load->library('session'); 
		$a = $this->session->userdata('user');
		$this->load->helper('url');
		$this->load->view('comm/header');
		$this->load->view('comm/nav');
		$this->load->view('photo/photo_opt.php');
		$this->load->view('comm/footer');
	}

}