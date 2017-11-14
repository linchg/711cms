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
    <!--{row name='navicat' id=3}-->
    <title><!--{if $row.navicat_seotitle}--><!--{$row.navicat_seotitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
    <meta name="keywords" content="<!--{if $row.navicat_seokey}--><!--{$row.navicat_seokey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
    <meta name="description" content="<!--{if $row.navicat_seodesc}--><!--{$row.navicat_seodesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
    <!--{/row}-->
    <!--{/if}-->

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
    <!-- inner-box -->
    <!-- inner-box1 -->
    <div class="grid mt10">
        <div class="col9 co191 first">
            <div class="mod mod-pro js-mod-tab" id="J-cat-recommend">
                <div class="hd clearfix" id="section_3">
                    <ul class="cate-tab js-tabs gx-title">
                        <li class="current">
                            <a class="selected" href="javascript:;">精品推荐</a>
                            <span class="line"></span>
                        </li>
                        <!--{appnav parent=2 row=5}-->
                        <li>
                            <a class="selected" href="javascript:;"><!--{$appnav.cname}--></a>
                            <span class="line"></span>
                        </li>
                        <!--{/appnav}-->
                    </ul>
                    <a href="<!--{link m='more_game'}-->" class="more" target="_blank">更多&gt;&gt;</a>
                </div>
                <div class="bd js-views gx-content">
                    <div class="mod-pro-list selected gx-text">
                        <ul class="clearfix">
                            <!--{recommend id=59 row=18}-->
                            <li class="">
                                <a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank" class="pic">
                                    <img src="<!--{imageurl url = $recommend.app_logo}-->" class="pngfix"/>
                                </a>
                                <h4><a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank">
                                        <!--{$recommend.app_title}--> </a></h4>
                                <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="bt-install"
                                   data-log-type="2" target="_blank">安装</a>
                            </li>
                            <!--{/recommend}-->
                        </ul>
                    </div>
                    <!--{appnav parent=2 row=5}-->
                    <div class="mod-pro-list gx-text">
                        <ul class="clearfix">
                            <!--{applist parent=2 id=$appnav.cate_id row=18}-->
                            <li class="">
                                <a href="<!--{link m='app' app_id=$applist.app_id}-->" target="_blank" class="pic">
                                    <img src="<!--{imageurl url =$applist.app_logo}-->" class="pngfix"/>
                                </a>
                                <h4><a href="<!--{link m='app' app_id=$applist.app_id}-->" target="_blank">
                                        <!--{$applist.app_title}--> </a></h4>
                                <a href="<!--{link m='app' app_id=$applist.app_id}-->" class="bt-install"
                                   data-log-type="2" target="_blank">安装</a>
                            </li>
                            <!--{/applist}-->
                        </ul>
                    </div>
                    <!--{/appnav}-->
                </div>
            </div>
        </div>
        <!--end of mlft-->
        <div class="col3 co131 J-rank-wrap J-rank-download" id="section_5">
            <div class="mod mod-rank-list">
                <div class="hd clearfix">
                    <h2>下载排行</h2>
                </div>
                <div class="bd">
                    <ol class="selected">
                        <!--{recommend id=63 row=10}-->
                        <li>
                            <span
                                class="s<!--{$recommend.app_sort_show}--> num"><!--{$recommend.app_sort_show}--></span>

                            <div class="soft-info">
                                <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="pic"
                                   target="_blank"> <img class="png" src="<!--{imageurl url = $recommend.app_logo}-->"
                                                         alt="<!--{$recommend.app_title}-->"/> </a>

                                <div class="text">
                                    <h4><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                           title="<!--{$recommend.app_title}-->" target="_blank">
                                            <!--{$recommend.app_title}--> </a></h4>
                                </div>
                            </div>
                            <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="bt-install" target="_blank">安装</a>
                        </li>
                        <!--{/recommend}-->
                    </ol>
                </div>
            </div>
        </div>
        <!--end of mrit-->
    </div>
    <!--/ inner-box1 -->
    <!-- inner-box2 -->
    <div class="mod mod-special">
        <div class="hd clearfix" id="section_6">
            <h2><a href="#" target="_blank">精品专题</a></h2>
            <a class="more" href="<!--{link m=specials}-->" target="_blank">更多&gt;&gt;</a>
        </div>
        <div class="bd">
            <div class="special-list" id="section_7">
                <ul class="clearfix">
                    <!--{list name='special' row=4}-->
                    <li class="special-list-li">
                        <div class="topic-info">
                            <a href="<!--{link m='special' special_id=$list.area_id}-->" target="_blank">
                                <img src="<!--{$list.area_logo}-->" width="207" height="108"
                                     title=" <!--{$list.area_title}-->" alt=" <!--{$list.area_title}-->">
                                <span class="name"> <!--{$list.area_title}--></span>
                            </a>
                        </div>
                    </li>
                    <!--{/list}-->
                </ul>
            </div>
        </div>
    </div>
    <!--/ inner-box2 -->
    <!-- inner-box3 -->

    <div class="grid">
        <div class="col9 co191 first">
            <div class="mod mod-pro mod-new" id="J-cat-recommend">
                <div class="hd clearfix" id="section_3">
                    <h2>时下热门</h2>
                </div>
                <div class="bd js-views gx-content">
                    <div class="mod-pro-list selected gx-text">
                        <ul class="clearfix">
                            <!--{recommend id=65 row=21}-->
                            <li class="">
                                <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="pic" target="_blank">
                                    <img src="<!--{imageurl url = $recommend.app_logo}-->" class="pngfix"/>
                                </a>
                                <h4><a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank">
                                        <!--{$recommend.app_title}--> </a></h4>
                                <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="bt-install"
                                   data-log-type="2" target="_blank">安装</a>
                            </li>
                            <!--{/recommend}-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--end of mlft-->
        <div class="col3 co131 J-rank-wrap J-rank-download" id="section_5">
            <div class="mod mod-rank-list">
                <div class="hd clearfix">
                    <h2>上升最快</h2>
                </div>
                <div class="bd">
                    <ol class="selected">
                        <!--{recommend id=64 row=10}-->
                        <li>
                            <span
                                class="s<!--{$recommend.app_sort_show}--> num"><!--{$recommend.app_sort_show}--></span>

                            <div class="soft-info">
                                <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="pic"
                                   target="_blank"> <img class="png" src="<!--{imageurl url = $recommend.app_logo}-->"
                                                         alt="<!--{$recommend.app_title}-->"/> </a>

                                <div class="text">
                                    <h4><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                           title="<!--{$recommend.app_title}-->" target="_blank">
                                            <!--{$recommend.app_title}--> </a></h4>
                                </div>
                            </div>
                            <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="bt-install" target="_blank">安装</a>
                        </li>
                        <!--{/recommend}-->
                    </ol>
                </div>
            </div>
        </div>
        <!--end of mrit-->
    </div>
    <!--/ inner-box3 -->
    <!-- inner-box4 --><!--
    <div class="grid mod-half-pro">
        <div class="col6 first">
            <div class="mod ">
                <!--{row name='app_category' id=18}-->
                <div class="hd clearfix" id="section_104">
                    <h2><!--{$row.cname}--></h2>
                </div>
                <!--{/row}-->
                <div class="bd" id="section_105">
                    <div class="mod-pro-list">
                        <ul class="clearfix">
                            <!--{applist id=18 row=16}-->
                            <li class="">
                                <a href="<!--{link m='app' app_id=$applist.app_id}-->" target="_blank" class="pic">
                                    <img src="<!--{imageurl url =$applist.app_logo}-->" class="pngfix"/>
                                </a>
                                <h4><a href="<!--{link m='app' app_id=$applist.app_id}-->" target="_blank">
                                        <!--{$applist.app_title}--> </a></h4>
                                <a href="<!--{link m='app' app_id=$applist.app_id}-->" class="bt-install"
                                   data-log-type="2" target="_blank">安装</a>
                            </li>
                            <!--{/applist}-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col6 ">
            <div class="mod ">
                <!--{row name='app_category' id=20}-->
                <div class="hd clearfix" id="section_106">
                    <h2><!--{$row.cname}--></h2>
                </div>
                <!--{/row}-->
                <div class="bd" id="section_107">
                    <div class="mod-pro-list">
                        <ul class="clearfix">
                            <!--{applist id=20 row=16}-->
                            <li class="">
                                <a href="<!--{link m='app' app_id=$applist.app_id}-->" class="pic">
                                    <img src="<!--{imageurl url =$applist.app_logo}-->" class="pngfix"/>
                                </a>
                                <h4><a href="<!--{link m='app' app_id=$applist.app_id}-->">
                                        <!--{$applist.app_title}--> </a></h4>
                                <a href="<!--{link m='app' app_id=$applist.app_id}-->" class="bt-install"
                                   data-log-type="2" target="_blank">安装</a>
                            </li>
                            <!--{/applist}-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ inner-box4 -->
    <!--{include file="inc_flink.php"}-->
    <!--/ inner-box -->
</div>
</div>
<!--{include file="inc_foot.php"}-->
<script type="text/javascript" src="<!--{$tpl_path}-->js/bc.js"></script>
</body>
</html>
