<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="data-spm" content="1"/>
    <meta http-equiv="Cache-Control" content="max-age=3600"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!--{if $last_cate_id}-->
    <!--{row name='info_category' id=$last_cate_id}-->
    <title><!--{$row.ctitle}--></title>
    <meta name="keywords" content="<!--{$row.ckey}-->"/>
    <meta name="description" content="<!--{$row.cdesc}-->"/>
    <!--{/row}-->
    <!--{else}-->
    <!--{row name='navicat' id=5}-->
    <title><!--{$row.navicat_seotitle}--></title>
    <meta name="keywords" content="<!--{$row.navicat_seokey}-->"/>
    <meta name="description" content="<!--{$row.navicat_seodesc}-->"/>
    <!--{/row}-->
    <!--{/if}-->

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
            <span class="text-white text-big">资讯</span>
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

<div class="container padding-left padding-right  padding-top  ">
    <!--{infolist id=$last_cate_id }-->
    <div class="line padding-bottom">
        <a href="<!--{link m='info' info_id=$infolist.info_id}-->">
            <div class="view-body">
                <div class="list-group">
                    <li class=" text-center">
                        <p class="text-big" style="height: 25px;overflow:hidden"> <!--{$infolist.info_title}--></p>
                    </li>
                    <li><p class="text-indent text-left text-small text-gray" style="height: 72px;overflow:hidden">
                            <!--{$infolist.info_desc}--></p></li>
                    <li class=" text-center text-small text-gray">
                        <span><!--{infonav}--> <!--{if $infolist.last_cate_id == $infonav.cate_id}--><!--{$infonav.cname}--><!--{/if}--> <!--{/infonav}--></span><span
                            class="text-gray">&nbsp;&nbsp;|&nbsp;&nbsp;</span><!--{$infolist.info_update_time|date_format:"%Y-%m-%d"}--><span
                            class="text-gray">&nbsp;&nbsp;</span>
                    </li>
                    <li
                </div>
            </div>
        </a>
    </div>
    <!--{/infolist}-->
</div>


<!-- inner -->

<!--footer-->
<!--{include file="inc_menu.php"}-->
<!--{include file="inc_foot.php"}-->
