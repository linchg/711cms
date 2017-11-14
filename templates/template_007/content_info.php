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

<!--{include file="inc_top.php"}-->
<!--{include file="inc_menu.php"}-->

<div class="content clearfix">
    <div class="lefts">

        <div class="list-title clearfix" style="padding-left:0">
            <h2 class="con" title="新闻资讯"><span class="title-bg iconSprite"></span>新闻资讯</h2>
            <div class="crumb02">
                <p class="pos">当前位置：<a href="/">首页</a><b>&gt;</b>
                    <a href="<!--{link m='infos'}-->">资讯</a>
                    <!--{if $last_cate_id}-->
                    <!--{row name='info_category' id=$last_cate_id}--><b>&gt;</b>
                    <a href="<!--{link m='infos' cate_id=$last_cate_id}-->">
                        <!--{$row.cname}--></a>
                    <!--{/row}--><!--{/if}-->
                </p>
            </div>
        </div>
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
                    <p>　　<!--{$info.info_body}--></p>
                </div>
                <div class="next-prev-item">
                    <a href="#" class="fl"></a>
                    <a href="#" class="fr"></a>
                </div>
        </div>
        <div class="ly-art">
            <h2 class="fs16">相关文章
                <a href="<!--{link m='infos' last_cate_id=$last_cate_id}-->" class="fr"
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
    <div class="right">
        <!--{include file="right-div.php"}-->
    </div>

</div>

<div class="overlay" id="overlay" style="display: none; height: 1978px;"></div>
<a id="toTop" title="返回顶部" target="_self" href="javascript:void(0)" style="display: none;"><i></i></a>
<!--/ 友情链接 -->

<!--{include file="inc_flink.php"}-->
<div class="ft">
    <!--{include file="inc_foot.php"}-->
</div>

<script type="text/javascript" src="<!--{$tpl_path}-->js/tinyscrollbar.js"></script>
<script type="text/javascript" src="<!--{$tpl_path}-->js/detail.js"></script>
<script type="text/javascript" src="<!--{$tpl_path}-->js/bc.js"></script>
</body>
</html>
