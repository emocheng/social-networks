<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 欢迎界面
 */
class Severlogin extends CI_Controller {

	/**欢迎界面首页
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('server/serverlogin');
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
				echo json_encode(array('code'=>-2,'smg'=>'no user'));exit;	
			}
			
			$res = $this->login->setUser($check);
			if($res)
			{
				$data = array('code'=>1,'msg'=>'ok');
			}	
		}
		echo json_encode($data);
	}
}