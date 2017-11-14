<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_AppComment extends MY_Model {

    private $_table = "app_comment";

    public function createComment($data)
    {
        if (!is_array($data) || sizeof($data) < 1) {
            return false;
        }

        return $this->db->insert($this->_table, $data);
    }

    public function updateCommentById($data, $id)
    {
        if (!is_array($data) || sizeof($data) < 1 || !is_numeric($id)) {
            return false;
        }

        return $this->db->update($this->_table, $data, array("comment_id" => $id));
    }

    public function getCommentInfoById($id)
    {
        if (!is_numeric($id)) {
            return false;
        }

        $where = array(
            "comment_id" => $id,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getCommentList($where, $limit = 25, $offset = 0)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getList($this->_table, $where, $limit, $offset, 'comment_id desc');
    }

    public function getCommentCount($where)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getCount($this->_table, $where);
    }

    public function deleteCommentByApp($app_id) {
        if ($app_id < 1) {
            return false;
        }
        $this->db->delete($this->_table, array("info_app_id" => $app_id));
    }

    public function deleteCommentById($id) {
        if ($id < 1) {
            return false;
        }
        $this->db->delete($this->_table, array("comment_id" => $id));
    }
}