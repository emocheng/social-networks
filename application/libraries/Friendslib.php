<?php
/**
 * Created by PhpStorm.
 * User: tc
 * Date: 16/3/15
 * Time: 下午4:09
 */

class Friendslib {

    protected $CI;
    //private $user = array();

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->database();
    }

    /**
     * 查询所有好友
     * @param $uid
     */
    public function selectAllFans($uid,$index='')
    {
        if (!$uid) return false;
        if(!$index || $index == 1)
        {
            $this->CI->db->select('friend_id');
            $this->CI->db->order_by('time','DESC');
            $query = $this->CI->db->get_where('friends', array('uid'=>$uid,'status '=>1));
            $fans =  $query->result_array();
        }
        else
        {
            $this->CI->db->select('follow_id ');
            $this->CI->db->order_by('time','DESC');
            $query = $this->CI->db->get_where('follow', array('uid'=>$uid,'status '=>1));
            $fans =  $query->result_array();
        }

        //$res = array();
        if($fans)
        {
            $res = array();
            foreach($fans as $k=>$v)
            {
                $selectId = !$index || $index == 1 ? $v['friend_id'] : $v['follow_id'];
                $this->CI->db->select('id, name, img_id,brief,create_time,level','brief');

                $query = $this->CI->db->get_where('users', array('id'=>$selectId));
                $res[] = $query->row_array();

                foreach($res as $kk=>$vv)
                {

                    $this->CI->db->where(array('uid'=>$vv['id'],'status'=>1));
                    $this->CI->db->from('friends');
                    $res[$kk]['friendsNum'] = $this->CI->db->count_all_results(); //

                    $this->CI->db->where(array('uid'=>$vv['id'],'status'=>1));
                    $this->CI->db->from('follow');
                    $res[$kk]['followsNum'] = $this->CI->db->count_all_results(); //

                    $query2 = $this->CI->db->get_where('background', array('uid'=>$vv['id'],'status'=>1));
                    $title = $query2->row_array();
                    if($title)
                    {
                        $res[$kk]['background'] = $title['url'];
                    }
                    else
                    {
                        $res[$kk]['background'] = '/public/title/'.rand(1,3).'.jpg';
                    }
                }
            }

            return $res;
        }
        return false;


    }


}