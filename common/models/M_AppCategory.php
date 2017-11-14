<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_AppCategory extends MY_Model {

    private $_table = "app_category";

    public function createCategory($data)
    {
        if (!is_array($data) || sizeof($data) < 1) {
            return false;
        }

        if (!$this->db->insert($this->_table, $data)) {
            return false;
        }

        return $this->db->insert_id();
    }

    public function updateCategoryById($data, $id)
    {
        if (!is_array($data) || sizeof($data) < 1 || !is_numeric($id)) {
            return false;
        }

        return $this->db->update($this->_table, $data, array("cate_id" => $id));
    }

    public function getCategoryInfoById($id)
    {
        if (!is_numeric($id)) {
            return false;
        }

        $where = array(
            "cate_id" => $id,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getCategoryInfoByName($name)
    {
        if (empty($name)) {
            return false;
        }

        $where = array(
            "cname" => $name,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getCategoryInfoByPy($name)
    {
        if (empty($name)) {
            return false;
        }

        $where = array(
            "cname_py" => $name,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getCategoryList($where, $limit = 25, $offset = 0)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getList($this->_table, $where, $limit, $offset, 'parent_id desc, corder desc');
    }

    public function getCategoryAll($where = array())
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getAll($this->_table, $where,'cate_id desc');
    }

    public function getCategoryCount($where)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getCount($this->_table, $where);
    }

    public function deleteCategoryById($id) {
        if ($id < 1) {
            return false;
        }
        $this->db->delete($this->_table, array("cate_id" => $id));
    }

}