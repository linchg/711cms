<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 文章手动采集管理
 * Class Gather
 */
class Gather extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_Gather');
        $this->load->model('m_InfoCategory');
        $this->load->model('m_Import');
    }

    /**
     * 采集管理首页
     */
    public function main()
    {
        $page = intval($this->input->get('page'));
        if ($page < 1) {
            $page = 1;
        }

        $where = array();
        $count = $this->m_Gather->getGatherCount($where);
        $config = $this->config->item('pagination');
        $config['base_url']   = build_url('gather');
        $config['total_rows'] = $count;
        $this->pagination->initialize($config);

        $limit  = $config['per_page'];
        $offset = ($page - 1) * $config['per_page'];
        $list = $this->m_Gather->getGatherList($where, $limit, $offset);

        $category = $this->m_InfoCategory->getCategoryAll(array('parent_id >' => 0));
        $cates = array();
        if (is_array($category) && sizeof($category) > 0) {
            foreach ($category as $value) {
                $cates[$value['cate_id']] = $value['cname'];
            }
        }
        $this->_data['cates'] = $cates;
        $this->_data['category'] = $category;

        $this->_data['count']  = $count;
        $this->_data['limit']  = $limit;
        $this->_data['offset'] = $offset;
        $this->_data['list']   = $list;

        $this->loadView('/Gather/index');
    }

    /**
     * 某个采集的内容
     */
    public function content()
    {
        $gather_id = intval($this->input->get('gather_id'));
        $info = array();
        if ($gather_id > 0) {
            $info = $this->m_Gather->getGatherById($gather_id);
        }
        $this->_data['info'] = $info;

        $category = $this->m_InfoCategory->getCategoryAll(array('parent_id >' => 0));
        $this->_data['category'] = $category;

        $this->loadView('/Gather/content');
    }

    /**
     * 采集保存
     */
    public function save()
    {
        $gather_id = intval($this->input->get('gather_id'));

        $gather_name            = $this->input->post('gather_name', true);
        $gather_site            = $this->input->post('gather_site', true);
        $cate_id                = intval($this->input->post('cate_id'));
        $gather_charset         = $this->input->post('gather_charset', true);
        $gather_is_local        = intval($this->input->post('gather_is_local'));
        $gather_index_url       = $this->input->post('gather_index_url', true);
        $gather_list_url        = $this->input->post('gather_list_url', true);
        $gather_page_start      = $this->input->post('gather_page_start', true);
        $gather_page_end        = $this->input->post('gather_page_end', true);
        $gather_list_sign       = $this->input->post('gather_list_sign', true);
        $gather_list_link       = $this->input->post('gather_list_link', true);
        $gather_title_sign      = $this->input->post('gather_title_sign', true);
        $gather_content_sign    = $this->input->post('gather_content_sign', true);

        if ($gather_id > 0) {
            $gather = $this->m_Gather->getGatherById($gather_id);
            if (!is_array($gather) || sizeof($gather) < 1) {
                $this->output->error_json(100, '没有此采集规则');
            }
            $data = array();
            if ($gather_name) {
                $data['gather_name']            = $gather_name;
            }
            if ($gather_site) {
                $data['gather_site']            = $gather_site;
            }
            if ($cate_id) {
                $data['cate_id']                = $cate_id;
            }
            if ($gather_charset) {
                $data['gather_charset']         = $gather_charset;
            }
            if ($gather_is_local) {
                $data['gather_is_local']        = $gather_is_local;
            }
            if ($gather_index_url) {
                $data['gather_index_url']       = $gather_index_url;
            }
            if ($gather_list_url) {
                $data['gather_list_url']        = $gather_list_url;
            }
            if ($gather_page_start) {
                $data['gather_page_start']      = $gather_page_start;
            }
            if ($gather_page_end) {
                $data['gather_page_end']        = $gather_page_end;
            }
            if ($gather_list_sign) {
                $data['gather_list_sign']       = $gather_list_sign;
            }
            if ($gather_list_link) {
                $data['gather_list_link']       = $gather_list_link;
            }
            if ($gather_title_sign) {
                $data['gather_title_sign']      = $gather_title_sign;
            }
            if ($gather_content_sign) {
                $data['gather_content_sign']    = $gather_content_sign;
            }
            $data['gather_time']                = time();
            $data['uid']                        = $this->_uid;

            $result = $this->m_Gather->updateGatherById($data, $gather_id);
            if ($result) {
                $this->output->ok_json("更新采集规则成功");
            }
            $this->output->error_json(100, "编辑采集规则失败");
        }

        $result = $this->m_Gather->createGather(array(
            'gather_name'         => $gather_name,
            'gather_site'         => $gather_site,
            'cate_id'             => $cate_id,
            'gather_charset'      => $gather_charset,
            'gather_is_local'     => $gather_is_local,
            'gather_index_url'    => $gather_index_url,
            'gather_list_url'     => $gather_list_url,
            'gather_page_start'   => $gather_page_start,
            'gather_page_end'     => $gather_page_end,
            'gather_list_sign'    => $gather_list_sign,
            'gather_list_link'    => $gather_list_link,
            'gather_title_sign'   => $gather_title_sign,
            'gather_content_sign' => $gather_content_sign,
            'gather_time'         => time(),
            'uid'                 => $this->_uid
        ));
        if ($result) {
            $this->output->ok_json("添加采集规则成功");
        }
        $this->output->error_json(100, "添加采集规则失败");
    }

    /**
     * 采集删除
     */
    public function delete()
    {
        $gather_id = intval($this->input->post('gather_id'));
        if ($gather_id < 1) {
            $this->output->error_json(100, "请输入采集规则ID");
        }
        $gather = $this->m_Gather->getGatherById($gather_id);
        if (!is_array($gather) || sizeof($gather) < 1) {
            $this->output->error_json(100, "没有此采集规则");
        }
        $this->m_Gather->deleteGatherById($gather_id);
        $this->output->ok_json("采集删除成功");
    }

    /**
     * 采集功能页面
     */
    public function doGather()
    {
        $gather_id = intval($this->input->get('gather_id'));
        if ($gather_id < 1) {
            die('没有采集ID');
        }
        $info = $this->m_Gather->getGatherById($gather_id);
        if (!is_array($info) || sizeof($info) < 1) {
            die('没有采集信息');
        }
        $this->_data['info'] = $info;

        $this->session->unset_userdata('gather_urls');
        $this->session->unset_userdata('gather_links');

        $this->loadView('/Gather/doGather');
    }

    /**
     * 采集,从文章列表页面开始，采集当前页面上所有的文章页面
     */
    public function doJob()
    {
        $this->load->library('dom');

        $gather_id = intval($this->input->post('gather_id'));
        if ($gather_id < 1) {
            $this->output->error_json(999, '没有采集ID');
        }
        $info = $this->m_Gather->getGatherById($gather_id);
        if (!is_array($info) || sizeof($info) < 1) {
            $this->output->error_json(999, '没有采集信息');
        }
        $listUrl    = $info['gather_list_url'];
        $pageStart  = $info['gather_page_start'];
        $pageEnd    = $info['gather_page_end'];

        $gather_links = $this->session->userdata('gather_links');
        if (is_array($gather_links) && sizeof($gather_links) > 0) {
            $url = array_shift($gather_links);
            $this->session->set_userdata('gather_links', $gather_links);

            $http = $this->http_client->get($url);
            if ($http->isError()) {
                $this->output->error_json(100, '不能获取文章：'.$url);
            }
            $body = $http->getBody();
            if (!is_string($body) || strlen($body) < 13) {
                $this->output->error_json(100, '文章内容异常：'.$url);
            }
            $dom = $this->dom->str_get_html($body);
            if (!is_object($dom)) {
                $this->output->error_json(100, '解析文章失败：'.$url);
            }

            $titleSign = $info['gather_title_sign'];
            $titleDiv = $dom->find($titleSign, 0);
            if (!$titleDiv) {
                $this->output->error_json(100, '没有找到文章标题：'.$url);
            }

            $contentSign = $info['gather_content_sign'];
            $contentDiv = $dom->find($contentSign, 0);
            if (!$contentDiv) {
                $this->output->error_json(100, '没有找到文章内容：'.$url);
            }

            $info_title = $titleDiv->plaintext;
            $info_content = $contentDiv;
            $has = $this->m_Import->getImportByName($info_title);
            if (is_array($has) && sizeof($has) > 0) {
                $this->output->ok_json("文章重复采集：".$url);
            }

            $this->m_Import->createImport(array(
                'last_cate_id'       => $info['cate_id'],
                'info_title'         => $info_title,
                'info_stitle'        => $info_title,
                'info_img'           => '',
                'info_desc'          => '',
                'info_body'          => $info_content,
                'info_tags'          => '',
                'info_from'          => $info['gather_site'],
                'info_comments'      => 0,
                'info_visitors'      => 0,
                'info_order'         => 0,
                'info_url'           => '',
                'info_publish_time'  => 0,
                'info_seodesc'       => '',
                'info_seokey'        => '',
                'info_update_time'   => time(),
                'create_time'        => time(),
                'uid'                => $this->_uid,
                'info_status'        => 1,
                'gather_url'         => $url,
                'gather_id'          => $info['gather_id']
            ));

            $this->output->ok_json("成功获取文章：".$url);
        }

        $gather_urls = $this->session->userdata('gather_urls');
        if (is_array($gather_urls) && sizeof($gather_urls) == 0) {
            $this->session->unset_userdata('gather_urls');
            $this->output->ok_json("done");
        }
        if (!is_array($gather_urls)) {
            $urls = array();
            if ($pageStart > 0 && $pageEnd > 0) {
                if ($pageEnd < $pageStart) {
                    $this->output->error_json(999, '列表结束的页码不能小于开始的页码');
                }
                for ($i = $pageStart; $i <= $pageEnd; $i++) {
                    $urls[] = str_ireplace('{page}', $i, $listUrl);
                }
            } else {
                $urls[] = $listUrl;
            }
            $this->session->set_userdata('gather_urls', $urls);
            $gather_urls = $urls;
        }

        $url = array_shift($gather_urls);
        $this->session->set_userdata('gather_urls', $gather_urls);

        $http = $this->http_client->get($url);
        if ($http->isError()) {
            $this->output->error_json(100, '不能获取列表：'.$url);
        }
        $body = $http->getBody();
        if (!is_string($body) || strlen($body) < 13) {
            $this->output->error_json(100, '列表内容异常：'.$url);
        }
        $dom = $this->dom->str_get_html($body);
        if (!is_object($dom)) {
            $this->output->error_json(100, '解析列表失败：'.$url);
        }

        $listSign = $info['gather_list_sign'];
        $listLink = $info['gather_list_link'];
        $listDiv = $dom->find("{$listSign} {$listLink}");
        if (!$listDiv) {
            $this->output->error_json(100, '没有找到文章列表：'.$url);
        }

        $gather_links = array();
        foreach ($listDiv as $value) {
            $link = $value->href;
            if (!is_string($link)) {
                continue;
            }
            $gather_links[] = $link;
        }
        $this->session->set_userdata('gather_links', $gather_links);

        $this->output->ok_json("成功获取列表：".$url);
    }

}
