<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 网站配置管理
 * Class Setting
 */
class Setting extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_Setting");
    }

    /**
     * 管理首页
     */
    public function main()
    {
        $templates  = $this->getTemplatesDir();
        $vip_change = true;
        $this->_data['vip_change'] = $vip_change;
        $this->_data['templates'] = $templates;
        $this->_data['time'] = time();
        $this->_data['token'] = $this->getUploadToken($this->_data['time']);
        $this->loadView('/Setting/index');
    }

    /**
     * 保存配置
     */
    public function save()
    {
        $cache_time         = intval($this->input->post("cache_time"));
        $comment_code       = $this->input->post('comment_code');
        $count_code         = $this->input->post('count_code');
        $count_code2         = $this->input->post('count_code2');
        $is_content_mobile  = intval($this->input->post('is_content_mobile'));
        $pagesize           = intval($this->input->post('pagesize'));
        $seo_description    = $this->input->post('seo_description', true);
        $seo_keywords       = $this->input->post('seo_keywords', true);
        $seo_title          = $this->input->post('seo_title', true);
        $site_logo          = $this->input->post('site_logo', true);
        $template           = $this->input->post('template', true);
        $wap_template       = $this->input->post('wap_template', true);
        $site_name          = $this->input->post('site_name', true);
        $site_safe_code     = $this->input->post('site_safe_code', true);
        $site_url           = $this->input->post('site_url', true);
        $site_beian         = $this->input->post('site_beian', true);
        $site_copyright     = $this->input->post('site_copyright', true);
        $upload_key         = $this->input->post('upload_key', true);
        $upload_path        = $this->input->post('upload_path', true);
        $upload_path_apk    = $this->input->post('upload_path_apk', true);
        $wap_logo           = $this->input->post('wap_logo', true);
        $wap_url            = $this->input->post('wap_url', true);
        $wapseo_description = $this->input->post('wapseo_description', true);
        $wapseo_keywords    = $this->input->post('wapseo_keywords', true);
        $wapseo_title       = $this->input->post('wapseo_title', true);
        $water_logo         = $this->input->post('water_logo', true);
        $water_button       = $this->input->post('water_button', true);
        $is_site_rewrite         = intval($this->input->post("is_site_rewrite"));

        if ( $pagesize > 100 || $pagesize < 10) {
            $this->output->error_json(-1,"列表显示条数(10-100)之间");
        }
        if(empty($site_url)){
            $this->output->error_json(-1,"站点域名不能为空");
        }

        $data = array(
            "cache_time"            => $cache_time,
            "comment_code"          => $comment_code ? base64_encode($comment_code) : '',
            "count_code"            => $count_code ? base64_encode($count_code) : '',
            "count_code2"            => $count_code2 ? base64_encode($count_code2) : '',
            "is_content_mobile"     => $is_content_mobile,
            "pagesize"              => $pagesize,
            "seo_description"       => $seo_description,
            "seo_keywords"          => $seo_keywords,
            "seo_title"             => $seo_title,
            "site_logo"             => $site_logo,
            "template"              => $template,
            "wap_template"          => $wap_template,
            "site_name"             => $site_name,
            "site_safe_code"        => $site_safe_code,
            "site_url"              => $site_url,
            "site_beian"            => $site_beian,
            "site_copyright"        => $site_copyright,
            "upload_key"            => $upload_key,
            "upload_path"           => $upload_path,
            "upload_path_apk"       => $upload_path_apk,
            "wap_logo"              => $wap_logo,
            "wap_url"               => $wap_url,
            "wap_seo_description"   => $wapseo_description,
            "wap_seo_keywords"      => $wapseo_keywords,
            "wap_seo_title"         => $wapseo_title,
            "water_logo"            => $water_logo,
            "water_button"          => $water_button,
        );

        if($is_site_rewrite && $is_site_rewrite != $this->_site['is_site_rewrite']) {
            switch($is_site_rewrite){
                case 1:
                    $data['is_site_rewrite'] = 1;
                    $this->urlRewrite(true);
                    break;
                case -1:
                    $data['is_site_rewrite'] = -1;
                    $this->urlRewrite(false);
                    break;
            }
        }

        foreach ($data as $key => $value) {
            $this->m_Setting->updateForceSettingByKey($key, $value);
        }
        $this->operate_log('Setting','update','修改了网站配置');
        $this->output->ok_json("保存成功");
    }

    /**
     * 开启网站url重定位,产生seo友好的链接
     * @param bool $open
     */
    protected function urlRewrite($open=true)
    {
        if($open){
            $src = DATAPATH.'config/assign.php';
            $to = CMSPATH.'config/assign.php';
            copy($src,$to);
            $src = DATAPATH.'config/routes.seo';
            $to = CMSPATH.'config/routes.php';
            copy($src,$to);
        }else{
            unlink(CMSPATH.'config/assign.php');
            $src = DATAPATH.'config/routes.noseo';
            $to = CMSPATH.'config/routes.php';
            copy($src,$to);
        }
    }

}
