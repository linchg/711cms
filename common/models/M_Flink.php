<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Flink extends MY_Model {

    private $_table = "flink";

    public function createFlink($data)
    {
        if (!is_array($data) || sizeof($data) < 1) {
            return false;
        }

        return $this->db->insert($this->_table, $data);
    }

    public function updateFlinkById($data, $id)
    {
        if (!is_array($data) || sizeof($data) < 1 || !is_numeric($id)) {
            return false;
        }

        return $this->db->update($this->_table, $data, array("flink_id" => $id));
    }

    public function getFlinkById($id)
    {
        if (!is_numeric($id)) {
            return false;
        }

        $where = array(
            "flink_id" => $id,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getFlinkByName($name)
    {
        if (empty($name)) {
            return false;
        }

        $where = array(
            "flink_name" => $name,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getFlinkList($where, $limit = 25, $offset = 0)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getList($this->_table, $where, $limit, $offset, 'flink_order desc, flink_id desc');
    }

    public function getFlinkAll($where = array())
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getAll($this->_table, $where,'flink_id desc');
    }

    public function getFlinkCount($where)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getCount($this->_table, $where);
    }

    public function deleteFlinkById($id) {
        if ($id < 1) {
            return false;
        }
        $this->db->delete($this->_table, array("flink_id" => $id));
    }

}