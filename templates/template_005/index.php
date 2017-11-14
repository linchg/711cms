<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->" />
    <meta name="description" content="<!--{$setting.seo_description}-->" />
    
    <!--{include file="inc_head.php"}-->
</head>
<body>
<div class="wrapper">
<!--{include file="inc_top.php"}-->
<!--{include file="inc_menu.php"}-->

<!--main-->
<div class="main">
    <div class="wp">
        <!-- banner -->
        <div class="promo">
            <div class="big">
                <!--{ad id=30}-->
                <!--{if $ad.sort_show==1}-->
                <a target="_blank" href="<!--{$ad.link}-->">
                    <img width="584" height="273" alt="<!--{$ad.alt}-->" src="<!--{$ad.image}-->">
                </a>
                <!--{/if}-->
                <!--{/ad}-->
            </div>
            <div class="small">
                <!--{ad id=30}-->
                <!--{if $ad.sort_show != 1 && $ad.sort_show < 6}-->
                <a target="_blank" href="<!--{$ad.link}-->">
                    <img width="200" height="135" alt="<!--{$ad.alt}-->" src="<!--{$ad.image}-->">
                </a>
                <!--{/if}-->
                <!--{/ad}-->
            </div>
        </div>
        <!-- /banner -->
        <!-- recommend -->
        <div class="module module-recommend">
            <div class="btitle"><h2><i></i>精品推荐</h2></div>
            <div class="bmeta">
                <div class="apkbox">
                    <ul class="clearfix">
                        <!--{recommend id=41 row=30}-->
                        <li>
                            <span class="pic">
                                <img src="<!--{imageurl url = $recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->" width="64" height="64">
                            </span>
                            <span class="name"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                                  target="_blank"><!--{$recommend.app_title}--></a></span>
                            <span class="level"><i <!--{countstar star=$recommend.app_recomment}-->><!--{$recommend.app_grade}-->分</i></span>
                            <span class="btn"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                                 target="_blank">立即下载</a></span>
                            <span class="layer"></span><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                                          target="_blank" class="link"></a>
                        </li>
                        <!--{/recommend}-->
                    </ul>
                </div>
            </div>
        </div>
        <!-- /recommend -->
        <!-- module-game -->
        <div class="module module-game">
            <div class="btitle"><h2><i></i><a href="<!--{link m='games'}-->" target="_blank">游戏</a></h2><a
                    class="more" href="<!--{link m='games'}-->">更多<i></i></a></div>
            <div class="bmeta">
                <div class="category">
                    <h3>游戏分类</h3>

                    <div class="linkbox">
                        <!--{appnav parent=2}-->
                        <a href="<!--{link m='games' cate_id=$appnav.cate_id}-->" target="_blank">
                            <!--{$appnav.cname}-->
                        </a>
                        <!--{/appnav}-->
                    </div>
                </div>
                <div class="apkbox">
                    <ul class="clearfix">
                        <!--{recommend id=55 row=24}-->
                        <li>
                            <span class="pic">
                                <img src="<!--{imageurl url = $recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->" width="64"
                                     height="64">
                            </span>
                            <span class="name"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                                  target="_blank"><!--{$recommend.app_title}--></a></span>
                            <span class="level"><i <!--{countstar star=$recommend.app_recomment}-->><!--{$recommend.app_grade}-->分</i></span>
                            <span class="btn"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                                 target="_blank">立即下载</a></span>
                            <span class="layer"></span><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                                          target="_blank" class="link"></a>
                        </li>
                        <!--{/recommend}-->
                    </ul>
                </div>
            </div>
        </div>
        <!-- /module-game -->
        <!-- module-soft -->
        <div class="module module-soft">
            <div class="btitle"><h2><i></i><a href="<!--{link m='softs'}-->" target="_blank">软件</a></h2><a
                    class="more" target="_blank" href="<!--{link m='softs'}-->">更多<i></i></a>
            </div>
            <div class="bmeta">
                <div class="category">
                    <h3>软件分类</h3>

                    <div class="linkbox">
                        <!--{appnav parent=1}-->
                        <a href="<!--{link m='softs' cate_id=$appnav.cate_id}-->" target="_blank">
                            <!--{$appnav.cname}-->
                        </a>
                        <!--{/appnav}-->
                    </div>
                </div>
                <div class="apkbox">
                    <ul class="clearfix">
                        <!--{recommend id=54 row=24}-->
                        <li>
                            <span class="pic">
                                <img src="<!--{imageurl url = $recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->" width="64"
                                     height="64">
                            </span>
                            <span class="name"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                                  target="_blank"><!--{$recommend.app_title}--></a></span>
                            <span class="level"><i <!--{countstar star=$recommend.app_recomment}-->><!--{$recommend.app_grade}-->分</i></span>
                            <span class="btn"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                                 target="_blank">立即下载</a></span>
                            <span class="layer"></span><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                                          target="_blank" class="link"></a>
                        </li>
                        <!--{/recommend}-->
                    </ul>
                </div>
            </div>
        </div>
        <!-- /module-soft -->

    </div>
</div>
<!-- /main -->
<!--游戏开服-->
            <!--{navicat}-->
            <!--{if ($navicat.navicat_m =='list_service' && $navicat.navicat_enabled =='1')}-->
            <div class="kf-box">
              <div class="w1000">
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
                </div>
                <div><span class="clear clearfix"></span></div>
            </div>
            <!--{/if}-->
            <!--{/navicat}-->
            <!--游戏开服结束-->
<!-- ranking -->
<div class="ranking">
    <div class="wp clearfix">
        <div class="item">
            <div class="btitle"><h3 class="bgi-ffa238">热门排行</h3></div>
            <div class="apklist">
                <ul class="clearfix">
                    <!--{recommend id=42 row=10}-->
                    <li>
                        <span class="ord"><!--{$recommend.app_sort_show}--></span>
                        <span class="pic">
                            <img src="<!--{imageurl url = $recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->" width="48"
                                 height="48">
                        </span>
                        <span class="name"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                              target="_blank"><!--{$recommend.app_title}--></a></span>
                        <span class="count"><!--{countdown down=$recommend.app_down}-->次下载</span>
                        <span class="layer"></span>
                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank"
                           class="link"></a>
                    </li>
                    <!--{/recommend}-->
                </ul>
            </div>
        </div>
        <div class="item">
            <div class="btitle"><h3 class="bgi-72c406">最受欢迎</h3></div>
            <div class="apklist">
                <ul class="clearfix">
                    <!--{recommend id=30 row=10}-->
                    <li>
                        <span class="ord"><!--{$recommend.app_sort_show}--></span>
                        <span class="pic">
                            <img src="<!--{imageurl url = $recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->" width="48"
                                 height="48">
                        </span>
                        <span class="name"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                              target="_blank"><!--{$recommend.app_title}--></a></span>
                        <span class="count"><!--{countdown down=$recommend.app_down}-->次下载</span>
                        <span class="layer"></span>
                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank"
                           class="link"></a>
                    </li>
                    <!--{/recommend}-->
                </ul>
            </div>
        </div>
        <div class="item">
            <div class="btitle"><h3 class="bgi-ffa238">上升最快</h3></div>
            <div class="apklist">
                <ul class="clearfix">
                    <!--{recommend id=44 row=10}-->
                    <li>
                        <span class="ord"><!--{$recommend.app_sort_show}--></span>
                        <span class="pic">
                            <img src="<!--{imageurl url = $recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->" width="48"
                                 height="48">
                        </span>
                        <span class="name"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                              target="_blank"><!--{$recommend.app_title}--></a></span>
                        <span class="count"><!--{countdown down=$recommend.app_down}-->次下载</span>
                        <span class="layer"></span>
                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank"
                           class="link"></a>
                    </li>
                    <!--{/recommend}-->

                </ul>
            </div>
        </div>
        <div class="item">
            <div class="btitle"><h3 class="bgi-72c406">精品推荐</h3></div>
            <div class="apklist">
                <ul class="clearfix">
                    <!--{recommend id=41 row=10}-->
                    <li>
                        <span class="ord"><!--{$recommend.app_sort_show}--></span>
                        <span class="pic">
                            <img src="<!--{imageurl url = $recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->" width="48"
                                 height="48">
                        </span>
                        <span class="name"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                              target="_blank"><!--{$recommend.app_title}--></a></span>
                        <span class="count"><!--{countdown down=$recommend.app_down}-->次下载</span>
                        <span class="layer"></span>
                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank"
                           class="link"></a>
                    </li>
                    <!--{/recommend}-->
                </ul>
            </div>
        </div>
        <div class="clear"></div>
        <!--友情链接 start-->
        <div class="links_box">
            <div class="links_hd">
                <div class="links_tab">
                    <a class="current" id="yqlj">友情链接</a>
                </div>
            </div>
            <div class="links_bd">
                <div class="links_fren" id="yqlj_mod" style="display: block;">
                    <!--{friendlink type=1}-->
                    <!--{if !$friendlink.flink_img}-->
                    <a href="<!--{$friendlink.flink_url}-->" target="_blank" title="<!--{$friendlink.flink_name}-->"><!--{$friendlink.flink_name}--></a>
                    <!--{else}-->
                    <a href="<!--{$friendlink.flink_url}-->" target="_blank" title="<!--{$friendlink.flink_name}-->">
                        <img width="20" height="20" src="<!--{$friendlink.flink_img}-->" />
                        <!--{$friendlink.flink_name}-->
                    </a>
                    <!--{/if}-->
                    <!--{/friendlink}-->
                </div>
            </div>
        </div>
        <!--友情链接 end-->

    </div>
</div>
<!-- /ranking -->
</div>
<!--{include file="inc_foot.php"}-->
</body>
</html>

