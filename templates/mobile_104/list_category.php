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
                <a href="javascript:history.back();"><img src="<!--{$tpl_path}-->images/fanhui.png" class="w7"></a>
                <a href="/" class="fs24 col-fff"><!--{row name='app_category' id=$id }--><!--{$row.cname}--><!--{/row}--></a>
                <input type="hidden" id="search-input" value="请输入搜索内容" onFocus="if(value=='请输入搜索内容'){value='';this.style.color='#333'}" onBlur="if(value==''){value='请输入搜索内容'}" class="search i-search"  data-rewrite="<!--{$setting.is_site_rewrite}-->">
                <a href="javascript:;" id="search-btn"><img src="<!--{$tpl_path}-->images/white-search.png" class="w14"></a>
            </h2>
        </header>
    </div>

    <!--grayline-->
    <div class="grayline  mt50"></div>
    <div id="categary_hot_soft"  data-id="<!--{$id}-->">
        <!--{applist id=$id row=15 }-->
        <div class="game">
            <div class="game-pic">
                <div class="fl"><a href="<!--{link m='app' app_id=$applist.app_id}-->">
                        <img src="<!--{imageurl url =$applist.app_logo}-->" style="width: 72px;"/></a></div>
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
    <div class="more">
        <p><a href="javascript:;" class="load-status-normal"><<加载更多</a></p>
    </div>
    <!--whiteline-->
    <div class="white-line h50"></div>

    <!--foot-->
    <!--{include file="inc_foot.php"}-->
</div>
</body>
</html>
