<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="data-spm" content="1"/>
    <meta http-equiv="Cache-Control" content="max-age=3600"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!--{row name='navicat' id=6}-->
    <title><!--{$row.navicat_seotitle}--></title>
    <meta name="keywords" content="<!--{$row.navicat_seokey}-->"/>
    <meta name="description" content="<!--{$row.navicat_seodesc}-->"/>
    <!--{/row}-->

    <!--{include file="inc_head.php"}-->
</head>

<body>
<!--nav-->
<div class=" text-center nav-color elementwidth text-big padding-left padding-right" style="height: 40px">
    <div class="line">
        <div class="xl2 xs2 xm2 xb2">
            <a class="icon-angle-left text-large ellipsis" href="Javascript:history.go(-1);void(0);"></a>
        </div>
        <div class="xl8 xs8 xm8 xb8" style="height: 20px;overflow:hidden;margin-top: 8px">
            <span class="text-white text-big">精品专题</span>
        </div>
        <div class="xl2 xs2 xm2 xb2 padding-small-top">
            <a href="javascript:void(0)" id="search"><span class="icon-search text-white"
                                                           style="font-size: 20px"></span></a>
        </div>
    </div>
</div>
<div class="hidden" id="dialog"
     style="position:fixed;left:0;top:0;right:0;bottom:0;background:#FFFFFF;z-index:10;display:block;overflow-x:hidden;overflow-y:auto;">
    <div class="text-center elementwidth text-big padding-left padding-right bg-sub" style="height: 40px">
        <form method="post" action="#" class="form-inline">
            <div class="line">
                <div class="xl2 xs2 xm2 xb2 margin-small-top">
                    <span class="icon-angle-left text-large text-white" id="close"></span>
                </div>
                <div class="xl8 xs8 xm8 xb8 margin-small-top">
                    <input type="text" class="input" value="" name="keyword" placeholder="精品应用、海量搜索"
                           style="height: 30px" data-url="/index.php?c=index&m=search" id="search-input"
                           onkeydown="if(event.keyCode == 13) search_app()">
                </div>
                <div class="xl2 xs2 xm2 xb2 margin-small-top">
                    <button type="button" id="search-btn" onclick="search_app()" class="button button-small bg"><span
                            class="icon-search text-sub"></span></button>

                </div>
            </div>
        </form>
    </div>
    <div class="form-group">
        <div class="field">
            <div class="line">
                <p class="text-left">大家都在搜</p>
            </div>
            <ul class="list-inline height text-big">
                <!--{keyword row=4}-->
                <li style=" height:40px"><a href="<!--{link m='search' keywords=$keyword.q}-->"><!--{$keyword.q}-->
                        <!--<span class="text-green icon-arrow-up"></span>--></a></li>
                <!--{/keyword}-->
            </ul>
        </div>
    </div>
</div>


<!-- inner -->
<ul id="section_zhuanti" class="zhuanti zhuanti-index loadmore-placeholder" data-ratio="" data-margin="0">
    <!--{list name='special'}-->
    <!--{row name='special' id=$list.area_id}-->
    <li class="item" id="section_zhuanti_item0">
        <a class="g-block" href="<!--{link m='special' special_id=$row.area_id}-->">
            <div class="img-wrapper">
                <img src="<!--{$row.area_logo}-->">
            </div>
            <p class="title g-ellipsis"><!--{$row.area_title}--></p>

            <p class="summary g-ellipsis"><!--{$row.area_html}--> </p>
        </a>
    </li>
    <!--{/row}-->
    <!--{/list}-->
</ul>
<!-- inner -->

<!--footer-->
<!--{include file="inc_menu.php"}-->

<!--{include file="inc_foot.php"}-->