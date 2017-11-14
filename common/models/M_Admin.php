<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends MY_Model {

    private $_table = "admin";

    public function createAdmin($data)
    {
        if (!is_array($data) || sizeof($data) < 1) {
            return false;
        }

        if (empty($data['upass'])) {
            return false;
        }
        $data['upass'] = $this->decodePassword($data['upass']);

        return $this->db->insert($this->_table, $data);
    }

    public function updateAdminById($data, $uid)
    {
        if (!is_array($data) || sizeof($data) < 1 || !is_numeric($uid)) {
            return false;
        }
        if (!empty($data['upass'])) {
            $data['upass'] = $this->decodePassword($data['upass']);
        }

        return $this->db->update($this->_table, $data, array("uid" => $uid));
    }

    public function checkAdminLogin($username, $password)
    {
        if (empty($username) || empty($password)) {
            return false;
        }

        $where = array(
            "uname" => $username,
            "upass" => $this->decodePassword($password),
        );

        return $this->getOne($this->_table, $where);
    }

    public function getAdminInfoById($uid)
    {
        if (!is_numeric($uid)) {
            return false;
        }

        $where = array(
            "uid"      => $uid,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getAdminInfoByName($name)
    {
        if (empty($name)) {
            return false;
        }

        $where = array(
            "uname" => $name,
        );

        return $this->getOne($this->_table, $where);
    }

    public function decodePassword($str)
    {
        $key = $this->config->item('encryption_key');
        $key = sha1($key);
        return md5($str.$key.$str);
    }

    public function getAdminList($where, $limit = 25, $offset = 0)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getList($this->_table, $where, $limit, $offset, 'uid desc');
    }

    public function getAdminCount($where)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getCount($this->_table, $where);
    }

}