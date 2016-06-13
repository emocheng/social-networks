<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	

class Diarylib {

	protected $CI;
	//private $user = array();
    
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->database();
    }


    /**查询所有日记
     * [fatchAllDiary description]
     * @return [type] [description]
     */
    public function fatchAllDiary($user,$authority=1)
    {
        if (!$user) return false;
        $this->CI->db->order_by('create_time','DESC');
        $query = $this->CI->db->get_where('diary', array('uid'=>$user,'authority'=>$authority));
        return $query->result_array(); //所有，单条row_array()
    }

    //统计日记总数
    public function sumAllDiary($user,$authority=1)
    {
        $res =  $this->CI->db->count_all('diary',array('uid'=>$user,'authority'=>$authority));
        return $res;
    }

    /**查询单条日记
     * [selectDiary description]
     * @param  [type] $id   [description]
     * @param  [type] $user [description]
     * @return [type]       [description]
     */
    public function selectDiary($id,$user)
    {
        if(!$id || !$user) return false;
        $query = $this->CI->db->get_where('diary', array('uid'=>$user,'id'=>$id));
        $res = $query->row_array();
        if($res)
        {
            return $res;
        }else
        {
            return false;
        }
    }
    //查询单条分类
    public function selectOneCate($id,$user)
    {
        if(!$id || !$user) return false;
        $query = $this->CI->db->get_where('diary_cate', array('uid'=>$user,'id'=>$id));
        $res = $query->row_array();
        if($res)
        {
            return $res;
        }else
        {
            return false;
        }
    }

    //查询所有分类
    public function selectDiaryCate($user)
    {
        if(!$user) return false;
        $query = $this->CI->db->get_where('diary_cate', array('uid'=>$user));
        $res = $query->result_array();
        return $res;
    }


    //新增日记
    public function editDiary($id='',$user,$data)
    {
        if(!$user) return false;
        //编辑
        if($id)
        {
            $this->CI->db->where(array('id'=> $id,'uid'=>$user));
            $this->CI->db->update('diary', $data);
            
        }else
        {
            $res = $this->CI->db->insert('diary', $data);
        }
    }

    //新增日记分类
    public function editDiaryCate($id='',$user,$data)
    {
        if(!$user) return false;
        if($id)
        {
            $this->CI->db->where(array('id'=> $id,'uid'=>$user));
            $res = $this->CI->db->update('diary_cate', $data);
        }
        else
        {
            $res = $this->CI->db->insert('diary_cate', $data);
        }
        return $res;
    }
    //删除日记
    public function delete_diary($user,$id)
    {
        if(!$user) return false;
        $this->CI->db->where(array('id'=> $id,'uid'=>$user));
        $res = $this->CI->db->delete('diary');
        //$res = $this->CI->delete('diary', array('id' => $id,'uid'=>$user));
        return $res;
    }

    //删除日记分类
    public function delete_diary_cate($user,$id)
    {
        if(!$user) return false;
        $this->CI->db->where(array('id'=> $id,'uid'=>$user));
        $res = $this->CI->db->delete('diary_cate');
        if($res)
        {
            $this->CI->db->where('did', $id);
            $delRes = $this->CI->db->delete('diary');
        }
        //$res = $this->CI->delete('diary', array('id' => $id,'uid'=>$user));
        return $delRes;
    }
}