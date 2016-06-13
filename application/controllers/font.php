<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 欢迎界面
 */
class Font extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->library('login');
		$this->load->library('common');
		$this->load->library('homelib');
		//$this->login->jump();

	}

	/**欢迎界面首页
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{
		$user = $this->login->get_uid();
		$this->load->helper('url');
		if($user)
		{
			redirect('home/index');
		}

		$this->load->view('font_welcome');
	}

	/**登陆
	 * [ajaxLogin description]
	 * @return [type] [description]
	 */
	public function ajaxLogin()
	{
		$this->load->library('encrypt');
		$email = $this->input->post('email'); //email
		$psw = $this->input->post('psw'); //psw
		$encodPsw = md5($psw);

		if(!$email || !$psw)
		{
			$data = array('code'=>-1,'msg'=>'Incomplete information');
		}else
		{
			$this->load->library('login');
			//check user ? Y : N
			$check = $this->login->checkUser($email,$encodPsw);

			if( !$check )
			{
				echo json_encode(array('code'=>-2,'smg'=>'password error'));exit;	
			}
			
			$res = $this->login->setUser($check);
			if($res)
			{
				$data = array('code'=>1,'msg'=>'ok');
			}	
		}
		echo json_encode($data);
	}

	//登出
	public function logout()
	{
		$this->load->library('login');
		
		$this->login->deleteSession();
		header("Location: /font/index");
	}
}