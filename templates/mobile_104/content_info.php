<!DOCTYPE HTML>
<html>
<head>
    <!--{if $info.info_title}-->
    <title><!--{$info.info_title}--></title>
    <meta name="keywords" content="<!--{$info.info_seokey}-->" />
    <meta name="description" content="<!--{$info.info_seodesc}-->" />
    <!--{else}-->
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->" />
    <meta name="description" content="<!--{$setting.seo_description}-->" />
    <!--{/if}-->
    <!--{include file="inc_head.php"}-->
</head>

<body>
<div class="container">
    <!--head-->
    <div class="search-head-bg">
        <header class="search-head">
            <h2>
                <a href="javascript:history.back();"><img src="<!--{$tpl_path}-->images/fanhui.png" class="w7"></a>
                <a class="fs24 col-fff">文章详情</a>
                <a href="/"><img src="<!--{$tpl_path}-->images/home.png" class="w14"></a>
            </h2>
        </header>
    </div>

    <!--grayline-->
    <div class="noline-grayline  mt50"></div>

    <!--content-->
    <div class="cont">
        <div class="tit">
            <h1><!--{$info.info_title}--></h1>
            <p class="col-999 fs16">
                时间：<!--{$info.info_update_time|date_format:"%Y-%m-%d"}-->
                作者：<!--{$info.info_author}-->
                来源：<!--{$info.info_from}-->
            </p>
        </div>
        <div class="share">
            <div class="bshare-custom fs16 col-999">分享到：
                <a title="分享到微信" class="bshare-weixin"></a>
                <a title="分享到QQ空间" class="bshare-qzone"></a>
                <a title="分享到新浪微博" class="bshare-sinaminiblog"></a>
                <a title="分享到腾讯微博" class="bshare-qqmb"></a>
            </div>
        </div>

        <div class="article fs14 col-666">
            <!--{$info.info_body}-->
        </div>
    </div>

    <!--dibu-->
    <div class="more dibu fs20">天啦噜！你竟然看到底了</div>
</div>
<script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script>
<script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
<script type="text/javascript">
    $(function(){
        $('.cont .article p img,.cont .article center img,.cont .article p embed').css({"width":"100%","display":"inline-block","height":"auto","vertical-align":"middle"})
        $('.cont .article p embed,.cont .article center img,.cont .article p img').parent("p").css({"text-indent":"0em"})
    })
</script>
</body>
</html>
