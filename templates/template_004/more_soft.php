<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->"/>
    <meta name="description" content="<!--{$setting.seo_description}-->"/>

    <!--{include file="inc_head.php"}-->
</head>
<body>
<div id="doc4">
    <div id="hd">
        <div class="mod-search-hd-bunny">
            <!--{include file="inc_top.php"}-->
            <!--{include file="inc_menu.php"}-->
        </div>
    </div>

<div id="bd">
    <div class="crumb">
        <a href="<!--{link m='softs'}-->">软件</a>
        <span>&gt;</span>
        <span class="cur"><!--{row name='app_category' id=$cate_id}--><!--{$row.cname}--><!--{/row}--></span>
    </div>
    <div class="app-box">
        <div class="mod-cate-property">
            <div class="mod-cate clearfix">
                <div class="hd">
                    类型：
                </div>
                <div class="bd">
                    <ul>
                        <li><a href="<!--{link m='softs'}-->" <!--{if empty($cate_id)}-->class="selected"
                            <!--{/if}-->>全部</a></li>
                        <!--{appnav parent=1}-->
                        <li><a href="<!--{link m='softs' cate_id=$appnav.cate_id}-->"
                            <!--{if $cate_id ==$appnav.cate_id}-->class="selected"<!--{/if}-->>
                            <!--{$appnav.cname}--></a></li>
                        <!--{/appnav}-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="mod mod-cate-list" id="js-tab">
            <div class="bd js-views">
                <div class="mod-pro-list">
                    <ul>
                        <!--{applist parent=1 id=$cate_id page=$page row=36 per_page=36}-->
                        <li class="">
                            <a class="pic" href="<!--{link m='app' app_id=$applist.app_id}-->" target="_blank">
                                <img src="<!--{imageurl url =$applist.app_logo}-->" class="pngfix" ddvmltype="frame"/>
                            </a>
                            <h4>
                                <a href="<!--{link m='app' app_id=$applist.app_id}-->"
                                   title="<!--{$applist.app_title}-->" target="_blank">
                                    <!--{$applist.app_title}-->
                                </a>
                            </h4>

                            <div class="pro-cate">
                                <!--{countdown down=$applist.app_down}-->次下载
                            </div>
                            <a href="<!--{link m='app' app_id=$applist.app_id}-->" class="bt-install" target="_blank">安装</a>
                        </li>

                        <!--{/applist}-->
                    </ul>
                </div>
            </div>
            <div class="ft">
                <!--{pagebar name='applist' parent=1 id=$cate_id page=$page per_page=36 url='softs'}-->
            </div>
        </div>
    </div>
    <!--{include file="inc_flink.php"}-->
</div>
</div>
<!--{include file="inc_foot.php"}-->
<script type="text/javascript" src="<!--{$tpl_path}-->js/bc.js"></script>
</body>
</html>
