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
        $this->resetBaseUrl();
        $this->load->model('m_Setting');
        $this->load->model('m_Admin');
        $this->load->model('m_Operate_log');
        $this->load->config('menu');

        $site = $this->config->item('site');
        if (is_array($site)) {
            $this->_site = $site;
        }
        $settings = $this->m_Setting->getSettingAll();
        if (is_array($settings) && sizeof($settings) > 0) {
            foreach ($settings as $value) {
                $this->_site[$value['s_key']] = $value['s_value'];
            }
        }
        if ($this->_site['version'] != VERSION_711CMS) {
            $this->m_Setting->updateForceSettingByKey('version', VERSION_711CMS);
            $this->m_Setting->updateForceSettingByKey('update_time', time());
            $this->_site['version'] = VERSION_711CMS;
            $this->_site['update_time'] = time();
        }

        $this->_data['_site'] = $this->_site;

        $menu = $this->config->item('menu');
        if(isset($this->_site['site_apk']) && $this->_site['site_apk']){
            $menu[] = array(
                    'title'     => '手助管理',
                    'url'       => '',
                    'bgimg'     => static_url('/images/menu1/template.png'),
                    'rmbimg'    => '',
                    'sonmenu'   => array(
                        array('title' => '应用推荐',    'url' => build_url('Recommend','main',array('type'=>2))),
                        array('title' => '广告列表',    'url' => build_url('Advert','main',array('type'=>3))),
                    ),
                );
        }
        if (is_array($menu)) {
            $this->_data['_menu'] = $menu;
        }

        $c = $this->config->item('controller_trigger');
        if (in_array(strtolower($this->input->get($c)), array("", "index","tui360"))) {
            return;
        }

        if (!$this->isLogin()) {
            if ($this->input->is_ajax_request()) {
                $this->output->error_json(999, "您的会话已超时，请刷新页面后重新登录。");
            }
            redirect(build_url("index","index"));
        }

        $this->_uid      = $this->session->userdata('uid');
        $this->_username = $this->session->userdata('uname');
        $this->_user     = $this->session->userdata('user');

        $this->_data['_uid']        = $this->_uid;
        $this->_data['_username']   = $this->_username;
        $this->_data['_user']       = $this->_user;
    }

    protected function isLogin()
    {
        $user = $this->session->userdata("user");
        if (empty($user['uname']) || empty($user['uid'])) {
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

    protected function getApiToken($data, $privateKey = '')
    {
        if (!is_array($data)) {
            $data = array();
        }
        unset($data["d"]);
        unset($data["c"]);
        unset($data["m"]);
        if (empty($this->_site['auth_code'])) {
            return false;
        }
        if (empty($privateKey)) {
            $privateKey = $this->_site['auth_code'];
        }

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

    protected function getServerAddr()
    {
        $ip = $this->input->server('SERVER_ADDR');
        if (!empty($ip)) {
            return $ip;
        }
        $ip = $this->input->server('LOCAL_ADDR');
        if (!empty($ip)) {
            return $ip;
        }
        if (function_exists('gethostbyname')) {
            $ip = @gethostbyname($this->input->server('SERVER_NAME'));
            if (!empty($ip)) {
                return $ip;
            }
        }
        return '0.0.0.0';
    }

    protected function getApiQuery($arg = array(), $privateKey = '')
    {
        if (!is_array($arg)) {
            $arg = array();
        }
        if (empty($this->_site['site_url'])) {
            return false;
        }
        $arg['site_url']        = urlencode($this->_site['site_url']);
        $arg['version']         = $this->_site['version'];
        $arg['auth_code']       = $this->_site['auth_code'];
        $arg['time']            = time();
        $arg['server_name']     = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
        $arg['server_addr']     = $this->getServerAddr();
        $arg['token']           = $this->getApiToken($arg, $privateKey);

        return $arg;
    }

    protected function getTemplatesDir($type = '')
    {
        $path = ROOTPATH.'templates/';
        $templates = get_dir_file_info($path);
        if (!is_array($templates) || sizeof($templates) < 1) {
            return false;
        }
        $t = array();
        foreach ($templates as $key => $value) {
            if (!is_dir($value['server_path'])) {
                continue;
            }
            if ($type) {
                if ($type == 'mobile' && substr($key, 0, 7) == 'mobile_') {
                    $t[] = $value;
                } else if ($type == 'template' && substr($key, 0, 9) == 'template_') {
                    $t[] = $value;
                }
            } else {
                if (substr($key, 0, 7) == 'mobile_' || substr($key, 0, 9) == 'template_') {
                    $t[] = $value;
                }
            }
        }
        sort($t);
        return $t;
    }

    protected function getTemplatesFile($name)
    {
        $path = ROOTPATH.'templates/'.$name;
        if (!is_readable($path) || !is_dir($path) || strpos($path, '..') !== false) {
            return false;
        }
        $files = get_dir_file_info($path);
        if (!is_array($files) || sizeof($files) < 1) {
            return false;
        }
        $t = array();
        foreach ($files as $key => $value) {
            if (!is_file($value['server_path'])) {
                continue;
            }
            $ext = pathinfo($value['server_path'], PATHINFO_EXTENSION);
            if (strtolower($ext) != 'php') {
                continue;
            }
            $t[] = $value;
        }

        return $t;
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

    protected function pushStack($stack = '')
    {
        if (empty($stack)){
            return false;
        }
        $this->_site['stack'] = $stack;
        return true;
    }

    protected function operate_log($c = '',$m = '',$content='')
    {
        $name = $this->_username;
        $ip   = $this->input->ip_address();
        $where = array(
            'log_admin'      => $name,
            'log_time'       => time(),
            'log_ip'         => $ip,
            'log_controller' => $c,
            'log_model'      => $m,
            'log_content'    => $content
        );
        $result = $this->m_Operate_log->createOperateLog($where);
        return $result;
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
