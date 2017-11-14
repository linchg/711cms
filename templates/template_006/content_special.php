<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--{if $special.special_seotitle}-->
<title><!--{$special.special_seotitle}--></title>
<meta name="keywords" content="<!--{$special.special_seokey}-->" />
<meta name="description" content="<!--{$special.special_seodesc}-->" />
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

<!-- 当前位置 -->
<div class="box">
    <p class="pos">当前位置：<a href="/">首页</a><b>&gt;</b><a href="<!--{link m='specials'}-->">专题</a><!--{if $special_id}--><!--{row name='special' id=$special_id}--><b>&gt;</b><a><!--{$row.area_title}--></a><!--{/row}--><!--{/if}--></p>
</div>
<!-- 当前位置 -->

<div class="box" style="min-height:690px">
    <div class="tablist">
        <div class="tab_tit">
            <h1><!--{row name='special' id=$special_id}--><!--{$row.area_title}--><!--{/row}--></h1>
            <ul class="tab_t" id="li_num">
            </ul>
        </div>
        <div class="tab_content">
            <ul class="list_tj">
                <!--{special id=$special_id page=$page per_page=28}-->
                <li class="ly-pic">
                    <a href="<!--{link m='app' app_id=$special.app_id}-->" class="pic" target="_blank" ><img src="<!--{imageurl url =$special.app_logo}-->" alt="<!--{$special.app_title}-->" width="72" height="72"></a>
                    <p><a href="<!--{link m='app' app_id=$special.app_id}-->" target="_blank" ><!--{$special.app_title}--></a></p>
                </li>
                <!--{/special}-->                                         
            </ul>
            <!--{pagebar name='special_list' id=$special_id page=$page per_page=28}-->
        </div>
    </div>
</div>
<!--{include file="inc_flink.php"}-->
<!--{include file="inc_foot.php"}-->
</body>
</html>
