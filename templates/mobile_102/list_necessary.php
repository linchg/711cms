<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="data-spm" content="1"/>
    <meta http-equiv="Cache-Control" content="max-age=3600"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--{row name='navicat' id=4}-->
    <title><!--{$row.navicat_seotitle}--></title>
    <meta name="keywords" content="<!--{$row.navicat_seokey}-->" />
    <meta name="description" content="<!--{$row.navicat_seodesc}-->" />
    <!--{/row}-->

    <!--{include file="inc_head.php"}-->
</head>
<body>
        <!--nav-->
        <div class=" text-center nav-color elementwidth text-big padding-left padding-right" style="height: 40px">
            <div class="line">
                <div class="xl2 xs2 xm2 xb2 padding-small-top">
                    <a href="/"><span class="icon-home text-white text-large"></span></a>
                </div>
               <div class="xl7 xs7 xm7 xb7" style="margin-top: 5px;">
            <div class="button-group button-group-small choose bg radius">
                <a href="#" class="button nav-font " id="month" onclick="soft_rank()">软件必备</a>
                <a href="#" class="button nav-font nav-color text-white " id="week" onclick="game_rank()">游戏必备</a>
               
            </div>
        </div>
                <div class="xl2 xs2 xm2 xb2 padding-small-top">
                    <a href="javascript:void(0)" id="search"><span class="icon-search text-white" style="font-size: 20px"></span></a>
                </div>
            </div>
        </div>
        <div class="hidden" id="dialog" style="position:fixed;left:0;top:0;right:0;bottom:0;background:#FFFFFF;z-index:10;display:block;overflow-x:hidden;overflow-y:auto;">
            <div class="text-center elementwidth text-big padding-left padding-right bg-sub" style="height: 40px">
                <form method="get" action="#" class="form-inline">
                    <div class="line">
                        <div class="xl2 xs2 xm2 xb2 margin-small-top">
                            <span class="icon-angle-left text-large text-white" id="close"></span>
                        </div>
                        <div class="xl8 xs8 xm8 xb8 margin-small-top">
                            <input type="text" class="input" value="" name="keyword" placeholder="精品应用、海量搜索"  style="height: 30px"  data-url="/index.php?c=index&m=search" id="search-input" onkeydown="if(event.keyCode == 13) search_app()">
                        </div>
                        <div class="xl2 xs2 xm2 xb2 margin-small-top">
                            <button type="button" id="search-btn" onclick="search_app()" class="button button-small bg"><span class="icon-search text-sub"></span></button>
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
    <li style=" height:40px" ><a href="<!--{link m='search' keywords=$keyword.q}-->"><!--{$keyword.q}--><!--<span class="text-green icon-arrow-up"></span>--></a></li>
    <!--{/keyword}-->
</ul>
</div>
</div>
        </div>
        <!--banner-->

        <!--{list name='necessary' type=1}-->
        <div class="container padding-top padding-left padding-right" id="soft_list">
            <!--{necessary id=$list.necessary_id}-->
               <div class="line">
                <div class="xs9 xm9 xl9 xb9">
                    <a href="<!--{link m='app' app_id=$necessary.app_id}-->">
                        <div class="xs3 xm3 xl3 xb3">
                            <img src="<!--{imageurl url =$necessary.app_logo}-->" class="radius-big float-left game-icon">
                        </div>
                        <div class="xs9 xm9 xl9 xb9 padding-left">
                            <p class="gamename"><!--{$necessary.app_title}--></p>
                            <div class="line padding-bottom padding-top">
                                <span class="star bigstar50 text-left"></span>
                            </div>
                            <p class="text-left height-little margin-small-bottom text-small text-gray"><!--{countdown down=$necessary.app_down}-->下载<span>|</span><!--{round($necessary.history_size/1024/1024,2)}-->MB</p>
                        </div>
                    </a>
                </div>
                <div class="xs3 xm3 xl3 xb3">
                    <div class="float-right padding-top"><a href="<!--{link m='app' app_id=$necessary.app_id}-->" class="button button-small border-sub">下载</a></div>
                </div>
            </div>
            <hr class="bg-line">
            <!--{/necessary}-->
            </div>
        <!--{/list}-->
        <!--{list name='necessary' type=2}-->
        <div class="container padding-top padding-left padding-right" style="display:none;" id="game_list">
            <!--{necessary id=$list.necessary_id}-->
            <div class="line">
                <div class="xs9 xm9 xl9 xb9">
                    <a href="<!--{link m='app' app_id=$necessary.app_id}-->">
                        <div class="xs3 xm3 xl3 xb3">
                            <img src="<!--{imageurl url =$necessary.app_logo}-->" class="radius-big float-left game-icon">
                        </div>
                        <div class="xs9 xm9 xl9 xb9 padding-left">
                            <p class="gamename"><!--{$necessary.app_title}--></p>
                            <div class="line padding-bottom padding-top">
                                <span class="star bigstar50 text-left"></span>
                            </div>
                            <p class="text-left height-little margin-small-bottom text-small text-gray"><!--{countdown down=$necessary.app_down}-->下载<span>|</span><!--{round($necessary.history_size/1024/1024,2)}-->MB</p>
                        </div>
                    </a>
                </div>
                <div class="xs3 xm3 xl3 xb3">
                    <div class="float-right padding-top"><a href="<!--{link m='app' app_id=$necessary.app_id}-->" class="button button-small border-sub">下载</a></div>
                </div>
            </div>
            <hr class="bg-line">
            <!--{/necessary}-->
        </div>
        <!--{/list}-->
<div class="ajax_loading text-center" style="display:none"><span class="icon-refresh rotate"></span>努力加载中...</div>
 <input type="hidden" value="2" id="page_num" loading='no'>
        <div class="line" style="height:75px; color:#cccccc;"></div>
        <!--footer-->
        <!--{include file="inc_menu.php"}-->
<script>
    var height= $(window).height();
    $('#search').click(function(){
        $('#dialog').removeClass('hidden');
        $('#dialog').height(height);
    });
    $('#close').click(function(){
        $('#dialog').addClass('hidden');
    });
</script>
<script type="text/javascript">
    //banner
    var swiper = new Swiper('.swiper-container', {
        loop:true,
        pagination: '.swiper-pagination',
        paginationClickable: true
    });
</script>
<script>
    function soft_rank(){
        $("#soft_list").css('display','block');
        $("#game_list").css('display','none');
    }
    function game_rank(){
        $("#soft_list").css('display','none');
        $("#game_list").css('display','block');
    }
</script>
<!--{include file="inc_foot.php"}-->