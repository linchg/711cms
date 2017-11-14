<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 备份管理
 * Class Backup
 */
class Backup extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
    }

    /**
     * 备份管理主页
     */
    public function main()
    {
        $list = array();

        $path = root_path('/data/backup_database/');
        $databases = get_dir_file_info($path);
        if (is_array($databases) && sizeof($databases) > 0) {
            $list = $databases;
        }
        $this->_data['list']   = $list;

        $this->loadView('/Backup/index');
    }

    /**
     * 下载列表页面
     */
    public function download()
    {
        $name = $this->input->get('name', true);
        if (!$name) {
            show_error("请输入备份名称");
        }
        $name = urldecode($name);
        if (stripos($name, '.') !== false || stripos($name, '/') !== false) {
            show_error("备份名不合法");
        }

        $list = array();
        $path = root_path('/data/backup_database/'.$name);
        if (file_exists($path)) {
            $databases = get_dir_file_info($path);
            if (is_array($databases) && sizeof($databases) > 0) {
                $list = $databases;
            }
        }

        $this->_data['list'] = $list;
        $this->_data['name'] = $name;
        $this->loadView('/Backup/download');
    }

    /**
     * 下载备份文件
     */
    public function file()
    {
        $name = $this->input->get('name', true);
        if (!$name) {
            show_error("请输入备份名称");
        }

        $file = $this->input->get('file', true);
        if (!$file) {
            show_error("请输入备份的文件名称");
        }

        $name = urldecode($name);
        $file = urldecode($file);
        if (stripos($name, '.') !== false || stripos($name, '/') !== false || stripos($file, '.') !== false || stripos($file, '/') !== false) {
            show_error("备份名不合法");
        }

        $path = root_path("/data/backup_database/{$name}/{$file}.zip");
        if (!file_exists($path)) {
            show_404();
        }

        force_download($file, @file_get_contents($path));
    }

    /**
     * 删除备份文件
     */
    public function delete()
    {
        $name = $this->input->post('name', true);
        if (!$name) {
            $this->output->error_json(100, "请输入备份名称");
        }
        $name = urldecode($name);
        if (stripos($name, '.') !== false || stripos($name, '/') !== false) {
            $this->output->error_json(100, "备份名不合法");
        }
        $path = root_path('/data/backup_database/'.$name);
        if (!file_exists($path)) {
            $this->output->error_json(100, "备份不存在");
        }
        if (!delete_files($path, true)) {
            $this->output->error_json(100, "删除备份文件失败");
        }
        if (!@rmdir($path)) {
            $this->output->error_json(100, "删除备份目录失败");
        }
        $this->operate_log('Backup','delete','删除了备份：'.$name);

        $this->output->ok_json("备份删除成功");
    }

    /**
     * 备份的主页
     */
    public function doBackup()
    {
        $this->session->unset_userdata('backup_tables');
        $this->session->unset_userdata('backup_path');

        $this->_data['db_username'] = $this->db->username;
        $this->_data['db_database'] = $this->db->database;

        $this->loadView('/Backup/doBackup');
    }

    /**
     * 备份完成请求
     */
    public function doJob()
    {
        $db_dbprefix = $this->db->dbprefix;
        $backup_tables  = $this->session->userdata('backup_tables');
        $backup_path    = $this->session->userdata('backup_path');

        if (is_array($backup_tables) && sizeof($backup_tables) > 0 && $backup_path) {
            $table = array_shift($backup_tables);
            $table = $db_dbprefix.$table;
            $this->session->set_userdata('backup_tables', $backup_tables);

            $filename = $table.'.zip';
            $backup = $this->dbutil->backup(array(
                'tables'     => array($table),
                'ignore'     => array(),
                'format'     => 'zip',
                'filename'   => $filename,
                'add_drop'   => true,
                'add_insert' => true,
                'newline'    => "\n"
            ));
            if (!$backup) {
                $this->output->ok_json("备份数据表失败：".$table);
            }
            if (!write_file($backup_path.$filename, $backup)) {
                $this->output->ok_json("写备份文件失败：".$filename);
            }
            $this->output->ok_json("成功备份数据表：".$table);
        }

        $backup_tables = $this->session->userdata('backup_tables');
        $backup_path   = $this->session->userdata('backup_path');
        if (is_array($backup_tables) && sizeof($backup_tables) == 0 && $backup_path) {
            $this->session->unset_userdata('backup_tables');
            $this->session->unset_userdata('backup_path');
            $this->output->ok_json("done");
        }

        $backup_tables = array(
            'admin', 'advert', 'app', 'app_category', 'app_comment', 'flink', 'gather', 'history',
            'import', 'info', 'info_category', 'info_comment', 'navicat', 'necessary', 'nlink',
            'recommend', 'resource', 'rules', 'search', 'setting', 'special'
        );
        $backup_path = root_path('/data/backup_database/'.uniqid().'/');
        if (!file_exists($backup_path)) {
            if (!@mkdir($backup_path, 0777, true)) { //0700
                $this->output->ok_json("建立备份目录失败：".$backup_path);
            }
        }
        $this->session->set_userdata('backup_tables', $backup_tables);
        $this->session->set_userdata('backup_path', $backup_path);

        $this->operate_log('Backup','backups','成功备份了数据表。');
        $this->output->ok_json("成功获取备份数据表.");
    }
}
