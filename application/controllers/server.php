<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 欢迎界面
 */
class Server extends CI_Controller {


	public function __construct()
    {
    	parent::__construct();
        $this->load->library('login');
        $this->load->library('common');
        $this->load->library('serverlib');
        $this->login->jump();
        
    }

	/**欢迎界面首页
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{
		$data = array();
		$this->common->leadServer('server/index.php',$data);
	}

	//新手
	public function newuser()
	{
		$data = array();

		$data['contents'] = $this->serverlib->selectCMS(1,'newuser');
		if($_POST)
		{
			$data['contents'] = $this->input->post('contents');
			$data['id'] = $this->input->post('id');
			if($data['id'])
			{
				$param = array(
					'contents'=>$data['contents'],
				);
				$this->serverlib->editNewuser($data['id'],$param);
			}else
			{
				$param = array(
					'contents'=>$data['contents'],
				);
				$this->serverlib->editNewuser('',$param);
			}
		}
		
 		$this->common->leadServer('server/newuser.php',$data);
	}

	//问答
	public function fq()
	{
		$data = array();
		$data['contents'] = $this->serverlib->selectCMS(1,'fq');
		if($_POST)
		{
			$data['contents'] = $this->input->post('contents');
			$data['id'] = $this->input->post('id');
			if($data['id'])
			{
				$param = array(
					'contents'=>$data['contents'],
				);
				$this->serverlib->editFq($data['id'],$param);
			}else
			{
				$param = array(
					'contents'=>$data['contents'],
				);
				$this->serverlib->editFq('',$param);
			}
		}

 		$this->common->leadServer('server/fq.php',$data);
	}

	//开发者
	public function developer()
	{
		$data = array();
		$data['contents'] = $this->serverlib->selectCMS(1,'developer');
		if($_POST)
		{
			$data['contents'] = $this->input->post('contents');
			$data['id'] = $this->input->post('id');
			if($data['id'])
			{
				$param = array(
					'contents'=>$data['contents'],
				);
				$this->serverlib->editDeveloper($data['id'],$param);
			}else
			{
				$param = array(
					'contents'=>$data['contents'],
				);
				$this->serverlib->editDeveloper('',$param);
			}
		}
	
 		$this->common->leadServer('server/develpper.php',$data);
	}

}