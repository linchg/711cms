<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Frame
 * 后台管理主界面
 */
class Frame extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('file');
    }

    /**
     * 后台主界面
     */
    public function main()
    {
        $this->_data['time'] = time();
        $this->_data['token'] = $this->getUploadToken($this->_data['time']);
        $this->_data['site_apk'] = isset($this->_site['site_apk']) ? $this->_site['site_apk'] : '';
        $this->loadView("/Frame/index");
    }
}
