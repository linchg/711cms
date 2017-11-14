<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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

<!-- 当前位置 -->
<div class="box">
    <p class="pos">当前位置：<a href="/">首页</a><b>&gt;</b><a href="<!--{link m='necessaries'}-->">装机必备</a></p>
</div>
<!-- 当前位置 -->

<div class="box" style="min-height:690px">
	<div class="tablist">
		<div class="tab_tit">
			<h1>装机必备</h1>
			<ul class="tab_t tab_t2">
				<!--{list name='necessary'}-->
				<a href="<!--{link m='necessaries' necessary_type=$list.necessary_type}-->">
					<li<!--{if (isset($necessary_type) && $necessary_type ==$list.necessary_type) || ($necessary_type ==0 && $list.special_sort_show==1)  }--> class="current"<!--{/if}-->>
					<!--{$list.necessary_title}-->
					</li>
				</a>
				<!--{/list}-->
			</ul>
		</div>
		<div class="tab_content">
			<!--{list name='necessary' type=$necessary_type}-->
			<ul class="list_tj">
				<!--{necessary id=$list.necessary_id page=$page per_page=35}-->
				<li class="ly-pic">
					<a href="<!--{link m='app' app_id=$necessary.app_id}-->" class="pic" target="_blank" ><img src="<!--{imageurl url =$necessary.app_logo}-->" alt="<!--{$necessary.app_title}-->" width="72" height="72"></a>
					<p><a href="<!--{link m='app' app_id=$necessary.app_id}-->" target="_blank" ><!--{$necessary.app_title}--></a></p>
				</li>
				<!--{/necessary}-->
			</ul>
			<!--{/list}-->
			<!--{pagebar name='necessary_list' type=$necessary_type page=$page per_page=35}-->
		</div>
	</div>
</div>
<!--{include file="inc_flink.php"}-->
<!--{include file="inc_foot.php"}-->
</body>
</html>