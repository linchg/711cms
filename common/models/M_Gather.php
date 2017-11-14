<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Gather extends MY_Model {

    private $_table = "gather";

    public function createGather($data)
    {
        if (!is_array($data) || sizeof($data) < 1) {
            return false;
        }

        return $this->db->insert($this->_table, $data);
    }

    public function updateGatherById($data, $id)
    {
        if (!is_array($data) || sizeof($data) < 1 || !is_numeric($id)) {
            return false;
        }

        return $this->db->update($this->_table, $data, array("gather_id" => $id));
    }

    public function getGatherById($id)
    {
        if (!is_numeric($id)) {
            return false;
        }

        $where = array(
            "gather_id" => $id,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getGatherByName($name)
    {
        if (empty($name)) {
            return false;
        }

        $where = array(
            "gather_name" => $name,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getGatherList($where, $limit = 25, $offset = 0)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getList($this->_table, $where, $limit, $offset, 'gather_id desc');
    }

    public function getGatherAll($where = array())
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getAll($this->_table, $where,'gather_id desc');
    }

    public function getGatherCount($where)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getCount($this->_table, $where);
    }

    public function deleteGatherById($id) {
        if ($id < 1) {
            return false;
        }
        $this->db->delete($this->_table, array("gather_id" => $id));
    }

}