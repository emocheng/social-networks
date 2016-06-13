<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('leadTemp'))
{
	function leadTemp($view,$data)
	{
		$this->CI =& get_instance();
		$this->CI->load->view('comm/header');
		$this->CI->load->view($view,$data);
		$this->CI->load->view('comm/footer');
	}
}