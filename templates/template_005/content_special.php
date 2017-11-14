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
<div class="wrapper">
<!--{include file="inc_top.php"}-->
<!--{include file="inc_menu.php"}-->

<!--main-->
<div class="main">
    <div class="wp">
        <div id="mod-topic-detail" class="clearfix">
            <p class="img"><img src="<!--{$special.area_logo}-->" __lazypushed="1"></p>
            <div class="detail">
                <h2><!--{$special.area_title}--></h2>
                <p class="desc note">
                    <!--{$special.area_html}-->
                </p>
            </div>
        </div>
        <div class="mod-topic-block">
            <div class="mod-topic-title clearfix">
                <h3>软件</h3>
            </div>
            <div class="mod-topic-cont">
                <ul class="mod-soft-list">
                <!--{special id=$special_id page=$page per_page=12}-->
                    <li class="mod-soft-item mod-item hover">
                        <span>
                            <p class="img"><a href="<!--{link m='app' app_id=$special.app_id}-->" class="pic" target="_blank">
                                    <img class="pngfix" src="<!--{imageurl url =$special.app_logo}-->"> </a>
                            </p>
                             <h4>
                                 <span class="mod-topic-check">
                                    <a class="em" href="<!--{link m='app' app_id=$special.app_id}-->"
                                       title="<!--{$special.app_title}-->" target="_blank"><!--{$special.app_title}--></a>
                                    <span class="mod-topic-rec" title=""></span>
                                 </span>
                             </h4>

                             <ul class="info note">
                                 <li class="sort"><!--{$special.cname}--></li>
                                 <li class="score"><span class="stars pngfix"><em class="pngfix" <!--{countstar star=$special.app_recomment}-->></em></span>
                                     <span class="em"><!--{$special.app_grade}-->分</span>
                                 </li>
                                 <li class="dl">下载次数：<!--{countdown down=$special.app_down}-->次</li>
                             </ul>
                                <p class="desc note">
                                    <!--{$special.app_seodesc}-->...
                                    <a href="<!--{link m='app' app_id=$special.app_id}-->" class="em" target="_blank">查看详情&gt;&gt;</a>
                                </p>
                        </span>

                        <p class="action" id="install_166429_524">
                            <a href="<!--{link m='app' app_id=$special.app_id}-->"
                               class="mod-topic-setup bt-install bt-install-2 setup" target="_blank">点击下载</a>
                        </p>
                    </li>
                <!--{/special}-->
                </ul>
            </div>
            <div class="page" style="text-align: center;">
                <!--{pagebar name='special_list' id=$special_id page=$page per_page=12}-->
            </div>
        </div>
        <div class="mod-topic-block" id="js-slide">
            <div class="mod-topic-title">
                <h3>推荐专题</h3>
            </div>
            <div class="mod-topic-cont">

                <div class="mod-other-list special-list js-views roll-list">
                    <ul class="clearfix">
                        <!--{list name='special' row=4}-->

                        <li class="mod-other-item mod-item">
                            <a href="<!--{link m='special' special_id=$list.area_id}-->" target="_blank">
                                <img src="<!--{$list.area_logo}-->" data-original="<!--{$list.area_logo}-->"/>
                                <span class="name"><!--{$list.area_title}--></span>
                            </a>
                        </li>
                        <!--{/list}-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /main-->
</div>
<!--{include file="inc_foot.php"}-->

</body>
</html>

