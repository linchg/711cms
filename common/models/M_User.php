<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends MY_Model {

    private $_table = "user";

    public function createUser($data)
    {
        if (!is_array($data) || sizeof($data) < 1) {
            return false;
        }

        if (empty($data['u_password'])) {
            return false;
        }
        $data['u_password'] = $this->decodePassword($data['u_password']);

        return $this->db->insert($this->_table, $data);
    }

    public function updateUserById($data, $uid)
    {
        if (!is_array($data) || sizeof($data) < 1 || !is_numeric($uid)) {
            return false;
        }

        return $this->db->update($this->_table, $data, array("u_id" => $uid));
    }

    public function checkUserLogin($username, $password)
    {
        if (empty($username) || empty($password)) {
            return false;
        }

        $where = array(
            "u_username" => $username,
            "u_password" => $this->decodePassword($password),
            "u_enabled"  => 1,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getUserInfoById($uid)
    {
        if (!is_numeric($uid)) {
            return false;
        }

        $where = array(
            "u_id"      => $uid,
            //"u_enabled" => 1,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getUserInfoByName($name)
    {
        $where = array(
            "u_username" => $name,
            "u_enabled"  => 1,
        );

        return $this->getOne($this->_table, $where);
    }

    public function decodePassword($str)
    {
        $key = $this->config->item('encryption_key');
        $key = sha1($key);
        return md5($str.$key.$str);
    }

    public function getUserList($where, $limit = 25, $offset = 0)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getList($this->_table, $where, $limit, $offset, 'u_id desc');
    }

    public function getUserCount($where)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getCount($this->_table, $where);
    }

}