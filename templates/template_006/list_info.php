<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--{if $last_cate_id}-->
<!--{row name='info_category' id=$last_cate_id}-->
<title><!--{if $row.ctitle}--><!--{$row.ctitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
<meta name="keywords" content="<!--{if $row.ckey}--><!--{$row.ckey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
<meta name="description" content="<!--{if $row.cdesc}--><!--{$row.cdesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
<!--{/row}-->
<!--{else}-->
<!--{row name='navicat' id=5}-->
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

<!-- 当前位置 -->
<div class="box">
    <p class="pos">当前位置：<a href="/">首页</a><b>&gt;</b><a href="<!--{link m='infos'}-->">资讯</a><!--{if $last_cate_id}--><!--{row name='info_category' id=$last_cate_id}--><b>&gt;</b><a href="<!--{link m='infos' cate_id=$last_cate_id}-->"><!--{$row.cname}--></a><!--{/row}--><!--{/if}--></p>
</div>
<!-- 当前位置 -->

<!-- news_list  recommend_app_list -->
<div class="box">
    <div class="article_main fl">
        <ul class="ar_list">
            <!--{infolist id=$last_cate_id page=$page per_page=8}-->
            <li>
                <h2><!--{if $infolist.info_url}--><a href="<!--{$infolist.info_url}-->" target="_blank"><!--{else}-->
                    <a target="_blank" href="<!--{link m='info' info_id=$infolist.info_id}-->" target="_blank"><!--{/if}-->
                        <!--{$infolist.info_title}--></a></h2>
                <p><b>浏览次数：<!--{$infolist.info_visitors}--></b><b>更新时间：<!--{$infolist.info_update_time|date_format:"%Y-%m-%d"}--></b></p>
            </li>
            <!--{/infolist}-->           
        </ul>
        <!--{pagebar name='infolist' id=$last_cate_id page=$page per_page=8}-->    
    </div>
    <div class="article_sub fr">
        <div class="ad_300x250"><img src="<!--{$tpl_path}-->images/bansub.jpg"></div>
        <span class="pic_gap"></span>
        <div class="tj_app">
            <div class="sub_tit"><!--{row name='recommend' id=29}--><!--{$row.area_title}--><!--{/row}--></div>
            <ul>
                <!--{recommend id=29 row=6}-->
                <li>
                    <a target="_blank" href="<!--{link m='app' app_id=$recommend.app_id}-->"><img src="<!--{imageurl url = $recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->" width="50" height="50"></a>
                    <div class="app_name"><a target="_blank" href="<!--{link m='app' app_id=$recommend.app_id}-->"><!--{$recommend.app_title}--></a></div>
                    <p><a target="_blank" href="<!--{link m='app' app_id=$recommend.app_id}-->" class="btn_new">下载</a>15.8万+人在玩</p>
                </li>
                <!--{/recommend}-->                           
            </ul>
        </div>
    </div>
</div>
<!--{include file="inc_flink.php"}-->

<!--{include file="inc_foot.php"}-->
</body>
</html>