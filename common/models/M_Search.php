<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Search extends MY_Model {

    private $_table = "search";

    public function createSearch($data)
    {
        if (!is_array($data) || sizeof($data) < 1) {
            return false;
        }

        return $this->db->insert($this->_table, $data);
    }

    public function updateSearchById($data, $id)
    {
        if (!is_array($data) || sizeof($data) < 1 || !is_numeric($id)) {
            return false;
        }

        return $this->db->update($this->_table, $data, array("q_id" => $id));
    }

    public function getSearchById($id)
    {
        if (!is_numeric($id)) {
            return false;
        }

        $where = array(
            "q_id" => $id,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getSearchByName($name)
    {
        if (empty($name)) {
            return false;
        }

        $where = array(
            "nlink_txt" => $name,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getSearchList($where, $limit = 25, $offset = 0)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getList($this->_table, $where, $limit, $offset, 'qorder desc, qnum desc');
    }

    public function getSearchAll($where = array())
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getAll($this->_table, $where,'q_id desc');
    }

    public function getSearchCount($where)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getCount($this->_table, $where);
    }

    public function deleteSearchById($id) {
        if ($id < 1) {
            return false;
        }
        $this->db->delete($this->_table, array("q_id" => $id));
    }

}