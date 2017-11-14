<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->" />
    <meta name="description" content="<!--{$setting.seo_description}-->" />
    <!--{include file="inc_head.php"}-->
</head>
<body>

<!--{include file="inc_top.php"}-->

<!--{include file="inc_menu.php"}-->

<div class="content clearfix">
    <div class="left">
<!-- 当前位置 -->
        <div class="crumb02">
            <p class="pos">当前位置：<a href="/">首页</a><b>&gt;</b>
                <a href="/">
                    搜索列表
                </a>
            </p>
        </div>
<!-- 当前位置 -->
<div class="box" style="min-height:690px">
    <div class="tablist">
        <div class="list-title clearfix" style="padding-left:0">
            <h2 class="con" title=""><span class="title-bg iconSprite"></span>
                搜索列表
            </h2>
        </div>
        <div class="tab_content">
            <ul class="mod-recom mod-list clearfix" style="_float:left; _width: 425px;" id="Mlist" data-keyword="<!--{$keywords}-->">
                <!--{applist search=$keywords row=15}-->
                <li class="">
                    <div class="mode-app-wrap">
                        <a class="mode-app-name" href="<!--{link m='app' app_id=$applist.app_id}-->" title="<!--{$applist.app_title}-->" target="_blank"><!--{$applist.app_title}--></a>
                        <div class="mode-app">
                            <a class="mode-app-icon" href="<!--{link m='app' app_id=$applist.app_id}-->" title="<!--{$applist.app_title}-->" target="_self">
                                <img src="<!--{imageurl url =$applist.app_logo}-->"  alt="<!--{$applist.app_title}-->">
                            </a>
                            <div class="mode-app-des">
                                <p class="num">
                                <!--{$applist.app_title}-->
                                </p>
                                <!--{round($applist.history_size/1024/1024,2)}-->MB
                                <p class="star-wrap">
                                    <span class="star star-grey">
                                        <span class="star star-light stars-4"></span>
                                    </span>
                                </p>
                                <div class="mode-app-func">
                                    <div class="mod-coll">

                                        <a href="<!--{link m='app' app_id=$applist.app_id}-->" title="<!--{$applist.app_title}-->" class="coll-btn coll-down" ></a>

                                        <a href="<!--{link m='app' app_id=$applist.app_id}-->" title="<!--{$applist.app_title}-->" class="coll-btn coll-love " ></a>
                                    </div>
                                    <span class="score"><!--{$applist.app_grade}--></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <!--{/applist}-->
            </ul>
        </div>
    </div>
    <div class="mod-box layout-1">
        <div class="mod-head">
            <h2 class="cap-recom">精品推荐</h2>
            <p class="mod-class mod-more">
                <a href="<!--{link m='recommends' id=41}-->" title="更多" target="_blank">更多</a>
            </p>
        </div>
        <div class="mod-cont">
            <ul class="mod-recom mod-list clearfix" style="_float:left; _width: 425px;">
                <!--{recommend id=41 row=12}-->
                <li class="">
                    <div class="mode-app-wrap">
                        <a class="mode-app-name" href="<!--{link m='app' app_id=$recommend.app_id}-->"
                           title="<!--{$recommend.app_title}-->" target="_blank"><!--{$recommend.app_title}--></a>

                        <div class="mode-app">
                            <a class="mode-app-icon" href="<!--{link m='app' app_id=$recommend.app_id}-->"
                               title="<!--{$recommend.app_title}-->" target="_self">
                                <img src="<!--{$recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->">
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

                                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                           title="<!--{$recommend.app_title}-->" class="coll-btn coll-down"></a>

                                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                           title="<!--{$recommend.app_title}-->" class="coll-btn coll-love "></a>
                                    </div>
                                    <span class="score"><!--{$recommend.app_grade}-->分</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <!--{/recommend}-->
            </ul>
        </div>
    </div>
</div>

</div>
    <div class="right">
        <!--{include file="right-div.php"}-->
    </div>
</div>
<!--/ 友情链接 -->

<!--{include file="inc_flink.php"}-->

<!--{include file="inc_foot.php"}-->

<script>
    $(function () {
        $('.mod-list li').hover(function () {
            $(this).addClass('hover')
        }, function () {
            $(this).removeClass('hover')
        })
    });
    $(function () {
        var child_li = $("#Mlist").children("li").index();
        var keyword = $("#Mlist").attr("data-keyword");
        var html = '';
        if (child_li == -1) {
            html = '<div class="ly-searchkou">';
            html += '<p>抱歉，没有找到符合条件的“<span>' + keyword + '</span>”相关内容！</p>';
            html += '</div>';
            $("#Mlist").append(html);
        }
    });
</script>
</body>
</html>