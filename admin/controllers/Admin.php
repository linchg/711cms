<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 账号管理
 * Class Admin
 */
class Admin extends MY_Controller {

    /**
     * 管理首页
     */
    public function main()
    {
        $page = intval($this->input->get('page'));
        if ($page < 1) {
            $page = 1;
        }
        $where = array();
        $count = $this->m_Admin->getAdminCount($where);

        $config = $this->config->item('pagination');
        $config['base_url']   = build_url('adminUser');
        $config['total_rows'] = $count;
        $this->pagination->initialize($config);

        $limit  = $config['per_page'];
        $offset = ($page - 1) * $config['per_page'];
        $list = $this->m_Admin->getAdminList($where, $limit, $offset);

        $this->_data['count']  = $count;
        $this->_data['limit']  = $limit;
        $this->_data['offset'] = $offset;
        $this->_data['list']   = $list;

        $this->loadView('/Admin/index');
    }

    /**
     * 账号管理
     */
    public function content()
    {
        $uid = intval($this->input->get('uid'));
        $info = array();
        if ($uid > 0) {
            $info = $this->m_Admin->getAdminInfoById($uid);
        }
        $this->_data['info'] = $info;
        $this->loadView('/Admin/content');
    }

    /**
     * 创建和修改
     */
    public function save()
    {
        $uid = intval($this->input->get('uid'));
        if ($uid > 0) {
            $userInfo = $this->m_Admin->getAdminInfoById($uid);
            if (empty($userInfo['uid'])) {
                $this->output->error_json(900, "账户不存在");
            }
            $params = array();

            $ustate = intval($this->input->post('ustate'));
            if ($ustate != 1) {
                if ($this->_uid == $uid) {
                    $this->output->error_json(220, "不能停用当前账户");
                }
                $params['ustate'] = $ustate;
            }

            $oldpass = $this->input->post('oldpass');
            if (!is_string($oldpass)) {
                $this->output->error_json(230, "请输入原密码");
            }
            if ($this->m_Admin->decodePassword($oldpass) != $userInfo['upass']) {
                $this->output->error_json(230, "原密码输入不正确");
            }
            $upass = $this->input->post('upass');
            if ($upass) {
                $re_pass = $this->input->post('re_pass');
                if (strlen($upass) < 5) {
                   $this->output->error_json(230, "密码过于简单");
                }
                if (strlen($upass) > 20) {
                    $this->output->error_json(240, "密码超出限定长度");
                }
                if ($this->_uid != $uid) {
                    $this->output->error_json(250, "不能修改其他账号的密码");
                }
                if ($upass != $re_pass) {
                    $this->output->error_json(270, "两次密码不一样");
                }
                $params['upass'] = $upass;
            }

            if (sizeof($params) < 1) {
                $this->output->error_json(910, "请输入要修改的信息");
            }
            $result = $this->m_Admin->updateAdminById($params, $uid);
            if ($result) {
                $this->operate_log('Admin','update','修改了后台'.$userInfo['uname'].'密码。');
                $this->output->ok_json("操作成功");
            }
            $this->operate_log('Admin','update','修改后台'.$userInfo['uname'].'密码失败。');
            $this->output->error_json(280, "编辑账号失败，请核实后再添加");
        }

        $uname = $this->input->post('uname', true);
        $upass = $this->input->post('upass');
        if (empty($uname)) {
            $this->output->error_json(210, "账号名不能为空");
        }
        if (empty($upass)) {
            $this->output->error_json(220, "密码不能为空");
        }
        if (!preg_match('~^[A-Za-z][A-Za-z]*[a-z0-9_]*$~', $uname)) {
            $this->output->error_json(230, "账号名必须以字母开头，只允许字母、数字、下划线");
        }
        if (strlen($upass) < 5) {
            $this->output->error_json(240, "密码过于简单");
        }
        if (strlen($upass) > 20) {
            $this->output->error_json(240, "密码超出限定长度");
        }
        $re_pass = $this->input->post('re_pass');
        if ($upass!= $re_pass) {
            $this->output->error_json(270, "两次密码不一致");
        }
        $info = $this->m_Admin->getAdminInfoByName($uname);
        if (is_array($info) && sizeof($info) > 0) {
            $this->ouput->error_json(260, "账号名不能重复");
        }

        $result = $this->m_Admin->createAdmin(array(
            'uname' => $uname,
            'upass' => $upass,
            'reg_date' => time(),
            'ustate' => 1,
        ));
        if ($result) {
            $this->operate_log('Admin','insert','添加了账号：'.$uname);
            $this->output->ok_json("添加账号成功");
        }
        $this->operate_log('Admin','insert','添加账号:'.$uname.'时失败。');
        $this->output->error_json(270, "添加账号失败，请核实后再添加");
    }

}
