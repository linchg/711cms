<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <meta http-equiv="cache-control" content="no-cache" />
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
<div id="doc">
    <header id="hds">
        <div class="titlebar" id="section_titlebar">
            <a class="g-block go-back" href="javascript:history.back();"></a>
            <span class="sep"></span>

            <h2 class="g-ellipsis title"><!--{mb_substr($info.info_title,0,10,'utf-8')}--></h2>
            <a class="g-block go-home" href="/" id="link-go-home"></a>
        </div>
    </header>
    <!-- bd -->
    <div id="bd">
        <div class="news-deatil">
            <div class="detailed">
                <h1><!--{$info.info_title}--></h1>

                <div class="description">
                    <!--{$info.info_body}-->
                </div>
            </div>
        </div>
   <!--{include file="inc_foot.php"}-->
</body>
</html>