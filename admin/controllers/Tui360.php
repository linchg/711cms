<?php

/**
 * 360
 * User: lincg
 * Date: 8/28/17
 * Time: 6:12 PM
 */
class Tui360 extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_App','m_app');
        $this->load->model('m_History', 'm_history');
        $this->load->model('m_Resource', 'm_resource');
        $this->load->library('Http_client', NULL, 'http');
        $this->load->config('site');
        $this->_channel = $this->m_Setting->getSettingInfoByKey('360_channel');
        if(!$this->_channel)
            $this->_channel = $this->config->item('360_channel','site');
        $this->_key = $this->m_Setting->getSettingInfoByKey('360_key');
        if(!$this->_key)
            $this->_key = $this->config->item('360_key','site');
    }

    /**
     * 首页
     */
    public function index()
    {
        $page = intval($this->input->get('page'));
        if ($page < 1) {
            $page = 1;
        }
        $parent_id = intval($this->input->get('parent_id'));
        $last_cate_id = intval($this->input->get('last_cate_id'));
        $search_type = $this->input->get('search_type', true);
        $search_txt = $this->input->get('search_txt', true);
        $app_source = intval($this->input->get('app_source'));
        if(!$app_source)
            $app_source = 1;

        $where = array(
            'app_source' => $app_source,
        );

        $this->_data['parent_id'] = $parent_id;
        $this->_data['app_source'] = $app_source;

        if ($last_cate_id > 0) {
            $where['last_cate_id'] = $last_cate_id;
        }
        $this->_data['last_cate_id'] = $last_cate_id;

        $order_by = "app_type desc,app_id desc";
        if (!empty($search_type)) {
            $order_by = $search_type . " desc";
        }
        $this->_data['search_type'] = $search_type;

        if (!empty($search_txt)) {
            if ($search_type == 'app_id' && is_numeric($search_txt) && $search_txt > 0) {
                $where['app_id'] = $search_txt;
            } else {
                $where["app_title like"] = '%' . trim($search_txt) . '%';
            }
        }
        $this->_data['search_txt'] = $search_txt;

        $app_id = intval($this->input->post('app_id'));
        if ($app_id > 0) {
            $where['app_id'] = $app_id;
        }
        $this->_data['app_id'] = $app_id;

        $cate_id = intval($this->input->get('cate_id'));
        if ($cate_id > 0) {
            $where['cate_id'] = $cate_id;
        }
        $this->_data['cate_id'] = $cate_id;

        $categorywhere = array();
        if ($parent_id > 0) {
            $categorywhere['parent_id'] = $parent_id;
        }
        $category = $this->m_AppCategory->getCategoryAll($categorywhere);
        $cates = array();
        $parents = array();
        if (is_array($category) && sizeof($category) > 0) {
            foreach ($category as $value) {
                $cates[$value['cate_id']] = $value['cname'];
                $parents[$value['parent_id']][$value['cate_id']] = $value['cname'];
            }
        }
        $this->_data['cates'] = $cates;
        $this->_data['parents'] = $parents;
        $this->_data['category'] = $category;

        $appTypeName = array(
            1 => '普通应用',
            2 => 'CPA',
            3 => 'CPS'
        );
        $this->_data['appTypeName'] = $appTypeName;

        $appParents = array(
            1 => '软件',
            2 => '游戏'
        );
        $this->_data['appParents'] = $appParents;

        $config = $this->config->item('pagination');
        if (isset($this->_site['pagesize']) && $this->_site['pagesize'] >= 10 && $this->_site['pagesize'] <= 100) {
            $config['per_page'] = $this->_site['pagesize'];
        }
        $limit = $config['per_page'];
        $offset = ($page - 1) * $limit;

        if ($parent_id > 0) {
            $where['parent_id'] = $parent_id;
            $list = $this->m_App->joinCategory($where, $limit, $offset, $order_by);
            $list2 = $this->m_App->joinCategory($where, 0, 0);
            $count = count($list2);
        } else {
            $list = $this->m_App->getAppList($where, $limit, $offset, $order_by);
            $count = $this->m_App->getAppCount($where);
        }

        //分页参数
        $getdata = array(
            'parent_id' => $parent_id,
            'last_cate_id' => $last_cate_id
        );
        if (!empty($search_txt)) {
            $getdata['search_type'] = $search_type;
            $getdata['search_txt'] = '';
        }
        if ($search_type) {
            $getdata['search_type'] = $search_type;
        }
        $config['base_url'] = build_url('App', 'index', $getdata);
        $config['total_rows'] = $count;
        $this->pagination->initialize($config);

        $this->_data['count'] = $count;
        $this->_data['limit'] = $limit;
        $this->_data['offset'] = $offset;
        $this->_data['list'] = $list;

        $this->loadView('/App/index');
    }

    /**
     * 获取360的应用
     */
    public function appList()
    {
        $page = 1;
        $pagesize = 20;
        //type = 1.soft 2.game

        $arg = array(
            'from'      => $this->_channel,
            'page'      => $page,
            'pagesize'  => $pagesize,
        );
        $arg['sign'] = $this->getSign($arg);


        $action = 'http://api.np.mobilem.360.cn/app/list';
        $response = $this->http->get($action, $arg);
        if($response->isError()){
            die('http error');
        }
        $response = json_decode($response->getBody(), true);
        if (empty($response['items']) || !is_array($response['items'])) {
            die('empty items');
        }

        $data = $response['items'];
        foreach ($data as $k => $v) {
            $game_info = $this->m_app->getAppInfoByName($v['name']);
            if (is_array($game_info) && sizeof($game_info) > 0) {
                if (strtotime($v['updateTime']) == $game_info['app_update_time']) {
                    continue;
                }

                $app_id = $game_info['app_id'];
                $category = $this->import360_category($v);
                if (!is_array($category) || sizeof($category) < 1) {
                    continue;
                }

                $app = $this->import360_app($category['cate_id'], $v);
                $this->m_app->updateAppById($app, $app_id);

                $history = $this->import360_history($app_id, $v);
                $history_new = $this->m_history->getHistoryNew($app_id);
                if (!is_array($history_new) || sizeof($history_new) < 1) {
                    continue;
                }
                $this->m_history->updateHistoryById($history, $history_new['history_id']);

            } else {
                $category = $this->import360_category($v);
                if (!is_array($category) || sizeof($category) < 1) {
                    continue;
                }

                $app = $this->import360_app($category['cate_id'], $v);
                $app_id = $this->m_app->createApp($app);
                if (!$app_id) {
                    continue;
                }
                $app['app_id'] = $app_id;
                $history = $this->import360_history($app_id, $v);
                if (!$this->m_history->createHistory($history)) {
                    continue;
                }

                $resource = $this->import360_resource($app_id, $v);
                if (!is_array($resource) || sizeof($resource) < 1) {
                    continue;
                }
                foreach ($resource as $res) {
                    $this->m_resource->createResource($res);
                }
            }
        }

        die("$k");
    }

    /**
     * 获取360cps游戏
     */
    public function cpsGames()
    {
        $page = 1;
        //type = 1.soft 2.game

        $arg = array(
            'from'      => $this->_channel,
            'start'      => ($page - 1) * 20,
            'num'  => 20,
        );
        $arg['sign'] = $this->getSign($arg);


        $action = 'http://api.np.mobilem.360.cn/app/cpsgames';
        $response = $this->http->get($action, $arg);
        if($response->isError()){
            die('http error');
        }
        $response = json_decode($response->getBody(), true);
        if (empty($response['items']) || !is_array($response['items'])) {
            die('empty items');
        }
        $total = $response['total'];
        $data = $response['items'];
        $ids = array();
        foreach($data as $k => $v){
            $ids[] = $v['id'];
        }
        if(empty($ids)){
            die('empty items');
        }
        $arg = array(
            'from'      => $this->_channel,
            'appid'      => implode(',', $ids),
        );
        $arg['sign'] = $this->getSign($arg);
        $action = 'http://api.np.mobilem.360.cn/app/get';
        $response = $this->http->get($action, $arg);
        if($response->isError()){
            die('http error');
        }
        $response = json_decode($response->getBody(), true);
        if (empty($response['items']) || !is_array($response['items'])) {
            die('empty items');
        }
        $data = $response['items'];
        foreach ($data as $k => $v) {
            $game_info = $this->m_app->getAppInfoByName($v['name']);
            if (is_array($game_info) && sizeof($game_info) > 0) {
                if (strtotime($v['updateTime']) == $game_info['app_update_time']) {
                    continue;
                }

                $app_id = $game_info['app_id'];
                $category = $this->import360_category($v);
                if (!is_array($category) || sizeof($category) < 1) {
                    continue;
                }

                $app = $this->import360_app($category['cate_id'], $v);
                $this->m_app->updateAppById($app, $app_id);

                $history = $this->import360_history($app_id, $v);
                $history_new = $this->m_history->getHistoryNew($app_id);
                if (!is_array($history_new) || sizeof($history_new) < 1) {
                    continue;
                }
                $this->m_history->updateHistoryById($history, $history_new['history_id']);

            } else {
                $category = $this->import360_category($v);
                if (!is_array($category) || sizeof($category) < 1) {
                    continue;
                }

                $app = $this->import360_app($category['cate_id'], $v);
                $app_id = $this->m_app->createApp($app);
                if (!$app_id) {
                    continue;
                }
                $app['app_id'] = $app_id;
                $history = $this->import360_history($app_id, $v);
                if (!$this->m_history->createHistory($history)) {
                    continue;
                }

                $resource = $this->import360_resource($app_id, $v);
                if (!is_array($resource) || sizeof($resource) < 1) {
                    continue;
                }
                foreach ($resource as $res) {
                    $this->m_resource->createResource($res);
                }
            }
        }

        die("$k");
    }

    private function import360_category($data)
    {
        //查找建分类
        $cats = explode(':', $data['categoryName']);//游戏:其它
        $category_name = $cats[0];
        $parent_id = 1;
        if($category_name == '游戏')
            $parent_id = 2;
        elseif($category_name == '软件')
            $parent_id = 1;
        $cate_name = implode('', explode('|', $cats[1]));

        $localCategory = $this->m_app_category->getCategoryInfoByName($cate_name);
        if (is_array($localCategory) && sizeof($localCategory) > 1) {
            return $localCategory;
        }

        $insert = array(
            'parent_id' => $parent_id,
            'cname'     => $cate_name,
            'cname_py'  => '',
            'ctitle'    => '',
            'ckey'      => '',
            'cdesc'     => '',
            'corder'    => 0,
            'cat_show'  => 1,
            'cate_logo' => '',
        );
        $category_id = $this->m_app_category->createCategory($insert);
        if (!$category_id) {
            return false;
        }

        $insert['cate_id'] = $category_id;
        return $insert;
    }

    private function import360_app($last_cate_id, $data)
    {
        $app = array(
            "last_cate_id"      => $last_cate_id,
            "app_title"         => $data['name'],
            "app_stitle"        => $data['name'],
            "app_update_time"   => strtotime($data['updateTime']),
            //1免费 2收费
            "app_type"          => 1,
            //iconUrl
            "app_logo"          => $data['largeIcon'] ? $data['largeIcon'] : $data['iconUrl'],
            "app_desc"          => $data['description'],
            "app_company"       => $data['developer'],
            "app_company_url"   => '',
            "app_tags"          => $data['tag'],
            "create_time"       => strtotime($data['createTime']),
            "app_grade"         => floatval($data['rating']),
            "app_recomment"     => round($data['rating']/2),

            "uid"               => 0,
            "app_comments"      => 0,
            "app_visitors"      => 0,
            "app_down"          => $data['downloadTimes'],
            "app_order"         => 0,

            //360_id
            "data_app_id"       => $data['id'],
            "charge_app_id"     => $data['id'],
            //简短介绍说明
            "app_seodesc"       => $data['brief'],
            "app_seokey"        => '',
        );

        return $app;
    }

    private function import360_history($app_id, $data)
    {
        $history = array(
            "app_id"                => $app_id,
            "history_version"       => $data['versionName'],
            "history_update_time"   => strtotime($data['updateTime']),
            "history_size"          => $data['apkSize'],
            "history_system"        => $data['minVersion'],
            "data_history_id"       => 0,
            "history_type"          => 1,
            "history_minSdkVersion" => $data['minVersionCode'],
            "history_package"       => $data['packageName'],
            "history_VersionCode"   => $data['versionCode'],
            "history_permission"    => $data['appPermission'],
            "history_file"          => $data['rDownloadUrl'],
        );

        return $history;
    }

    private function import360_resource($app_id, $data)
    {
        $images = explode(',', $data['screenshotsUrl']);
        if (!is_array($images)) {
            return false;
        }

        $resource = array();
        foreach ($images as $image) {
            $resource[] = array(
                'info_app_id'   => $app_id,
                'type'          => 0,
                'resource_url'  => $image,
                'width'         => 0,
                'height'        => 0,
                'size'          => 0,
            );
        }

        return $resource;
    }

    protected function getSign($req)
    {
        ksort($req);
        $url = http_build_query($req);
        return md5($url.$this->_key);
    }

}