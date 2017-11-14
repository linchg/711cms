<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->" />
    <meta name="description" content="<!--{$setting.seo_description}-->" />
    <!--{include file="inc_head.php"}-->
</head>

<body>
<div class="wrapper">
    <!--{include file="inc_top.php"}-->
    <!--{include file="inc_menu.php"}-->
<!--main-->
<div class="main">
    <div class="wp">
        <!--游戏/应用分类 begin-->
        <dl class="sort_box">
            <dt>搜索列表</dt>
        </dl>
        <!--游戏/应用分类 end-->
        <!--游戏/应用信息 start-->
        <div class="row row_list">
            <div class="article">
                <!--列表 begin-->
                <div id="Mlist" class="Mlist" style="overflow:visible;" data-keyword="<!--{$keywords}-->">
                    <!--{applist search=$keywords row=15}-->
                    <div class="list_item">
                        <div class="Mimg">
                            <img height="72" width="72" alt="<!--{$applist.app_title}-->"
                                 src="<!--{imageurl url =$applist.app_logo}-->"/>
                            <span class="layer"></span>
                            <a href="<!--{link m='app' app_id=$applist.app_id}-->" class="link"
                               target="_blank"></a>
                        </div>
                        <div class="tit_area">
                            <span class="name"><a href="<!--{link m='app' app_id=$applist.app_id}-->"
                                                  target="_blank"><!--{$applist.app_title}--></a></span>
                            <span class="level_mid"><i <!--{countstar star=$applist.app_recomment}-->></i></span>
                        </div>
                        <div class="desc_area">
                            <!--{$applist.app_seodesc}-->...
                        </div>
                        <div class="prop_area">
                            <span>人气：<!--{countdown down=$applist.app_down}--></span>
                            <span>大小：<!--{round($applist.history_size/1024/1024,2)}-->MB</span>
                            <span>更新：<!--{$applist.app_update_time|date_format:"%Y-%m-%d"}--></span>
                        </div>
                        <a href="<!--{link m='app' app_id=$applist.app_id}-->" target="_blank"
                           class="btn">立即下载</a>
                    </div>
                    <!--{/applist}-->

                </div>
                <!--列表 end-->
            </div>
        </div>

        <div class="main">
            <div class="wp">
                <!-- recommend -->
                <div class="module module-recommend">
                    <div class="btitle"><h2 class="ly-moreh"><i></i>精品推荐<a href="<!--{link m='recommends' id=41}-->" class="ly-more">+更多</a></h2></div>
                    <div class="bmeta">
                        <div class="apkbox">
                            <ul class="clearfix">
                                <!--{recommend id=41 row=30}-->
                                <li>
                            <span class="pic">
                                <img src="<!--{imageurl url = $recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->" width="64" height="64">
                            </span>
                            <span class="name"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                                  target="_blank"><!--{$recommend.app_title}--></a></span>
                                    <span class="level"><i <!--{countstar star=$recommend.app_recomment}-->><!--{$recommend.app_grade}-->分</i></span>
                            <span class="btn"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                                 target="_blank">立即下载</a></span>
                                    <span class="layer"></span><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                                                  target="_blank" class="link"></a>
                                </li>
                                <!--{/recommend}-->
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /recommend -->
            </div>
        </div>
        <!--游戏/应用信息 end-->
    </div>
    <!-- /main-->
</div>
</div>
<!--{include file='inc_foot.php'}-->

<script>
    $(function () {
        var child_li = $("#Mlist").children("div").index();
        var keyword = $("#Mlist").attr("data-keyword");
        var html = '';
        if (child_li == -1) {
            html = '<div class="ly-searchkou">';
            html += '<p>抱歉，没有找到符合条件的“<span>' + keyword + '</span>”相关内容！</p>';
            html += '</div>';
            $("#Mlist").append(html);
            $("#today_recommend").show();
        }
    });
 </script>
</body>
</html>