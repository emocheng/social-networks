<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 注册页面
 */
class Reg extends CI_Controller {

	/**注册主页面
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{
		$this->load->helper('url');

		$action = $this->input->get("action");
		
		if($action == "reg")
		{
			$data['action'] = 1;
		}
		else
		{
			$data['action'] = 2;
		}
		//$data['img-code'] = $this->get_code();
		$this->load->view('reg_index',$data);
	}

	/**
	 * 注册提交
	 * [ajaxReg description]
	 * @return [type] [description]
	 */
	public function ajaxReg()
	{
		$Email = $this->input->post('Email'); //email
		$regPsw = $this->input->post('regPsw'); //psw
		$repRegPsw = $this->input->post('repRegPsw'); //rep psw

		$this->load->library('session');
		$code = $this->input->post('imgCode');
		$code2 = strtolower($this->session->userdata('code'));
		if(strtolower($code) != $code2)
		{
			$data = array('code'=>-5,'msg'=>'error code');


		}elseif(!$Email ||  !$regPsw || !$repRegPsw)
		{
			$data = array('code'=>-1,'msg'=>'Incomplete information');

		}elseif($regPsw != $repRegPsw) 
		{
			$data = array('code'=>-2,'msg'=>'Inconsistent password');
			
		}else //注册成功
		{
			//$test = array();
			$this->load->library('login');
			$check = $this->login->checkUser($Email);
			if($check) 
			{
				$data = array('code'=>-4,'msg'=>'rep');
				echo json_encode($data);
				return false;
			}
			$res = $this->login->addUser($Email,$regPsw);
			if($res)
			{
				$data = array('code'=>1,'msg'=>'ok');
			}else
			{
				$data = array('code'=>-3,'msg'=>'error');
			}

			
		}

		echo json_encode($data);
	}

	public function get_code(){

		$this->load->library('captcha');

		$code = $this->captcha->getCaptcha();
		$this->load->library('session');
		$this->session->set_userdata('code', $code);

		$this->captcha->showImg();


	}
}