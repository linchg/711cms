<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Info extends MY_Model {

    private $_table = "info";

    public function createInfo($data)
    {
        if (!is_array($data) || sizeof($data) < 1) {
            return false;
        }

        if (!$this->db->insert($this->_table, $data)) {
            return false;
        }

        return $this->db->insert_id();
    }

    public function updateInfoById($data, $id)
    {
        if (!is_array($data) || sizeof($data) < 1 || !is_numeric($id)) {
            return false;
        }

        return $this->db->update($this->_table, $data, array("info_id" => $id));
    }

    public function getInfoById($id)
    {
        if (!is_numeric($id)) {
            return false;
        }

        $where = array(
            "info_id" => $id,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getInfoOne($where, $order='info_id desc , info_update_time desc')
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getOne($this->_table, $where, $order);
    }

    public function updateInfoStatus($info_id, $status)
    {
        if ($info_id < 1 || $status < 1) {
            return false;
        }

        $data = array(
            'info_status'       => 1,
            'info_publish_time' => 0
        );
        return $this->db->update($this->_table, $data, array("info_id" => $info_id));
    }

    public function updateInfoVisitor($info_id)
    {
        return $this->db->set('info_visitors', 'info_visitors+1', false)->where(array('info_id' => $info_id))->update('info');
    }

    public function getInfoByName($name)
    {
        if (empty($name)) {
            return false;
        }

        $where = array(
            "info_title" => $name,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getInfoList($where, $limit = 25, $offset = 0)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getList($this->_table, $where, $limit, $offset, 'info_id desc');
    }

    public function getInfoAll($where = array())
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getAll($this->_table, $where,'info_id desc');
    }

    public function getInfoCount($where)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getCount($this->_table, $where);
    }

    public function deleteInfoById($id) {
        if ($id < 1) {
            return false;
        }
        $this->db->delete($this->_table, array("info_id" => $id));
    }

}