<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	

class Common {

	 public function __construct()
    {
        $this->CI =& get_instance();
		$this->CI->load->database();
    }

	/**
	 * 加载模板
	 * @param $view
	 * @param array $data
	 * @param string $dir
	 */
	public function leadTemp($view,$data = array(),$dir = '')
	{
		$this->CI->load->helper('url');
		if($dir == '')
		{
			$this->CI->load->view('comm/header');
		}
		else
		{
			$this->CI->load->view($dir);
		}

		$this->CI->load->view('comm/nav');
		$this->CI->load->view($view,$data);
		$this->CI->load->view('comm/footer');
	}

	/**
	 * 加载管理系统模板
	 * @param $view
	 * @param array $data
	 */
	public function leadServer($view,$data = array())
	{
		$this->CI->load->helper('url');
		$this->CI->load->view('server/header');
		$this->CI->load->view('server/nav');
		$this->CI->load->view('server/sider');
		$this->CI->load->view($view,$data);
		$this->CI->load->view('server/footer');
	}

	/**
	 * 判断当前用户是否为目标type点过赞
	 * @param $user		: 目标用户id
	 * @param $fromId		: 当前用户id
	 * @param $type		: 类型 1-日记,2-心情
	 * @return bool
	 */
	public function isLike($user,$fromId,$type)
	{
		if (!$user || !$type || !$fromId) return false;
		$query = $this->CI->db->get_where('like', array('userid'=>$user,'fromid'=>$fromId,'type'=>$type));
		$Res = $query->row_array();
		return $Res = $Res ? true : false ;
	}

	/**
	 * //点赞操作
	 * @param $user		: 目标用户id
	 * @param $fromId		: 当前用户id
	 * @param $type		: 类型 1-日记,2-心情
	 * @param $likeId		: 操作文章or心情id
	 * @return bool
	 */
	public function doLike($user,$fromId,$type,$likeId)
	{
		if (!$user || !$type || !$fromId || !$likeId) return false;
		$data = array('userid'=>$user,'fromid'=>$fromId,'type'=>$type,'likeid'=>$likeId);
		$res = $this->CI->db->insert('like', $data);
		return $res;
	}




}