<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="data-spm" content="1"/>
    <meta http-equiv="Cache-Control" content="max-age=3600"/>
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->"/>
    <meta name="description" content="<!--{$setting.seo_description}-->"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--{include file="inc_head.php"}-->
</head>
<body>
<!--{include file="inc_top.php"}-->

<div class="container padding-top padding-left padding-right">
    <div  id="game_holdrank" >
        <!--{applist search=$keywords row=15}-->
        <div class="line"  >
            <div class="xs9 xm9 xl9 xb9">
                <a href="<!--{link m='app' app_id=$applist.app_id}-->">
                    <div class="xs3 xm3 xl3 xb3">
                        <img src="<!--{imageurl url =$applist.app_logo}-->" class="radius-big float-left game-icon">
                    </div>
                    <div class="xs9 xm9 xl9 xb9 padding-left">
                        <p class="gamename"><!--{$applist.app_title}--></p>
                        <div class="line padding-bottom padding-top">
                            <span class="star bigstar50 text-left"></span>
                        </div>
                        <p class="text-left height-little margin-small-bottom text-small text-gray"><!--{countdown down=$applist.app_down}-->下载<span>|</span><!--{round($applist.history_size/1024/1024,2)}-->MB</p>
                    </div>
                </a>
            </div>
            <div class="xs3 xm3 xl3 xb3">
                <div class="float-right padding-top"><a href="<!--{link m='app' app_id=$applist.app_id}-->" class="button button-small border-sub">下载</a></div>
            </div>
        </div>
        <hr class="bg-line">
        <!--{/applist}-->
    </div>

</div>
<div class="ajax_loading text-center" style="display:none"><span class="icon-refresh rotate"></span>努力加载中...</div>
<input type="hidden" value="2" id="page_num" loading='no'>
<div class="line" style="height:75px; color:#cccccc;"></div>
<!--footer-->
<!--{include file="inc_menu.php"}-->

<!--{include file="inc_foot.php"}-->