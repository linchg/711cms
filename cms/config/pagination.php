<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['pagination'] = array(
    'per_page'             => 20,
    'num_links'            => 3,
    'query_string_segment' => 'page',
    'use_page_numbers'     => true,
    'page_query_string'    => true,
    'full_tag_open'        => '<ul class="pagination">',
    'full_tag_close'       => '</ul>',
    'first_link'           => '第一页',
    'first_tag_open'       => '<li class="paginate_button previous">',
    'first_tag_close'      => '</li>',
    'last_link'            => '最后一页',
    'last_tag_open'        => '<li class="paginate_button">',
    'last_tag_close'       => '</li>',
    'next_link'            => '下一页',
    'next_tag_open'        => '<li class="paginate_button next">',
    'next_tag_close'       => '</li>',
    'prev_link'            => '上一页',
    'prev_tag_open'        => '<li class="paginate_button previous">',
    'prev_tag_close'       => '</li>',
    'cur_tag_open'         => '<li class="paginate_button active"><a href="javascript:;">',
    'cur_tag_close'        => '</a></li>',
    'num_tag_open'         => '<li class="paginate_button">',
    'num_tag_close'        => '</li>',
);
