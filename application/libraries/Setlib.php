<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Setlib
{
	
	protected $CI;
	//private $user = array();
    
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->database();
    }

    public function editUsers($id='',$data)
    {
        if(!$id) return false;
        //编辑
        if($id)
        {
            $this->CI->db->where('id', $id);
            $res = $this->CI->db->update('users', $data);
            return $res;
        }
    }

    public function selectUser($id='')
    {
        if(!$id) return false;
        $this->CI->db->select('name, phone, img_id,brief'); 
        $query = $this->CI->db->get_where('users', array('id'=>$id));
        return $query->row_array();
    }
}