<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	

class Login {

	protected $CI;
	private $user = array();
    
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('session');
        //$this->load->library('TcSession');
        $this->CI->load->library('encrypt');
        $this->CI->load->database();
        $this->user = $this->CI->session->userdata('user');
    }

    //是否登陆判断
    public function isLogin()
    {
    	return $this->user ? true : false;
    }

    /**没有登陆时跳转
     * [jump description]
     * @return [type] [description]
     */
    public function jump()
    {
    	$this->CI->load->helper('url');
    	if(!$this->user)
    	{
    		redirect('font/index', 'refresh');
    	}
    }

    /**增加用户类
     * [addUser description]
     * @param [type] $email [description]
     * @param [type] $psw   [description]
     */
    public function addUser($email,$psw)
    {	
    	$encodPsw = md5($psw);
        $time = time();
    	$data = array('email'=>$email,'paw'=>$encodPsw,'create_time'=>$time,'status'=>1);
    	
    	$res = $this->CI->db->insert('users', $data);
    	return $res;
    }

    /**
     * [checkUser description]
     * @param  [type] $email [description]
     * @return [type]        [description]
     */
    public function checkUser($email,$psw = '')
    {
		$arr = array('email' => $email);

		if($psw)
		{
			$arr['paw'] = $psw;
		}

		$query = $this->CI->db->get_where('users', $arr);
        return $query->row_array();
    }

    /**用户登陆成功。。存进会话
     * [setUser description]
     */
    public function setUser($check)
    {	
    	if(!is_array($check))
		{
			return false;
		} 
    	$this->CI->session->set_userdata('user', $check);
    	return true;
    }

    //删除会话
    public function deleteSession()
    {
        $this->CI->session->sess_destroy();
    }

    //更新回话
    public function updateSession($newData)
    {


        $this->session->set_userdata('user',$newData);
    }

    /**读取用户id
     * [get_uid description]
     * @return [type] [description]
     */
    public function get_uid()
    {
        $this->CI->load->library('session');
        $user = $this->CI->session->userdata('user'); //读取用户
        if(!is_array($user) || !$user)
        {
            return false;
            
        }else
        {
            return $user['id'];
        }
        
    }

    //获取好友和关注者数量
    public function getFriendsAndFollowsNum()
    {
        $uid = $this->get_uid();
        $data = array();

        $this->CI->db->where(array('uid'=>$uid,'status'=>1));
        $this->CI->db->from('friends');
        $data['friendsNum'] = $this->CI->db->count_all_results(); //

        $this->CI->db->where(array('uid'=>$uid,'status'=>1));
        $this->CI->db->from('follow');
        $data['followsNum'] = $this->CI->db->count_all_results(); //


        return $data;
    }

    /**
     * @param $uid
     * @param string $flag :如果为1,表示需要更新会话
     * @return bool
     */
    public function getOneUser($uid,$flag='')
    {
        $query = $this->CI->db->get_where('users', array('id'=>$uid));
        $res = $query->row_array();
        if($res)
        {
            if($flag)
            {
                $this->setUser($res);
            }
            return $res;
        }else
        {
            return false;
        }
    }

    //查询好友的所有文章
    public function getAllFriendsDiary()
    {
        $uid = $this->get_uid();
        $user = $this->getOneUser($uid);
        if($user)
        {
            $friend = $user['friend'];
            if($friend)
            {
                $res = array();
                $friendArr = explode(',',$friend);
                foreach($friendArr as $k=>$v)
                {
                    $this->CI->db->order_by('create_time','DESC');
                    $query = $this->CI->db->get_where('diary', array('uid'=>$v,'authority'=>1));

                    $resHandle = $query->row_array();
                    if(!empty($resHandle))
                    {
                        $res[] = $resHandle;
                    }


                }


                if($res)
                {
                    foreach($res as $kk=>$vv)
                    {
                        if(!empty($vv))
                        {
                            $querySon = $this->CI->db->get_where('users', array('id'=>$vv['uid']));
                            $res2 = $querySon->row_array();
                            $res[$kk]['username'] = $res2['name'];
                            $res[$kk]['img_id'] = $res2['img_id'];
                        }

                    }

                }
                return $res;
            }
        }
    }

}