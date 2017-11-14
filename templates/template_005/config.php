<?php
function registerTemplate()
{
    $config['pagination'] = array(
        'per_page' => 15,
        'num_links' => 4,
        'query_string_segment' => 'page',
        'use_page_numbers' => true,
        'page_query_string' => true,
        'full_tag_open' => '<span class="number">',
        'full_tag_close' => '</span>',
        'first_link' => '首页',
        'first_tag_open' => '<i>',
        'first_tag_close' => '</i>',
        'last_link' => '尾页',
        'last_tag_open' => '<i>',
        'last_tag_close' => '</i>',
        'next_link' => '下页',
        'next_tag_open' => '<i>',
        'next_tag_close' => '</i>',
        'prev_link' => '上页',
        'prev_tag_open' => '<i>',
        'prev_tag_close' => '</i>',
        'cur_tag_open' => '<i class="current">',
        'cur_tag_close' => '</i>',
        'num_tag_open' => '<i>',
        'num_tag_close' => '</i>',
    );
    return $config;
}


