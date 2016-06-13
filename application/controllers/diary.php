<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 日记控制器
 */
class Diary extends CI_Controller {


	private $per_page  = '10';
	private $prev_link  = '上一页';
	private $next_link  = '下一页';

	public function __construct()
    {
    	parent::__construct();
        $this->load->library('login');
        $this->load->library('diarylib');
        $this->load->library('common');
        $this->load->library('homelib');
		//$this->load->library('pagination');
        $this->login->jump();
        
    }

    /**日记首页
     * [index description]
     * @return [type] [description]
     */
	public function index()
	{	
		$user = $this->login->get_uid();
		if($user)
		{
			$config = array();
//			$config['per_page'] = $this->per_page;         //每页显示的数据数
//			$current_page = intval($this->input->get_post('per_page',true));  //获取当前分页页码数

//			if(!$current_page)
//			{
//				$current_page = 1;
//			}
//			//var_dump($current_page);
//			$limit   = ($current_page - 1 ) * $config['per_page'];          //设置偏移量 限定 数据查询 起始位置

			$diary_list = $this->diarylib->fatchAllDiary($user);
			$data['user_info'] = $this->homelib->selectUser($user);
			$diary_cate = $this->diarylib->selectDiaryCate($user);
			if($diary_list)
			{

				foreach($diary_list as $k=>$v)
				{
					$res = $this->diarylib->selectOneCate($v['did'],$user);
					//var_dump($res);
					if($res)
					{
						$diary_list[$k]['cate'] = $res['name'];
					}
					else
					{
						$diary_list[$k]['cate'] = 0;
					}
				}
			}
			$data['diary_list'] = $diary_list; //日记列表
			//var_dump($data['diary_list']);
			//$total = $this->diarylib->sumAllDiary($user); //日记总数
			$data['diary_cate'] = $diary_cate; //日记分类


		}
		//var_dump($data);
		//var_dump($diary_cate);

		$this->common->leadTemp('diary/diary_index.php',$data);

	}

	public function postDiary()
	{
		$user = $this->login->get_uid();
		//提交
		if($_POST)
		{
			$data['title'] = $this->input->post('title');

			$data['diary_cate'] = $this->input->post('diary_cate');
			$data['authority'] = $this->input->post('authority');
			$diary_cate = $data['diary_cate'] ? $data['diary_cate'] : 1;
			//$authority = $data['authority'] ? $data['authority'] : 1;
			$data['contents'] = $this->input->post('contents');
			$data['summary'] = $this->input->post('summary');
			$data['id'] = $this->input->post('post_id');
			if(empty($data['title']))
			{
				echo json_encode(array('code'=>1,'msg'=>'标题不能为空'));exit;
			}
			if(empty($data['summary']))
			{
				echo json_encode(array('code'=>1,'msg'=>'简介不能为空'));exit;
			}
			if(empty($data['contents']))
			{
				echo json_encode(array('code'=>1,'msg'=>'内容不能为空'));exit;
			}

			$param = array(
				'title'=>$data['title'],
				'create_time'=>time(),
				'content'=>$data['contents'],
				'summary'=>$data['summary'], //简介
				'authority'=>$data['authority'],
				'fab'=>'0',
				'did'=>$diary_cate,
				'uid'=>$user,
			);

			//编辑
			if($data['id']) 
			{
				$this->diarylib->editDiary($data['id'],$user,$param);
			}else //新增
			{

				$this->diarylib->editDiary('',$user,$param);
			}
			echo json_encode(array('code'=>2,'msg'=>'ok'));
		}


	}

	/**
	 * 日记编辑
	 * @return [type]
	 */
	public function edit()
	{
		$data = array();
		$id = $this->input->get('id');
		$user = $this->login->get_uid();
		//var_dump($user);

		//日记分类
		$diary_cate = $this->diarylib->selectDiaryCate($user);
		if($diary_cate)
		{
			$data['diary_cate'] = $diary_cate;
		}

		//编辑
		if($id)
		{
			$diary_content = $this->diarylib->selectDiary($id,$user);

			if($diary_content)
			{
				$data['content'] = $diary_content;
			}

		}
		
		
		$this->common->leadTemp('diary/diary_eidt.php',$data,'comm/editHeader');
	}

	/**
	 * 日记详情页
	 * @return [type]
	 */
	public function content()
	{
		$nowUser = $this->login->get_uid();
		$user = $this->input->get('uid') ? $this->input->get('uid') : $this->login->get_uid();
		$id = $this->input->get('id');
		$data = array(); 
		if($id)
		{
			$diary_content = $this->diarylib->selectDiary($id,$user);
			if($diary_content)
			{
				$data['content'] = $diary_content;
				$data['user_info'] = $this->homelib->selectUser($user);

				if($nowUser === $user)
				{
					$data['sys'] = 1;
				}



				$this->common->leadTemp('diary/diary_content.php',$data);
			}else
			{
				header("Location: /diary/index");

			}
		}else
		{
			header("Location: /diary/index");
		}
		//var_dump($data['content']);
		
	}

	//删除日记
	public function delete()
	{
		$user = $this->login->get_uid();
		$id = $this->input->post('del_id');
		if($id)
		{
			$handel = $this->diarylib->delete_diary($user,$id);
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

	//删除分类
	public function delDiaryCate()
	{
		$user = $this->login->get_uid();
		$id = $this->input->post('id');
		if($id && $user)
		{
			$handel = $this->diarylib->delete_diary_cate($user,$id);
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

	//新增分类
	public function postDiaryCate()
	{
		$user = $this->login->get_uid();
		$data['name'] = $this->input->post('cataName');
		$param = array(
			'name'=>$data['name'],
			'create_time'=>time(),
			'open_time'=>time(),
			'authority'=>1,
			'uid'=>$user
		);
		$id = $this->input->post('post_id');
		if($id)
		{
			$res = $this->diarylib->editDiaryCate($id,$user,$param);
		}
		else
		{
			$res = $this->diarylib->editDiaryCate('',$user,$param);
		}

		if($res)
		{
			echo json_encode(array('code'=>1,'msg'=>'ok'));
		}
		else
		{
			echo json_encode(array('code'=>-1,'msg'=>'error'));
		}

	}

	//拉取日记 ajax
	public function ajaxGetDiary()
	{
		$user = $this->login->get_uid();
		$authority =  $this->input->post('authority'); //0-私密;1-公开
		$data['user_info'] = $this->homelib->selectUser($user); //用户信息
		$diary_list = $this->diarylib->fatchAllDiary($user,$authority);
		if($diary_list)
		{
			foreach($diary_list as $k=>$v)
			{
				$res = $this->diarylib->selectOneCate($v['did'],$user);
				//var_dump($res);
				if($res)
				{
					$diary_list[$k]['cate'] = $res['name'];
				}
				else
				{
					$diary_list[$k]['cate'] = 0;
				}

				$diary_list[$k]['fri_create_time'] = date('Y-m-d H:i:s', $v['create_time']);;
			}
			echo json_encode(array('code'=>1,'data'=>$diary_list,'user'=>$data['user_info']));
		}
		else
		{
			echo json_encode(array('code'=>-1,'msg'=>'no diary'));

		}
	}


	//分页设置
	function page_config($count, $add) {
		$config ['base_url'] = $add; //设置基地址
		$config ['uri_segment'] = 3; //设置url上第几段用于传递分页器的偏移量
		$config ['total_rows'] = $count;
		$config ['per_page'] = 10; //每页显示的数据数量
		$config ['first_link'] = '首页';
		$config ['last_link'] = '末页';
		$config ['next_link'] = '下一页>';
		$config ['prev_link'] = '<上一页';
		return $config;
	}

	//点赞
	function doLike()
	{
		$fromId =	$this->login->get_uid();
		$likeId =	(int)$this->input->post('likeId');
		$author =	(int)$this->input->post('author');

		if($likeId && $author)
		{
			$Res = $this->common->isLike($author,$fromId,1);

			if($Res)
			{
				echo json_encode(array('code'=>-1,'msg'=>'你已经点过赞了'));
			}
			else
			{
				$handel = $this->common->doLike($author,$fromId,1,$likeId);

				if($handel === false)
				{
					echo json_encode(array('code'=>0,'msg'=>'insert error'));
				}
				else
				{
					echo json_encode(array('code'=>1,'msg'=>'well done!'));
				}
			}

		}


	}

	//是否点过赞
	public function isLike($author,$likeId)
	{
		$fromId =	$this->login->get_uid();
		if($author && $likeId)
		{
			$res = $this->common->isLike($author,$fromId,1);
			if($res)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		return false;
	}



}