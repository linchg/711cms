<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Resource extends MY_Model {

    private $_table = "resource";

    public function createResource($data)
    {
        if (!is_array($data) || sizeof($data) < 1) {
            return false;
        }

        $data["width"]  = !empty($data["width"])  ? $data["width"]  : 0;
        $data["height"] = !empty($data["height"]) ? $data["height"] : 0;
        $data["size"]   = !empty($data["size"])   ? $data["size"]   : 0;

        return $this->db->insert($this->_table, $data);
    }

    public function updateResourceById($data, $id)
    {
        if (!is_array($data) || sizeof($data) < 1 || !is_numeric($id)) {
            return false;
        }

        return $this->db->update($this->_table, $data, array("id" => $id));
    }

    public function getResourceInfoById($id)
    {
        if (!is_numeric($id)) {
            return false;
        }

        $where = array(
            "id" => $id,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getResourceInfo($where)
    {
        if (!is_array($where) || sizeof($where) < 1) {
            return false;
        }
        return $this->getOne($this->_table, $where);
    }

    public function getResourceList($where, $limit = 25, $offset = 0)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getList($this->_table, $where, $limit, $offset, 'id desc');
    }

    public function getResourceAppAll($app_id, $where = array())
    {
        if ($app_id < 1) {
            return false;
        }
        if (!is_array($where)) {
            return false;
        }
        $where['info_app_id'] = $app_id;
        $where['type'] = 0;

        return $this->getAll($this->_table, $where,'id desc');
    }

    public function getResourceCount($where)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getCount($this->_table, $where);
    }

    public function deleteResourceByApp($id) {
        if ($id < 1) {
            return false;
        }
        $this->db->delete($this->_table, array("info_app_id" => $id, "type" => 0));
    }

    public function deleteResourceById($id) {
        if ($id < 1) {
            return false;
        }
        $this->db->delete($this->_table, array("id" => $id));
    }
}