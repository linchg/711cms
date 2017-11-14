<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="data-spm" content="1"/>
    <meta http-equiv="Cache-Control" content="max-age=3600"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

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
<div class="header">
    <a href="/"><img src="<!--{$setting.wap_logo}-->" alt="<!--{$setting.site_name}-->" height="55"/></a>
    <a class="back icon-ic_back1-01" href="javascript:history.back();"></a>
</div>
<div class="detailed">
    <h1><!--{$info.info_title}--></h1>

    <div class="description">
        <!--{$info.info_body}-->
    </div>
</div>

<!--footer-->
<!--{include file="inc_foot.php"}-->

</body>
</html>
