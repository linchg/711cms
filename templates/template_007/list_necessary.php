<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!--{row name='navicat' id=4}-->
    <title><!--{if $row.navicat_seotitle}--><!--{$row.navicat_seotitle}--><!--{else}--><!--{$setting.seo_title}-->
        <!--{/if}--></title>
    <meta name="keywords"
          content="<!--{if $row.navicat_seokey}--><!--{$row.navicat_seokey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->"/>
    <meta name="description"
          content="<!--{if $row.navicat_seodesc}--><!--{$row.navicat_seodesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->"/>
    <!--{/row}-->
    <!--{include file="inc_head.php"}-->
</head>

<body>

<!--{include file="inc_top.php"}-->

<!--{include file="inc_menu.php"}-->

<div class="content clearfix">

    <div class="left">
        <div class="list-title clearfix" style="padding-left:0">
            <!--{row name='navicat' id=4}-->
            <h2 class="con" title="<!--{$row.navicat_name}-->"><span class="title-bg iconSprite"></span><!--{$row.navicat_name}-->
            </h2>
            <!--{/row}-->
            <div class="crumb02 crumb02_bak">
                <!--{list name='necessary'}-->
                <a
                <!--{if (isset($necessary_type) && $necessary_type ==$list.necessary_type) || ($necessary_type ==0 && $list.special_sort_show==1)  }-->
                class="current"<!--{/if}--> href="<!--{link m='necessaries' necessary_type=$list.necessary_type}-->">
                <!--{$list.necessary_title}-->
                </a>
                <!--{/list}-->
            </div>
        </div>


        <div class="mod-special">

            <div class="mod-special-list">
                <div class="hd clearfix">
                    <h2></h2>
                </div>
                <div class="bd ">
                    <div class="slide slide4">
                        <!--{list name='necessary' type=$necessary_type}-->
                        <div class="js-roll"
                             style="visibility: visible; overflow: hidden; position: relative; z-index: 2; left: 0px; width: 860px;">
                            <ul style="margin: 0px; padding: 0px; position: relative; list-style-type: none; z-index: 1; left: 0px;width: 860px;">
                                <!--{necessary id=$list.necessary_id page=$page per_page=40}-->
                                <li style="overflow: hidden; float: left; width: 81px; height: 116px;">
                                    <a class="pic tsicon" href="<!--{link m='app' app_id=$necessary.app_id}-->"
                                       title="<!--{$necessary.app_title}-->" target="">

                                        <img src="<!--{imageurl url =$necessary.app_logo}-->"
                                             alt="<!--{$necessary.app_title}-->">
                                    </a>

                                    <h3 class="js-pro-name" style="display: block;"><!--{$necessary.app_title}--></h3>
                                    <a href="<!--{link m='app' app_id=$necessary.app_id}-->"
                                       class="js-btn bt-install" style="display: none;" target="_blank">安装</a>
                                </li>
                                <!--{/necessary}-->
                            </ul>
                        </div>
                        <!--{/list}-->
                        <!--{pagebar name='necessary_list' type=$necessary_type page=$page per_page=40}-->
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="<!--{$tpl_path}-->js/bc.js"></script>
            <script src="<!--{$tpl_path}-->js/slides.120313.js"></script>
            <script>
                $(function () {
                    $(".slide .js-roll-list").each(function (i) {
                        if ($(this).find('li').length) {

                            $(this).jcl({
                                btnNext: ".js-next" + i,
                                btnPrev: ".js-prev" + i,
                                afterEnd: function () {
                                    if (window.PicLazyUtil) {
                                        PicLazyUtil.pushImgs();
                                        PicLazyUtil.testImgs();
                                    }
                                },
                                circular: false,
                                scroll: 6,
                                visible: 1,
                                speed: 600

                            });
                        }

                    });

                    $("body").delegate(".js-roll li", "mouseenter", function () {
                        $(this).find(".js-pro-name").hide().siblings(".js-btn").css("display", "inline-block");
                    });

                    $("body").delegate(".js-roll li", "mouseleave", function () {
                        $(this).find(".js-pro-name").show().siblings(".js-btn").hide();
                    });
                });
            </script>
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
