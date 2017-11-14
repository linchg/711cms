<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Recommend extends MY_Model {

    private $_table = "recommend";

    public function createRecommend($data)
    {
        if (!is_array($data) || sizeof($data) < 1) {
            return false;
        }

        return $this->db->insert($this->_table, $data);
    }

    public function updateRecommendById($data, $id)
    {
        if (!is_array($data) || sizeof($data) < 1 || !is_numeric($id)) {
            return false;
        }

        return $this->db->update($this->_table, $data, array("area_id" => $id));
    }

    public function getRecommendInfoById($id)
    {
        if (!is_numeric($id)) {
            return false;
        }

        $where = array(
            "area_id" => $id,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getRecommendInfoByName($name)
    {
        if (empty($name)) {
            return false;
        }

        $where = array(
            "title" => $name,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getRecommendList($where, $limit = 25, $offset = 0,$order_by='area_id desc')
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getList($this->_table, $where, $limit, $offset, $order_by);
    }

    public function getRecommendAll($where = array())
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getAll($this->_table, $where,'area_id desc');
    }

    public function getRecommendCount($where)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getCount($this->_table, $where);
    }

    public function deleteRecommendById($id) {
        if ($id < 1) {
            return false;
        }
        $this->db->delete($this->_table, array("area_id" => $id));
    }

}