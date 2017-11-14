<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Import extends MY_Model {

    private $_table = "import";

    public function createImport($data)
    {
        if (!is_array($data) || sizeof($data) < 1) {
            return false;
        }

        return $this->db->insert($this->_table, $data);
    }

    public function updateImportById($data, $id)
    {
        if (!is_array($data) || sizeof($data) < 1 || !is_numeric($id)) {
            return false;
        }

        return $this->db->update($this->_table, $data, array("info_id" => $id));
    }

    public function getImportById($id)
    {
        if (!is_numeric($id)) {
            return false;
        }

        $where = array(
            "info_id" => $id,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getImportByName($name)
    {
        if (empty($name)) {
            return false;
        }

        $where = array(
            "info_title" => $name,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getImportList($where, $limit = 25, $offset = 0)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getList($this->_table, $where, $limit, $offset, 'info_id desc');
    }

    public function getImportAll($where = array())
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getAll($this->_table, $where,'info_id desc');
    }

    public function getImportCount($where)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getCount($this->_table, $where);
    }

    public function deleteImportById($id) {
        if ($id < 1) {
            return false;
        }
        $this->db->delete($this->_table, array("info_id" => $id));
    }

}