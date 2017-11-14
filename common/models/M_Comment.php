<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_comment extends MY_Model {

    private $_info_comment = "info_comment";
    private $_app_comment  = "app_comment";

    public function createAppComment($data)
    {
        if (!is_array($data) || sizeof($data) < 1) {
            return false;
        }

        return $this->db->insert($this->_app_comment, $data);
    }
    public function createInfoComment($data)
    {
        if (!is_array($data) || sizeof($data) < 1) {
            return false;
        }

        return $this->db->insert($this->_info_comment, $data);
    }
    public function getAppCommentById($id)
    {
        if (!intval($id)) {
            return false;
        }
        $where = array(
            "info_app_id" =>$id
        );

        return $this->getAll($this->_app_comment, $where,'comment_date desc');
    }
    public function getAppCommentList($where,$limit = 15,$offset = 0,$order_by = 'comment_date desc')
    {
        if (!is_array($where)) {
            return false;
        }
        return $this->getList($this->_app_comment, $where, $limit, $offset, $order_by);
    }

    public function getAppCommentCountById($id)
    {
        if (!intval($id)) {
            return false;
        }
        $where = array(
            "info_app_id" =>$id
        );

        return $this->getCount($this->_app_comment, $where);
    }
}