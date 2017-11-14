<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Navicat extends MY_Model {

    private $_table = "navicat";

    public function createNavicat($data)
    {
        if (!is_array($data) || sizeof($data) < 1) {
            return false;
        }

        return $this->db->insert($this->_table, $data);
    }

    public function updateNavicatById($data, $id)
    {
        if (!is_array($data) || sizeof($data) < 1 || !is_numeric($id)) {
            return false;
        }

        return $this->db->update($this->_table, $data, array("navicat_id" => $id));
    }

    public function updateNavicatMById($data, $where)
    {
        if (!is_array($data) || sizeof($data) < 1) {
            return false;
        }

        return $this->db->update($this->_table, $data,$where);
    }

    public function getNavicatById($id)
    {
        if (!is_numeric($id)) {
            return false;
        }

        $where = array(
            "navicat_id" => $id,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getNavicatByName($name)
    {
        if (empty($name)) {
            return false;
        }

        $where = array(
        "navicat_name" => $name,
         );

        return $this->getOne($this->_table, $where);
    }
    public function getNavicatBy_Name($name)
    {
        if (empty($name)) {
            return false;
        }

        $where = array(
        "navicat_m" => $name,
         );

        return $this->getOne($this->_table, $where);
    }

    public function getNavicatList($where, $limit = 25, $offset = 0)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getList($this->_table, $where, $limit, $offset, 'navicat_order desc, navicat_id desc');
    }

    public function getNavicatAll($where = array())
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getAll($this->_table, $where,'navicat_id desc');
    }

    public function getNavicatCount($where)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getCount($this->_table, $where);
    }

    public function deleteNavicatById($id) {
        if ($id < 1) {
            return false;
        }
        $this->db->delete($this->_table, array("navicat_id" => $id));
    }

}