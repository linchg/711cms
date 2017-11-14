<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<div class="wrapper">
<!--{include file="inc_top.php"}-->
<!--{include file="inc_menu.php"}-->

<!--main-->
<div class="main">
    <div class="wp">
        <!--游戏/应用信息 start-->
        <div class="row row_lists">

            <div class="lefts">

                <div class="all-detail-item mb10">
                    <div class="all-detail-item-title">
                        <h1 class="top-title"><!--{$info.info_title}--></h1>

                        <div class="top-others">
                            <span>时间：<!--{$info.info_update_time|date_format:"%Y-%m-%d"}--></span>
                            <span>作者：<!--{$info.info_author}--></span>
                            <span>来源：<!--{$info.info_from}--></span>
                            <span>来源：<!--{$info.info_from}--></span>
                            <span>浏览量：<!--{$info.info_visitors}--></span>
                        </div>
                    </div>
                    <div class="all-detail-item-content">
                        <!--{$info.info_body}-->
                    </div>
                    <div class="next-prev-item">
                        <a href="#" class="fl"></a>
                        <a href="#" class="fr"></a>
                    </div>
                </div>

                <div class="ly-art">
                    <h2 class="fs16">相关文章<a href="<!--{link m='infos' last_cate_id=$last_cate_id}-->" class="fr"
                                            style="color:#0B99BC">+更多</a></h2>
                    <ul class="fs12">
                        <!--{infolist id=$last_cate_id row=5}-->
                        <li>
                            <!--{if $infolist.info_url}--><a href="<!--{$infolist.info_url}-->" target="_blank"><!--{else}-->
                            <a href="<!--{link m='info' info_id=$infolist.info_id}-->"><!--{/if}-->
                                <!--{$infolist.info_title}--></a>
                            <span><!--{$infolist.info_update_time|date_format:"%Y-%m-%d"}--></span>
                        </li>
                        <!--{/infolist}-->
                    </ul>
                </div>
            </div>


            <!--边栏  start-->
            <div class="aside">
                <!--下载排行 begin-->
                <div class="MboxA mt10">
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
<!--{include file="inc_foot.php"}-->
</body>
</html>
