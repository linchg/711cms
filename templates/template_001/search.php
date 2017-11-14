<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->" />
    <meta name="description" content="<!--{$setting.seo_description}-->" />
    <!--{include file="inc_head.php"}-->
</head>

<body>

<div class="apps PC">

    <!--{include file="inc_top.php"}-->

    <div class="container">

        <!--{include file="inc_menu.php"}-->

        <div class="app-box">
            <span class="block-title">搜索列表</span>
            <ul id="j-wc-rect" class="wc-rect clearfix" data-keyword="<!--{$keywords}-->">
                <!--{applist search=$keywords row=15}-->
                <li class="card" >
                    <div class="icon-wrap">
                        <a href="<!--{link m='app' app_id=$applist.app_id}-->" target="_blank">
                            <img src="<!--{imageurl url =$applist.app_logo}-->" width="68" height="68" alt="<!--{$applist.app_title}-->" class="icon" />
                        </a>
                    </div>
                    <div class="app-desc">
                        <a href="<!--{link m='app' app_id=$applist.app_id}-->" title="<!--{$applist.app_title}-->" class="name">
                            <!--{$applist.app_title}-->
                        </a>
                        <div class="meta">
                            <a class="tag-link" href="<!--{link m='softs' cate_id=$applist.cate_id}-->"><!--{$applist.cname}--></a>
                            <span class="install-count"><!--{$applist.app_down}--> 人安装</span>
                            <span class="dot"></span>
                            <span title="<!--{$applist.history_size}-->"><!--{$applist.history_size}--></span>
                        </div>
                        <div class="comment">
                            <!--{$applist.app_desc}-->
                        </div>
                    </div>
                    <a class="install-btn" href="<!--{link m='app' app_id=$applist.app_id}-->" target="_blank">下载</a>
                </li>
                <!--{/applist}-->
            </ul>
        </div>
        <div class="app-box" id="today_recommend" style="display: none;">
            <span class="block-title">
                    今日热门推荐<a href="<!--{link m='recommends' id=29}-->" class="ly-more">+更多</a>
                </span>
            <ul class="wc-rect clearfix">
                <!--{recommend id=29 row=15}-->
                <li class="card" >
                    <div class="icon-wrap">
                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank">
                            <img src="<!--{imageurl url = $recommend.app_logo}-->" width="68" height="68" alt="<!--{$recommend.app_title}-->" class="icon" />
                        </a>
                    </div>
                    <div class="app-desc">
                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" title="<!--{$recommend.app_title}-->" class="name">
                            <!--{$recommend.app_title}-->
                        </a>
                        <div class="meta">
                            <!--{if $recommend.parent_id == 1}-->
                            <a class="tag-link" target="_blank" href="<!--{link m='softs' cate_id=$recommend.cate_id}-->"><!--{$recommend.cname}--></a>
                            <!--{elseif $recommend.parent_id == 2}-->
                            <a class="tag-link" target="_blank" href="<!--{link m='games' cate_id=$recommend.cate_id}-->"><!--{$recommend.cname}--></a>
                            <!--{/if}-->
                            <span class="install-count"><!--{$recommend.app_down}--> 人安装</span>
                            <span class="dot"></span>
                            <span title="<!--{$recommend.history_size}-->"><!--{$recommend.history_size}--></span>
                        </div>
                        <div class="comment">
                            <!--{$recommend.app_desc}-->
                        </div>
                    </div>
                    <a class="install-btn" href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank">下载</a>
                </li>
                <!--{/recommend}-->
            </ul>
        </div>
    </div>
</div>

<!--{include file="inc_flink.php"}-->

<!--{include file="inc_foot.php"}-->

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

</body>
</html>