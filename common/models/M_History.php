<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_History extends MY_Model {

    private $_table = "history";

    public function createHistory($data)
    {
        if (!is_array($data) || sizeof($data) < 1) {
            return false;
        }

        return $this->db->insert($this->_table, $data);
    }

    public function updateHistoryById($data, $id)
    {
        if (!is_array($data) || sizeof($data) < 1 || !is_numeric($id)) {
            return false;
        }

        return $this->db->update($this->_table, $data, array("history_id" => $id));
    }

    public function getHistoryInfoById($id)
    {
        if (!is_numeric($id)) {
            return false;
        }

        $where = array(
            "history_id" => $id,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getHistoryInfo($where)
    {
        if (!is_array($where) || sizeof($where) < 1) {
            return false;
        }
        return $this->getOne($this->_table, $where);
    }

    public function getHistoryList($where, $limit = 25, $offset = 0)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getList($this->_table, $where, $limit, $offset, 'history_id desc');
    }

    public function getHistoryAppAll($app_id, $where = array())
    {
        if ($app_id < 1) {
            return false;
        }
        if (!is_array($where)) {
            return false;
        }
        $where['app_id'] = $app_id;

        return $this->getAll($this->_table, $where,'history_id desc');
    }

    public function getHistoryCount($where)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getCount($this->_table, $where);
    }

    public function deleteHistoryByApp($id) {
        if ($id < 1) {
            return false;
        }
        $this->db->delete($this->_table, array("app_id" => $id));
    }

    public function deleteHistoryById($id) {
        if ($id < 1) {
            return false;
        }
        $this->db->delete($this->_table, array("history_id" => $id));
    }

    public function getHistoryNew($app_id, $order_by = "history_id desc",$field = "*")
    {
        if ($app_id < 1) {
            return false;
        }
        $where = array(
            'app_id' => $app_id
        );

        return $this->getOne($this->_table, $where, $order_by,$field);
    }
}