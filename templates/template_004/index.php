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
    <!-- top section -->
    <div class="sect-0">
        <div class="focus_holder">
            <a href="javascript:void(0)" data-text="arr_left" data-href="arr_left" id="arr_left"></a>

            <div id="focus">
                <div class="view photos clearfix" id="banner_huodong">
                    <div class="col_a">
                        <!--{ad id=30}-->
                        <!--{if $ad.sort_show==1}-->
                        <div class="photo_1">
                            <a target="_blank" href="<!--{$ad.link}-->">
                                <img src="<!--{$ad.image}-->">
                            </a>
                        </div>
                        <!--{/if}-->
                        <!--{/ad}-->
                    </div>
                    <div class="col_b">
                        <!--{ad id=30}-->
                        <!--{if $ad.sort_show != 1 && $ad.sort_show < 6}-->
                        <div class="photo_<!--{$ad.sort_show}-->">
                            <a target="_blank" href="<!--{$ad.link}-->"><img src="<!--{$ad.image}-->"></a>
                        </div>
                        <!--{/if}-->
                        <!--{/ad}-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- top section -->
    <!-- box -->
    <div class="grid-1 sect-1 clearfix">
        <div class="hd-hot clearfix">
            <h2>精品推荐</h2>
        </div>
        <div class="articles">
            <div class="mod-list-app mod-list-apps">
                <ul class="clearfix">
                    <!--{recommend id=41 row=30}-->
                    <li>
                        <a class="pic" target="_blank" href="<!--{link m='app' app_id=$recommend.app_id}-->">
                            <img src="<!--{imageurl url = $recommend.app_logo}-->" width="48" height="48"></a>
                        <h4><a href="<!--{link m='app' app_id=$recommend.app_id}-->" title="<!--{$recommend.app_title}-->"
                               target="_blank"><!--{$recommend.app_title}--></a></h4>
                        <a class="bt-install setup" href="<!--{link m='app' app_id=$recommend.app_id}-->"
                           data-tab="0" target="_blank">安装</a>
                    </li>
                    <!--{/recommend}-->
                </ul>
            </div>
        </div>
    </div>
    <!--/ box -->


    <!-- box1 -->
    <div class="ui-section grid-2 sect-soft clearfix">
        <div class="hd">
            <h2 id="section_2"><a href="<!--{link m='more_soft'}-->" target="_blank">软件</a></h2>

            <div class="tabs" id="section_3">
                <strong>软件排行</strong>
            </div>
        </div>
        <div class="article">
            <!-- {{col-1 -->
            <div class="col-1">
                <div class="ui-sect-cate">
                    <div class="bd">
                        <div class="mod-cate-list" id="section_4">
                            <div class="group">
                                <h3>软件类型：</h3>
                                <ul>
                                    <!--{appnav parent=1}-->
                                    <li><a href="<!--{link m='more_soft' cate_id=$appnav.cate_id}-->"
                                           target="_blank"><span><!--{$appnav.cname}--></span></a></li>
                                    <!--{/appnav}-->
                                </ul>
                            </div>
                            <div class="group">
                                 <h3>热门标签：</h3>
                                 <ul>
                                 <!--{list name='search' type=1 row=10}-->
                                    <li>
                                        <a href="<!--{link m='search' keywords=$list.q}-->" target="_blank" title="<!--{$list.q}-->">
                                            <span style="color:"><!--{$list.q}--></span>
                                        </a>
                                    </li>
                                 <!--{/list}-->
                                 </ul>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col-1}} -->
            <!-- {{col-2 -->
            <div class="col-2">
                <div class="ui-sect-con" id="section_5">
                    <div class="bd">
                        <div class="mod-list-app">
                            <ul class="clearfix">
                                <!--{recommend id=54 row=18}-->
                                <li>
                                    <a class="pic" target="_blank" href="<!--{link m='app' app_id=$recommend.app_id}-->">
                                        <img src="<!--{imageurl url = $recommend.app_logo}-->" width="48" height="48">
                                    </a>
                                    <h4>
                                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                           title="<!--{$recommend.app_title}-->" target="_blank">
                                            <!--{$recommend.app_title}-->
                                        </a>
                                    </h4>
                                    <a class="bt-install setup" target="_blank" href="<!--{link m='app' app_id=$recommend.app_id}-->" data-tab="0">安装</a>
                                </li>
                                <!--{/recommend}-->
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <!-- col-2}} -->
        </div>
        <!-- {{aside -->
        <div class="aside">
            <div class="ui-toplist ui-toplist-enable">
                <!-- col3 ui-toplist -->
                <div class="bd views">
                    <div class="view selected">
                        <div class="mod-toplist-app mod-top-app" id="section_6">
                            <ul class="list">
                                <!--{recommend id=56 row=8}-->
                                <li
                                <!--{if $recommend.app_sort_show == 1}--> class="first"<!--{/if}-->>
                                <span class="ico-num ico-num-<!--{$recommend.app_sort_show}-->"><!--{$recommend.app_sort_show}--></span>

                                <div class="all clearfix">
                                    <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="img"
                                       target="_blank">
                                        <img src="<!--{imageurl url = $recommend.app_logo}-->">
                                    </a>

                                    <div class="detail">
                                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank"
                                           title="<!--{$recommend.app_title}-->"><!--{$recommend.app_title}--></a>
                                    </div>
                                    <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="down setup"
                                       data-tab="0" target="_blank">安装</a>
                                </div>
                                </li>
                                <!--{/recommend}-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- aside}} -->
    </div>
    <!--/ box1 -->

    <!-- box2 -->
    <div class="ui-section grid-2 sect-game clearfix">
        <div class="hd">
            <h2 id="section_2"><a href="<!--{link m='more_game'}-->" target="_blank">游戏</a></h2>

            <div class="tabs" id="section_3">
                <strong>游戏排行</strong>
            </div>
        </div>
        <div class="article">
            <!-- {{col-1 -->
            <div class="col-1">
                <div class="ui-sect-cate">
                    <div class="bd">
                        <div class="mod-cate-list" id="section_4">
                            <div class="group">
                                <h3>游戏类型：</h3>
                                <ul>
                                    <!--{appnav parent=2}-->
                                    <li><a href="<!--{link m='more_game' cate_id=$appnav.cate_id}-->"
                                           target="_blank"><span><!--{$appnav.cname}--></span></a></li>
                                    <!--{/appnav}-->
                                </ul>
                            </div>
                           <div class="group">
                                <h3>热门标签：</h3>
                                <ul>
                                 <!--{list name='search' type=2 row=10}-->
                                    <li>
                                        <a href="<!--{link m='search' keywords=$list.q}-->" target="_blank" title="<!--{$list.q}-->">
                                            <span style="color:"><!--{$list.q}--></span>
                                        </a>
                                    </li>
                                 <!--{/list}-->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col-1}} -->
            <!-- {{col-2 -->
            <div class="col-2">
                <div class="ui-sect-con" id="section_5">
                    <div class="bd">
                        <div class="mod-list-app">
                            <ul class="clearfix">
                                <!--{recommend id=55 row=18}-->
                                <li>
                                    <a class="pic" target="_blank" href="<!--{link m='app' app_id=$recommend.app_id}-->">
                                        <img src="<!--{imageurl url = $recommend.app_logo}-->" width="48" height="48">
                                    </a>
                                    <h4>
                                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                           title="<!--{$recommend.app_title}-->" target="_blank">
                                            <!--{$recommend.app_title}-->
                                        </a>
                                    </h4>
                                    <a class="bt-install setup" target="_blank"
                                       href="<!--{link m='app' app_id=$recommend.app_id}-->" data-tab="0" target="_blank">安装</a>
                                </li>
                                <!--{/recommend}-->
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <!-- col-2}} -->
        </div>
        <!-- {{aside -->
        <div class="aside">
            <div class="ui-toplist ui-toplist-enable">
                <!-- col3 ui-toplist -->
                <div class="bd views">
                    <div class="view selected">
                        <div class="mod-toplist-app mod-top-app" id="section_6">
                            <ul class="list">
                                <!--{recommend id=57 row=8}-->
                                <li
                                <!--{if $recommend.app_sort_show == 1}--> class="first"<!--{/if}-->>
                                <span class="ico-num ico-num-<!--{$recommend.app_sort_show}-->"><!--{$recommend.app_sort_show}--></span>

                                <div class="all clearfix">
                                    <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="img"
                                       target="_blank">
                                        <img src="<!--{imageurl url = $recommend.app_logo}-->">
                                    </a>

                                    <div class="detail">
                                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank"
                                           title="<!--{$recommend.app_title}-->"><!--{$recommend.app_title}--></a>
                                    </div>
                                    <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="down setup"
                                       target="_blank" data-tab="0">安装</a>
                                </div>
                                </li>
                                <!--{/recommend}-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- aside}} -->
    </div>
    <!--/ box2 -->
        <!--游戏开服-->
        <!--{navicat}-->
        <!--{if ($navicat.navicat_m =='list_service' && $navicat.navicat_enabled =='1')}-->
        <div class="kf-box">
            <div class="fl w500">
                <span class="block-title">游戏开服</span>
                <div class="table-box">
                    <table class="lk-table">
                        <tbody>
                        <tr>
                            <td width=150>手机网游</td>
                            <td width=80>开服时间</td>
                            <td width=200>服务区名</td>
                            <td width=80>领取礼包</td>
                            <td width=80>游戏下载</td>
                        </tr>
                        <!--{seolist  row=8 }-->
                        <!--{if $seolist.o_status==2}-->
                        <tr>
                            <td width=150><!--{$seolist.o_apptitle}--></td>
                            <td width=80>
                                <!--{$seolist.o_start_time|date_format:"m-d"}--><br/>
                                <!--{$seolist.o_start_time|date_format:"h:i"}-->
                            </td>
                            <td width=200><!--{$seolist.o_region}--></td>
                            <td width=80>
                                <a href="<!--{link m='open_service' app_id=$seolist.o_app_id  open_name=$seolist.o_region}-->">
                                    <img src="<!--{$tpl_path}-->images/li_bao.jpg">
                                </a>
                            </td>
                            <td width=80><a href="<!--{link m='app' app_id=$seolist.o_app_id}-->" class="kf-btn">下载</a></td>
                        </tr>
                        <!--{/if}-->
                        <!--{/seolist}-->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="fr w500">
                <span class="block-title">疯抢礼包</span>
                <div class="table-box">
                    <table class="lk-table">
                        <tbody>
                        <tr>
                            <td width=180>手机网游</td>
                            <td width=100>有效时间</td>
                            <td width=80>领取礼包</td>
                            <td width=80>游戏下载</td>
                        </tr>
                        <!--{openlist row=8}-->
                        <!--{if $openlist.o_end_time-time()>0 && $openlist.o_status==2 && $openlist.open_name==$openlist.o_region}-->
                        <tr>
                            <td width=180><!--{$openlist.o_apptitle}--><br/>【<!--{$openlist.pname}-->】</td>
                            <td width=100>
                                <!--{$openlist.o_start_time|date_format:"m-d"}-->
                                <!--{$openlist.o_start_time|date_format:"h:i"}--><br/>
                                <!--{$openlist.o_end_time|date_format:"m-d"}-->
                                <!--{$openlist.o_end_time|date_format:"h:i"}-->
                            </td>
                            <td width=80>
                                <a href="<!--{link m='open_packs' app_id=$openlist.p_app_id open_name=$openlist.open_name p_id=$openlist.p_id}-->">
                                    <img src="<!--{$tpl_path}-->images/li_bao.jpg">
                                </a>
                            </td>
                            <td width=80><a href="<!--{link m='app' app_id=$openlist.p_app_id}-->" class="kf-btn">下载</a></td>
                        </tr>
                        <!--{/if}-->
                        <!--{/openlist}-->
                        </tbody>
                    </table>
                </div>
            </div>
            <div><span class="clear clearfix"></span></div>
        </div>
        <!--{/if}-->
        <!--{/navicat}-->
        <!--游戏开服结束-->
    <!-- box3 -->
    <div class="grid-4 gx-grid">
        <!-- b -->
        <div class="aside ui-section">
            <div class="hd">
                <div class="tabs" id="section_3">
                    <strong>装机必备</strong>
                </div>
            </div>
            <div class="ui-toplist ui-toplist-enable">
                <!-- col3 ui-toplist -->
                <div class="bd views">
                    <div class="view selected">
                        <div class="mod-toplist-app mod-top-app" id="section_6">
                            <ul class="list">
                                <!--{recommend id=31 row=10}-->
                                <li
                                <!--{if $recommend.app_sort_show == 1}--> class="first"<!--{/if}-->>
                                <span class="ico-num ico-num-<!--{$recommend.app_sort_show}-->"><!--{$recommend.app_sort_show}--></span>

                                <div class="all clearfix">
                                    <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="img"
                                       target="_blank">
                                        <img src="<!--{imageurl url = $recommend.app_logo}-->">
                                    </a>

                                    <div class="detail">
                                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank"
                                           title="<!--{$recommend.app_title}-->"><!--{$recommend.app_title}--></a>
                                    </div>
                                    <a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank" class="down setup"
                                       data-tab="0">安装</a>
                                </div>
                                </li>
                                <!--{/recommend}-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ b -->
        <!-- b -->
        <div class="aside ui-section">
            <div class="hd">
                <div class="tabs" id="section_3">
                    <strong>最受欢迎</strong>
                </div>
            </div>
            <div class="ui-toplist ui-toplist-enable">
                <!-- col3 ui-toplist -->
                <div class="bd views">
                    <div class="view selected">
                        <div class="mod-toplist-app mod-top-app" id="section_6">
                            <ul class="list">
                                <!--{recommend id=30 row=10}-->
                                <li
                                <!--{if $recommend.app_sort_show == 1}--> class="first"<!--{/if}-->>
                                <span class="ico-num ico-num-<!--{$recommend.app_sort_show}-->"><!--{$recommend.app_sort_show}--></span>

                                <div class="all clearfix">
                                    <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="img"
                                       target="_blank">
                                        <img src="<!--{imageurl url = $recommend.app_logo}-->">
                                    </a>

                                    <div class="detail">
                                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank"
                                           title="<!--{$recommend.app_title}-->"><!--{$recommend.app_title}--></a>
                                    </div>
                                    <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="down setup"
                                       data-tab="0" target="_blank">安装</a>
                                </div>
                                </li>
                                <!--{/recommend}-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ b -->
        <!-- b -->
        <div class="aside ui-section" style="margin:0; width:326px">
            <div class="hd">
                <div class="tabs" id="section_3">
                    <strong>热门排行</strong>
                </div>
            </div>
            <div class="ui-toplist ui-toplist-enable">
                <!-- col3 ui-toplist -->
                <div class="bd views">
                    <div class="view selected">
                        <div class="mod-toplist-app mod-top-app" id="section_6">

                            <ul class="list">
                                <!--{recommend id=42 row=10}-->
                                <li
                                <!--{if $recommend.app_sort_show == 1}--> class="first"<!--{/if}-->>
                                <span class="ico-num ico-num-<!--{$recommend.app_sort_show}-->"><!--{$recommend.app_sort_show}--></span>

                                <div class="all clearfix">
                                    <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="img"
                                       target="_blank">
                                        <img src="<!--{imageurl url = $recommend.app_logo}-->">
                                    </a>

                                    <div class="detail">
                                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank"
                                           title="<!--{$recommend.app_title}-->"><!--{$recommend.app_title}--></a>
                                    </div>
                                    <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="down setup"
                                       data-tab="0" target="_blank">安装</a>
                                </div>
                                </li>
                                <!--{/recommend}-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ b -->
    </div>
    <!-- box3 -->
    <!-- f-link -->
    <div class="f-link">
        <span>友情链接：</span>
        <!--{friendlink type=1}-->
        <!--{if !$friendlink.flink_img}-->
        <a href="<!--{$friendlink.flink_url}-->" target="_blank" title="<!--{$friendlink.flink_name}-->"><!--{$friendlink.flink_name}--></a>
        <!--{else}-->
        <a href="<!--{$friendlink.flink_url}-->" target="_blank" title="<!--{$friendlink.flink_name}-->">
            <img style="display: inline-block; position: relative; top:3px;" width="20" height="20" src="<!--{$friendlink.flink_img}-->" />
            <!--{$friendlink.flink_name}-->
        </a>
        <!--{/if}-->
        <!--{/friendlink}-->
    </div>
    <!-- f-link -->

</div>
</div>
<!--{include file="inc_foot.php"}-->
<script type="text/javascript" src="<!--{$tpl_path}-->js/bc.js"></script>
</body>
</html>
