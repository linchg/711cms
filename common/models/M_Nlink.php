<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Nlink extends MY_Model {

    private $_table = "nlink";

    public function createNlink($data)
    {
        if (!is_array($data) || sizeof($data) < 1) {
            return false;
        }

        return $this->db->insert($this->_table, $data);
    }

    public function updateNlinkById($data, $id)
    {
        if (!is_array($data) || sizeof($data) < 1 || !is_numeric($id)) {
            return false;
        }

        return $this->db->update($this->_table, $data, array("nlink_id" => $id));
    }

    public function getNlinkById($id)
    {
        if (!is_numeric($id)) {
            return false;
        }

        $where = array(
            "nlink_id" => $id,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getNlinkByName($name)
    {
        if (empty($name)) {
            return false;
        }

        $where = array(
            "nlink_txt" => $name,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getNlinkList($where, $limit = 25, $offset = 0)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getList($this->_table, $where, $limit, $offset, 'nlink_id desc');
    }

    public function getNlinkAll($where = array())
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getAll($this->_table, $where,'nlink_id desc');
    }

    public function getNlinkCount($where)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getCount($this->_table, $where);
    }

    public function deleteNlinkById($id) {
        if ($id < 1) {
            return false;
        }
        $this->db->delete($this->_table, array("nlink_id" => $id));
    }

}