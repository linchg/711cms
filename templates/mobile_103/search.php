<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <meta http-equiv="cache-control" content="no-cache" />
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->"/>
    <meta name="description" content="<!--{$setting.seo_description}-->"/>

    <!--{include file="inc_head.php"}-->
</head>
<body>
<div id="doc">
    <header id="hds">
        <div class="titlebar" id="section_titlebar">
            <a class="g-block go-back" href="javascript:history.back();" ></a>
            <span class="sep"></span>
            <h2 class="g-ellipsis title">搜索列表</h2>
            <a class="g-block go-home" href="/" id="link-go-home"></a>
        </div>
    </header>
    <!-- bd -->
    <!--------search----------->
    <div class="ly-search">
        <p>
            <input type="text" value="请输入搜索内容" onFocus="if(value=='请输入搜索内容'){value=''}" onBlur="if(value==''){value='请输入搜索内容'}" class="i-search" id="search-input" data-rewrite="<!--{$setting.is_site_rewrite}-->">
            <a href="javascript:;" id="search-btn"></a>
        </p>
    </div>

    <div id="bd">
            <ul id="section_hot_soft" class="soft_list">
                <!--{applist search=$keywords row=15}-->
                <li>
                    <a href="<!--{link m='app' app_id=$applist.app_id}-->" class="con">
                        <img src="<!--{imageurl url =$applist.app_logo}-->" class="photo" />
                        <div class="info">
                            <span class="size"><!--{round($applist.history_size/1024/1024,2)}-->MB <br /><!--{countdown down=$applist.app_down}-->次下载 </span>
                        </div>
                        <div class="detail">
                            <h3><!--{$applist.app_title}--></h3>
                            <div class="stars_holder">
                                <div class="stars" <!--{countstar star=$applist.app_recomment}-->></div>
                            </div>
                        </div>
                    </a>
                    <a href="<!--{link m='app' app_id=$applist.app_id}-->" class="down"> <span>下载</span> </a>
                </li>
                <!--{/applist}-->
            </ul>
    </div>
<!--{include file="inc_foot.php"}-->
</div>
</body>
</html>