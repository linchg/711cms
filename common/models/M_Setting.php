<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Setting extends MY_Model {

    private $_table = "setting";

    public function createSetting($data)
    {
        if (!is_array($data) || sizeof($data) < 1) {
            return false;
        }

        return $this->db->insert($this->_table, $data);
    }

    public function updateSettingById($data, $uid)
    {
        if (!is_array($data) || sizeof($data) < 1 || !is_numeric($uid)) {
            return false;
        }

        return $this->db->update($this->_table, $data, array("s_id" => $uid));
    }

    public function updateSettingByKey($key, $value)
    {
        $data = array(
            "s_value" => $value
        );

        return $this->db->update($this->_table, $data, array("s_key" => $key));
    }

    public function updateForceSettingByKey($key, $value)
    {
        $data = array(
            "s_value" => $value
        );
        $info = $this->getSettingInfoByKey($key);
        if (!is_array($info) || sizeof($info) <1) {
            return $this->createSetting(array("s_key" => $key, "s_value" => $value));
        }

        return $this->db->update($this->_table, $data, array("s_key" => $key));
    }

    public function getSettingInfoById($uid)
    {
        if (!is_numeric($uid)) {
            return false;
        }

        $where = array(
            "s_id"      => $uid,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getSettingInfoByKey($name)
    {
        if (empty($name)) {
            return false;
        }

        $where = array(
            "s_key" => $name,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getSettingCount($where)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getCount($this->_table, $where);
    }

    public function getSettingAll($where = array())
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getAll($this->_table, $where,'s_id desc');
    }

    public function version()
    {
        return VERSION_711CMS;
    }

    public function getTemplateConfig($template_name = '')
    {
        if (empty($template_name)) {
            $template = $this->getSettingByKey('template');
            $template_name = $template['s_value'];
        }

        $config = array();
        $template_path = TEMPLATEPATH.$template_name.'/config.php';
        if (file_exists($template_path)) {
            include_once $template_path;
            $config = registerTemplate();//
        }

        return $config;
    }

    public function getSettingByKey($key)
    {
        if (empty($key)) {
            return false;
        }
        $where = array('s_key' => $key);

        return $this->getOne($this->_table, $where);
    }
}