<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="data-spm" content="1"/>
    <meta http-equiv="Cache-Control" content="max-age=3600"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!--{row name='navicat' id=6}-->
    <title><!--{$row.navicat_seotitle}--></title>
    <meta name="keywords" content="<!--{$row.navicat_seokey}-->" />
    <meta name="description" content="<!--{$row.navicat_seodesc}-->" />
    <!--{/row}-->

    <!--{include file="inc_head.php"}-->
</head>
<body>

<div class="header">
    <h2><font style="max-width:68%" class="overcut">精品专题</font></h2>
    <a class="back icon-ic_back1-01" href="javascript:history.back();"></a>
</div>
<ul id="section_zhuanti" class="zhuanti zhuanti-index loadmore-placeholder" data-ratio="" data-margin="0">
    <!--{list name='special'}-->
    <!--{row name='special' id=$list.area_id}-->
    <li class="item" id="section_zhuanti_item0">
        <a class="g-block" href="<!--{link m='special' special_id=$row.area_id}-->">
            <div class="img-wrapper">
                <img src="<!--{$row.area_logo}-->" />
            </div>
            <p class="title g-ellipsis"><!--{$row.area_title}--></p>
            <p class="summary g-ellipsis"><!--{$row.area_html}--> </p>
        </a>
    </li>
    <!--{/row}-->
    <!--{/list}-->
</ul>
<!--{include file="inc_foot.php"}-->

</body>
</html>