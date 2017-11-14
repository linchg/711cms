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

<div class="apps PC">
    <!--{include file="inc_top.php"}-->
    <div class="container">
        <!--{include file="inc_menu.php"}-->
        <div class="news-box">
            <!-- left -->
            <div class="left">
                <div class="left-title">
                    <h3 class="fl">资讯列表</h3>
                    <p class="fr">
                        <!--{if !$last_cate_id}-->
                        <a href="<!--{link m='infos'}-->" class="current">综合</a>
                        <!--{else}-->
                        <a href="<!--{link m='infos'}-->">综合</a>
                        <!--{/if}-->
                        <!--{infonav}-->
                        <!--{if $last_cate_id == $infonav.cate_id}-->
                        <a href="<!--{link m='infos' last_cate_id=$infonav.cate_id}-->" class="current"><!--{$infonav.cname}--></a>
                        <!--{else}-->
                        <a href="<!--{link m='infos' last_cate_id=$infonav.cate_id}-->"><!--{$infonav.cname}--></a>
                        <!--{/if}-->
                        <!--{/infonav}-->
                    </p>
                </div>
                <div class="left-content">
                    <div class="news-top-detail">
                        <ul>
                            <!--{infolist id=$last_cate_id page=$page per_page=10}-->
                            <li>
                                <h2><!--{if $infolist.info_url}--><a href="<!--{$infolist.info_url}-->" target="_blank"><!--{else}--><a href="<!--{link m='info' info_id=$infolist.info_id}-->"><!--{/if}--><!--{$infolist.info_title}--></a></h2>
                                <p><!--{$infolist.info_desc}--></p>
                                <div class="">
                                    <!--{if $infolist.info_url}--><a href="<!--{$infolist.info_url}-->" target="_blank"><!--{else}--><a href="<!--{link m='info' info_id=$infolist.info_id}-->" class="read-more"><!--{/if}-->
                                    [阅读全文]</a>
                                    <span>发布时间：<!--{$infolist.info_update_time|date_format:"%Y-%m-%d"}--></span>
                                </div>
                            </li>
                            <!--{/infolist}-->
                        </ul>
                    </div>
                    <!--{pagebar name='infolist' id=$last_cate_id page=$page per_page=10}-->
                </div>
                
            </div>
            <!-- left -->
            <!-- right -->
            <div class="col-right">
                <div class="infos">
                    <h2 class="block-title"><!--{row name='recommend' id=40}--><!--{$row.area_title}--><!--{/row}--></h2>
                    <ul class="side-list">
                        <!--{recommend id=29 row=5}-->
                        <li>
                            <a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank">
                                <img src="<!--{imageurl url = $recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->下载" />
                            </a>
                            <p>
                                <a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank">
                                    <!--{$recommend.app_title}-->
                                </a>
                                <br />
                                <span>下载：<!--{$recommend.app_down}--> 次</span>
                            </p>
                            <a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank" class="install-btn">下载</a>
                        </li>
                        <!--{/recommend}-->
                    </ul>
                    <div class="clearfix" style="height:25px"></div>
                    <h2 class="block-title">装机必备</h2>
                    <ul class="side-list">
                        <!--{recommend id=31 row=5}-->
                        <li>
                            <a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank">
                                <img src="<!--{imageurl url = $recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->下载" />
                            </a>
                            <p>
                                <a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank">
                                    <!--{$recommend.app_title}-->
                                </a>
                                <br />
                                <span>下载：<!--{$recommend.app_down}--> 次</span>
                            </p>
                            <a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank" class="install-btn">下载</a>
                        </li>
                        <!--{/recommend}-->
                    </ul>
                </div>
            </div>
            <!--/ right -->
        </div>
    </div>
</div>
<!--{include file="inc_flink.php"}-->
<!--{include file="inc_foot.php"}-->
</body>
</html>