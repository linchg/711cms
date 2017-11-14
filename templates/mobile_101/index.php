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

<div class="header">
    <a href="/"><img src="<!--{$setting.wap_logo}-->" alt="<!--{$setting.site_name}-->" height="55"/></a>
</div>
<div class="big-banner">
    <div id="slideBox" class="slideBox">
        <div class="bd">
            <div class="tempWrap">
                <ul>
                    <!--{ad id=32}-->
                    <li>
                        <a href="<!--{$ad.link}-->"><img src="<!--{$ad.image}-->" alt="<!--{$ad.alt}-->"></a>
                    </li>
                    <!--{/ad}-->
                </ul>
            </div>
        </div>
        <div class="hdli">
            <ul>
                <li class=""></li>
                <li class="on"></li>
                <li class=""></li>
            </ul>
        </div>
    </div>
</div>
<script>
    TouchSlide({
        slideCell: "#slideBox",
        titCell: ".hdli ul",
        mainCell: ".bd ul",
        effect: "leftLoop",
        autoPage: true,
        autoPlay: true
    });

</script>
<!--menu-->
<!--{include file="inc_menu.php"}-->
<hr class="line3">
<!--search-->
<div class="searchDiv">
    <table class="search" border="0" cellspacing="0" cellpadding="0">
        <form id="search-form" action="/index.php?c=index&m=search">
            <tr>
                <td class="input">
                    <input type="text" placeholder="精品应用、海量搜索" id="search-input" data-rewrite="<!--{$setting.is_site_rewrite}-->"
                           name="keyword"/>
                    <span class="delTxt icon-ic_dele-01"></span>
                </td>
                <td class="sear-btn">
                    <span class="icon-ic_search-01"></span>
                    <input type="button" value="" id="search-btn"/>
                </td>
            </tr>
        </form>
    </table>
</div>
<div class="hotWord">
    <strong>热词</strong>
    <!--{keyword row=4}-->
    <a href="<!--{link m='search' keywords=$keyword.q}-->"><!--{$keyword.q}--></a>
    <!--{/keyword}-->
</div>
<hr class='line2'>
<!--都在玩-->
<div class="allWanDiv">

    <ul class="allWan">
        <!--{infolist id=2 row=5}-->
        <li>
            <a href="<!--{link m='info' info_id=$infolist.info_id}-->" title="<!--{$infolist.info_title}-->">
                <!--{$infolist.info_title}--></a>
        </li>
        <!--{/infolist}-->
    </ul>
</div>
<hr class="line"/>
<!--周精品-->
<div class="hd">
    <h2>
        精品推荐
    </h2>
    <a href="" title="" class="more icon-ic_back2-01"></a>
</div>
<hr class='line2'>
<ul class="app none1">
    <!--{recommend id=67 row=9}-->
    <li>
        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class='link'>
            <img src="<!--{imageurl url = $recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->"/>

            <h3><!--{$recommend.app_title}--></h3>

            <p><!--{$recommend.cname}--> <!--{round($recommend.history_size/1024/1024,2)}-->M</p>
        </a>
        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="download">下载</a>
    </li>
    <!--{/recommend}-->
</ul>
<hr class="line3"/>
<!--网游-->
<div class="hd">
    <h2>
        下载排行
    </h2>
    <a href="/olgame/" class="more icon-ic_back2-01"></a>
</div>
<hr class='line2'>
<div class="tui">
    <!--{recommend id=68 row=1 start=0}-->
    <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class='link'>
        <img src="<!--{imageurl url = $recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->"/>

        <h3><!--{$recommend.app_title}--></h3>

        <p><!--{round($recommend.history_size/1024/1024,2)}-->M  <!--{countdown down=$recommend.app_down}-->次下载</p>

        <p><!--{$recommend.app_seodesc}--></p>
    </a>
    <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="download">下载</a>
    <!--{/recommend}-->

</div>
<hr class='line2'>
<ul class="app sma none2">
    <!--{recommend id=68 row=9 start=1}-->
    <li>
        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class='link'>
            <img src="<!--{imageurl url = $recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->"/>

            <h3><!--{$recommend.app_title}--></h3>

            <p><!--{$recommend.cname}--> <!--{round($recommend.history_size/1024/1024,2)}-->M</p>
        </a>
        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="download">下载</a>
    </li>
    <!--{/recommend}-->
</ul>
<hr class="line3"/>
<div class="hd">
    <h2>
        上升最快
    </h2>
    <a href="/olgame/" class="more icon-ic_back2-01"></a>
</div>
<hr class='line2'>
<div class="tui">
    <!--{recommend id=69 row=1 start=0}-->
    <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class='link'>
        <img src="<!--{imageurl url = $recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->"/>

        <h3><!--{$recommend.app_title}--></h3>

        <p><!--{round($recommend.history_size/1024/1024,2)}-->M  <!--{countdown down=$recommend.app_down}-->次下载</p>

        <p><!--{$recommend.app_seodesc}--></p>
    </a>
    <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="download">下载</a>
    <!--{/recommend}-->
</div>
<hr class='line2'>
<ul class="app sma none2">
    <!--{recommend id=69 row=9}-->
    <li>
        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class='link'>
            <img src="<!--{imageurl url = $recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->"/>

            <h3><!--{$recommend.app_title}--></h3>

            <p><!--{$recommend.cname}--> <!--{round($recommend.history_size/1024/1024,2)}-->M</p>
        </a>
        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="download">下载</a>
    </li>
    <!--{/recommend}-->

</ul>
<hr class="line3"/>
<div class="hd">
    <h2>
        最受欢迎
    </h2>
    <a href="#" class="more icon-ic_back2-01"></a>
</div>
<hr class='line2'>
<div class="tui">
    <!--{recommend id=53 row=1 start=0}-->
    <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class='link'>
        <img src="<!--{imageurl url = $recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->"/>

        <h3><!--{$recommend.app_title}--></h3>

        <p><!--{round($recommend.history_size/1024/1024,2)}-->M  <!--{countdown down=$recommend.app_down}-->次下载</p>

        <p><!--{$recommend.app_seodesc}--></p>
    </a>
    <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="download">下载</a>
    <!--{/recommend}-->

</div>
<hr class='line2'>
<ul class="app sma none2">
    <!--{recommend id=53 row=9}-->
    <li>
        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class='link'>
            <img src="<!--{imageurl url = $recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->"/>

            <h3><!--{$recommend.app_title}--></h3>

            <p><!--{$recommend.cname}--> <!--{round($recommend.history_size/1024/1024,2)}-->M</p>
        </a>
        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="download">下载</a>
    </li>
    <!--{/recommend}-->
</ul>
<hr class="line3"/>
<!--精彩专题-->
<div class="hd">
    <h2>
        精彩专题
    </h2>
    <a href="" class="more icon-ic_back2-01"></a>
</div>
<hr class='line2'>
<div class="spe-div">
    <ul class="spe none3">
        <!--{list name='special'}-->
        <li>
            <a href="<!--{link m='special' special_id=$list.area_id}-->" title="">
                <div class='spe-img'>
                    <img src="<!--{$list.area_logo}-->" alt="<!--{$list.area_title}-->"/>
                </div>
                <h3><!--{$list.area_title}--></h3>
            </a>
        </li>
        <!--{/list}-->
    </ul>
</div>
<hr class="line3"/>
<!--特色分类-->

<hr class="line3"/>
<!--footer-->

<!--{include file="inc_foot.php"}-->

</body>
</html>