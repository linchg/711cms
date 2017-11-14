<!DOCTYPE HTML>
<html>
<head>
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->"/>
    <meta name="description" content="<!--{$setting.seo_description}-->"/>
    <!--{include file="inc_head.php"}-->
</head>

<body>

<div class="container">
    <!--head-->
    <div class="search-head-bg">
        <header class="search-head">
            <h2>
                <a href="/">
                    <img src="<!--{$tpl_path}-->images/fanhui.png" class="w7">
                    <a class="fs24 col-fff">排行榜</a>

                    <input type="hidden" id="search-input" value="请输入搜索内容" onFocus="if(value=='请输入搜索内容'){value='';this.style.color='#333'}" onBlur="if(value==''){value='请输入搜索内容'}" class="search i-search"  data-rewrite="<!--{$setting.is_site_rewrite}-->">
                    <a href="javascript:;" id="search-btn"><img src="<!--{$tpl_path}-->images/white-search.png" class="w14"></a>

            </h2>
        </header>
    </div>
    <!--hot-->
    <div class="hot-bg  mt50 fs12">
        <h2>
            <a  <!--{if $area_id == 69}-->
            class="btn-a"
            <!--{elseif $area_id == 53}-->
            class="btn-a"
            <!--{else}-->
            class="btn-a current-back"
            <!--{/if}-->
            href="<!--{link m='ranks' id=68}-->"
            >下载排行</a>
            <a
            <!--{if $area_id == 53}-->
            class="btn-a"
            <!--{elseif $area_id == 68}-->
            class="btn-a"
            <!--{else}-->
            class="btn-a current-back"
            <!--{/if}-->
            href="<!--{link m='ranks' id=69}-->" class="btn-a ">上升最快</a>
            <a
            <!--{if $area_id == 69}-->
            class="btn-a"
            <!--{elseif $area_id == 68}-->
            class="btn-a"
            <!--{else}-->
            class="btn-a current-back"
            <!--{/if}-->
            href="<!--{link m='ranks' id=53}-->" class="btn-a">最受欢迎</a>
        </h2>
    </div>
    <!--grayline-->
    <div class="grayline"></div>
    <!--content-->
    <!--热门排行榜-->
    <div class="ly-tb">
        <div id="rank_H" data-id="<!--{$area_id}-->">
            <!--{recommend id=$area_id start=0 row=3}-->
            <div class="game">
                <span class="num fs12"><!--{$show_sort_id++}--></span>
                <div class="game-pic ml36">

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
            <!--{recommend id=$area_id start=3 row=12}-->
            <div class="game">
                <span class="num fs12 back-none"><!--{$show_sort_id++}--></span>
                <div class="game-pic ml36">

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
        <div class="more mb50">
            <p><a href="javascript:;" class="list-R"><<加载更多</a></p>
        </div>
    </div>
</div>

<!--foot-->
<div class="foot-bg">
    <!--{include file="inc_foot.php"}-->
</div>

<script>
    $(document).ready(function(){
        $('.hot-bg a').click(function(){
            $(this).addClass("current-back").siblings().removeClass("current-back");
            $('.ly-tb').hide();
            $('.ly-tb').eq($(this).index()).show();
        });//tab 选项卡
    });
</script>

