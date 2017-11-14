<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->" />
    <meta name="description" content="<!--{$setting.seo_description}-->" />
    <!--{include file="inc_head.php"}-->
</head>

<body>

<div id="header">
    <!--{include file="inc_top.php"}-->
    <div class="erjinav clearfix">

        <!--{include file="inc_menu.php"}-->
    </div>
</div>


<div id="main" class="layout">
    <!-- inner -->
    <div class="inner">
        <div class="leibie">
            <div class="clearfix">
                <p class="leibie_l">搜索列表：</p>
            </div>
        </div>
        <div class="box gamebox">
            <ul class="ifenlei clearfix" id="j-wc-rect" data-keyword="<!--{$keywords}-->">
                <!--{applist search=$keywords row=15}-->
                <li>
                    <div class="ifenlei_list clearfix">
                        <a href="<!--{link m='content_app' app_id=$applist.app_id}-->" class="app_90">
                            <i class="app_img_90"></i>
                            <img src="<!--{imageurl url =$applist.app_logo}-->">
                        </a>

                        <p class="app_tit_90"><a href="<!--{link m='content_app' app_id=$applist.app_id}-->">
                                <!--{$applist.app_title}--></a></p>

                        <div class="app_intro"><!--{countdown down=$applist.app_down}-->人安装 ·
                            <!--{round($applist.history_size/1024/1024,2)}-->MB

                        </div>
                        <a href="<!--{link m='content_app' app_id=$applist.app_id}-->" target="_blank"
                           class="app_intro">立即下载</a>

                        <p class="app_star_90"><span class="star bigstar30"></span></p>

                    </div>
                </li>
                <!--{/applist}-->
            </ul>
        </div>
    </div>

    <div class="ihot" id="today_recommend" style="display: none;">
        <div class="itit">
            <a href="<!--{link m='list_recommend' id=42}-->" class="more" target="_blank" id="hod">更多</a>
            <a href="javascript:;" class="itita">热门排行</a>
        </div>
        <ul class="ihot_list">
            <!--{recommend id=42 row=14}-->
            <li>
                <div class="ihot_list"><a>
                    </a><a href="<!--{link m='content_app' app_id=$recommend.app_id}-->" class="app_100">
                        <i class="app_img_100"></i>
                        <img src="<!--{imageurl url = $recommend.app_logo}-->">
                    </a>

                    <p class="app_tit_100"><a href="<!--{link m='content_app' app_id=$recommend.app_id}-->"
                                              target="_blank"><!--{$recommend.app_title}--></a></p>

                    <p class="app_info"><a href="<!--{link m='list_game' cate_id=$recommend.cate_id}-->"
                                           target="_blank"><!--{$recommend.cname}--></a> ·
                        <!--{round($recommend.history_size/1024/1024,2)}-->MB</p>

                    <div class="iremen_dwon"><a
                            href="<!--{link m='content_app' app_id=$recommend.app_id}-->">立即下载</a></div>
                </div>
            </li>
            <!--{/recommend}-->
        </ul>
    </div>
    <!--/ inner -->

    <!--{include file="inc_flink.php"}-->
</div>

<script>
    $(function(){
        var child_li = $("#j-wc-rect").children("li").index();
        var keyword = $("#j-wc-rect").attr("data-keyword");
        var html = '';
        if(child_li == -1){
            html = '<div class="ly-searchkou">';
            html += '<p>抱歉，没有找到符合条件的“<span>'+ keyword +'</span>”相关内容！</p>';
            html += '</div>';
            $("#j-wc-rect").append(html);
            $("#today_recommend").show();
        }
    });
</script>

<!--{include file="inc_foot.php"}-->
