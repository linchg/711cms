<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Install
 * 网站安装类
 */
class Install extends CI_Controller
{
    private $_data = array();

    public function __construct()
    {
        parent::__construct();
        clearstatcache();
        if (is_install()) {
            show_error('您已经安装过此程序,请删除'.lock_file_name().'文件之后重新安装.');
        }
    }

    public function index()
    {
        $this->load->view('install/step1.php', $this->_data);
    }

    public function step2()
    {
        $PHP_GD = '';
        if (extension_loaded('gd')) {
            if (function_exists('imagepng')) $PHP_GD .= 'png';
            if (function_exists('imagejpeg')) $PHP_GD .= ' jpg';
            if (function_exists('imagegif')) $PHP_GD .= ' gif';
        }
        $this->_data['PHP_GD']= $PHP_GD;

        $PHP_MYSQL = 0;
        if (extension_loaded('mysql')) {
            if ( function_exists('mysql_connect')) $PHP_MYSQL = 1;
        }
        $this->_data['PHP_MYSQL']= $PHP_MYSQL;

        $PHP_JSON = 0;
        if (extension_loaded('json')) {
            if (function_exists('json_decode') && function_exists('json_encode')) $PHP_JSON = 1;
        }
        $this->_data['PHP_JSON']= $PHP_JSON;

        $PHP_CURL = 0;
        if (extension_loaded('curl')) {
            if (function_exists('curl_init') && function_exists('curl_exec')) $PHP_CURL = 1;
        }
        $this->_data['PHP_CURL']= $PHP_CURL;

        $PHP_ZIP = 0;
        if (extension_loaded('zip')) {
            $PHP_ZIP = 1;
        }
        $this->_data['PHP_ZIP']= $PHP_ZIP;

        $CHMOD = 0;
        if (function_exists('chmod')) {
            $CHMOD = 1;
        }
        $this->_data['CHMOD']= $CHMOD;

        $SCANDIR = 0;
        if (function_exists('scandir')) {
            $SCANDIR = 1;
        }
        $this->_data['SCANDIR']= $SCANDIR;

        $PHP_DNS = preg_match("/^[0-9.]{7,15}$/", @gethostbyname('www.711cms.com')) ? 1 : 0;
        $this->_data['PHP_DNS']= $PHP_DNS;

        $is_right = (version_compare(PHP_VERSION, '5.2.4', '>=')
            && $PHP_MYSQL && $PHP_JSON && $PHP_ZIP && $PHP_GD && $CHMOD && $SCANDIR) ? 1 : 0;
        $this->_data['is_right']= $is_right;

        $this->load->view('install/step2.php', $this->_data);
    }

    public function step3()
    {
        $is_right = 0;
        $all = array(
            'data'      => array('sessions', 'system_backup', 'template_cached', 'template_compiled', 'update_cached'),
            'uploads'   => array('apk', 'assistant', 'images'),
            'cms'    => array('config'),
            'admin'    => array('config'),
        );
        $dir_errors = array();
        $sub_errors = array();
        foreach ($all as $dir => $sub) {
            if (!file_exists(FCPATH.$dir)) {
                $dir_errors[$dir] = '目录不存在';
            } else if (!is_writable(FCPATH.$dir)) {
                $dir_errors[$dir] = '目录不可写';
            }
            foreach ($sub as $d) {
                if (!file_exists(FCPATH."/$dir/$d")) {
                    $sub_errors[$dir][$d] = '目录不存在';
                } else if (!is_writable(FCPATH."/$dir/$d")) {
                    $sub_errors[$dir][$d] = '目录不可写';
                }
            }
        }

        $file = array(
            'database.php',
            'site.php',
        );
        $file_errors = array();
        foreach ($file as $key => $f) {
            if (!file_exists(APPPATH."config/$f")) {
                $file_errors[$key] = '文件不存在';
            } else if (!is_writable(APPPATH."config/$f")) {
                $file_errors[$key] = '文件不可写';
            }
        }
        if (sizeof($dir_errors) == 0 && sizeof($sub_errors == 0) && sizeof($file_errors) == 0) {
            $is_right = 1;
        }
        $this->_data['is_right']    = $is_right;
        $this->_data['dir_errors']  = $dir_errors;
        $this->_data['sub_errors']  = $sub_errors;
        $this->_data['file_errors'] = $file_errors;
        $this->_data['all']         = $all;
        $this->_data['file']        = $file;

        $this->load->view('install/step3.php', $this->_data);
    }

    public function step4()
    {
        if ($this->input->is_post()) {
            $params = array(
                'dsn'	        => '',
                'hostname'      => $this->input->post('hostname', true),
                'username'      => $this->input->post('username', true),
                'password'      => $this->input->post('password', true),
                'database'      => $this->input->post('database', true),
                'dbdriver'      => $this->input->post('dbdriver', true),
                'dbprefix'      => $this->input->post('dbprefix'),
                'port'          => $this->input->post('port'),
                'pconnect'      => FALSE,
                'db_debug'      => TRUE,
                'cache_on'      => FALSE,
                'cachedir'      => '',
                'char_set'      => 'utf8',
                'dbcollat'      => 'utf8_general_ci',
                'swap_pre'      => '',
                'encrypt'       => FALSE,
                'compress'      => FALSE,
                'stricton'      => FALSE,
                'failover'      => array(),
                'save_queries'  => TRUE
            );
            if (empty($params['hostname']) || empty($params['username']) || empty($params['database'])) {
                die('<div id="container">您的数据库信息不完整</div>');
            }

            if ($params['dbdriver'] == 'mysqli' && !extension_loaded('mysqli') ) {
                if (!function_exists('mysqli_connect')){
                    die('<div id="container">您需要安装mysqli的扩展才能使用！</div>');
                }
                die('<div id="container">您需要安装mysqli的扩展才能使用！</div>');
            }

            error_reporting(0);
            $_error =& load_class('Exceptions', 'core');

            $db = $this->load->database($params, true);
            if (!is_object($db)) {
                die('<div id="container">未能正确连接到数据库</div>');
            }

            $uname = $this->input->post('admin_name', true);
            $upass = $this->input->post('admin_pass', true);
            if (empty($uname)) {
                die('<div id="container">账号名不能为空</div>');
            }
            if (empty($upass)) {
                die('<div id="container">密码不能为空</div>');
            }
            if (!preg_match('~^[A-Za-z][A-Za-z]*[a-z0-9_]*$~', $uname)) {
                die('<div id="container">账号名必须以字母开头，只允许字母、数字、下划线</div>');
            }
            if (strlen($upass) < 5) {
                die('<div id="container">密码过于简单</div>');
            }
            if (strlen($upass) > 20) {
                die('<div id="container">密码超出限定长度</div>');
            }

            $this->_data['params'] = $params;

            $sql_files = array('sql_table', 'sql_data');
            foreach ($sql_files as $file) {
                $error = 0;
                $error_sql = array();
                $sql = $this->load->view("install/{$file}.php", $this->_data, true);
                $sqls = explode('$$', $sql);
                foreach ($sqls as $one) {
                    $one = trim($one);
                    if (!$one) {
                        continue;
                    }
                    $result = $db->simple_query($one);
                    if (!$result) {
                        $error++;
                        $error_sql[] = $one;
                        $_error->log_exception('error', 'Install: '.$one, __FILE__, __LINE__);
                    }
                }
                if ($error > 0) {
                    die('<div id="container">在执行数据库文件'.$file.'过程发生了'.$error.'个错误</div>');
                }
            }

            $settings = array(
                array('s_key' => 'auth_code',           's_value' => md5(time())),
                array('s_key' => 'cache_time',          's_value' => 0),
                array('s_key' => 'comment_code',        's_value' => ''),
                array('s_key' => 'count_code',          's_value' => ''),
                array('s_key' => 'data_center_url',     's_value' => 'http://www.711cms.com/api'),
                array('s_key' => 'pagesize',            's_value' => '20'),
                array('s_key' => 'version',             's_value' => VERSION_711CMS),
                array('s_key' => 'update_time',         's_value' => time()),
                array('s_key' => 'static_url',          's_value' => 'static'),
                array('s_key' => 'water_button',          's_value' => 2),
                array('s_key' => 'is_site_rewrite',     's_value' => -1),
                array('s_key' => 'is_content_mobile',   's_value' => 1),
                array('s_key' => 'is_images_local',     's_value' => false),
                array('s_key' => 'is_images_rewrite',   's_value' => false),
                array('s_key' => 'is_content_nlink',    's_value' => false),
                array('s_key' => 'seo_description',     's_value' => '711cms'),
                array('s_key' => 'seo_keywords',        's_value' => '711cms'),
                array('s_key' => 'seo_title',           's_value' => '711cms'),
                array('s_key' => 'site_logo',           's_value' => '/uploads/images/9604a4f67391f4dc1010dce413c373ac.png'),
                array('s_key' => 'site_name',           's_value' => '711cms网站名称'),
                array('s_key' => 'site_safe_code',      's_value' => $this->input->post('safe_code')),
                array('s_key' => 'site_url',            's_value' => 'http://'.$this->input->server('HTTP_HOST')),
                array('s_key' => 'site_beian',          's_value' => ''),
                array('s_key' => 'site_copyright',      's_value' => ''),
                array('s_key' => 'site_path',           's_value' => '/'),
                array('s_key' => 'template',            's_value' => 'template_001'),
                array('s_key' => 'upload_key',          's_value' => md5(uniqid(true))),
                array('s_key' => 'upload_path',         's_value' => '/uploads/images/'),
                array('s_key' => 'upload_path_apk',     's_value' => '/uploads/apk/'),
                array('s_key' => 'wap_logo',            's_value' => '/uploads/images/9604a4f67391f4dc1010dce413c373ac.png'),
                array('s_key' => 'wap_url',             's_value' => 'http://'.$this->input->server('HTTP_HOST')),
                array('s_key' => 'wap_seo_description', 's_value' => '711cms'),
                array('s_key' => 'wap_seo_keywords',    's_value' => '711cms'),
                array('s_key' => 'wap_seo_title',       's_value' => '711cms'),
                array('s_key' => 'wap_template',        's_value' => 'template_1'),
            );
            $result = $db->insert_batch('setting', $settings);
            if (!$result) {
                die('<div id="container">写入网站配置失败</div>');
            }

            $admin = array(
                'uname'     => $uname,
                'upass'     => admin_password($upass),
                'ustate'    => 1,
                'reg_date'  => time(),
            );
            $result = $db->insert('admin', $admin);
            if (!$result) {
                die('<div id="container">创建管理员账号失败</div>');
            }

            $config_database = APPPATH.'config/database.php';
            $database_file   = $this->load->view("install/config_database.php", array('default' => $params), true);
            if (!file_exists($config_database)) {
                die('<div id="container">数据库配置文件不存在</div>');
            }
            if (!file_put_contents($config_database, '<?php '.$database_file)) {
                die('<div id="container">写入数据库配置文件失败</div>');
            }

            $admin_database = ADMINPATH.'config/database.php';
            if (!file_put_contents($admin_database, '<?php '.$database_file)) {
                die('<div id="container">写入数据库配置文件失败</div>');
            }

            $config_site    = APPPATH.'config/site.php';
            $site_file      = $this->load->view("install/config_site.php", array('settings' => $settings), true);
            if (!file_exists($config_site)) {
                die('<div id="container">站点配置文件不存在</div>');
            }
            if (!file_put_contents($config_site, '<?php '.$site_file)) {
                die('<div id="container">写入站点配置文件失败</div>');
            }

            die('ok');
        }

        $this->load->view('install/step4.php', $this->_data);
    }

    /**
     * 检查mysql,数据库不存在就创建
     */
    protected function checkMysql()
    {
        $hostname = $this->input->post('hostname', true);
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $database = $this->input->post('database', true);
        $port = intval($this->input->post('port'));
        if($port)
            $hostname .= ":$port";


        if(!preg_match("/^[a-zA-Z0-9_]+$/", $database)){
            die('数据库名字只能英文或者数字: ' . $database);
        }

        $link = mysql_connect($hostname, $username, $password);
        if (!$link) {
            die('不能连接数据库: ' . mysql_error());
        }

        $sql = "CREATE DATABASE IF NOT EXISTS $database";
        if (mysql_query($sql, $link)) {
            die('ok');
        } else {
            die('创建数据库出错: '.mysql_error());
        }
        mysql_close($link);
    }

    /**
     * 检查mysqli,数据库不存在就创建
     */
    protected function checkMysqli()
    {
        $hostname = $this->input->post('hostname', true);
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $database = $this->input->post('database', true);
        $port = intval($this->input->post('port'));

        if(!preg_match("/^[a-zA-Z0-9_]+$/", $database)){
            die('数据库名字只能英文或者数字: ' . $database);
        }

        $mysqli = new mysqli($hostname, $username, $password, "", $port);

        if ($mysqli->connect_errno) {
            die('不能连接数据库: ' . $mysqli->connect_error);
        }

        $sql = "CREATE DATABASE IF NOT EXISTS $database";
        if ($mysqli->query($sql) !== TRUE) {
            die('创建数据库出错: '.$mysqli->error);
        }
        $mysqli->close();
        die('ok');
    }


    /**
     * 检查数据库
     */
    public function checkDatabase()
    {
        if ($this->input->is_post()) {

            $dbdriver = $this->input->post('dbdriver', true);
            switch ($dbdriver){
                case 'mysqli':
                    if(!extension_loaded('mysqli'))
                        die('您需要安装mysqli的扩展才能使用！');
                    $check_fn = 'checkMysqli';
                    break;
                case 'mysql':
                    if(!extension_loaded('mysql'))
                        die('您需要安装mysql的扩展才能使用！');
                    $check_fn = 'checkMysql';
                    break;
                default:
                    die('请选择正确的数据库类型');
            }
            try {
                $this->$check_fn();
            }catch(Exception $e){
                die('false');
            }
        }
    }

    public function success()
    {
        $this->_data['is_right']    = 1;
        $this->_data['admin_file']   = 'admin.php';

        if (!lock_install()) {
            die('<div id="container">安装已完成,但加锁定失败，请重命名install.php以防止被恶意安装.</div>');
        }

        $this->load->view('install/step5.php', $this->_data);
    }

}