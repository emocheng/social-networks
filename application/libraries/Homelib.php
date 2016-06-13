<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Homelib 
{
	protected $CI;
	//private $user = array();
    
    public function __construct()
    {   
        $this->CI =& get_instance();
        $this->CI->load->database();
        $this->CI->load->library('cachekey');
    }

    /**查询用户信息
     * [selectDiary description]
     * @param  [type] $id   [description]
     * @param  [type] $user [description]
     * @return [type]       [description]
     */
    public function selectUser($user)
    {
        if(!$user) return false;
        $this->CI->db->select('name, phone, img_id,brief,create_time,level'); 
        $query = $this->CI->db->get_where('users', array('id'=>$user));
        $res = $query->row_array();
        if($res)
        {
            return $res;
        }else
        {
            return false;
        }
    }

    /**心情统计
     * [count_heart description]
     * @param  [type] $user [description]
     * @return [type]       [description]
     */
    public function count_heart($user)
    {
    	$this->CI->db->where('uid', $user);
		$this->CI->db->from('heart');
		$res = $this->CI->db->count_all_results();
		return $res;
    }

    /**日记统计
     * [count_diary description]
     * @param  [type] $user [description]
     * @return [type]       [description]
     */
    public function count_diary($user)
    {
    	$this->CI->db->where('uid', $user);
		$this->CI->db->from('diary');
		$res = $this->CI->db->count_all_results();
		return $res;
    }

    /**相册统计
     * [count_photo description]
     * @param  [type] $user [description]
     * @return [type]       [description]
     */
    public function count_photo($user)
    {
    	$this->CI->db->where('uid', $user);
		$this->CI->db->from('photo_lib');
		$res = $this->CI->db->count_all_results();
		return $res;
    }

    //搜索用户
    public function searchUser($userInfo)
    {
        $this->CI->db->like('name', $userInfo);
        $query = $this->CI->db->get('users');
        $res = $query->result_array();
        $sum = $this->CI->db->count_all_results();

        $data['res'] = $res;
        $data['sum'] = $sum;
        return $data;
    }

    /**
     * @param $user : 用户id
     * @param $id   : 被关注者id
     * @return bool|int
     */
    public function postFollow($user,$id)
    {
        if(!$user || ! $id) return false;
        //加朋友
        $this->CI->db->select('friend_id');
        $query = $this->CI->db->get_where('friends', array('uid'=>$user,'friend_id '=>$id,'status'=>1));
        $res = $query->row_array();
        if($res)
        {
            return -3;
        }
        $data['uid'] = $user;
        $data['friend_id '] = $id;
        $data['status']  = 1;
        $data['time'] = time();
        $insertRes = $this->CI->db->insert('friends', $data);
        if($insertRes)
        {
            //朋友添加关注者
            $this->CI->db->select('follow_id');
            $query = $this->CI->db->get_where('follow', array('uid'=>$id,'follow_id '=>$user,'status'=>1));
            $res = $query->row_array();
            if(!$res)
            {
                $data2['uid'] = $id;
                $data2['follow_id '] = $user;
                $data2['status']  = 1;
                $data2['time'] = time();
                $this->CI->db->insert('follow', $data2);
            }
            return 1;
        }
        else
        {
            return -1;
        }


    }

    /**
     * @param $str : 待处理字符串
     * @param $param : 待拼接进字符串的元素
     * @return int|string
     */
    public function strToArr($str,$param)
    {
        $Arr = explode(',',$str);
        if(in_array($param,$Arr))
        {
            return 0;
        }

        $Arr[] = $param;

        $newStr = implode(',',$Arr);

        return $newStr;

    }

    /**
     * 是否关注了该好友
     * @param $friendId : 好友id
     * @param $userId   : 用户id
     */
    public function isFriends($friendId,$userId)
    {
        $this->CI->db->select('friend_id');
        $query = $this->CI->db->get_where('friends', array('uid'=>$userId,'friend_id '=>$friendId,'status'=>1));
        $res = $query->row_array();
        $res = $res ? 1 : 0; //1有关注 : 0没有关注
        return $res;
    }

    //推送消息读取
    public function getMessage($uid)
    {
        if(!$uid) return false;

        $this->CI->load->driver('cache');
        //推送key
        //$key = 'msgPushKey_'.$uid;
        $key = $this->CI->cachekey->getMsgKey($uid);
	    $data = $this->CI->cache->memcached->get($key);
        if(!$data)
        {
            $query = $this->CI->db->get_where('stock', array('uid'=>$uid,'status '=>0,));
            $res = $query->result_array();
            $sum = count($res);
            if($res)
            {
                foreach($res as $k=>$v)
                {
                    $time = date('Y-m-d H:i:s', $v['time']);
                    $res[$k]['org_time'] = $time;
                }
            }
            $data['res'] = $res;
            $data['sum'] = $sum;
            $data['_mem'] = 1;
            $this->CI->cache->memcached->save($key,$data,0);
        }
        return $data;
    }

    /**
     * @消息通知写入
     * @param $param :[uid:type,from,time] :-有人关注，2-有人评论，3-有人点赞,4-系统消息
     * @param $uid
     * @return bool
     */
    public function setMessage($param,$uid)
    {
        if(!is_array($param) || $uid =='') return false;

        $res = $this->CI->db->insert('stock', $param);
        $this->CI->load->driver('cache');
        //推送key
        //$key = 'msgPushKey_'.$uid;
        $key = $this->CI->cachekey->getMsgKey($uid);
        //清除缓存
        $this->CI->cache->memcached->delete($key);
        return $res;

    }

    //关闭消息推送
    public function closeMessage($uid)
    {
        if(!$uid) return false;
        $data = array(
            'status ' => 1
        );
        $this->CI->load->driver('cache');
        $this->CI->db->where('uid', $uid);
        $res = $this->CI->db->update('stock', $data);
        //推送key
        //$key = 'msgPushKey_'.$uid;
        $key = $this->CI->cachekey->getMsgKey($uid);
        //清除缓存
        $this->CI->cache->memcached->delete($key);
        return $res;
    }
}

	