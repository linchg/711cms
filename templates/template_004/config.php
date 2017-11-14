<?php
function registerTemplate()
{
    $config['pagination'] = array(
        'per_page' => 15,
        'num_links' => 4,
        'query_string_segment' => 'page',
        'use_page_numbers' => true,
        'page_query_string' => true,
        'full_tag_open' => '<div class="pageation"><ul>',
        'full_tag_close' => '</ul></div>',
        'first_link' => '首页',
        'first_tag_open' => '<li><span>',
        'first_tag_close' => '</span></li>',
        'last_link' => '尾页',
        'last_tag_open' => '<li><span>',
        'last_tag_close' => '</span></li>',
        'next_link' => '下页',
        'next_tag_open' => '<li><span>',
        'next_tag_close' => '</span></li>',
        'prev_link' => '上页',
        'prev_tag_open' => '<li><span>',
        'prev_tag_close' => '</span></li>',
        'cur_tag_open' => '<li><a class="current"><span>',
        'cur_tag_close' => '</span></a></li>',
        'num_tag_open' => '<li><span>',
        'num_tag_close' => '</span></li>',
    );
    return $config;
}

