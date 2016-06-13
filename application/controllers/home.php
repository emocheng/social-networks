<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 注册页面
 */
class Home extends CI_Controller {



	public function __construct()
    {
    	parent::__construct();
        $this->load->library('login');
        $this->load->library('common');
        $this->load->library('homelib');
        $this->login->jump();
        
    }


    /**用户中心界面
     * [index description]
     * @return [type] [description]
     */
	public function index()
	{	
		$data = array();
		$user = $this->login->get_uid();
		
		$this->load->library('session'); 
		$a = $this->session->userdata('user');
		
		if($user)
		{
			$data['user_info'] = $this->homelib->selectUser($user);
			$data['heart_count'] = $this->homelib->count_heart($user);
			$data['count_diary'] = $this->homelib->count_diary($user);
			$data['count_photo'] = $this->homelib->count_photo($user);
			//关注者与被关注者数量
			$data['FriendsAndFollowsNum'] = $this->login->getFriendsAndFollowsNum(); //
			$data['friendDiary'] = $this->login->getAllFriendsDiary();
		}
		//var_dump($data['heart_count']);
		$this->common->leadTemp('home_index.php',$data);
	}

	/**
	 * 搜索
	 */
	public function search()
	{
		$user = $this->login->get_uid();
		$searchName = trim($this->input->post('search-name'));
		$data = array();
		if($searchName !== '')
		{
			$data['result'] = $this->homelib->searchUser($searchName);
			if($data['result']['sum'] > 0 )
			{
				foreach($data['result']['res'] as $k=>$v)
				{
					$userId = $v['id']; //被搜索人的id
					$heart_count = $this->homelib->count_heart($userId);
					$data['result']['res'][$k]['heart'] = $heart_count;

					$count_diary = $this->homelib->count_diary($userId);
					$data['result']['res'][$k]['diary'] = $count_diary;
					//是否关注了该用户
					$isFriend = $this->homelib->isFriends($userId,$user);
					$data['result']['res'][$k]['isFriend'] = $isFriend;

				}
			}
		}

		$this->common->leadTemp('search_index.php',$data);

	}

	//关注:
	public function addFollow()
	{
		$user = $this->login->get_uid();
		$id = (int)$this->input->post('id');
		if($user == $id)
		{
			echo json_encode(array('code'=>-1,'msg'=>'自己不能关注自己'));
			exit;
		}
		$res = $this->homelib->postFollow($user,$id);

		if($res === false)
		{
			echo json_encode(array('code'=>0,'msg'=>'参数不足'));
			exit;
		}elseif($res === -3)
		{
			echo json_encode(array('code'=>-3,'msg'=>'已经关注过TA'));
			exit;
		}elseif($res === -1)
		{
			echo json_encode(array('code'=>-1,'msg'=>'添加失败'));
			exit;
		}else
		{
			//添加好友成功,发送系统消息
			$data['uid'] = $id; //被推送用户
			$data['from'] = $user; //来源是当前用户
			$data['type'] = 1;
			$data['time'] = time();
			$backReturn = $this->homelib->setMessage($data,$user);

			echo json_encode(array('code'=>1,'msg'=>'ok','return'=>$backReturn,'data'=>$data));
			exit;
		}


	}

	//消息推送
	public function getMessage()
	{
		$user = $this->login->get_uid();
		$message = $this->homelib->getMessage($user);
		$data['code'] = $message['sum'] > 0 ? 1 : 0;
		$data['data'] = $message;
		echo json_encode($data);

	}

	//关闭消息
	public function closeMessage()
	{
		$user = $this->login->get_uid();
		$message = $this->homelib->closeMessage($user);

		echo json_encode($message);
	}

	//缓存测试
	public function test()
	{
		$this->load->driver('cache');
		
		echo $this->cache->memcached->get('key2');
	}




}