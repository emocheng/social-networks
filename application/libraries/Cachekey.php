<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
//缓存键统一入口
class Cachekey 
{
    protected $CI;
    
    public function __construct()
    {
        $this->CI =& get_instance();
    }

    //消息推送缓存
    public function getMsgKey($uid)
    {
        return 'msgPushKey_'.$uid;
    }
}