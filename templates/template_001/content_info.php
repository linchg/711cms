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

<div class="apps PC">

    <!--{include file="inc_top.php"}-->

    <div class="container">

        <!--{include file="inc_menu.php"}-->

        <div class="news-box">
            <!-- left -->
            <div class="left">
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
                <!--相关评论-->
                <!--{if !empty($comment_code)}-->
                <div class="comments">
                    <div>
                        <h2 class="block-title">评论</h2>
                    </div>
                    <!--{commentcode}-->
                </div>
                <!--{/if}-->
                <!--相关文章-->
                <div class="ly-art">
                    <h2 class="fs16">相关文章<a href="<!--{link m='infos' last_cate_id=$last_cate_id}-->" class="fr">+更多</a></h2>
                    <ul class="fs12">
                        <!--{infolist id=$last_cate_id row=5}-->
                            <li>
                                <!--{if $infolist.info_url}--><a href="<!--{$infolist.info_url}-->" target="_blank"><!--{else}-->
                                <a href="<!--{link m='info' info_id=$infolist.info_id}-->"><!--{/if}--><!--{$infolist.info_title}--></a>
                                <span><!--{$infolist.info_update_time|date_format:"%Y-%m-%d"}--></span>
                            </li>
                        <!--{/infolist}-->
                    </ul>
                </div>
            </div>
            <!-- left -->

            <!-- right -->
            <div class="col-right">
                <div class="infos">
                    <h2 class="block-title">今日推荐</h2>
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