<!DOCTYPE HTML>
<html>
<head>
    <!--{row name='navicat' id=6}-->
    <title><!--{$row.navicat_seotitle}--></title>
    <meta name="keywords" content="<!--{$row.navicat_seokey}-->" />
    <meta name="description" content="<!--{$row.navicat_seodesc}-->" />
    <!--{/row}-->

    <!--{include file="inc_head.php"}-->
</head>

<body>

<div class="container">
    <!--head-->
    <div class="search-head-bg">
        <header class="search-head">
            <h2>
                <a href="/"><img src="<!--{$tpl_path}-->images/fanhui.png" class="w7"></a>
                <a  class="fs24 col-fff">专题</a>
                <input type="hidden" id="search-input" value="请输入搜索内容" onFocus="if(value=='请输入搜索内容'){value='';this.style.color='#333'}" onBlur="if(value==''){value='请输入搜索内容'}" class="search i-search"  data-rewrite="<!--{$setting.is_site_rewrite}-->">
                <a href="javascript:;" id="search-btn"><img src="<!--{$tpl_path}-->images/white-search.png" class="w14"></a>
            </h2>
        </header>
    </div>

    <div class="grayline1 mt50"></div>
    <!--{list name='special'}-->
    <!--{row name='special' id=$list.area_id}-->
    <div class="grayline"></div>
    <div class="con-bg">
        <div class="con">
            <ul>
                <li><a href="<!--{link m='special' special_id=$row.area_id}-->"><img src="<!--{$row.area_logo}-->"></a></li>
            </ul>
            <div class="black">
                <a href="<!--{link m='special' special_id=$row.area_id}-->" class="col-fff fs24"><!--{$row.area_title}--></a>
            </div>
        </div>
    </div>
    <!--{/row}-->
    <!--{/list}-->
<!--{include file="inc_foot.php"}-->
<div class="white-line h50"></div>
