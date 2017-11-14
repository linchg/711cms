<!DOCTYPE HTML>
<html>
<head>
    <!--{if $cate_id}-->
    <!--{row name='app_category' id=$cate_id}-->
    <title><!--{$row.ctitle}--></title>
    <meta name="keywords" content="<!--{$row.ckey}-->" />
    <meta name="description" content="<!--{$row.cdesc}-->" />
    <!--{/row}-->
    <!--{else}-->
    <!--{row name='navicat' id=3}-->
    <title><!--{$row.navicat_seotitle}--></title>
    <meta name="keywords" content="<!--{$row.navicat_seokey}-->" />
    <meta name="description" content="<!--{$row.navicat_seodesc}-->" />
    <!--{/row}-->
    <!--{/if}-->

    <!--{include file="inc_head.php"}-->
</head>

<body>
<div class="container">
    <!--head-->
    <div class="gray-head-bg2">
        <header class="search-input">
            <p>
                <a href="/" class="logo"><img src="<!--{$setting.wap_logo}-->" ></a>
            </p>
            <p class="search-bg">
                <input type="text" id="search-input" value="请输入搜索内容" onFocus="if(value=='请输入搜索内容'){value='';this.style.color='#333'}" onBlur="if(value==''){value='请输入搜索内容'}" class="search i-search"  data-rewrite="<!--{$setting.is_site_rewrite}-->">
                <a href="javascript:;" id="search-btn"><img src="<!--{$tpl_path}-->images/search.png"></a>
            </p>
        </header>
    </div>
    <!--nav-->
    <nav class="mt50">
        <div class="menu">
            <ul>
                <li>
                    <a href="#" class="btn-a  current">热门</a>
                    <a href="#" class="btn-a">精品</a>
                    <a href="#" class="btn-a">分类</a>
                    <a href="#" class="btn-a">排行</a>
                </li>
            </ul>
        </div>
    </nav>
    <!--grayline-->
    <div class="grayline"></div>

    <!--热门-->
    <div class="ly-ta">
        <div class="banner">
            <div class="title-gre">
                <h2 class="fs30">游戏热门</h2>
            </div>
            <div class="bd">
                <!--{recommend id=46 row=3  start=0}-->
                <dl>
                    <dt class="pic">
                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->">
                            <img src="<!--{imageurl url = $recommend.app_logo}-->" style="height:72px;width:72px;"/>
                        </a>
                    </dt>
                    <dd class="title g-title">
                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->">
                            <!--{$recommend.app_title}-->
                        </a>
                    </dd>
                    <dd class="title down-load">
                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->">立即下载</a>
                    </dd>
                </dl>
                <!--{/recommend}-->
            </div>
        </div>
        <!--grayline-->
        <div class="noline-grayline"></div>
        <!--content-->
        <div id="rank_hot" data-id="46">
            <!--{recommend id=46 row=15 start=3}-->
            <div class="game">
                <div class="game-pic">
                    <div class="fl"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"><img src="<!--{imageurl url = $recommend.app_logo}-->" style="height:72px;width:72px;"/></a></div>
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
        <div class="more mb50">
            <p><a href="javascript:;" class="list-rank"><<加载更多</a></p>
        </div>
    </div>
    <!--精品-->
    <div class="ly-ta" style="display:none;" >
        <div id="rankS" data-id="48">
            <!--{recommend id=48 row=15}-->
            <div class="game">
                <div class="game-pic">
                    <div class="fl"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"><img src="<!--{imageurl url = $recommend.app_logo}-->" style="height:72px;width:72px;"/></a></div>
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
        <div class="more mb50">
            <p><a href="javascript:;" class="list-S"><<加载更多</a></p>
        </div>
    </div>
    <!--分类-->
    <div class="ly-ta" style="display: none;">
        <div class="range">
            <table class="fs20" border="1" width="0" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="text-align: center"><a href="javascript:;" title="全部"><span>全部</span></a> </td>
                    <!--{appnav parent=2 row=3 start=0}-->
                    <td>
                        <a href="<!--{link m='categories' cate_id=$appnav.cate_id}-->" title="<!--{$appnav.cname}-->">
                            <img src="<!--{imageurl url = $appnav.cate_logo}-->">&nbsp;<span><!--{$appnav.cname}--></span>
                        </a>
                    </td>
                    <!--{/appnav}-->
                </tr>
                <!--{for $foo=1 to 4 }-->
                <tr>
                    <!--{appnav parent=2 row=4 start=$foo*4-1}-->
                    <td>
                        <a href="<!--{link m='categories' cate_id=$appnav.cate_id}-->" title="<!--{$appnav.cname}-->">
                            <img src="<!--{imageurl url = $appnav.cate_logo}-->">&nbsp;<span><!--{$appnav.cname}--></span>
                        </a>
                    </td>
                    <!--{/appnav}-->
                </tr>
                <!--{/for}-->
            </table>
        </div>
        <div class="noline-grayline"></div>

        <div id="categary_hot_soft"  data-id="<!--{$cate_id}-->" data-parent="2">
            <!--{applist  id=$cate_id start=0 page=$page per_page=15 parent=2 }-->
            <div class="game" >
                <div class="game-pic">
                    <div class="fl">
                        <a href="<!--{link m='app' app_id=$applist.app_id}-->"><img src="<!--{imageurl url =$applist.app_logo}-->" style="height:72px;width:72px;"/></a>
                    </div>
                    <a href="<!--{link m='app' app_id=$applist.app_id}-->">
                        <ul>
                            <li class="fs14 col-333 g-title"><!--{$applist.app_title}--></li>
                            <li class="fs12 col-999"><!--{countdown down=$applist.app_down}-->次下载<span class="none"> | <!--{round($applist.history_size/1024/1024,2)}-->MB</span></li>
                            <li class="fs12 col-666">
                                <span class="btn-s col-999"><!--{$applist.cname}--></span>
                            </li>
                        </ul>
                    </a>
                    <p class="fs14 fr load"><a href="<!--{link m='app' app_id=$applist.app_id}-->" class="col-4FB0E4 btn-a">立即下载</a></p>
                </div>
            </div>
            <!--{/applist}-->
        </div>

        <div class="more mb50">
            <p><a href="javascript:;" class="load-status-normal"><<加载更多</a></p>
        </div>
    </div>

    <!--排行-->
    <div class="ly-ta" style="display:none;" >
        <div id="rankW" data-id="52">
            <!--{recommend id=52 row=3 start=0}-->
            <div class="game">
                <span class="num fs12"><!--{$show_sort_id++}--></span>
                <div class="game-pic ml36">

                    <div class="fl"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"><img src="<!--{imageurl url = $recommend.app_logo}-->" style="height:72px;width:72px;"/></a></div>
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

            <!--{recommend id=52 row=12 start=3}-->
            <div class="game">
                <span class="num fs12 back-none"><!--{$show_sort_id++}--></span>
                <div class="game-pic ml36">

                    <div class="fl"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"><img src="<!--{imageurl url = $recommend.app_logo}-->" style="height:72px;width:72px;"/></a></div>

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
        <div class="more mb50">
            <p><a href="javascript:;" class="list-W"><<加载更多</a></p>
        </div>
    </div>

    <!--foot-->
    <!--{include file="inc_foot.php"}-->
