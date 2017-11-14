<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_operate_log extends MY_Model
{
    private $_table = "operate_log";

    public function createOperateLog($data)
    {
        if (!is_array($data) || sizeof($data) < 1) {
            return false;
        }

        return $this->db->insert($this->_table, $data);
    }

    public function getOperateLogList($where, $limit = 25, $offset = 0, $order = 'log_id desc')
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getList($this->_table, $where, $limit, $offset, $order);
    }

    public function getOperateLogCount($where)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getCount($this->_table, $where);
    }
}