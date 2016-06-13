<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Serverlib
{
	
	protected $CI;
	//private $user = array();
    
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->database();
    }

    public function editServer($id='',$data)
    {
    	//编辑
        if($id)
        {
            $this->CI->db->where('id', $id);
            $res = $this->CI->db->update('cms', $data);
            
        }else
        {
            $res = $this->CI->db->insert('cms', $data);
        }
    }

    public function editNewuser($id='',$data)
    {
    	//编辑
        if($id)
        {
            $this->CI->db->where('id', $id);
            $res = $this->CI->db->update('newuser', $data);
            
        }else
        {
            $res = $this->CI->db->insert('newuser', $data);
        }
    }

    public function editFq($id='',$data)
    {
    	//编辑
        if($id)
        {
            $this->CI->db->where('id', $id);
            $res = $this->CI->db->update('fq', $data);
            
        }else
        {
            $res = $this->CI->db->insert('fq', $data);
        }
    }

    public function editDeveloper($id='',$data)
    {
    	//编辑
        if($id)
        {
            $this->CI->db->where('id', $id);
            $res = $this->CI->db->update('developer', $data);
            
        }else
        {
            $res = $this->CI->db->insert('developer', $data);
        }
    }

    public function selectCMS($id,$cms='')
    {
    	if(!$id || !$cms) return false;
        $query = $this->CI->db->get_where($cms, array('id'=>$id));
        $res = $query->row_array();
        if($res)
        {
            return $res;
        }else
        {
            return false;
        }
    }
}    