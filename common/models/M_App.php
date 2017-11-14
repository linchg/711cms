<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_App extends MY_Model {

    private $_table = "app";

    public function createApp($data)
    {
        if (!is_array($data) || sizeof($data) < 1) {
            return false;
        }

        if (!$this->db->insert($this->_table, $data)) {
            return false;
        }

        return $this->db->insert_id();
    }

    public function updateAppById($data, $id)
    {
        if (!is_array($data) || sizeof($data) < 1 || !is_numeric($id)) {
            return false;
        }

        return $this->db->update($this->_table, $data, array("app_id" => $id));
    }

    public function getAppInfoById($id, $field='*')
    {
        if (!is_numeric($id)) {
            return false;
        }

        $where = array(
            "app_id" => $id,
        );

        return $this->getOne($this->_table, $where, '', $field);
    }

    public function getAppInfoByName($name)
    {
        if (empty($name)) {
            return false;
        }

        $where = array(
            "app_title" => $name,
        );

        return $this->getOne($this->_table, $where);
    }

    public function getAppSelectList($fileds='*',$limit = 25,  $where=array(), $offset = 0,$order_by = 'app_type desc,app_id desc')
    {
        return $this->getList($this->_table, $where, $limit, $offset, $order_by,"",$fileds);
    }

    public function getAppList($where, $limit = 25, $offset = 0,$order_by = 'app_type desc,app_id desc')
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getList($this->_table, $where, $limit, $offset, $order_by);
    }

    public function getAppsByWhereIn($inkey, $inval,$limit=25,$offset=0,$order_by = 'app_type desc,app_id desc' )
    {
        if(!empty($inval))
            return $this->db->where_in($inkey, $inval)->limit($limit, $offset)->order_by($order_by)->get($this->_table)->result_array();
        return array();
    }

    public function joinCategory($where, $limit = 25, $offset = 0,$order_by = 'app_id desc')
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getList2($this->_table, $where, $limit, $offset, $order_by);
    }


    public function joinCateDown($where, $limit = 25, $offset = 0)
    {
        if (!is_array($where)) {
            return false;
        }
        return $this->getList2($this->_table, $where, $limit, $offset, 'app_down desc');
    }

    public function getAppCount($where)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getCount($this->_table, $where);
    }

    public function deleteAppById($id) {
        if ($id < 1) {
            return false;
        }
        $this->db->delete($this->_table, array("app_id" => $id));
    }

    public function updateAppVisitor($app_id)
    {
        return $this->db->set('app_visitors', 'app_visitors+1', false)->where(array('app_id' => $app_id))->update('app');
    }

    public function updateAppDownload($app_id)
    {
        return $this->db->set('app_down', 'app_down+1', false)->where(array('app_id' => $app_id))->update('app');
    }

}