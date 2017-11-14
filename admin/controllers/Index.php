<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('MY_String', NULL, 'string');
        $this->load->library('image');
        $this->load->library('apk_parser');
    }

    /**
     * 后台登陆页面
     */
    public function index()
    {
        if($this->isLogin())
            redirect(build_url('frame'));
        $this->loadView('/Index/index');
    }

    /**
     * 登陆安全水印
     */
    public function getCode()
    {
        $randval = $this->string->rand_string(4, 1);
        $this->session->set_userdata('login_code', md5(strtoupper($randval)));
        $this->image->buildImageVerify($randval, 60, 32);
    }

    /**
     * 管理员登陆
     */
    public function login()
    {
        $uname = $this->input->post('uname', true);
        $upass = $this->input->post('upass', true);
        if (!$uname || !$upass) {
           $this->output->error_json(110, '登陆信息不能为空');
        }

        $code = $this->input->post('code', true);
        if (!$code) {
            $this->output->error_json(120, "验证码不能为空");
        }

        if ($this->_site['site_safe_code']) {
            $safeCode = $this->input->post('safecode', true);
            if (!$safeCode) {
                $this->output->error_json(100, "安全码不能为空");
            }
            if ($safeCode != $this->_site['site_safe_code']) {
                $this->output->error_json(150, "安全码错误");
            }
        }

        if (!preg_match('~^[A-Za-z][A-Za-z]*[a-z0-9_]*$~', $uname)) {
            $this->output->error_json(130, "用户名必须以字母开头，只允许字母、数字、下划线");
        }

        $code = md5(strtoupper($code));
        $myCode = $this->session->userdata('login_code');
        if (!$myCode || $code != $myCode) {
            $this->output->error_json(140, "验证码错误");
        }

        $adm = $this->m_Admin->checkAdminLogin($uname, $upass);
        if (!is_array($adm) || sizeof($adm) < 1) {
            $this->output->error_json(160, "您的账号或密码输入有误");
        } else if ($adm['ustate'] != 1) {
            $this->output->error_json(180, "该账号异常");
        }

        $this->session->set_userdata('uid',     $adm['uid']);
        $this->session->set_userdata('uname',   $adm['uname']);
        $this->session->set_userdata('user',    $adm);
        $this->_uid      = $adm['uid'];
        $this->_username = $adm['uname'];
        $this->_user     = $adm;

        $this->operate_log('Index','login','登入后台');
        $this->output->ok_json("登录成功");
    }

    /**
     * 登出
     */
    public function logout()
    {
        $this->session->sess_destroy();
        $this->operate_log('Index','logout','登出后台');
        redirect(build_url('index'));
    }

    /**
     * 上传logo ajax处理
     */
    public function uploadLogo()
    {
        $token = $this->input->post('token');
        $time  = $this->input->post('time');
        if (!$token || !$time) {
            $this->output->upload_error('Bad Request.');
        }
        $myToken = $this->getUploadToken($time);
        if ($myToken != $token) {
            $this->output->upload_error('Bad Token');
        }

        $this->config->load('uploads');
        $config = $this->config->item('upload_image');
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('Filedata')) {
            $this->output->upload_error($this->upload->display_errors());
        }
        $data = $this->upload->data();
        $this->output->upload_ok($data['file_name']);
    }

    /**
     * 上传图片ajax处理
     */
    public function uploadImage()
    {
        $token = $this->input->post('token');
        $time  = $this->input->post('time');
        if (!$token || !$time) {
            $this->output->upload_error('Bad Request.');
        }
        $myToken = $this->getUploadToken($time);
        if ($myToken != $token) {
            $this->output->upload_error('Bad Token');
        }

        $this->config->load('uploads');
        $config = $this->config->item('upload_image');

        $this->load->library('upload', $config);


        if (!$this->upload->do_upload('Filedata')) {
            $this->output->upload_error($this->upload->display_errors());
        }

        $data = $this->upload->data();
        $image = '/uploads/images/'.$data['file_name'];
        $this->add_watermark($image);
        $this->output->upload_ok(array(
            $data['file_name'],
            $data['image_width'],
            $data['image_height'],
            $data['file_size']
        ));

    }

    /**
     * 上传图片加水印
     * @param $image
     * @return bool
     */
    protected function add_watermark($image){
        $this->load->library('image_lib');
        $site = $this->_site;
        $water_button = isset($site['water_button']) ? $site['water_button'] : 2;
        $water_logo = isset($site['water_logo']) ? $site['water_logo'] : '';
        if($water_button != 1 || !$water_logo){
            return true;
        }
        $config2 = array();
        $config2['source_image'] = '..'.$image;
        $config2['wm_type'] = 'overlay';
        $config2['dynamic_output'] = false;
        $config2['wm_overlay_path'] = '..'.$water_logo;
        $config2['wm_opacity'] = '50';
        $config2['wm_vrt_alignment'] = 'bottom';
        $config2['wm_hor_alignment'] = 'right';
        $config2['wm_hor_offset'] = '10';
        $config2['wm_vrt_offset'] = '10';

        $this->image_lib->initialize($config2);

        $this->image_lib->watermark();
    }

    /**
     * 上传apk ajax处理
     */
    public function uploadApk()
    {
        $token = $this->input->post('token');
        $time  = $this->input->post('time');
        if (!$token || !$time) {
            $this->output->upload_error('Bad Request.');
        }
        $myToken = $this->getUploadToken($time);
        if ($myToken != $token) {
            $this->output->upload_error('Bad Token');
        }

        $this->config->load('uploads');
        $config = $this->config->item('upload_apk');
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('Filedata')) {
            $this->output->upload_error($this->upload->display_errors());
        }

        $data = $this->upload->data();
        $file = $data['full_path'];
        if (!$this->apk_parser->open($file)) {
            $this->output->upload_error("无效的apk文件");
        }
        $package = $this->apk_parser->getPackage();
        $version = $this->apk_parser->getVersionName();
        $system  = $this->apk_parser->getMinSdkVersionName();
        $code    = $this->apk_parser->getVersionCode();
        $sdk     = $this->apk_parser->getMinSdkVersion();
        $permission = $this->apk_parser->getPermission();

        $size = $data['file_size'];
        if ($size > 1024) {
            $size = round($size / 1024, 2).'M';
        }else{
            $size = round($size, 2).'K';
        }

        $this->output->upload_ok(array(
            $data['file_name'],
            $version,
            $size,
            $package,
            $system,
            $code,
            $sdk,
            $permission
        ));
    }

    /**
     * 上传网站手助
     */
    public function uploadSiteApk()
    {
        $token = $this->input->post('token');
        $time  = $this->input->post('time');
        if (!$token || !$time) {
            $this->output->upload_error('Bad Request.');
        }
        $myToken = $this->getUploadToken($time);
        if ($myToken != $token) {
            $this->output->upload_error('Bad Token');
        }

        $this->config->load('uploads');
        $config = $this->config->item('upload_apk');
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('Filedata')) {
            $this->output->upload_error($this->upload->display_errors());
        }

        $data = $this->upload->data();
        $file = $data['full_path'];
        if (!$this->apk_parser->open($file)) {
            $this->output->upload_error("无效的apk文件");
        }
        $size = $data['file_size'];

        $this->m_Setting->updateForceSettingByKey('site_apk', '/uploads/apk/'.$data['file_name']);

        $this->output->upload_ok(array(
            '/uploads/apk/'.$data['file_name'],
            $size,
        ));
    }

    /**
     * ckeditor 上传处理
     */
    public function upload_info()
    {
        $token = $this->input->get('token');
        $time = $this->input->get('time');
        if (!$token || !$time) {
            $this->output->upload_error('Bad Request.');
        }
        $myToken = $this->getUploadToken($time);
        if ($myToken != $token) {
            $this->output->upload_error('Bad Token');
        }
        //加载上传文件的配置，和函数！
        $this->config->load('uploads');
        $config = $this->config->item('upload_image');
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('upload')) {
            $file = $this->upload->data();
            $view_name = '/uploads/images/' . $file['file_name'];

            $this->add_watermark($view_name);
            $callback = $_REQUEST["CKEditorFuncNum"];
            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($callback,'" . $view_name . "','');</script>";
        } else {
            echo "<font color=\"red\"size=\"2\">*上传失败，稍后再试。</font>";
        }
    }
}
