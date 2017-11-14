<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 模板管理
 * Class Template
 */
class Template extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('file');
    }

    /**
     * 模板管理首页
     */
    public function main()
    {
        $templates = $this->getTemplatesDir();
        $this->_data['templates'] = $templates;
        $this->loadView('/Template/index');
    }

    /**
     * 模版管理具体页面
     */
    public function content()
    {
        $template = $this->input->get('template', true);
        $files = $this->getTemplatesFile($template);
        $this->_data['files'] = $files;
        $this->loadView('/Template/content');
    }

}
