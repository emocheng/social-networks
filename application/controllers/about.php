<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 欢迎界面
 */
class About extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        $this->load->library('login');
        $this->load->library('diarylib');
        $this->load->library('common');
        $this->load->library('homelib');
        $this->login->jump();
        
    }

	/**关于首页
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{
		$user = $this->login->get_uid();
	
		$this->common->leadTemp('cms/about');
	}
	//新手指导
	public function greenhand()
	{
		$user = $this->login->get_uid();
	
		$this->common->leadTemp('cms/greenhand');
	}
	//f&q
	public function fq()
	{
		$user = $this->login->get_uid();
	
		$this->common->leadTemp('cms/fq');
	}
	//开发者
	public function developer()
	{
		$user = $this->login->get_uid();
	
		$this->common->leadTemp('cms/developer');
	}

	
}