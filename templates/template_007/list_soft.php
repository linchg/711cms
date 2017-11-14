<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--{if $cate_id}-->
    <!--{row name='app_category' id=$cate_id}-->
    <title><!--{if $row.ctitle}--><!--{$row.ctitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
    <meta name="keywords"
          content="<!--{if $row.ckey}--><!--{$row.ckey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->"/>
    <meta name="description"
          content="<!--{if $row.cdesc}--><!--{$row.cdesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->"/>
    <!--{/row}-->
    <!--{else}-->
    <!--{row name='navicat' id=2}-->
    <title><!--{if $row.navicat_seotitle}--><!--{$row.navicat_seotitle}--><!--{else}--><!--{$setting.seo_title}-->
        <!--{/if}--></title>
    <meta name="keywords"
          content="<!--{if $row.navicat_seokey}--><!--{$row.navicat_seokey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->"/>
    <meta name="description"
          content="<!--{if $row.navicat_seodesc}--><!--{$row.navicat_seodesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->"/>
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
            <p class="pos">当前位置：<a href="/">首页</a><b>&gt;</b><a href="<!--{link m='softs'}-->">安卓软件</a><!--{if $cate_id}-->
                <!--{row name='app_category' id=$cate_id}--><b>&gt;</b><a
                    href="<!--{link m='softs' cate_id=$cate_id}-->"><!--{$row.cname}--></a><!--{/row}--><!--{/if}-->
            </p>
        </div>
        <div class="list-title clearfix" style="padding-left:0">
            <h2 class="con" title="安卓软件"><span class="title-bg iconSprite"></span>安卓软件</h2>
        </div>
        <div class="tab-1 clearfix">
            <ul>
                <li
                <!--{if $order == 0}--> class="current" <!--{/if}-->>
                <span></span>
                <a href="<!--{link m='softs' cate_id=$cate_id page=$page}-->" title="安卓最新软件">最新</a>
                </li>

                <li
                <!--{if $order == 1}--> class="current" <!--{/if}-->>
                <span></span>
                <a href="<!--{link m='softs' cate_id=$cate_id order=1 page=$page}-->" title="安卓最热软件">最热</a>
                </li>

                <li
                <!--{if $order == 2}--> class="current" <!--{/if}-->>
                <span></span>
                <a href="<!--{link m='softs' cate_id=$cate_id order=2 page=$page}-->" title="安卓五星软件">评分</a>
                </li>
            </ul>
        </div>
        <div>
            <div class="ly-tab">
                <!--{applist parent=1 id=$cate_id order=$order_by page=$page per_page=14}-->
                <ul class="app-list">
                    <li class="first  list-li">
                        <div class="border-out-2"></div>
                        <div class="list-in" style="margin-top:2px;width: ">
                            <div class="list-left">
                                <a href="<!--{link m='app' app_id=$applist.app_id}-->" target="_blank"
                                   class="app-img-out" title="<!--{$applist.app_title}-->">
                                    <i class="iconSprite-2 sign sign-1"></i>
                                    <img class="app-img" src="<!--{$applist.app_logo}-->"
                                         alt="<!--{$applist.app_title}-->">
                                </a>

                                <div class="app-v">
                                    <div class="star-bg iconSprite">
                                        <div class="stars iconSprite stars-<!--{$applist.app_recomment}-->"></div>
                                    </div>

                                    <p class="update-time"><!--{$applist.app_update_time|date_format:"%y/%m/%d"}--><i
                                            class="up-icon-1 iconSprite"></i></p>

                                </div>
                                <div class="app-h">
                                    <a href="<!--{link m='app' app_id=$applist.app_id}-->" title="<!--{$applist.app_title}-->" class="down-btn" >立即下载</a>
                                </div>
                            </div>
                            <div class="list-right">
                                <div class="mark" style="display:block">
                                    <span class="red"></span>
                                    <a href="<!--{link m='app' app_id=$applist.app_id}-->" title="<!--{$applist.app_title}-->" class="iconSprite " ></a>
                                </div>
                                <p class="g-name">
                                    <a href="<!--{link m='app' app_id=$applist.app_id}-->" target="_blank"
                                       title="<!--{$applist.app_title}-->"><!--{$applist.app_title}--></a>
                                </p>

                                <p class="g-desc">

                                    <a href="<!--{link m='app' app_id=$applist.app_id}-->" title="安卓安全保密"
                                       target="_blank">安全保密</a>

                                </p>

                                <p class="g-detail">
                                    <span><!--{$applist.app_update_time|date_format:"%m-%d"}--></span> |
                                    <!--{round($applist.history_size/1024/1024/2)}-->MB
                                </p>

                                <p class="down-ac">
                                    版本：<!--{$applist.history_version}-->
                                </p>

                                <p>
                                    <!--{$applist.app_desc}-->
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
                <!--{/applist}-->
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="page">
            <!--{pagebar name='applist' parent=1 id=$cate_id order=$order page=$page per_page=14}-->
        </div>
    </div>
    <div class="right">
        <div class="right-div">
            <div class="list-title clearfix">
                <h2 class="con" title="软件筛选"><span class="title-bg iconSprite"></span>软件筛选</h2>
            </div>
            <div class="div-out">
                <div class="right-ul-bd">
                    <ul class="game-lx">
                        <li
                        <!--{if $cate_id>0}--><!--{else}-->class="cur"<!--{/if}-->>
                        <a href="<!--{link m='softs'}-->" title="全部">全部</a>
                        </li>
                        <!--{appnav parent=1}-->
                        <li
                        <!--{if $cate_id == $appnav.cate_id}-->class="cur"<!--{/if}--> >
                        <a href="<!--{link m='softs' cate_id=$appnav.cate_id}-->"><!--{$appnav.cname}--></a>
                        </li>
                        <!--{/appnav}-->
                    </ul>
                </div>
            </div>
        </div>

        <!--右下角今日推荐-->
        <div class="right-div list-img">
            <!--{recommend id=31}-->
            <a href="<!--{link m='necessaries'}-->" title="<!--{$recommend.area_title}-->" target="_blank">
                <img src="http://t007.171cms.com/uploads/images/e5b94c1d2638104fdd3b32c4e073608b.jpg" width="100">
            </a>
            <!--{/recommend}-->
        </div>


        <div class="right-div">
            <div class="list-title clearfix">
                <h2 class="con"><span class="title-bg iconSprite"></span>
                    <!--{row name='recommend' id=40}--><!--{$row.area_title}--><!--{/row}-->
                </h2>
            </div>
            <ul class="recom-list">
                <!--{recommend id=40 row=4}-->
                <li class="right-ul-bd">
                    <div class="recom-detail">
                        <a class="recom-name" target="_blank" title="<!--{$recommend.app_title}-->"
                           href="<!--{link m='app' app_id=$recommend.app_id}-->">
                            <!--{$recommend.app_title}-->
                        </a>

                        <div class="star-bg iconSprite">
                            <div class="stars iconSprite stars-<!--{$recommend.app_recomment}-->"></div>
                        </div>
                        <p class="recom-lx"><!--{$recommend.cname}--></p>
                    </div>
                    <a class="recom-img" target="_blank" title="<!--{$recommend.app_title}-->"
                       href="<!--{link m='app' app_id=$recommend.app_id}-->">
                        <span class="li-img-out" style="font-style: italic;"></span>
                        <img class="game-img-2" src="<!--{$recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->">
                    </a>
                </li>
                <!--{/recommend}-->
            </ul>
        </div>

    </div>
</div>

<div class="overlay" id="overlay" style="display: none; height: 1978px;"></div>
<a id="toTop" title="返回顶部" target="_self" href="javascript:void(0)" style="display: none;"><i></i></a>

<script src="<!--{$tpl_path}-->js/index.js"></script>
<!--/ 友情链接 -->

<!--{include file="inc_flink.php"}-->

<!--{include file="inc_foot.php"}-->
<script type="application/javascript">
    $('.first a').click(function () {
        $('.first a').removeClass('first');
        $(this).addClass('first');
        $('.app_list').hide().eq($(this).index()).show();
    });
</script>

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
