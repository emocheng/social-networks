<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 朋友控制器
 */
class Friends extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
		$this->load->library('login');
		$this->load->library('friendslib');
		$this->load->library('common');
		$this->load->library('homelib');
		$this->login->jump();

        
    }

	public function index()
	{

		$user = $this->login->get_uid();
		$data = array();

		//查询好友的信息
		$data['fans'] = $this->friendslib->selectAllFans($user);
		//var_dump($data['fans']);
		$this->common->leadTemp('friends/friends_index.php',$data);

	}

	public function showFans()
	{
		$user = $this->login->get_uid();
		$index = $this->input->post('index'); //1-我关注了谁,2-谁关注了我
		$data['fans'] = $this->friendslib->selectAllFans($user,$index);
		$data['code'] = $data['fans'] ? 1 : 0;
		echo json_encode($data);
	}

}