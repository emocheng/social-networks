<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 会话数据类
 * @author		
 */
class CI_TcSession
{

    var $flashdata_key = 'flash';

    /**
     * 构造器
     */
    public function __construct()
    {
        session_start();
        // Delete 'old' flashdata (from last request)
        $this->_flashdata_sweep();

        // Mark all new flashdata as old (data will be deleted before next request)
        $this->_flashdata_mark();
    }

    // --------------------------------------------------------------------

    /**
     * 写入会话数据
     *
     * 向会话写入一条信息
     *
     * @param	string	$name
     * @param	mixed	$value
     * @return	void
     */
    public function set($name, $value = NULL)
    {
        if (!isset($value) || $value == '')
        {
            $this->delete($name);
        }
        else
        {
            $_SESSION[$name] = $value;
        }
    }

    /**
     * 获取会话数据
     *
     * 获取会话中指定名称的数据
     *
     * @param	string	$name
     * @return	mixed
     */
    public function get($name)
    {
        if (!isset($_SESSION[$name]))
        {
            return NULL;
        }
        else
        {
            return $_SESSION[$name];
        }
    }

    /**
     * 删除会话数据
     *
     * 删除指定名称的会话数据
     *
     * @param	string	$name
     * @return	void
     */
    public function delete($name)
    {
        unset($_SESSION[$name]);
    }

    /**
     * 删除会话
     *
     * 销毁所有的会话数据，客户端下次访问页面时将是一个新的SESSION
     *
     * @return	void
     */
    public function dispose()
    {
        session_destroy();
    }

    /**
     * Identifies flashdata as 'old' for removal
     * when _flashdata_sweep() runs.
     *
     * @access	private
     * @return	void
     */
    private function _flashdata_mark()
    {
        $userdata = $this->get($this->flashdata_key);
        if (!isset($userdata['new']) || !is_array($userdata['new']) || count($userdata['new']) < 1)
            return FALSE;

        $userdata['old'] = $userdata['new'];
        unset($userdata['new']);
        $this->set($this->flashdata_key, $userdata);
    }

    /**
     * Removes all flashdata marked as 'old'
     *
     * @access	private
     * @return	void
     */
    private function _flashdata_sweep()
    {
        $userdata = $this->get($this->flashdata_key);
        if (!isset($userdata['old']) || !is_array($userdata['old']) || count($userdata['old']) < 1)
            return FALSE;

        unset($userdata['old']);
        $this->set($this->flashdata_key, $userdata);
    }

    /**
     * Add or change flashdata, only available
     * until the next request
     *
     * @access	public
     * @param	mixed
     * @param	string
     * @return	void
     */
    public function set_flashdata($newdata = array(), $newval = '')
    {
        if (is_string($newdata))
        {
            $newdata = array($newdata => $newval);
        }

        if (count($newdata) > 0)
        {
            $userdata = $this->get($this->flashdata_key);
            !isset($userdata['new']) && $userdata['new'] = array();
            $userdata['new'] = array_merge($userdata['new'], $newdata);

            $this->set($this->flashdata_key, $userdata);
        }
    }

    public function keep_flashdata($key)
    {
        $userdata = $this->get($this->flashdata_key);
        if (isset($userdata['old'][$key]))
        {
            !isset($userdata['new']) && $userdata['new'] = array();
            $userdata['new'][$key] = $userdata['old'][$key];

            $this->set($this->flashdata_key, $userdata);
        }
    }

    public function flashdata($key)
    {
        $userdata = $this->get($this->flashdata_key);
        if (isset($userdata['old'][$key]))
        {
            return $userdata['old'][$key];
        }
        return NULL;
    }

}

// END Session Class

/* End of file ZmrSession.php */
/* Location: ./application/libraries/ZmrSession.php */