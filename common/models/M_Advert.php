<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Advert extends MY_Model {

    private $_table = "advert";

    public function createAd($data)
    {
        if (!is_array($data) || sizeof($data) < 1) {
            return false;
        }

        return $this->db->insert($this->_table, $data);
    }

    public function updateAdById($data, $id)
    {
        if (!is_array($data) || sizeof($data) < 1 || !is_numeric($id)) {
            return false;
        }

        return $this->db->update($this->_table, $data, array("ad_id" => $id));
    }
    public function updateAdvertById($data, $id)
    {
        if (!is_array($data) || sizeof($data) < 1 || !is_numeric($id)) {
            return false;
        }

        return $this->db->update($this->_table, $data, array("ad_id" => $id));
    }

    public function getAdInfoById($id)
    {
        if (!is_numeric($id)) {
            return false;
        }

        $where = array(
            "ad_id" => $id,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getAdInfoByName($name)
    {
        if (empty($name)) {
            return false;
        }

        $where = array(
            "ad_title" => $name,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getAdList($where, $limit = 25, $offset = 0)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getList($this->_table, $where, $limit, $offset, 'ad_id desc');
    }

    public function getAdAll($where = array())
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getAll($this->_table, $where,'ad_id desc');
    }

    public function getAdCount($where)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getCount($this->_table, $where);
    }

    public function deleteAdById($id) {
        if ($id < 1) {
            return false;
        }
        $this->db->delete($this->_table, array("ad_id" => $id));
    }

}