<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="data-spm" content="1"/>
    <meta http-equiv="Cache-Control" content="max-age=3600"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->"/>
    <meta name="description" content="<!--{$setting.seo_description}-->"/>
    <!--{include file="inc_head.php"}-->
</head>
<body>
<!--{include file="inc_top.php"}-->


<div class="swiper-container">
    <div class="swiper-wrapper">
        <!--{ad id=32}-->
        <div class="swiper-slide"><a href="<!--{$ad.link}-->"><img src="<!--{$ad.image}-->" class="img-responsive"></a></div>
        <!--{/ad}-->
    </div>
    <div class="swiper-pagination"></div>
</div>
<div class=" line border-bottom border-gray padding-top padding-bottom text-center">
    <a href="<!--{link m='specials'}-->"><div class=" xl6 xs6 xm6 xb6" ><img src="<!--{$tpl_path}-->images/zhuanti.png" class="img-responsive" style="display: inline">&nbsp精品专题</div></a>
    <a href="<!--{link m='necessaries'}-->"><div class=" xl6 xs6 xm6 xb6" ><img src="<!--{$tpl_path}-->images/zixun.png" class="<!--{$tpl_path}-->img-responsive" style="display: inline">&nbsp装机必备</div></a>

</div>

<div class="container padding-top padding-left padding-right le-tabview">
    <!-- title -->
    <div class="g-title header">
        <h2 class="title">软件</h2>
        <ul class="le-tabs">
            <li id="section_game_hot_tab" class=""><a href="javascript:void(0)"  onclick="soft_hold()">热门</a></li>
            <li id="section_game_rank1_tab" class=""><a href="javascript:void(0)"  onclick="soft_gift()">精品</a></li>
            <li id="section_game_rank2_tab" class="active"><a href="javascript:void(0)"  onclick="soft_soar()">飙升</a></li>

        </ul>
    </div>
    <!--/ title -->

    <div id="soft_holdrank" >
        <!--{recommend id="45" row=15}-->
    <div class="line">
        <div class="xs9 xm9 xl9 xb9">
            <a href="<!--{link m='app' app_id=$recommend.app_id}-->">
                <div class="xs3 xm3 xl3 xb3">
                    <img src="<!--{imageurl url = $recommend.app_logo}-->" class="radius-big float-left game-icon">
                </div>
                <div class="xs9 xm9 xl9 xb9 padding-left">
                    <p class="gamename"><!--{$recommend.app_title}--></p>
                    <div class="line padding-bottom padding-top">
                        <span class="star bigstar50 text-left"></span>
                    </div>
                    <p class="text-left height-little margin-small-bottom text-small text-gray"><!--{countdown down=$recommend.app_down}-->下载<span>|</span><!--{round($recommend.history_size/1024/1024,2)}-->MB</p>
                </div>
            </a>
        </div>
        <div class="xs3 xm3 xl3 xb3">
            <div class="float-right padding-top"><a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="button button-small border-sub">下载</a></div>
        </div>
    </div>
    <hr class="bg-line">
        <!--{/recommend}-->
</div>


    <div  id="soft_giftrank" style="display:none;">
        <!--{recommend id="47" row=15}-->
    <div class="line"  >
        <div class="xs9 xm9 xl9 xb9">
            <a href="<!--{link m='app' app_id=$recommend.app_id}-->">
                <div class="xs3 xm3 xl3 xb3">
                    <img src="<!--{imageurl url = $recommend.app_logo}-->" class="radius-big float-left game-icon">
                </div>
                <div class="xs9 xm9 xl9 xb9 padding-left">
                    <p class="gamename"><!--{$recommend.app_title}--></p>
                    <div class="line padding-bottom padding-top">
                        <span class="star bigstar50 text-left"></span>
                    </div>
                    <p class="text-left height-little margin-small-bottom text-small text-gray"><!--{countdown down=$recommend.app_down}-->下载<span>|</span><!--{round($recommend.history_size/1024/1024,2)}-->MB</p>
                </div>
            </a>
        </div>
        <div class="xs3 xm3 xl3 xb3">
            <div class="float-right padding-top"><a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="button button-small border-sub">下载</a></div>
        </div>
    </div>
    <hr class="bg-line">
        <!--{/recommend}-->
    </div>


    <div  id="soft_soarrank" style="display:none;">
        <!--{recommend id="49" row=15}-->
        <div class="line" >
            <div class="xs9 xm9 xl9 xb9">
                <a href="<!--{link m='app' app_id=$recommend.app_id}-->">
                    <div class="xs3 xm3 xl3 xb3">
                        <img src="<!--{imageurl url = $recommend.app_logo}-->" class="radius-big float-left game-icon">
                    </div>
                    <div class="xs9 xm9 xl9 xb9 padding-left">
                        <p class="gamename"><!--{$recommend.app_title}--></p>
                        <div class="line padding-bottom padding-top">
                            <span class="star bigstar50 text-left"></span>
                        </div>
                        <p class="text-left height-little margin-small-bottom text-small text-gray"><!--{countdown down=$recommend.app_down}-->下载<span>|</span><!--{round($recommend.history_size/1024/1024,2)}-->MB</p>
                    </div>
                </a>
            </div>
            <div class="xs3 xm3 xl3 xb3">
                <div class="float-right padding-top"><a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="button button-small border-sub">下载</a></div>
            </div>
        </div>
        <hr class="bg-line">
        <!--{/recommend}-->
    </div>

    <!-- title -->
    <div class="g-title header" style="margin:20px 0 10px;">
        <h2 class="title">游戏</h2>
        <ul class="le-tabs">
            <li id="section_game_hot_tab" class=""><a href="javascript:void(0)" onclick="game_hold()">热门</a></li>
            <li id="section_game_rank1_tab" class=""><a href="javascript:void(0)" onclick="game_gift()">精品</a></li>
            <li id="section_game_rank2_tab" class="active"><a href="javascript:void(0)" onclick="game_soar()">飙升</a></li>

        </ul>
    </div>
    <!--/ title -->



    <div  id="game_holdrank" >
        <!--{recommend id="46" row=15}-->
        <div class="line" >
            <div class="xs9 xm9 xl9 xb9">
                <a href="<!--{link m='app' app_id=$recommend.app_id}-->">
                    <div class="xs3 xm3 xl3 xb3">
                        <img src="<!--{imageurl url = $recommend.app_logo}-->" class="radius-big float-left game-icon">
                    </div>
                    <div class="xs9 xm9 xl9 xb9 padding-left">
                        <p class="gamename"><!--{$recommend.app_title}--></p>
                        <div class="line padding-bottom padding-top">
                            <span class="star bigstar50 text-left"></span>
                        </div>
                        <p class="text-left height-little margin-small-bottom text-small text-gray"><!--{countdown down=$recommend.app_down}-->下载<span>|</span><!--{round($recommend.history_size/1024/1024,2)}-->MB</p>
                    </div>
                </a>
            </div>
            <div class="xs3 xm3 xl3 xb3">
                <div class="float-right padding-top"><a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="button button-small border-sub">下载</a></div>
            </div>
        </div>
        <hr class="bg-line">
        <!--{/recommend}-->
    </div>

    <div  id="game_giftrank" style="display:none;">
        <!--{recommend id="48" row=15}-->
        <div class="line" >
            <div class="xs9 xm9 xl9 xb9">
                <a href="<!--{link m='app' app_id=$recommend.app_id}-->">
                    <div class="xs3 xm3 xl3 xb3">
                        <img src="<!--{imageurl url = $recommend.app_logo}-->" class="radius-big float-left game-icon">
                    </div>
                    <div class="xs9 xm9 xl9 xb9 padding-left">
                        <p class="gamename"><!--{$recommend.app_title}--></p>
                        <div class="line padding-bottom padding-top">
                            <span class="star bigstar50 text-left"></span>
                        </div>
                        <p class="text-left height-little margin-small-bottom text-small text-gray"><!--{countdown down=$recommend.app_down}-->下载<span>|</span><!--{round($recommend.history_size/1024/1024,2)}-->MB</p>
                    </div>
                </a>
            </div>
            <div class="xs3 xm3 xl3 xb3">
                <div class="float-right padding-top"><a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="button button-small border-sub">下载</a></div>
            </div>
        </div>
        <hr class="bg-line">
        <!--{/recommend}-->
    </div>

    <div  id="game_soarrank" style="display:none;">
        <!--{recommend id="50" row=15}-->
        <div class="line" >
            <div class="xs9 xm9 xl9 xb9">
                <a href="<!--{link m='app' app_id=$recommend.app_id}-->">
                    <div class="xs3 xm3 xl3 xb3">
                        <img src="<!--{imageurl url = $recommend.app_logo}-->" class="radius-big float-left game-icon">
                    </div>
                    <div class="xs9 xm9 xl9 xb9 padding-left">
                        <p class="gamename"><!--{$recommend.app_title}--></p>
                        <div class="line padding-bottom padding-top">
                            <span class="star bigstar50 text-left"></span>
                        </div>
                        <p class="text-left height-little margin-small-bottom text-small text-gray"><!--{countdown down=$recommend.app_down}-->下载<span>|</span><!--{round($recommend.history_size/1024/1024,2)}-->MB</p>
                    </div>
                </a>
            </div>
            <div class="xs3 xm3 xl3 xb3">
                <div class="float-right padding-top"><a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="button button-small border-sub">下载</a></div>
            </div>
        </div>
        <hr class="bg-line">
        <!--{/recommend}-->
    </div>

</div>


<input type="hidden" value="2" id="page_num" loading='no'>
<div class="line" style="height:75px; color:#cccccc;"></div>
<!--footer-->
<!--{include file="inc_menu.php"}-->
<script>
    function soft_hold(){
        $("#soft_holdrank").css('display','block');
        $("#soft_giftrank").css('display','none');
        $("#soft_soarrank").css('display','none');
    }
    function soft_gift(){
        $("#soft_soarrank").css('display','none');
        $("#soft_giftrank").css('display','block');
        $("#soft_holdrank").css('display','none');
    }
    function soft_soar(){
        $("#soft_soarrank").css('display','block');
        $("#soft_giftrank").css('display','none');
        $("#soft_holdrank").css('display','none');
    }
    function game_soar(){
        $("#game_soarrank").css('display','block');
        $("#game_giftrank").css('display','none');
        $("#game_holdrank").css('display','none');
    }
    function game_gift(){
        $("#game_giftrank").css('display','block');
        $("#game_soarrank").css('display','none');
        $("#game_holdrank").css('display','none');
    }
    function game_hold(){
        $("#game_holdrank").css('display','block');
        $("#game_soarrank").css('display','none');
        $("#game_giftrank").css('display','none');
    }
</script>
<!--{include file="inc_foot.php"}-->