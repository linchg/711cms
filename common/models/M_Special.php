<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Special extends MY_Model {

    private $_table = "special";

    public function createSpecial($data)
    {
        if (!is_array($data) || sizeof($data) < 1) {
            return false;
        }

        return $this->db->insert($this->_table, $data);
    }

    public function updateSpecialById($data, $id)
    {
        if (!is_array($data) || sizeof($data) < 1 || !is_numeric($id)) {
            return false;
        }

        return $this->db->update($this->_table, $data, array("area_id" => $id));
    }

    public function getSpecialInfoById($id)
    {
        if (!is_numeric($id)) {
            return false;
        }

        $where = array(
            "area_id" => $id,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getSpecialInfoByName($name)
    {
        if (empty($name)) {
            return false;
        }

        $where = array(
            "area_title" => $name,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getSpecialList($where, $limit = 25, $offset = 0)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getList($this->_table, $where, $limit, $offset, 'area_id desc');
    }

    public function getSpecialAll($where = array())
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getAll($this->_table, $where,'area_id desc');
    }

    public function getSpecialCount($where)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getCount($this->_table, $where);
    }

    public function deleteSpecialById($id) {
        if ($id < 1) {
            return false;
        }
        $this->db->delete($this->_table, array("area_id" => $id));
    }

}