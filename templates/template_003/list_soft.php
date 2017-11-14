<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--{if $cate_id}-->
    <!--{row name='app_category' id=$cate_id}-->
    <title><!--{if $row.ctitle}--><!--{$row.ctitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
    <meta name="keywords" content="<!--{if $row.ckey}--><!--{$row.ckey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
    <meta name="description" content="<!--{if $row.cdesc}--><!--{$row.cdesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
    <!--{/row}-->
    <!--{else}-->
    <!--{row name='navicat' id=2}-->
    <title><!--{if $row.navicat_seotitle}--><!--{$row.navicat_seotitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
    <meta name="keywords" content="<!--{if $row.navicat_seokey}--><!--{$row.navicat_seokey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
    <meta name="description" content="<!--{if $row.navicat_seodesc}--><!--{$row.navicat_seodesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
    <!--{/row}-->
    <!--{/if}-->
    <!--{include file="inc_head.php"}-->
</head>
<body>
<!--{include file="inc_top.php"}-->
<!--{include file="inc_menu.php"}-->


<div class="model">

    <div class="model-title">
        <h3>精品推荐</h3>
    </div>
    <div class="game-s">
        <ul class="game-tab-subnav" id="gameTabSubNav1">
            <!--{recommend id=41 row=16}-->
            <div class="game-tab-app">
                <a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank">
                    <img src="<!--{imageurl url = $recommend.app_logo}-->" class="img-radius" alt="<!--{$recommend.app_title}-->"
                         title="<!--{$recommend.app_title}-->">
                </a>

                <p><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                      title="<!--{$recommend.app_title}-->"><!--{mb_substr($recommend.app_title,0,8,'utf-8')}--></a></p>
            </div>
            <!--{/recommend}-->
        </ul>
        <div class="model-title">
            <h3>软件分类</h3>
            <a class="model-title-more hide" href="#" target="_blank">更多</a>
        </div>
        <div class="game-list-page">
            <!-- sub-nav -->
            <div class="sub-nav">

                <p>
                    <span>软件类型：</span>
                    <a <!--{if $cate_id>0}--><!--{else}-->class="on"<!--{/if}--> href="<!--{link m='softs'}-->
                    ">不限</a>
                    <!--{appnav parent=1}-->

                    <a <!--{if $cate_id == $appnav.cate_id}-->class="on"<!--{/if}--> href="
                    <!--{link m='softs' cate_id=$appnav.cate_id}-->">
                    <!--{$appnav.cname}-->
                    </a>

                    <!--{/appnav}-->
                </p>
            </div>
        </div>
        <div class="model-title">
            <h3>综合</h3>
        </div>
        <div class="game-tab-sublist clear" id="gameTabSubList1">

            <ul class="game-tab-subcon current ">
                <!--{applist parent=1 id=$cate_id page=$page per_page=16}-->
                <li>
                    <div class="clear">
                        <div class="game-tab-subcon-icon">
                            <a href="<!--{link m='app' app_id=$applist.app_id}-->" target="_blank">
                                <img src="<!--{imageurl url =$applist.app_logo}-->" class="img-radius"
                                     alt="<!--{$applist.app_title}-->" title="<!--{$applist.app_title}-->">
                            </a>
                        </div>
                        <div class="game-tab-subcon-detail clear">
                            <h4 class="f18 font-bold"><!--{$applist.app_title}--></h4>

                            <p><span class="font-gray">软件大小：</span><span class="font-orange"><!--{round($applist.history_size/1024/1024,2)}-->MB</span>
                            </p>

                            <p><span class="font-gray">软件类型：</span><!--{$applist.cname}--></p>
                            <a class="btn btn-xl btn-style4" href="<!--{link m='app' app_id=$applist.app_id}-->"
                               title="<!--{$applist.app_title}-->" target="_blank">软件下载</a>

                        </div>
                    </div>

                </li>
                <!--{/applist}-->
            </ul>

            <!--{pagebar name='applist' id=$cate_id parent=1 page=$page per_page=16}-->
        </div>
    </div>
</div>
<!--{include file="inc_flink.php"}-->

<!--{include file="inc_foot.php"}-->
</body>
</html>
