<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 设置控制器
 */
class Set extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        $this->load->library('login');
        $this->load->library('common');
        $this->load->library('setlib');
        $this->login->jump();
        
    }

    /**设置首页
     * [index description]
     * @return [type] [description]
     */
	public function index()
	{	
		$user = $this->login->get_uid();
		$data = array();
		$user_info = $this->setlib->selectUser($user);
		//var_dump($user_info);
		$data['user_info'] = $user_info;
		$this->common->leadTemp('set/set_index.php',$data);
	}

	/**提交用户信息
	 * [post description]
	 * @return [type] [description]
	 */
	public function post()
	{
		$user = $this->login->get_uid();
		$param = array();
		$param['name'] = $this->input->post('name');
		$param['phone'] = $this->input->post('phone');//brief
		$param['brief'] = $this->input->post('brief');
		$img = $this->input->post('img_url');
		if($img)
		{
			$param['img_id'] = $img;
		}
		
		$res = $this->setlib->editUsers($user,$param);
		if($res)
		{
			//更新会话
			$this->login->getOneUser($user,1);

			header("Location: /home/index");
		}
	}

}