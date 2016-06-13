<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 心情控制器
 */
class Heart extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        $this->load->library('login');
        $this->load->library('common');
        $this->load->library('heartlib');
        $this->load->library('homelib');
        $this->login->jump();
        
    }

	public function index()
	{	
		$user = $this->login->get_uid();
		$data = array();
		if($user)
		{
			$heart_list = $this->heartlib->fatchAllHeart($user);
			$data['user_info'] = $this->homelib->selectUser($user);
		}
		$data['heart_list'] = $heart_list;
		
		$this->common->leadTemp('heart/heart_index.php',$data);
	}

	public function delete()
	{
		$user = $this->login->get_uid();
		$id = $this->input->post('id');
		if($id)
		{
			$handel = $this->heartlib->delete_heart($user,$id);
			if($handel)
			{
				echo json_encode(array('code'=>1,'smg'=>'ok'));exit;
			}else
			{
				echo json_encode(array('code'=>0,'smg'=>'error'));exit;	
			}
				
		}else
		{
			echo json_encode(array('code'=>-2,'smg'=>'参数错误'));exit;
		}
			
	}

	public function addHeart()
	{
		$user = $this->login->get_uid();
		$content = $this->input->post('content');
		$time = time();
		$param = array(
			'create_time'=>$time,
			'authority'=>2,//暂时全部公开
			'open_time'=>$time,
			'uid'=>$user,
			'content'=>$content
		);
		if($content)
		{
			$handel = $this->heartlib->add_heart($user,$param);
			if($handel)
			{
				echo json_encode(array('code'=>1,'smg'=>'ok'));exit;
			}else
			{
				echo json_encode(array('code'=>0,'smg'=>'error'));exit;	
			}
				
		}else
		{
			echo json_encode(array('code'=>-2,'smg'=>'参数错误'));exit;
		}
	}
}