<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Necessary extends MY_Model {

    private $_table = "necessary";

    public function createNecessary($data)
    {
        if (!is_array($data) || sizeof($data) < 1) {
            return false;
        }

        return $this->db->insert($this->_table, $data);
    }

    public function updateNecessaryById($data, $id)
    {
        if (!is_array($data) || sizeof($data) < 1 || !is_numeric($id)) {
            return false;
        }

        return $this->db->update($this->_table, $data, array("necessary_id" => $id));
    }

    public function getNecessaryInfoById($id)
    {
        if (!is_numeric($id)) {
            return false;
        }

        $where = array(
            "necessary_id" => $id,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getNecessaryInfoByName($name)
    {
        if (empty($name)) {
            return false;
        }

        $where = array(
            "necessary_title" => $name,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getNecessaryList($where, $limit = 25, $offset = 0)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getList($this->_table, $where, $limit, $offset, 'necessary_id desc');
    }

    public function getNecessaryAll($where = array())
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getAll($this->_table, $where,'necessary_id desc');
    }

    public function getNecessaryCount($where)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getCount($this->_table, $where);
    }

    public function deleteNecessaryById($id) {
        if ($id < 1) {
            return false;
        }
        $this->db->delete($this->_table, array("necessary_id" => $id));
    }

}