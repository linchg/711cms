<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

<div class="content clearfix">

    <div class="left">
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

        <div class="list-title clearfix" style="padding-left:0">
            <h2 class="con" title="新闻资讯"><span class="title-bg iconSprite"></span>新闻资讯</h2>
        </div>
        <div class="tab-1 clearfix">
            <ul>
                <!--{if !$last_cate_id}-->
                <li class="current"><span></span>
                <a href="<!--{link m='infos'}-->" class="current">综合</a>
                </li>
                <!--{else}-->
                <li><span></span>
                    <a href="<!--{link m='infos'}-->" >综合</a>
                </li>
                <!--{/if}-->
                <!--{infonav}-->
                <li
                <!--{if $last_cate_id == $infonav.cate_id}-->class="current"<!--{/if}-->>
                <span></span>
                <a href="<!--{link m='infos' last_cate_id=$infonav.cate_id}-->">
                    <!--{$infonav.cname}--></a>
                </li>
                <!--{/infonav}-->
            </ul>
        </div>

        <div>
            <div class="ly-tab">
                <div class="news-top-detail">
                    <ul>
                        <!--{infolist id=$last_cate_id page=$page per_page=12}-->
                        <li>
                            <h2><!--{if $infolist.info_url}--><a href="<!--{$infolist.info_url}-->" target="_blank">
                                    <!--{else}-->
                                    <a href="<!--{link m='info' info_id=$infolist.info_id}-->" target="_blank">
                                        <!--{/if}-->
                                        <!--{$infolist.info_title}--></a></h2>

                            <p><!--{$infolist.info_desc}--></p>

                            <div class="">
                                <!--{if $infolist.info_url}--><a href="<!--{$infolist.info_url}-->" target="_blank">
                                    <!--{else}-->
                                    <a href="<!--{link m='info' info_id=$infolist.info_id}-->" target="_blank"
                                       class="read-more"><!--{/if}-->[阅读全文]</a>
                                    <span>发布时间：<!--{$infolist.info_update_time|date_format:"%Y-%m-%d"}--></span>
                            </div>
                        </li>
                        <!--{/infolist}-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="page">
            <!--{pagebar name='infolist' id=$last_cate_id page=$page per_page=12}-->
        </div>
    </div>
    <div class="right">
        <!--{include file="right-div.php"}-->
    </div>
</div>


<div class="overlay" id="overlay" style="display: none; height: 1978px;"></div>
<a id="toTop" title="返回顶部" target="_self" href="javascript:void(0)" style="display: none;"><i></i></a>

<script src="<!--{$tpl_path}-->js/index.js"></script>
<!--/ 友情链接 -->

<!--{include file="inc_flink.php"}-->
<!--{include file="inc_foot.php"}-->

<script type="text/javascript">
    (function ($) {
        if ($("#ifDetail").length > 0) {
            detailArgs = {
                ifDetail: true,
                rt: $("#newsResType").length > 0 ? $("#newsResType").val() : $("#appType").val(),
                ri: $("#newsResId").length > 0 ? $("#newsResId").val() : $("#appId").val()
            };
        }
    })(jQuery);

</script>
<script src="<!--{$tpl_path}-->js/base.js" type="text/javascript"></script>

<script type="text/javascript">
    $.lazyImg.start("scroll", {attributeTag: 'o-src'});
    $(function () {
        $("#key").autoSearch();
        //Adapt.init();
        $("#baseLog .log-now").attr("href", "#");
        $(window).scroll(function () {
            toTopHide();
            $("#toTop").click(function () {
                window.scrollTo(0, 0);
                return false;
            });
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $(".tab-1 ul li").click(function () {
            $(this).addClass("current").siblings().removeClass("current");
            $('.ly-tab').hide();
            $('.ly-tab').eq($(this).index()).show();
        });//tab 选项卡
    })
</script>
<script type="text/javascript" src="<!--{$tpl_path}-->js/qc_loader.js" data-appid="100248959" charset="utf-8"></script>
<script src="<!--{$tpl_path}-->js/qc-1.0.1.js" type="text/javascript" data-appid="100248959" charset="utf-8"></script>
<script>
    $(function () {
        $('.app-list li').hover(function () {
            $(this).addClass('curr')
        }, function () {
            $(this).removeClass('curr')
        })
    })
</script>

</body>
</html>
