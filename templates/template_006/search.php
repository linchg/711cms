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

<!-- 当前位置 -->
<div class="box">
    <p class="pos">当前位置：<a href="/">首页</a><b>&gt;</b>搜索列表</p>
</div>
<!-- 当前位置 -->

<div class="box" style="min-height:690px">
    <div class="tablist">
        <div class="tab_tit">
            <h1>搜索列表</h1>
        </div>
        <div class="tab_content">
            <ul class="list_tj" id="Mlist" data-keyword="<!--{$keywords}-->">
                <!--{applist search=$keywords row=15}-->
                <li class="ly-pic">
                    <a href="<!--{link m='app' app_id=$applist.app_id}-->" class="pic" target="_blank" ><img src="<!--{imageurl url =$applist.app_logo}-->" alt="<!--{$applist.app_title}-->" width="72" height="72"></a>
                    <p><a href="<!--{link m='app' app_id=$applist.app_id}-->" target="_blank" ><!--{$applist.app_title}--></a></p>
                </li>
                <!--{/applist}-->                                         
            </ul>
        </div>
    </div>

    <div class="tablist">
        <div class="tab_tit">
            <h1><!--{row name='recommend' id=29}--><!--{$row.area_title}--><!--{/row}--></h1>
        </div>
        <div class="tab_content">
            <ul class="list_tj">
                <!--{recommend id=29 row=14}-->
                <li class="ly-pic">
                    <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="pic" target="_blank" ><img src="<!--{imageurl url = $recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->" width="72" height="72"></a>
                    <p><a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank" ><!--{$recommend.app_title}--></a></p>
                </li>
                <!--{/recommend}-->                                         
            </ul>
        </div>
    </div>
</div>

<!--{include file="inc_foot.php"}-->

<script>
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