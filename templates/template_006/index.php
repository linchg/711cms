<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--{include file="inc_head.php"}--> 
<title><!--{$setting.seo_title}--></title>
<meta name="keywords" content="<!--{$setting.seo_keywords}-->" />
<meta name="description" content="<!--{$setting.seo_description}-->" />
</head>

<body>
    
<!--{include file="inc_top.php"}-->

<!--{include file="inc_menu.php"}-->

<!-- ad + news-->
<div class="box">
    <div class="focus">
        <ul class="rslides f580x265 rslides1">
           <!--{ad id=30}-->
            <li id="rslides1_s0" style="display: none; float: none; position: absolute;">
                <a href="<!--{$ad.link}-->" target="_blank" >
                    <img src="<!--{$ad.image}-->" alt="<!--{$ad.alt}-->"  width="580" height="265"/>
                </a>
            </li>
           <!--{/ad}-->        
        </ul>
        <a href="" class="rslides_nav rslides1_nav prev">Previous</a>
        <a href="" class="rslides_nav rslides1_nav next">Next</a>
    </div>
    <div class="news">
        <div class="sub_tit"><!--{infonav cate_id=2}--><!--{$infonav.cname}--><!--{/infonav}--></div>
        <!--{infolist id=2 row=1}-->
        <div class="headline">
            <div class="head_icon">
                <a href="<!--{link m='info' info_id=$infolist.info_id}-->" target="_blank" >
                    <img src="<!--{$infolist.info_img}-->" width='72' height='72'> 
                </a>
            </div>
            <div class="head_w">
                <a href="<!--{link m='info' info_id=$infolist.info_id}-->" target="_blank" ><div class="app_name"><!--{$infolist.info_title}--></div></a>
                <p>
                            <!--{$infolist.info_desc}-->
                        </p>
            </div>
        </div>
        <!--{/infolist}-->
        <ul class="news_list">
            <!--{infolist row=4}-->
            <li><em><a href="<!--{link m='infos' last_cate_id=$infolist.last_cate_id}-->" ><!--{infonav cate_id=$infolist.last_cate_id}--><!--{$infonav.cname}--><!--{/infonav}--></a></em><a href="<!--{link m='info' info_id=$infolist.info_id}-->" target="_blank"><!--{$infolist.info_title}--></a></li>
            <!--{/infolist}-->
        </ul>
    </div>
</div>
<!-- ad + news-->

<!-- app category-->
<ul class="hot_list">
    <li class="hot_01">
        <div class="hot_tit"><a href="<!--{link m='games'}-->">游戏</a></div>
        <div class="hot_tag">
            <p>
                <!--{appnav parent=2 row=12}-->
                <a href="<!--{link m='games' cate_id=$appnav.cate_id}-->" target="_blank"><!--{$appnav.cname}--></a>|
                <!--{/appnav}--> 
            </p>
        </div>
    </li>
    <li>
        <div class="hot_tit"><a href="<!--{link m='softs'}-->">软件</a></div>
        <div class="hot_tag">
            <p>
                <!--{appnav parent=1 row=11}-->
                <a href="<!--{link m='softs' cate_id=$appnav.cate_id}-->" target="_blank"><!--{$appnav.cname}--></a>|
                <!--{/appnav}-->
            </p>
        </div>
    </li>
</ul>
<!-- app category-->

<!-- 今日热门推荐 装机必备 -->
<div class="box">
    <div class="b_main fl">
        <div class="main_tit"><!--{row name='recommend' id=29}--><!--{$row.area_title}--><!--{/row}--></div>
        <ul class="list_tj">
            <!--{recommend id=29 row=12}-->
            <li>
                <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="pic" target="_blank" ><img src="<!--{imageurl url = $recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->" width="72" height="72"></a>
                <p><a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank" ><!--{$recommend.app_title}--></a></p>
            </li>
            <!--{/recommend}-->
        </ul>
    </div>
    <div class="b_sub fr">
        <div class="sub_tit"><a href="<!--{link m='necessaries'}-->" class="more" target="_blank">更多<s></s></a>装机必备</div>
        <ul class="list_rank">
            <!--{recommend id=31 row=7}-->
            <li><span><!--{countdown down=$recommend.app_down}-->+人在用</span><a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank"><!--{$recommend.app_title}--></a></li>
            <!--{/recommend}-->
        </ul>
    </div>
</div>
<!-- 今日热门推荐 装机必备 -->

<!-- 安卓软件 -->
<div class="box">
    <div class="b_all">
        <div class="main_tit">
            <a href="<!--{link m='softs'}-->" target="_blank" class="more">更多<s></s></a>安卓软件
        </div>
        <div class="con">
            <div class="con_main">
                <div class="c_hottag">
                    <!--{appnav parent=1 row=11}-->
                    <a href="<!--{link m='softs' cate_id=$appnav.cate_id}-->" target="_blank"><!--{$appnav.cname}--></a>
                    <!--{/appnav}-->
                </div>
                <ul class="list_jp">
                    <!--{applist  parent=1  row=15}-->
                    <li>
                        <a href="<!--{link m='app' app_id=$applist.app_id}-->" class="pic" target="_blank">
                            <img src="<!--{imageurl url =$applist.app_logo}-->" alt="<!--{$applist.app_title}-->" width="60" height="60" >
                        </a>
                        <div class="app_name"><a href="<!--{link m='app' app_id=$applist.app_id}-->" target="_blank"><!--{$applist.app_title}--></a></div>
                        <p><!--{countdown down=$applist.app_down}-->人在玩</p>
                    </li>
                    <!--{/applist}-->                      
                    <li>
                        <a href="<!--{link m='softs'}-->"><img src="<!--{$tpl_path}-->images/more_green_rj.jpg"></a>
                    </li>
                </ul>
            </div>
            <div class="con_sub">
                <ul class="c_tab">
                    <li class="on"><!--{row name='recommend' id=44}--><!--{$row.area_title}--><!--{/row}--></li>
                    <li><!--{row name='recommend' id=42}--><!--{$row.area_title}--><!--{/row}--></li>
                </ul>
                <div class="c_list">
                    <ul class="list_rank">
                        <!--{recommend id=44 row=10}-->
                        <li><span><!--{if $recommend.parent_id == 1}-->
                            <a href="<!--{link m='softs' cate_id=$recommend.cate_id}-->" target="_blank" ><!--{$recommend.cname}--></a>
                            <!--{elseif $recommend.parent_id == 2}-->
                            <a href="<!--{link m='games' cate_id=$recommend.cate_id}-->" target="_blank" ><!--{$recommend.cname}--></a>
                            <!--{/if}--></span><b <!--{if $recommend.app_sort_show<4}-->class="num"<!--{/if}-->><!--{$recommend.app_sort_show}-->.</b><a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank"><!--{$recommend.app_title}--></a></li>
                        <!--{/recommend}-->         
                    </ul>
                </div>
                <div class="c_list" style="display:none">
                    <ul class="list_rank">
                        <!--{recommend id=42 row=10}-->
                        <li><span><!--{if $recommend.parent_id == 1}-->
                            <a href="<!--{link m='softs' cate_id=$recommend.cate_id}-->" target="_blank" ><!--{$recommend.cname}--></a>
                            <!--{elseif $recommend.parent_id == 2}-->
                            <a href="<!--{link m='games' cate_id=$recommend.cate_id}-->" target="_blank" ><!--{$recommend.cname}--></a>
                            <!--{/if}--></span><b <!--{if $recommend.app_sort_show<4}-->class="num"<!--{/if}-->><!--{$recommend.app_sort_show}-->.</b><a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank"><!--{$recommend.app_title}--></a></li>
                        <!--{/recommend}-->   
                    </ul>
                </div>             
            </div>
        </div>
    </div>
</div>
<!-- 安卓软件 -->

<!-- 安卓游戏 -->
<div class="box">
    <div class="b_all">
        <div class="main_tit">
            <a href="<!--{link m='games'}-->" target="_blank" class="more">更多<s></s></a>安卓游戏
        </div>
        <div class="con">
            <div class="con_main">
                <div class="c_hottag">
                    <!--{appnav parent=2 row=11}-->
                    <a href="<!--{link m='games' cate_id=$appnav.cate_id}-->" target="_blank"><!--{$appnav.cname}--></a>
                    <!--{/appnav}-->
                </div>
                <ul class="list_jp">
                    <!--{applist  parent=2  row=15}-->
                    <li>
                        <a href="<!--{link m='app' app_id=$applist.app_id}-->" class="pic" target="_blank">
                            <img src="<!--{imageurl url =$applist.app_logo}-->" alt="<!--{$applist.app_title}-->" width="60" height="60" >
                        </a>
                        <div class="app_name"><a href="<!--{link m='app' app_id=$applist.app_id}-->" target="_blank"><!--{$applist.app_title}--></a></div>
                        <p><!--{countdown down=$applist.app_down}-->人在玩</p>
                    </li>
                    <!--{/applist}-->                      
                    <li>
                        <a href="<!--{link m='softs'}-->"><img src="<!--{$tpl_path}-->images/more_green_rj.jpg"></a>
                    </li>                                    
                </ul>
            </div>
            <div class="con_sub">
                <ul class="c_tab">
                    <li class="on"><!--{row name='recommend' id=30}--><!--{$row.area_title}--><!--{/row}--></li>
                    <li class=""><!--{row name='recommend' id=40}--><!--{$row.area_title}--><!--{/row}--></li>
                </ul>
                <div class="c_list" style="display: block;">
                    <ul class="list_rank">
                        <!--{recommend id=30 row=10}-->
                        <li><span><!--{if $recommend.parent_id == 1}-->
                            <a href="<!--{link m='softs' cate_id=$recommend.cate_id}-->" target="_blank" ><!--{$recommend.cname}--></a>
                            <!--{elseif $recommend.parent_id == 2}-->
                            <a href="<!--{link m='games' cate_id=$recommend.cate_id}-->" target="_blank" ><!--{$recommend.cname}--></a>
                            <!--{/if}--></span><b <!--{if $recommend.app_sort_show<4}-->class="num"<!--{/if}-->><!--{$recommend.app_sort_show}-->.</b><a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank"><!--{$recommend.app_title}--></a></li>
                        <!--{/recommend}-->          
                    </ul>
                </div>
                <div class="c_list" style="display: none;">
                    <ul class="list_rank">
                        <!--{recommend id=40 row=10}-->
                        <li><span><!--{if $recommend.parent_id == 1}-->
                            <a href="<!--{link m='softs' cate_id=$recommend.cate_id}-->" target="_blank" ><!--{$recommend.cname}--></a>
                            <!--{elseif $recommend.parent_id == 2}-->
                            <a href="<!--{link m='games' cate_id=$recommend.cate_id}-->" target="_blank" ><!--{$recommend.cname}--></a>
                            <!--{/if}--></span><b <!--{if $recommend.app_sort_show<4}-->class="num"<!--{/if}-->><!--{$recommend.app_sort_show}-->.</b><a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank"><!--{$recommend.app_title}--></a></li>
                        <!--{/recommend}--> 
                    </ul>                              
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 安卓游戏 -->
<!--游戏开服-->
            <!--{navicat}-->
            <!--{if ($navicat.navicat_m =='list_service' && $navicat.navicat_enabled =='1')}-->
            <div class="kf-box w1000">
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
                            <!--{openlist row =8}-->
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
<!-- 友情链接 -->
<div class="ftop">
    <div class="box">
        <div class="ft_left">
            <div class="ft_tit">友情链接</div>
            <div class="ft_a">
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
        </div>
    </div>
</div>
<!-- 友情链接 -->

<!--{include file="inc_foot.php"}-->
</body>
</html>