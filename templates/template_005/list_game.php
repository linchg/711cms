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
    <!--{row name='navicat' id=3}-->
    <title><!--{if $row.navicat_seotitle}--><!--{$row.navicat_seotitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
    <meta name="keywords" content="<!--{if $row.navicat_seokey}--><!--{$row.navicat_seokey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
    <meta name="description" content="<!--{if $row.navicat_seodesc}--><!--{$row.navicat_seodesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
    <!--{/row}-->
    <!--{/if}-->

    <!--{include file="inc_head.php"}-->
</head>
<body>
<div class="wrapper">
    <!--{include file="inc_top.php"}-->
    <!--{include file="inc_menu.php"}-->

<!--main-->
<div class="main">
    <div class="wp">
        <!--游戏/应用分类 begin-->
        <dl class="sort_box">
            <dt>
                全部游戏
            </dt>
            <dd>
                <a href="<!--{link m='games'}-->" <!--{if empty($cate_id)}-->class="current"
                <!--{/if}-->>全部</a>
                <!--{appnav parent=2}-->
                <a href="<!--{link m='games' cate_id=$appnav.cate_id}-->"
                <!--{if $cate_id ==$appnav.cate_id}-->class="current"<!--{/if}-->>
                <!--{$appnav.cname}--></a>
                <!--{/appnav}-->
            </dd>
        </dl>
        <!--游戏/应用分类 end-->
        <!--游戏/应用信息 start-->
        <div class="row row_list">
            <div class="article">
                <!--列表 begin-->
                <div id="Mlist" class="Mlist">
                    <!--{applist parent=2 id=$cate_id page=$page row=10 per_page=10}-->
                    <div class="list_item">
                        <div class="Mimg">
                            <img height="72" width="72" alt="<!--{$applist.app_title}-->"
                                 src="<!--{imageurl url =$applist.app_logo}-->"/>
                            <span class="layer"></span>
                            <a href="<!--{link m='app' app_id=$applist.app_id}-->" class="link"
                               target="_blank"></a>
                        </div>
                        <div class="tit_area">
                            <span class="name"><a href="<!--{link m='app' app_id=$applist.app_id}-->"
                                                  target="_blank"><!--{$applist.app_title}--></a></span>
                            <span class="level_mid"><i <!--{countstar star=$applist.app_recomment}-->></i></span>
                        </div>
                        <div class="desc_area">
                            <!--{$applist.app_seodesc}-->...
                        </div>
                        <div class="prop_area">
                            <span>人气：<!--{countdown down=$applist.app_down}--></span>
                            <span>大小：<!--{round($applist.history_size/1024/1024,2)}-->MB</span>
                            <span>更新：<!--{$applist.app_update_time|date_format:"%Y-%m-%d"}--></span>
                        </div>
                        <a href="<!--{link m='app' app_id=$applist.app_id}-->" target="_blank"
                           class="btn">立即下载</a>
                    </div>

                    <!--{/applist}-->
                </div>
                <!--列表 end-->
                <!--分页 begin-->
                <div class="page" style="text-align: center;">
                    <!--{pagebar name='applist' parent=2 id=$cate_id page=$page per_page=32}-->
                </div>
                <!--分页 end-->
            </div>
            <!--边栏  start-->
            <div class="aside">

                <!--下载排行 begin-->
                <div class="MboxA">
                    <div class="boxA_hd">
                        <h3>下载排行</h3>
                    </div>
                    <div class="boxA_bd">
                        <div class="apklist">
                            <ul class="clearfix">
                                <!--{recommend id=63 row=10}-->
                                <li>
                                    <span class="ord"><!--{$recommend.app_sort_show}--></span>
                                    <span class="pic">
                                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                           target="_blank">
                                            <img height="48" width="48" alt="<!--{$recommend.app_title}-->"
                                                 src="<!--{imageurl url = $recommend.app_logo}-->"/>
                                        </a>
                                    </span>
                                    <span class="name">
                                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                           target="_blank"><!--{$recommend.app_title}--></a>
                                    </span>
                                    <span class="count"><!--{countdown down=$recommend.app_down}-->次下载</span>
                                    <span class="layer"></span>
                                    <a class="link" href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                       target="_blank"></a>
                                </li>
                                <!--{/recommend}-->
                            </ul>
                        </div>
                    </div>
                </div>
                <!--下载排行 end-->
            </div>
            <!--边栏  end-->
        </div>
        <!--游戏/应用信息 end-->
        <!--{include file="inc_flink.php"}-->
    </div>
    <!-- /main-->
</div>
</div>
<!--{include file='inc_foot.php'}-->
</body>
</html>
