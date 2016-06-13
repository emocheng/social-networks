<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Heartlib 
{
	
	protected $CI;
	//private $user = array();
    
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->database();
    }

    /**查询所有
     * [fatchAllDiary description]
     * @return [type] [description]
     */
    public function fatchAllHeart($user)
    {
        if (!$user) return false;
        $this->CI->db->order_by('create_time','DESC');
        $query = $this->CI->db->get_where('heart', array('uid'=>$user));
        return $query->result_array(); //所有，单条row_array()
    }

    public function delete_heart($user,$id)
    {
        if(!$user) return false;
        $this->CI->db->where('id', $id);
        $res = $this->CI->db->delete('heart');
        return $res;
    }

    public function add_heart($user, $data)
    {
    	if(!$user) return false;
    	$res = $this->CI->db->insert('heart', $data);
    	return $res;
    }
}