<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 欢迎界面
 */
class Timeline extends CI_Controller
{

    /**时间轴首页
     * [index description]
     * @return [type] [description]
     */
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('timeline_index');
    }


}