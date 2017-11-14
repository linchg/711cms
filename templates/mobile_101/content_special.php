<!doctype html>
<html>
<head>
 <meta charset="utf-8"/>
 <meta name="data-spm" content="1"/>
 <meta http-equiv="Cache-Control" content="max-age=3600"/>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

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
<!--header-->
<div class="header">
 <h2><font style="max-width:68%" class="overcut">精品专题</font></h2>
 <a class="back icon-ic_back1-01" href="javascript:history.back();"></a>
</div>

<img src="<!--{$special.area_logo}-->" style="width:100%">
<header id="section_topic_soft" class="g-title">
 软件
</header>
<div class="soft_hot">
 <ul>
  <!--{special id=$special_id}-->
  <li> <a href="<!--{link m='app' app_id=$special.app_id}-->">
    <img src="<!--{imageurl url =$special.app_logo}-->" /> <p><!--{$special.app_title}--></p> </a>
   <a href="<!--{link m='app' app_id=$special.app_id}-->" class="down">下载</a>
  </li>
  <!--{/special}-->
 </ul>
</div>
<!--{include file="inc_foot.php"}-->
</body>
</html>
