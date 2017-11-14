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
<div class="wrapper">
    <!--{include file="inc_top.php"}-->
    <!--{include file="inc_menu.php"}-->

<!--main-->
<div class="main">
    <div class="wp">
        <!--游戏/应用信息 start-->
        <div class="row row_lists">
            <!-- 新闻 -->
            <div class="lefts">
                <div class="lefts-title">
                    <h3 class="fl">资讯列表</h3>

                    <p class="fr">
                        <!--{if !$last_cate_id}-->
                        <a href="<!--{link m='infos'}-->" class="current">综合</a>
                        <!--{else}-->
                        <a href="<!--{link m='infos'}-->">综合</a>
                        <!--{/if}-->
                        <!--{infonav}-->
                        <a <!--{if $last_cate_id == $infonav.cate_id}-->class="current"<!--{else}--><!--{/if}--> href="
                        <!--{link m='infos' last_cate_id=$infonav.cate_id}-->"><!--{$infonav.cname}--></a>
                        <!--{/infonav}-->
                    </p>
                </div>
                <div class="lefts-content">
                    <div class="news-top-detail">
                        <ul>
                            <!--{infolist id=$last_cate_id page=$page per_page=10}-->
                            <li>
                                <h2><!--{if $infolist.info_url}--><a href="<!--{$infolist.info_url}-->" target="_blank"><!--{else}-->
                                    <a href="<!--{link m='info' info_id=$infolist.info_id}-->" target="_blank"><!--{/if}-->
                                        <!--{$infolist.info_title}--></a></h2>

                                <p><!--{$infolist.info_desc}--></p>

                                <div class="">
                                    <!--{if $infolist.info_url}--><a href="<!--{$infolist.info_url}-->" target="_blank"><!--{else}-->
                                    <a href="<!--{link m='info' info_id=$infolist.info_id}-->" target="_blank"
                                       class="read-more"><!--{/if}-->[阅读全文]</a>
                                    <span>发布时间：<!--{$infolist.info_update_time|date_format:"%Y-%m-%d"}--></span>
                                </div>
                            </li>
                            <!--{/infolist}-->
                        </ul>
                    </div>

                </div>
                <!-- 分页 begin-->
                <div class="page" style="text-align: center;">
                    <!-- <span class="count">第1/718页 共有：10760条</span>-->
                    <!--{pagebar name='infolist' id=$last_cate_id page=$page per_page=10}-->
                </div>
                <!-- 分页 end -->
            </div>
            <!--  -->
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
                                <!--{recommend id=66 row=10}-->
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

