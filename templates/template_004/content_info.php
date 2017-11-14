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

            <div class="all-detail-item mb10">
                <div class="all-detail-item-title">
                    <h1 class="top-title"><!--{$info.info_title}--></h1>

                    <div class="top-others">
                        <span>时间：<!--{$info.info_update_time|date_format:"%Y-%m-%d"}--></span>
                        <span>作者：<!--{$info.info_author}--></span>
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


        <div class="rights rs">
            <div class="col3 co132 J-rank-wrap J-rank-download" id="section_5">
                <div class="mod mod-rank-list">
                    <div class="hd clearfix">
                        <h2>下载排行榜</h2>
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