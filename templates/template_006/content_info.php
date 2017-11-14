<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--{if $info.info_title}-->
<title><!--{$info.info_title}--></title>
<meta name="keywords" content="<!--{$info.info_seokey}-->" />
<meta name="description" content="<!--{$info.info_seodesc}-->" />
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
    <p class="pos">当前位置：<a href="/">首页</a><b>&gt;</b><a href="<!--{link m='infos'}-->">资讯</a><b>&gt;</b><!--{$info.info_title}--></p>
</div>
<!-- 当前位置 -->
 
<div class="box">
	<div class="as_main fl">   
		<div class="wz_box">
			<h1><!--{$info.info_title}--></h1>
			<div class="wz_inf"><b>浏览：<!--{$info.info_visitors}--></b><b><!--{$info.info_update_time|date_format:"%Y-%m-%d"}--></b></div>
            <div class="wz_con">
                <div>
                    <!--{$info.info_body}-->
	            </div>
			</div>
		</div>	
	</div>
	<div class="as_sub fr">
		<div class="tj_app">
            <div class="sub_tit"><!--{row name='recommend' id=29}--><!--{$row.area_title}--><!--{/row}--></div>
            <ul>
                <!--{recommend id=29 row=3}-->
                <li>
                    <a target="_blank" href="<!--{link m='app' app_id=$recommend.app_id}-->"><img src="<!--{imageurl url = $recommend.app_logo}-->"  width="50" height="50"></a>
                    <div class="app_name"><a target="_blank" href="<!--{link m='app' app_id=$recommend.app_id}-->"><!--{$recommend.app_title}--></a></div>
                    <p><a target="_blank" href="<!--{link m='app' app_id=$recommend.app_id}-->" class="btn_new">下载</a><!--{countdown down=$recommend.app_down}-->+人在玩</p>
                </li>
                <!--{/recommend}-->                         
            </ul>
        </div>
		<span class="pic_gap"></span>
		<div class="tj_app">
			<div class="sub_tit">相关资讯</div>
			<ul class="list_rank">
                <!--{infolist id=$last_cate_id row=10}-->
                <li><!--{if $infolist.info_url}--><a href="<!--{$infolist.info_url}-->" target="_blank"><!--{else}-->
                    <a href="<!--{link m='info' info_id=$infolist.info_id}-->" target="_blank"><!--{/if}-->
                        <!--{$infolist.info_title}--></a></li>
                <!--{/infolist}-->         				
		    </ul>
		</div>
	</div>
</div>

<!--{include file="inc_flink.php"}-->
<!--{include file="inc_foot.php"}-->
</body>
</html>