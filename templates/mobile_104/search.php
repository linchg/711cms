<!DOCTYPE HTML>
<html>
<head>
    <!--网页标题-->
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->"/>
    <meta name="description" content="<!--{$setting.seo_description}-->"/>
    <!--{include file="inc_head.php"}-->
</head>
<body>
<div class="container">
    <!--head-->
    <div class="gray-head-bg">
        <header class="search-input">
                <p>
                    <a href="/" class="logo"><img src="<!--{$setting.wap_logo}-->" ></a>
                </p>
                <p class="search-bg">
                    <input type="text" id="search-input" value="<!--{$keywords}-->" onFocus="if(value=='请输入搜索内容'){value='';this.style.color='#333'}" onBlur="if(value==''){value='请输入搜索内容'}" class="search i-search"  data-rewrite="<!--{$setting.is_site_rewrite}-->">
                    <a href="javascript:;" id="search-btn"><img src="<!--{$tpl_path}-->images/search.png"></a>
                </p>
        </header>
    </div>
    <!--------search----------->


    <!--grayline-->
    <div class="grayline  mt50"></div>
    <div class="title2 title-gre">
        <h2 class="fs16">大家都在搜：</h2>
    </div>
    <div class="all-search">
        <ul>
            <!--{keyword row=4}-->
            <li style=" height:30px"><a  href="<!--{link m='search' keywords=$keyword.q}-->"><!--{$keyword.q}--><!--<span class="text-green icon-arrow-up"></span>--></a></li>
            <!--{/keyword}-->
        </ul>
        <div><span class="clear clearfix" ></span></div>
    </div>
    <div class="grayline"></div>
        <!--{applist search=$keywords}-->
    <div class="game">
        <div class="game-pic">
            <div class="fl"><a href="<!--{link m='app' app_id=$applist.app_id}-->">
                    <img src="<!--{imageurl url =$applist.app_logo}-->" style="width: 72px;"/></a></div>
            <a href="<!--{link m='app' app_id=$applist.app_id}-->">
            <ul>
                <li class="fs16 col-333"><!--{$applist.app_title}--></li>
                <li class="fs12 col-999"><!--{countdown down=$applist.app_down}-->次下载<span class="m-none"> | <!--{round($applist.history_size/1024/1024,2)}-->M</span></li>
                <li class="fs12 col-666">
                    <span class="btn-s col-999"><!--{$applist.cname}--></span>
                </li>
            </ul>
            </a>
            <p class="fs14 fr load"><a href="<!--{link m='app' app_id=$applist.app_id}-->" class="col-4FB0E4 btn-a">立即下载</a></p>
        </div>
    </div>
    <!--{/applist}-->
    <!--whiteline-->
    <div class="white-line h50"></div>
    <!--foot-->
    <!--{include file="inc_foot.php"}-->
</div>
</body>
</html>
