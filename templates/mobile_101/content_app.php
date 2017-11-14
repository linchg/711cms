<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="data-spm" content="1"/>
    <meta http-equiv="Cache-Control" content="max-age=3600"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!--{if $app.app_stitle}-->
    <title><!--{$app.app_stitle}--></title>
    <meta name="keywords" content="<!--{$app.app_seokey}-->" />
    <meta name="description" content="<!--{$app.app_seodesc}-->" />
    <!--{else}-->
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->" />
    <meta name="description" content="<!--{$setting.seo_description}-->" />
    <!--{/if}-->

    <!--{include file="inc_head.php"}-->
</head>
<body>
<!--header-->
<div class="header">
    <a href="/"><img src="<!--{$setting.wap_logo}-->" alt="<!--{$setting.site_name}-->" height="55"/></a>
    <a class="back icon-ic_back1-01" href="javascript:history.back();"></a>
</div>


<div class="appAttr">
    <img src="<!--{imageurl url =$app.app_logo}-->">

    <h3><!--{$app.app_title}--></h3>

    <p class="yijuhua"><!--{$app.app_seodesc}--></p>

    <p class="biaoshi">
        <span><!--{countdown down=$app.app_down}-->次下载</span>
    </p>
</div>
<ul class="dlDiv">

    <li>
        <p>
            <a href="<!--{link m='download' app_id=$app.app_id}-->" class="jisu"><i class="icon-ic_down_fast-01"></i><span>极速下载</span></a>
        </p>
    </li>

</ul>
<ul class="appSize">
    <li>
        <span>版本：</span><i class="cssI"><!--{$app.history_version}--></i>
    </li>
    <li>
        <span>大小：</span><i><!--{round($app.history_size/1024/1024,2)}-->MB</i>
    </li>
    <li>
        <span>类型：</span><i><!--{row name='app_category' id=$app.last_cate_id}--><!--{$row.cname}--><!--{/row}--></i>
    </li>
    <li>
        <span>更新：</span><i><!--{$app.app_update_time|date_format:"%Y-%m-%d"}--></i>
    </li>
    <li>
        <span>开发者：</span><i><!--{$app.app_company}--></i>
    </li>
</ul>
<div class="hd">
    <h2>
        游戏截图
    </h2>
</div>
<hr class="line2">
<div class="appImg clearf">
    <div class="img">
        <!--{imagelist app_id=$app.app_id}-->
        <img src="<!--{$imagelist.resource_url}-->"/>
        <!--{/imagelist}-->
    </div>
</div>
<hr class="line">
<div class="hd">
    <h2>
        游戏介绍
    </h2>
</div>
<hr class="line2">
<div class="appInfo details-item-r-text">
    <!--{$app.app_desc}-->
</div>
<div class="controller">
    <span id="btn_open">展开</span>
</div>
<div class="hd">
    <h2>
        相似推荐
    </h2>
</div>
<hr class="line">
<hr class="line2">
<ul class="tuiApp">
    <!--{relevant cid=$app.last_cate_id row=3 order='app_down desc'}-->
    <li>
        <a href="<!--{link m='app' app_id=$relevant.app_id}-->" >
            <img class="lazy" src="<!--{imageurl url =$relevant.app_logo}-->" alt="<!--{$relevant.app_title}-->">
            <h3><!--{$relevant.app_title}--></h3>
        </a>
    </li>
    <!--{/relevant}-->
</ul>
<!--footer-->

<!--{include file="inc_foot.php"}-->
<script>
    $(function(){
        $("#btn_open").toggle(function(){
            $(this).addClass("close");
            $(".details-item-r-text").addClass("current_detail");
        },function(){
            $(this).removeClass("close");
            $(".details-item-r-text").removeClass("current_detail");
        });//详情隐藏

    });
</script>
</body>
</html>