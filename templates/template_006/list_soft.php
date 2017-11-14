<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--{if $cate_id}-->
<!--{row name='app_category' id=$cate_id}-->
<title><!--{if $row.ctitle}--><!--{$row.ctitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
<meta name="keywords" content="<!--{if $row.ckey}--><!--{$row.ckey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
<meta name="description" content="<!--{if $row.cdesc}--><!--{$row.cdesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
<!--{/row}-->
<!--{else}-->
<!--{row name='navicat' id=2}-->
<title><!--{if $row.navicat_seotitle}--><!--{$row.navicat_seotitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
<meta name="keywords" content="<!--{if $row.navicat_seokey}--><!--{$row.navicat_seokey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
<meta name="description" content="<!--{if $row.navicat_seodesc}--><!--{$row.navicat_seodesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
<!--{/row}-->
<!--{/if}-->
<!--{include file="inc_head.php"}-->
</head>

<body>

<!--{include file="inc_top.php"}-->

<!--{include file="inc_menu.php"}-->

<!-- 当前位置 推荐位 -->
<div class="box">
    <p class="pos">当前位置：<a href="/">首页</a><b>&gt;</b><a href="<!--{link m='softs'}-->">软件</a><!--{if $cate_id}--><!--{row name='app_category' id=$cate_id}--><b>&gt;</b><a href="<!--{link m='softs' cate_id=$cate_id}-->"><!--{$row.cname}--></a><!--{/row}--><!--{/if}--></p>
</div>
<div class="box">
    <div class="tablist">
        <div class="tab_tit">
            <h1><!--{row name='recommend' id=29}--><!--{$row.area_title}--><!--{/row}--></h1>
            <!--
            <ul class="tab_t" id="li_num">        
            </ul>-->
        </div>
        <div class="tab_con">
            <ul class="list_tj" id="li_scroll" style="margin-left: -952px;">
                <!--{recommend id=29 row=16}-->
                <li>
                    <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="pic" target="_blank" ><img src="<!--{imageurl url = $recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->" width="72" height="72"></a>
                    <p><a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank" ><!--{$recommend.app_title}--></a></p>
                </li>
                <!--{/recommend}-->                                          
            </ul>
        </div>
    </div>
</div>
<!-- 当前位置 推荐位 -->

<div class="box">
    <!-- 左侧软件类型、热门标签-->
    <div class="b_sub fl">
        <div class="sub_tit">软件类型</div>
        <div class="sort">
            <a href="<!--{link m='softs'}-->" <!--{if $cate_id>0}--><!--{else}-->class="sort_on"<!--{/if}-->>全部</a>
            <!--{appnav parent=1}-->
            <a href="<!--{link m='softs' cate_id=$appnav.cate_id}-->"  <!--{if $cate_id == $appnav.cate_id}-->class="sort_on"<!--{/if}-->><!--{$appnav.cname}--></a>
            <!--{/appnav}-->
        </div>
        <span class="pic_gap"></span>
        <div class="sub_tit">热门标签</div>
        <div class="hot_label">
            <!--{keyword}-->
                <a href="<!--{link m='search' keywords=$keyword.q}-->"><!--{$keyword.q}--></a>
            <!--{/keyword}-->    
        </div>
        <span class="pic_gap"></span>  
    </div>
    <!-- 左侧软件类型、热门标签-->

    <!-- 右侧软件列表 -->
    <div class="b_main fr">
        <div class="sub_tit">
            <div class="order">
                <a <!--{if $order == 0}--> class="order_on" <!--{/if}--> href="<!--{link m='softs' cate_id=$cate_id page=$page}-->">更新时间<s></s></a>
                <a <!--{if $order == 1}--> class="order_on" <!--{/if}--> href="<!--{link m='softs' cate_id=$cate_id order=1 page=$page}-->">下载次数<s></s></a>
            </div>
            全部软件
        </div>
        <ul class="app_list" id="app_down">
            <!--{applist page=$page order=$order_by parent=1 id=$cate_id  per_page=18}-->
            <li>
                <a href="<!--{link m='app' app_id=$applist.app_id}-->" class="pic" target="_blank">
                    <img src="<!--{imageurl url =$applist.app_logo}-->" width="72" height="72" alt="<!--{$applist.app_title}-->">
                </a>
                <div class="app_name">
                    <a href="<!--{link m='app' app_id=$applist.app_id}-->" target="_blank"><!--{$applist.app_title}--></a>
                </div>
                <p><!--{$applist.cname}--> / <!--{round($applist.history_size/1024/1024,2)}-->MB</p>
                <p><!--{countdown down=$applist.app_down}-->人在用</p>
            </li>
            <!--{/applist}-->                  
        </ul>
        <!--{pagebar name='applist' parent=1 id=$cate_id order=$order page=$page row=18 per_page=18}-->
    </div>
    <!-- 右侧软件列表 -->
</div>
<!--{include file="inc_flink.php"}-->
<!--{include file="inc_foot.php"}-->
</body>
</html>
