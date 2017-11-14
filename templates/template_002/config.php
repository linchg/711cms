<?php
function registerTemplate() {
    $config['pagination'] = array(
        'per_page'             => 15,
        'num_links'            => 3,
        'query_string_segment' => 'page',
        'use_page_numbers'     => true,
        'page_query_string'    => true,
        'full_tag_open'        => '<div class="fenye">',
        'full_tag_close'       => '</div>',
        'first_link'           => '首页',
        'first_tag_open'       => '',
        'first_tag_close'      => '',
        'last_link'            => '尾页',
        'last_tag_open'        => '',
        'last_tag_close'       => '',
        'next_link'            => '下页',
        'next_tag_open'        => '',
        'next_tag_close'       => '',
        'prev_link'            => '上页',
        'prev_tag_open'        => '',
        'prev_tag_close'       => '',
        'cur_tag_open'         => '<span class="page_cur">',
        'cur_tag_close'        => '</span>',
        'num_tag_open'         => '',
        'num_tag_close'        => '',
    );
    return $config;
}

