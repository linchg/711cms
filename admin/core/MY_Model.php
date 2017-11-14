<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

    public function getOne($table, $where = array(), $order_by = "")
    {
        $obj = $this->db->select("*")->from($table)->where($where);
        if (!empty($order_by)) {
            $obj = $obj->order_by($order_by);
        }
        return $obj->limit(1)->get()->row_array();
    }

    public function getList($table, $where = array(), $limit = 0, $offset = 0, $order_by = "", $group_by = "")
    {
        $obj = $this->db->select("*")->from($table)->where($where);
        if ($limit > 0)
        {
            $obj = $obj->limit($limit, $offset);
        }
        if ($order_by)
        {
            $obj = $obj->order_by($order_by);
        }
        if ($group_by)
        {
            $obj = $obj->group_by($group_by);
        }
        return $obj->get()->result_array();
    }

    public function getList2($table, $where = array(), $limit = 0, $offset = 0, $order_by = "", $group_by = "")
    {
        $obj = $this->db->select("*")->from($table)->join("app_category", 'app.last_cate_id = app_category.cate_id')->where($where);
        if ($limit > 0)
        {
            $obj = $obj->limit($limit, $offset);
        }
        if ($order_by)
        {
            $obj = $obj->order_by($order_by);
        }
        if ($group_by)
        {
            $obj = $obj->group_by($group_by);
        }
        return $obj->get()->result_array();
    }

    public function getAll($table, $where = array(), $order_by = "",$feild = '*')
    {
        $obj = $this->db->select($feild)->from($table)->where($where);
        if ($order_by)
        {
            $obj = $obj->order_by($order_by);
        }
        return $obj->get()->result_array();
    }

    public function getCount($table, $where = array(), $field = '*')
    {
        $count = $this->db->select("count({$field}) cnt")->from($table)->where($where)->get()->row_array();
        return !empty($count['cnt']) ? $count['cnt'] : 0;
    }

    public function getSum($table, $where = array(), $field = '*')
    {
        $count = $this->db->select("sum({$field}) cnt")->from($table)->where($where)->get()->row_array();
        return !empty($count['cnt']) ? $count['cnt'] : 0;
    }
}