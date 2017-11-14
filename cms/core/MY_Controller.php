<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $_uid = 0;
    protected $_username = "";
    protected $_data = array();
    protected $_user = array();
    public $_site = array();

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->resetBaseUrl();
        $this->load->library('http_client');
        $site = $this->config->item('site');
        if (is_array($site)) {
            $this->_site = $site;
        }
        $this->load->model('M_Setting','m_setting');
        $settings = $this->m_setting->getSettingAll();
        if (is_array($settings) && sizeof($settings) > 0) {
            foreach ($settings as $value) {
                $this->_site[$value['s_key']] = $value['s_value'];
            }
        }
        $this->_data['_site'] = $this->_site;

        $this->_uid      = $this->session->userdata('uid');
        $this->_username = $this->session->userdata('uname');
        $this->_user     = $this->session->userdata('user');

        $this->_data['_uid']        = $this->_uid;
        $this->_data['_username']   = $this->_username;
        $this->_data['_user']       = $this->_user;
    }

    protected function isLogin()
    {
        if (empty($this->_user['uname']) || empty($this->_user['uid'])) {
            return false;
        }

        return true;
    }

    protected function loadView($view)
    {
        $this->load->view($view, $this->_data);
    }

    protected function getUploadToken($time)
    {
        $key = $this->_site['auth_code'].$this->config->item('encryption_key').$this->_site['upload_key'].$time;
        $token = md5($key);

        return $token;
    }

    protected function getApiToken($data)
    {
        if (!is_array($data)) {
            $data = array();
        }
        if (empty($this->_site['auth_code'])) {
            return false;
        }
        $privateKey = $this->_site['auth_code'];

        ksort($data);
        reset($data);
        $verify = '';
        while (list($key, $value) = each($data)) {
            if ($key == "token" || $value === "") {
                continue;
            }
            $verify .= $key."=".$value."&";
        }
        $verify = rtrim($verify, "&");

        return md5($verify.$privateKey);
    }

    protected function getApiQuery($arg = array())
    {
        if (!is_array($arg)) {
            $arg = array();
        }
        if (empty($this->_site['site_url'])) {
            return false;
        }
        $arg['site_url']        = urlencode($this->_site['site_url']);
        $arg['version']         = $this->_site['version'];
        $arg['time']            = time();
        $arg['server_name']     = $this->input->server('SERVER_NAME');
        $arg['server_addr']     = $this->input->server('SERVER_ADDR');
        $arg['token']           = $this->getApiToken($arg);

        return $arg;
    }

    protected function getToken($privateKey, $data)
    {
        if (empty($privateKey) || !is_array($data) || sizeof($data) < 1) {
            return false;
        }
        ksort($data);
        reset($data);
        $verify = '';
        while (list($key, $value) = each($data)) {
            //去除签名字段和空字段
            if ($key == "token" || $value === "") {
                continue;
            }
            $verify .= $key . "=" . $value . "&";
        }
        $verify = rtrim($verify, "&");

        return md5($verify . $privateKey);
    }

    protected function resetBaseUrl()
    {
        if (isset($_SERVER['HTTP_HOST']))
        {
            $base_url = is_https() ? 'https' : 'http';
            $base_url .= '://'. $_SERVER['HTTP_HOST'];
            $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
        }
        else
        {
            $base_url = 'http://localhost/';
        }

        $this->config->set_item('base_url', $base_url);
    }
}