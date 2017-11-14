<?php
function registerTemplate() {
    $config['pagination'] = array(
        'per_page'             => 15,
        'num_links'            => 3,
        'query_string_segment' => 'page',
        'use_page_numbers'     => true,
        'page_query_string'    => true,
        'full_tag_open'        => '<div class="pages">',
        'full_tag_close'       => '</div>',
        'first_link'           => '首页',
        'first_tag_open'       => '<span><strong>',
        'first_tag_close'      => '</strong></span>',
        'last_link'            => '尾页',
        'last_tag_open'        => '<span><strong>',
        'last_tag_close'       => '</strong></span>',
        'next_link'            => '下页',
        'next_tag_open'        => '<span>',
        'next_tag_close'       => '</span>',
        'prev_link'            => '上页',
        'prev_tag_open'        => '<span>',
        'prev_tag_close'       => '</span>',
        'cur_tag_open'         => '<span><a href="javascript:;">',
        'cur_tag_close'        => '</a></span>',
        'num_tag_open'         => '<span><strong>',
        'num_tag_close'        => '</strong></span>',
    );
    return $config;
}
