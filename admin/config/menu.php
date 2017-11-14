<?php
$config['menu'] = array(
    array(
        'title'     => '管理首页',
        'url'       => build_url('Frame'),
        'bgimg'     => static_url('/images/menu1/index.png'),
        'rmbimg'    => '',
        'sonmenu'   => array(
        ),
    ),
    array(
        'title'     => '应用管理',
        'url'       => '',
        'bgimg'     => static_url('/images/menu1/app.png'),
        'rmbimg'    => '',
        'sonmenu'   => array(
            array('title' => '我的应用',    'url' => build_url('App')),
            array('title' => '应用统计',    'url' => build_url('counter')),
            array('title' => '应用分类',    'url' => build_url('AppCategory')),
            array('title' => '应用推荐',    'url' => build_url('Recommend')),
            array('title' => '广告列表',    'url' => build_url('Advert')),
            array('title' => '应用专题',    'url' => build_url('Special')),
            array('title' => '装机必备',    'url' => build_url('Necessary')),
            array('title' => '应用评论',    'url' => build_url('AppComment')),
        ),
    ),
    array(
        'title'     => '文章管理',
        'url'       => '',
        'bgimg'     => static_url('/images/menu1/info.png'),
        'rmbimg'    => '',
        'sonmenu'   => array(
            array('title' => '文章资讯',    'url' => build_url('Info')),
            array('title' => '文章分类',    'url' => build_url('InfoCategory')),
            array('title' => '采集规则',    'url' => build_url('Gather')),
            array('title' => '文章入库',    'url' => build_url('Import')),
            array('title' => '文章评论',    'url' => build_url('InfoComment')),
        ),
    ),
    array(
        'title'     => '模板管理',
        'url'       => '',
        'bgimg'     => static_url('/images/menu1/template.png'),
        'rmbimg'    => '',
        'sonmenu'   => array(
            array('title' => '网站模板',   'url' => build_url('Template')),
        ),
    ),
    array(
        'title'     => 'SEO管理',
        'url'       => '',
        'bgimg'     => static_url('/images/menu1/link.png'),
        'rmbimg'    => '',
        'sonmenu'   => array(
            array('title' => '正文内链',    'url' => build_url('Nlink')),
            array('title' => '搜索关键字',  'url' => build_url('Search')),
            array('title' => '友情链接',    'url' => build_url('Flink')),
        ),
    ),
    array(
        'title'     => '系统管理',
        'url'       => '',
        'bgimg'     => static_url('/images/menu1/system.png'),
        'rmbimg'    => '',
        'sonmenu'   => array(
            array('title' => '网站配置',    'url' => build_url('Setting')),
            array('title' => '后台账号',    'url' => build_url('Admin')),
            array('title' => '网站导航',    'url' => build_url('Navicat')),
            array('title' => '数据备份',    'url' => build_url('Backup')),
            array('title' => '操作日志',    'url' => build_url('OperateLog')),
        ),
    ),
);
