<!DOCTYPE HTML>
<html>
<head>
    <!--{if $app.app_stitle}-->
    <title><!--{$app.app_stitle}--></title>
    <meta name="keywords" content="<!--{$app.app_seokey}-->" />
    <meta name="description" content="<!--{$app.app_seodesc}-->" />
    <!--{else}-->
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->" />
    <meta name="description" content="<!--{$setting.seo_description}-->" />
    <!--{/if}-->
    <!--{include file="inc_head.php"}-->
</head>

<body>

<div class="container">
    <div class="search-head-bg">
        <header class="search-head">
            <h2>
                <a href="javascript:history.back();">
                    <img src="<!--{$tpl_path}-->images/fanhui.png" class="w7">
                </a><a href="/" class="fs24 col-fff">详情</a>
                <input type="hidden" id="search-input" value="请输入搜索内容" onFocus="if(value=='请输入搜索内容'){value='';this.style.color='#333'}" onBlur="if(value==''){value='请输入搜索内容'}" class="search i-search"  data-rewrite="<!--{$setting.is_site_rewrite}-->">
                <a href="javascript:;" id="search-btn"><img src="<!--{$tpl_path}-->images/white-search.png" class="w14"></a>
            </h2>
        </header>
    </div>

    <div class="content mt50">
        <div class="game01">
            <dl class="game-pic">
                <dt class="fl">
                    <img src="<!--{imageurl url =$app.app_logo}-->" height="72"></dt>
                <dd><!--{$app.app_title}-->（<!--{row name='app_category' id=$app.last_cate_id}--><!--{$row.cname}--><!--{/row}-->）</dd>
                <dd>
                   <span class="level_big">
                       <i id="pfuc_cur" <!--{countstar star=$app.app_recomment}-->></i>
                   </span>
                </dd>
                <dd class="col-ccc"><!--{row name='app_category' id=$app.last_cate_id}--><!--{$row.cname}--><!--{/row}--> | <!--{round($app.history_size/1024/1024,2)}-->M | <!--{countdown down=$app.app_down}-->万次下载</dd>
            </dl>

        </div>
    </div>

    <!--hot-->
    <div class="hot-bg  fs20">
        <h2>
            <a href="javascript:;" class="current-back">简介</a>
            <a href="javascript:;">评论（<span><!--{$comment_count}--></span>）</a>
            <a href="javascript:;">推荐</a>
        </h2>
    </div>
    <!--grayline-->
    <div class="noline-grayline"></div>
    <!--简介-->
<div class="ly-ta">
    <!--title-->
    <div class="title2 title-gre">
        <h2 class="fs30">游戏截图</h2>
    </div>
    <div class="appImg clearf">
        <div class="img">
            <!--{imagelist app_id=$app.app_id}-->
                <a>
                    <img src="<!--{$imagelist.resource_url}-->"/>
                </a>
            <!--{/imagelist}-->
        </div>
    </div>

    <!--grayline-->
    <div class="noline-grayline"></div>
    <!--title-->
    <div class="title2 title-gre">
        <h2 class="fs30">游戏介绍</h2>
    </div>
    <div class="font-con">
        <div class="fs18 col-666">&nbsp;&nbsp;<!--{$app.app_desc}--></div>
    </div>
    <!--title-->
    <div class="title2 title-gre">
        <h2 class="fs30">相似推荐</h2>
    </div>
    <div class="same">
        <!--{relevant cid=$app.last_cate_id order='app_down desc' row=6}-->
            <dl>
                <dt class="pic">
                    <a href="<!--{link m='app' app_id=$relevant.app_id}-->">
                        <img src="<!--{imageurl url =$relevant.app_logo}-->" style="height:72px;">
                    </a>
                </dt>
                <dd class="title fs12">
                    <a href="<!--{link m='app' app_id=$relevant.app_id}-->">
                        <!--{$relevant.app_title}-->
                    </a>
                </dd>
                <dd class="title down-load fs14">
                    <a href="<!--{link m='app' app_id=$relevant.app_id}-->">
                        立即下载
                    </a>
                </dd>
            </dl>
        <!--{/relevant}-->
    </div>
    <!--download-->
    <div class="blue-down">
        <h2><a href="<!--{link m='download' app_id=$app.app_id}-->" class="fs30 col-fff">下载</a></h2>
    </div>
</div>
    <!--评论-->
<div class="ly-ta" style="display: none;">
    <!--content-->
    <!--{if !empty($comment_code)}-->
    <!--{commentcode}-->
    <!--{else}-->
    <div class="content">
        <div class="num-join fs14">
            <h2>综合评分
                <em><!--{$app.app_grade}-->分</em>
                <span class="col-999">
                    <em><!--{$comment_count}--></em>人参与
                </span>
            </h2>
        </div>
    </div>
    <!--grayline-->
    <div class="noline-grayline"></div>
    <!--title-->
    <div class="title2 title-gre title-blue">
        <h2 class="fs30">评论内容</h2>
    </div>
    <!--grayline-->
    <div class="noline-grayline"></div>
    <div class="con-talk">
        <p class="num-t">当前版本(<!--{$comment_count}-->)条评论</p>
        <!--{list name='app_comment' id=$app.app_id row=10}-->
        <div class="commun">
            <h2 class="col-ff5d31 fs24 mb10"><!--{$list.comment_uname}--></h2>
            <ul class="mb10">
                <li class="fs14" style="margin-left:60px;text-indent:0;color:#666"><!--{$list.comment_content}--></li>
            </ul>
            <p class="fs24 col-999 pinglun"><!--{date('Y-m-d H:i',$list.comment_date)}-->
            </p>
        </div>
        <!--{/list}-->
    </div>
    <!--{/if}-->
    <!--download-->
    <div class="blue-down">
        <h2><a href="<!--{link m='download' app_id=$app.app_id}-->" class="fs30 col-fff">下载</a></h2>
    </div>
</div>
    <!--推荐-->
<div class="ly-ta" style="display: none;">
    <div class="title2 title-gre title-blue">
        <h2 class="fs30">安装

            <a href="" class="col-4FB0E4"><!--{$app.app_title}--></a>的人还会下载

        </h2>
    </div>
        <div class="same">
            <!--{relevant cid=$app.last_cate_id order='app_down desc' row=6}-->
            <dl>
                <dt class="pic">
                    <a href="<!--{link m='app' app_id=$relevant.app_id}-->">
                        <img src="<!--{imageurl url =$relevant.app_logo}-->" style="height:72px;">
                    </a>
                </dt>
                <dd class="title fs12">
                    <a href="<!--{link m='app' app_id=$relevant.app_id}-->">
                        <!--{$relevant.app_title}-->
                    </a>
                </dd>
                <dd class="title down-load fs14">
                    <a href="<!--{link m='app' app_id=$relevant.app_id}-->">
                        立即下载
                    </a>
                </dd>
            </dl>
            <!--{/relevant}-->
        </div>
        <!--download-->
        <div class="blue-down">
            <h2><a href="<!--{link m='download' app_id=$app.app_id}-->" class="fs30 col-fff">下载</a></h2>
        </div>
    </div>
</div>

<script >
    $(function(){
        $('.hot-bg a').click(function(){
            $(this).addClass("current-back").siblings().removeClass("current-back");
            $('.ly-ta').hide();
            $('.ly-ta').eq($(this).index()).show();
        });//tab 选项卡


        $("area[rel^='prettyPhoto']").prettyPhoto();
        $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:1000, hideflash: true});

    });
</script>
</body>
</html>
