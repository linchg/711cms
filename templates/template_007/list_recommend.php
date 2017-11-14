<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--{row name='navicat' id=4}-->
<title><!--{if $row.navicat_seotitle}--><!--{$row.navicat_seotitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
<meta name="keywords" content="<!--{if $row.navicat_seokey}--><!--{$row.navicat_seokey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
<meta name="description" content="<!--{if $row.navicat_seodesc}--><!--{$row.navicat_seodesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
<!--{/row}-->
<!--{include file="inc_head.php"}-->
</head>

<body>

<!--{include file="inc_top.php"}-->

<!--{include file="inc_menu.php"}-->

<div class="content clearfix">
    <div class="left">
        <!--{row name='recommend' id=$id}-->
            <div class="crumb02">
                <p class="pos">当前位置：<a href="/">首页</a><b>&gt;</b>
                    <a href="/">
                        <!--{$row.area_title}-->
                    </a>
                </p>
            </div>
            <div class="list-title clearfix" style="padding-left:0">
                <h2 class="con" title=""><span class="title-bg iconSprite"></span>
                        <!--{$row.area_title}-->
                </h2>
            </div>
        <!--{/row}-->
        <div class="mod-cont">
            <ul class="mod-recom mod-list clearfix" style="_float:left; _width: 425px;">
                <!--{recommend id=$id page=$page per_page=16}-->
                <li class="">
                    <div class="mode-app-wrap">
                        <a class="mode-app-name" href="<!--{link m='app' app_id=$recommend.app_id}-->" title="<!--{$recommend.app_title}-->" target="_blank"><!--{$recommend.app_title}--></a>
                        <div class="mode-app">
                            <a class="mode-app-icon" href="<!--{link m='app' app_id=$recommend.app_id}-->" title="<!--{$recommend.app_title}-->" target="_self">
                                <img src="<!--{$recommend.app_logo}-->"  alt="<!--{$recommend.app_title}-->">
                            </a>
                            <div class="mode-app-des">
                                <p class="num">
                                    <!--{$recommend.app_title}-->
                                </p>
                                <!--{round($recommend.history_size/1024/1024,2)}-->MB
                                <p class="star-wrap">
                                    <span class="star star-grey">
                                        <span class="star star-light stars-<!--{$recommend.app_recomment}-->"></span>
                                    </span>
                                </p>
                                <div class="mode-app-func">
                                    <div class="mod-coll">

                                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" title="<!--{$recommend.app_title}-->" class="coll-btn coll-down" ></a>

                                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" title="<!--{$recommend.app_title}-->" class="coll-btn coll-love " ></a>
                                    </div>
                                    <span class="score"><!--{$recommend.app_recomment}-->分</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <!--{/recommend}-->
            </ul>
            <!--{pagebar name='recommend_list' id=$id page=$page per_page=16}-->
        </div>
    </div>
    <div class="right">
        <!--{include file="right-div.php"}-->
    </div>
</div>








<div class="overlay" id="overlay" style="display: none; height: 1978px;"></div>
<a id="toTop" title="返回顶部" target="_self" href="javascript:void(0)" style="display: none;"><i></i></a>

<script src="<!--{$tpl_path}-->js/index.js"></script>

<!--{include file="inc_foot.php"}-->


<script type="text/javascript">
    (function ($) {
        if($("#ifDetail").length > 0) {
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
    $.lazyImg.start("scroll", { attributeTag: 'o-src' });
    $(function(){
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
