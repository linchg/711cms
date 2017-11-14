<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: lincg
 * Date: 6/22/17
 * Time: 5:02 PM
 */
class M_Counter extends MY_Model
{
    private $_table = 'counter';

    /**
     * app浏览量增加1
     * @param $app_id
     * @param string $type
     * @param string $date
     * @return mixed
     */
    public function addAppView($appid, $type='pc',$date='')
    {
        $date = intval($date);
        if(!$date){
            $date = intval(date('Ymd'));
        }
        $row = $this->db->get_where($this->_table,array('app_id'=>$appid, 'date'=>$date),1)->row_array();
        if(!$row){
            $data = array(
                'app_id' => $appid,
                'date' => $date,
            );
            $this->db->insert($this->_table,$data);
            $rowid = $this->db->insert_id();
        }else{
            $rowid = $row['id'];
        }
        if(!in_array($type, array('pc','mobile')))
            $type = 'pc';
        $col = $type == 'pc' ? 'pcview_count' : 'mobileview_count';
        $this->db->set("`$col`","`$col`+1", FALSE);
        return $this->db->where('id', intval($rowid))->update($this->_table);
    }

    /**
     * app下载量增加1
     * @param $appid
     * @param string $type
     * @param string $date
     * @return mixed
     */
    public function addAppDown($appid, $type='pc', $date='')
    {
        $date = intval($date);
        if(!$date){
            $date = intval(date('Ymd'));
        }
        $row = $this->db->get_where($this->_table,array('app_id'=>$appid, 'date'=>$date),1)->row_array();
        if(!$row){
            $data = array(
                'app_id' => $appid,
                'date' => $date,
            );
            $this->db->insert($this->_table,$data);
            $rowid = $this->db->insert_id();
        }else{
            $rowid = $row['id'];
        }
        if(!in_array($type, array('pc','mobile')))
            $type = 'pc';
        $col = $type == 'pc' ? 'pcdown_count' : 'mobiledown_count';
        $this->db->set("`$col`","`$col`+1", FALSE);
        return $this->db->where('id', intval($rowid))->update($this->_table);
    }

    /**
     * app安装量增加1
     * @param $app_id
     * @param string $date
     */
    public function addAppInstall($app_id, $date='')
    {
        $date = intval($date);
        if(!$date){
            $date = intval(date('Ymd'));
        }
        $row = $this->db->get_where($this->_table,array('app_id'=>$app_id, 'date'=>$date),1)->row_array();
        if(!$row){
            $data = array(
                'app_id' => $app_id,
                'date' => $date,
            );
            $this->db->insert($this->_table,$data);
            $rowid = $this->db->insert_id();
        }else{
            $rowid = $row['id'];
        }
        $this->db->set("`install_count`","`install_count`+1", FALSE);
        return $this->db->where('id', intval($rowid))->update($this->_table);
    }

    /**
     * 添加手助下载记录
     * @param string $type
     */
    public function addSiteApkDonw($type='pc')
    {
        $date = intval(date('Ymd'));
        $row = $this->db->get_where($this->_table,array('app_id'=>0, 'date'=>$date),1)->row_array();
        if(!$row){
            $data = array(
                'app_id' => 0,
                'date' => $date,
            );
            $this->db->insert($this->_table,$data);
            $rowid = $this->db->insert_id();
        }else{
            $rowid = $row['id'];
        }
        if(!in_array($type, array('pc','mobile')))
            $type = 'pc';
        $col = $type == 'pc' ? 'pcdown_count' : 'mobiledown_count';
        $this->db->set("`$col`","`$col`+1", FALSE);
        return $this->db->where('id', intval($rowid))->update($this->_table);

    }

    /**
     * @param $where
     * @param int $limit
     * @param int $offset
     * @param string $order_by
     * @return bool
     */
    public function getCounterList($where, $limit = 25, $offset = 0,$order_by = 'date desc')
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getList($this->_table, $where, $limit, $offset, $order_by);
    }

    /**
     * @param $where
     * @return bool|int
     */
    public function getCounterCount($where)
    {
        if (!is_array($where)) {
            return false;
        }

        return $this->getCount($this->_table, $where);
    }

}