<!DOCTYPE HTML>
<html>
<head>
    <!--{row name='navicat' id=4}-->
    <title><!--{if $row.navicat_seotitle}--><!--{$row.navicat_seotitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
    <meta name="keywords" content="<!--{if $row.navicat_seokey}--><!--{$row.navicat_seokey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
    <meta name="description" content="<!--{if $row.navicat_seodesc}--><!--{$row.navicat_seodesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
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
                <!--{row name='recommend' id=$id}-->
                <a  class="fs24 col-fff"><!--{$row.area_title}--></a>
                <!--{/row}-->
                <input type="hidden" id="search-input" value="请输入搜索内容" onFocus="if(value=='请输入搜索内容'){value='';this.style.color='#333'}" onBlur="if(value==''){value='请输入搜索内容'}" class="search i-search"  data-rewrite="<!--{$setting.is_site_rewrite}-->">
                <a href="javascript:;" id="search-btn"><img src="<!--{$tpl_path}-->images/white-search.png" class="w14"></a>
            </h2>
        </header>
    </div>

    <div class="grayline mt50"></div>
    <div id="rankS" data-id="<!--{$id}-->">
        <!--{recommend id=$id row=10 start=0}-->
        <div class="game">
            <div class="game-pic">
                <div class="fl"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"><img src="<!--{imageurl url = $recommend.app_logo}-->" width="72"/></a></div>
                <a href="<!--{link m='app' app_id=$recommend.app_id}-->">
                <ul>
                    <li class="fs14 col-333 g-title"><!--{$recommend.app_title}--></li>
                    <li class="fs12 col-999"><!--{countdown down=$recommend.app_down}-->次下载<span class="m-none"> | <!--{round($recommend.history_size/1024/1024,2)}-->M</span></li>
                    <li class="fs12 col-666"><span class="btn-s col-999"><!--{$recommend.cname}--></span></li>
                </ul>
                </a>
                <p class="fs14 fr load"><a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="col-4FB0E4 btn-a">立即下载</a></p>
            </div>
        </div>
        <!--{/recommend}-->
    </div>
    <div class="more mb20">
        <p><a href="javascript:;" class="list-S"><<加载更多</a></p>
    </div>
</div>


