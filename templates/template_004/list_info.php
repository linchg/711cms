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
<div id="doc4">
    <div id="hd">
        <div class="mod-search-hd-bunny">
            <!--{include file="inc_top.php"}-->
            <!--{include file="inc_menu.php"}-->
        </div>
    </div>

<div id="bd">
    <div class="news-item">
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

                            <div class=""><!--{if $infolist.info_url}--><a href="<!--{$infolist.info_url}-->" target="_blank"><!--{else}-->
                                <a href="<!--{link m='info' info_id=$infolist.info_id}-->" target="_blank"
                                   class="read-more"><!--{/if}-->[阅读全文]</a>
                                <span>发布时间：<!--{$infolist.info_update_time|date_format:"%Y-%m-%d"}--></span>
                            </div>
                        </li>
                        <!--{/infolist}-->
                    </ul>
                </div>
                <!--{pagebar name='infolist' id=$last_cate_id page=$page per_page=10}-->
            </div>
        </div>

        <div class="rights">
            <div class="col3 co132 J-rank-wrap J-rank-download" id="section_5">
                <div class="mod mod-rank-list">
                    <div class="hd clearfix">
                        <h2>下载排行</h2>
                    </div>
                    <div class="bd">
                        <ol class="selected">
                            <!--{recommend id=66 row=10}-->
                            <li>
                                <span
                                    class="s<!--{$recommend.app_sort_show}--> num"><!--{$recommend.app_sort_show}--></span>

                                <div class="soft-info">
                                    <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="pic"
                                       target="_blank"> <img class="png" src="<!--{imageurl url = $recommend.app_logo}-->"
                                                             alt="<!--{$recommend.app_title}-->"/> </a>

                                    <div class="text">
                                        <h4><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                               title="<!--{$recommend.app_title}-->" target="_blank">
                                                <!--{mb_substr($recommend.app_title,0,9,'utf-8')}--> </a></h4>
                                    </div>
                                </div>
                                <a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                   class="bt-install" target="_blank">安装</a>
                            </li>
                            <!--{/recommend}-->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--{include file="inc_flink.php"}-->
</div>
</div>
<!--{include file="inc_foot.php"}-->
<script type="text/javascript" src="<!--{$tpl_path}-->js/bc.js"></script>
</body>
</html>
