<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 应用评论管理
 * Class AppComment
 */
class AppComment extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_AppComment');
    }

    /**
     * 评论管理主页
     */
    public function main()
    {
        $status = array(
            1 => '已通过',
            2 => '已屏蔽',
            3 => '未审核'
        );
        $this->_data['status'] = $status;

        $page = intval($this->input->get('page'));
        if ($page < 1) {
            $page = 1;
        }
        $where = array();
        $count = $this->m_AppComment->getCommentCount($where);

        $config = $this->config->item('pagination');
        $config['base_url']   = build_url('AppComment');
        $config['total_rows'] = $count;
        $this->pagination->initialize($config);

        $limit  = $config['per_page'];
        $offset = ($page - 1) * $config['per_page'];
        $list = $this->m_AppComment->getCommentList($where, $limit, $offset);

        $this->_data['count']  = $count;
        $this->_data['limit']  = $limit;
        $this->_data['offset'] = $offset;
        $this->_data['list']   = $list;

        $this->loadView('/AppComment/index');
    }

    /**
     * 删除
     */
    public function delete()
    {
        $comment_id = intval($this->input->post('comment_id'));
        if ($comment_id < 1) {
            $this->output->error_json(100, "请输入评论ID");
        }
        $info = $this->m_AppComment->getCommentInfoById($comment_id);
        if (!is_array($info) || sizeof($info) < 1) {
            $this->output->error_json(100, "没有此评论");
        }
        $this->m_AppComment->deleteCommentById($comment_id);

        $this->operate_log('AppComment','delete','删除了一条应用评论（ID为：'.$info['comment_id'].'）的评论');
        $this->output->ok_json("评论删除成功");
    }

    /**
     * 更新
     */
    public function update() {
        $status = intval($this->input->post('status'));
        if ($status < 1 || $status > 2) {
            $status = 1;
        }
        $comment_id = intval($this->input->post('comment_id'));
        if ($comment_id < 1) {
            $this->output->error_json(100, "请输入评论ID");
        }
        $info = $this->m_AppComment->getCommentInfoById($comment_id);
        if (!is_array($info) || sizeof($info) < 1) {
            $this->output->error_json(100, "没有此评论");
        }
        $data = array(
            'comment_check' => $status
        );
        $this->m_AppComment->updateCommentById($data, $comment_id);
        $this->operate_log('AppComment','update','修改了应用评论的（ID为：'.$info['comment_id'].'）的状态');
        $this->output->ok_json("评论更新成功");
    }

}
