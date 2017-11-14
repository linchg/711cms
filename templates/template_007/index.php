<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->"/>
    <meta name="description" content="<!--{$setting.seo_description}-->"/>
    <!--{include file="inc_head.php"}-->
</head>

<body>

<div id="fullbgTop"></div>
<div id="loginBoxTop" class="dialog"></div>
<h1 style="position:absolute;left:-9999px">
    <a href="#" title="安卓游戏" target="_blank">安卓游戏</a>
</h1>

<!--{include file="inc_top.php"}-->

<!--{include file="inc_menu.php"}-->

<!--content begin-->
<div class="content">
    <!--第一层 begin-->
    <div class="layout">
        <!--大图轮播 begin-->
        <div class="ban-wrap" id="banner">
            <div class="ban-main">
                <ul class="ban clearfix" style="width: 6880px; left: -860px;">
                    <!--{ad id=30}-->
                    <li>
                        <a href="<!--{$ad.link}-->" target="_blank">
                            <img src="<!--{$ad.image}-->" alt="<!--{$ad.alt}-->"/>
                        </a>
                    </li>
                    <!--{/ad}-->
                </ul>
                <a href="javascript:;" title="" class="ban-next ban-btn" id="next"><i></i></a>
                <a href="javascript:;" title="" class="ban-prev ban-btn" id="prev"><i></i></a>
            </div>
        </div>
        <!--大图轮播 end-->
        <!--第一层 begin-->
        <div class="mod-box layout-r">
            <div class="mod-head">
                <h2 class="cap-first">今日推荐</h2>
            </div>
            <div class="mod-cont mod-first">
                <!--{recommend id=40 row=1}-->
                <a href="<!--{link m='app' app_id=$recommend.app_id}-->" title="<!--{$recommend.app_title}-->"
                   target="_self" class="mod-first-icon">
                    <img src="<!--{$recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->下载">
                </a>

                <div class="mod-first-des clearfix">
                    <a class="mod-first-tit" href="<!--{link m='app' app_id=$recommend.app_id}-->"
                       title="<!--{$recommend.app_title}-->" target="_self">
                        <!--{$recommend.app_title}-->
                    </a>

                    <p class="mod-first-txt">
                        <!--{$recommend.app_seodesc}-->
                    </p>
                </div>
                <div class="mod-first-coll">
                    <div class="mod-coll">
                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="coll-btn coll-down"></a>
                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                           class="coll-btn coll-love "></a>
                    </div>
                </div>
                <!--{/recommend}-->
            </div>

            <div class="dl-good">
                <h3>最受<em>欢迎</em></h3>
                <ul class="dl-good-list clearfix">
                    <!--{recommend id=30 row=3}-->
                    <li class="good-first">
                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                           title="<!--{$recommend.app_title}-->" class="good-link" target="_self">
                            <img src="<!--{$recommend.app_logo}-->" width="68" height="68">
                            <span>
                                 <!--{$recommend.app_title}-->
                            </span>
                        </a>
                    </li>
                    <!--{/recommend}-->
                </ul>
            </div>
        </div>
    </div>
    <!--第一层 end-->
    <!--第二层 begin-->
    <div class="layout">
        <div class="mod-box layout-l">
            <div class="mod-head">

                <h2 class="cap-recom">精品推荐</h2>

                <p class="mod-class mod-more">
                    <a href="<!--{link m='recommends' id=41}-->" title="更多" target="_blank">更多</a>
                </p>
            </div>
            <div class="mod-cont">
                <ul class="mod-recom mod-list clearfix" style="_float:left; _width: 425px;">
                    <!--{recommend id=41 row=12}-->
                    <li class="">
                        <div class="mode-app-wrap">
                            <a class="mode-app-name" href="<!--{link m='app' app_id=$recommend.app_id}-->"
                               title="<!--{$recommend.app_title}-->" target="_blank"><!--{$recommend.app_title}--></a>

                            <div class="mode-app">
                                <a class="mode-app-icon" href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                   title="<!--{$recommend.app_title}-->" target="_self">
                                    <img src="<!--{$recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->">
                                </a>

                                <div class="mode-app-des">
                                    <p class="num">
                                        <!--{$recommend.app_title}-->
                                    </p>
                                    <!--{round($recommend.history_size/1024/1024,2)}-->MB
                                    <p class="star-wrap">
                                    <span class="star star-grey">
                                        <span class="star star-light stars-<!--{$recommend.app_recomment}-->"></span>
                                    </span>
                                    </p>

                                    <div class="mode-app-func">
                                        <div class="mod-coll">

                                            <a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                               title="<!--{$recommend.app_title}-->" class="coll-btn coll-down"></a>

                                            <a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                               title="<!--{$recommend.app_title}-->" class="coll-btn coll-love "></a>
                                        </div>
                                        <span class="score"><!--{$recommend.app_grade}-->分</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!--{/recommend}-->
                </ul>
            </div>
        </div>

        <div class="mod-box layout-r">
            <div class="mod-head">
                <h3 class="cap-new">上升最快</h3>
                <a class="mod-more" href="<!--{link m='recommends' id=61}-->" target="_blank">更多</a>
            </div>
            <ul class="mod-cont mod-coming clearfix">
                <!--{recommend id=61 row=1 }-->
                <li class="curr">
                    <div class="coming">
                        <a href="<!--{link m='app' app_id=$recommend.app_id }-->" class="coming-icon"
                           target="_blank">
                            <img src="<!--{imageurl url = $recommend.app_logo}-->">
                        </a>

                        <div class="coming-des">
                            <a class="coming-tit" href="<!--{link m='app' app_id=$recommend.app_id }-->"
                               target="_blank">
                                <!--{$recommend.app_title}-->
                            </a></br>
                            <span class="company"><b>游戏厂商:</b>上海</span></br>
                        <span class="time">
                            <b>发布时间:</b><!--{$recommend.app_update_time|date_format:"Y年m月d日"}-->
                        </span>
                        </div>
                    </div>
                    <div class="coming-normal">
                        <a href="<!--{link m='app' app_id=$recommend.app_id }-->" class="coming-name"
                           target="_blank">
                            <!--{$recommend.app_title}-->
                        </a>
                        <span class="coming-class"><!--{$recommend.cname}--></span>
                      <span>
                            <b>发布时间:</b><!--{$recommend.app_update_time|date_format:"Y年m月d日"}-->
                      </span>
                    </div>
                </li>
                <!--{/recommend}-->
                <!--{recommend id=61 row=7 start=1}-->
                <li>
                    <div class="coming">
                        <a href="<!--{link m='app' app_id=$recommend.app_id }-->" class="coming-icon"
                           target="_blank">
                            <img src="<!--{imageurl url = $recommend.app_logo}-->">
                        </a>

                        <div class="coming-des">
                            <a class="coming-tit" href="<!--{link m='app' app_id=$recommend.app_id }-->"
                               target="_blank">
                                <!--{$recommend.app_title}-->
                            </a></br>
                            <span class="company"><b>游戏厂商:</b>上海</span></br>
                        <span class="time">
                            <b>发布时间:</b><!--{$recommend.app_update_time|date_format:"Y年m月d日"}-->
                        </span>
                        </div>
                    </div>
                    <div class="coming-normal">
                        <a href="<!--{link m='app' app_id=$recommend.app_id }-->" class="coming-name"
                           target="_blank">
                            <!--{$recommend.app_title}-->
                        </a>
                        <span class="coming-class"><!--{$recommend.cname}--></span>
                      <span>
                            <b>发布时间:</b><!--{$recommend.app_update_time|date_format:"Y年m月d日"}-->
                      </span>
                    </div>
                </li>
                <!--{/recommend}-->
            </ul>
        </div>
    </div>
    <!--第二层 end-->

    <!--最新安卓游戏 begin-->
    <div class="layout">
        <div class="mod-box">
            <div class="mod-head">
                <h2 class="cap-big">
                    <a href="<!--{link m='games'}-->">安卓游戏</a>
                </h2>
                <ul class="mod-nav mb_nav1">
                    <li class="curr"><a href="javascript:void(0);" title="安卓游戏">最新</a></li>
                    <li><a href="javascript:void(0);" title="安卓游戏">最热</a></li>
                    <li><a href="javascript:void(0);" title="安卓游戏">评分</a></li>
                </ul>
                <a class="mod-more" href="<!--{link m='games'}-->" title="安卓最新软件" target="_blank">更多</a>
            </div>

            <div>
                <div class="mod-cont ly-tab">

                    <ul class="mod-game mod-list clearfix">
                        <!--{applist parent=2 }-->
                        <li class="">
                            <div class="mode-app-wrap">
                                <a class="mode-app-name" href="<!--{link m='app' app_id=$applist.app_id }-->"
                                   title="<!--{$applist.app_title}-->" target="_blank"><!--{$applist.app_title}--></a>

                                <div class="mode-app">
                                    <a class="mode-app-icon"
                                       href="<!--{link m='app' app_id=$applist.app_id }-->"
                                       title="<!--{$applist.app_title}-->" target="_blank">
                                        <img src="<!--{$applist.app_logo}-->" alt="割绳子魔法">
                                    </a>

                                    <div class="mode-app-des">
                                        <p class="num">
                                            <!--{$applist.app_title}-->
                                        </p>
                                        <!--{round($applist.history_size/1024/1024,2)}-->MB
                                        <p class="star-wrap">
                                    <span class="star star-grey">
                                        <span class="star star-light stars-<!--{$applist.app_recomment}-->"><!--{$applist.app_grade}--></span>
                                    </span>
                                        </p>

                                        <div class="mode-app-func">
                                            <div class="mod-coll">

                                                <a href="<!--{link m='app' app_id=$applist.app_id }-->"
                                                   title="<!--{$applist.app_title}-->" class="coll-btn coll-down"></a>

                                                <a href="<!--{link m='app' app_id=$applist.app_id}-->"
                                                   title="<!--{$applist.app_title}-->" class="coll-btn coll-love "></a>
                                            </div>

                                            <span class="score"><!--{$applist.app_grade}-->分</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--{/applist}-->
                    </ul>
                </div>
                <div class="mod-cont ly-tab" style="display: none">

                    <ul class="mod-game mod-list clearfix">
                        <!--{applist parent=2 order="app.app_down desc"}-->
                        <li class="">
                            <div class="mode-app-wrap">
                                <a class="mode-app-name" href="<!--{link m='app' app_id=$applist.app_id }-->"
                                   title="<!--{$applist.app_title}-->" target="_blank"><!--{$applist.app_title}--></a>

                                <div class="mode-app">
                                    <a class="mode-app-icon"
                                       href="<!--{link m='app' app_id=$applist.app_id }-->"
                                       title="<!--{$applist.app_title}-->" target="_blank">
                                        <img src="<!--{$applist.app_logo}-->" alt="割绳子魔法">
                                    </a>

                                    <div class="mode-app-des">
                                        <p class="num">
                                            <!--{$applist.app_title}-->
                                        </p>
                                        <!--{round($applist.history_size/1024/1024,2)}-->MB
                                        <p class="star-wrap">
                                    <span class="star star-grey">
                                        <span class="star star-light stars-<!--{$applist.app_recomment}-->"><!--{$applist.app_grade}-->分</span>
                                    </span>
                                        </p>

                                        <div class="mode-app-func">
                                            <div class="mod-coll">

                                                <a href="<!--{link m='app' app_id=$applist.app_id }-->"
                                                   title="<!--{$applist.app_title}-->" class="coll-btn coll-down"></a>

                                                <a href="<!--{link m='app' app_id=$applist.app_id}-->"
                                                   title="<!--{$applist.app_title}-->" class="coll-btn coll-love "></a>
                                            </div>

                                            <span class="score"><!--{$applist.app_grade}-->分</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--{/applist}-->
                    </ul>
                </div>
                <div class="mod-cont ly-tab" style="display: none">

                    <ul class="mod-game mod-list clearfix">
                        <!--{applist parent=2  order="app.app_grade desc"}-->
                        <li class="">
                            <div class="mode-app-wrap">
                                <a class="mode-app-name" href="<!--{link m='app' app_id=$applist.app_id }-->"
                                   title="<!--{$applist.app_title}-->" target="_blank"><!--{$applist.app_title}--></a>

                                <div class="mode-app">
                                    <a class="mode-app-icon"
                                       href="<!--{link m='app' app_id=$applist.app_id }-->"
                                       title="<!--{$applist.app_title}-->" target="_blank">
                                        <img src="<!--{$applist.app_logo}-->" alt="割绳子魔法">
                                    </a>

                                    <div class="mode-app-des">
                                        <p class="num">
                                            <!--{$applist.app_title}-->
                                        </p>
                                        <!--{round($applist.history_size/1024/1024,2)}-->MB
                                        <p class="star-wrap">
                                    <span class="star star-grey">
                                        <span class="star star-light stars-<!--{$applist.app_recomment}-->"><!--{$applist.app_grade}--></span>
                                    </span>
                                        </p>

                                        <div class="mode-app-func">
                                            <div class="mod-coll">

                                                <a href="<!--{link m='app' app_id=$applist.app_id }-->"
                                                   title="<!--{$applist.app_title}-->" class="coll-btn coll-down"></a>

                                                <a href="<!--{link m='app' app_id=$applist.app_id}-->"
                                                   title="<!--{$applist.app_title}-->" class="coll-btn coll-love "></a>
                                            </div>

                                            <span class="score"><!--{$applist.app_grade}-->分</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--{/applist}-->
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!--最新安卓游戏 end-->
    <!--最新安卓软件 begin-->
    <div class="layout">
        <div class="mod-box">
            <div class="mod-head mod_header">
                <h2 class="cap-soft"><a href="<!--{link m='softs'}-->" title="安卓软件" target="_blank">安卓软件</a></h2>
                <ul class="mod-nav mb_nav">
                    <li class="curr"><a href="javascript:void(0);">最新</a></li>
                    <li><a href="javascript:void(0);">最热</a></li>
                    <li><a href="javascript:void(0);" title="安卓五星软件">评分</a></li>
                </ul>
                <a href="<!--{link m='softs'}-->" class="mod-more" target="_blank"
                   id="hod">更多</a>
                <a href="<!--{link m='softs'}-->" class="mod-more" target="_blank" style="display:none;"
                   id="newapp">更多</a>
            </div>
            <div>
                <div class="mod-cont ly-ta">

                    <ul class="mod-game mod-list clearfix">
                        <!--{applist parent=1 }-->
                        <li class="">
                            <div class="mode-app-wrap">
                                <a class="mode-app-name" href="<!--{link m='app' app_id=$applist.app_id }-->"
                                   title="<!--{$applist.app_title}-->" target="_blank"><!--{$applist.app_title}--></a>

                                <div class="mode-app">
                                    <a class="mode-app-icon"
                                       href="<!--{link m='app' app_id=$applist.app_id }-->"
                                       title="<!--{$applist.app_title}-->" target="_blank">
                                        <img src="<!--{$applist.app_logo}-->" alt="割绳子魔法">
                                    </a>

                                    <div class="mode-app-des">
                                        <p class="num">
                                            <!--{$applist.app_title}-->
                                        </p>
                                        <!--{round($applist.history_size/1024/1024,2)}-->MB
                                        <p class="star-wrap">
                                    <span class="star star-grey">
                                        <span class="star star-light stars-<!--{$applist.app_recomment}-->"><!--{$applist.app_grade}--></span>
                                    </span>
                                        </p>

                                        <div class="mode-app-func">
                                            <div class="mod-coll">

                                                <a href="<!--{link m='app' app_id=$applist.app_id }-->"
                                                   title="<!--{$applist.app_title}-->" class="coll-btn coll-down"></a>

                                                <a href="<!--{link m='app' app_id=$applist.app_id}-->"
                                                   title="<!--{$applist.app_title}-->" class="coll-btn coll-love "></a>
                                            </div>

                                            <span class="score"><!--{$applist.app_grade}-->分</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--{/applist}-->
                    </ul>
                </div>
                <div class="mod-cont ly-ta" style="display: none">

                    <ul class="mod-game mod-list clearfix">
                        <!--{applist parent=1 order="app.app_down desc"}-->
                        <li class="">
                            <div class="mode-app-wrap">
                                <a class="mode-app-name" href="<!--{link m='app' app_id=$applist.app_id }-->"
                                   title="<!--{$applist.app_title}-->" target="_blank"><!--{$applist.app_title}--></a>

                                <div class="mode-app">
                                    <a class="mode-app-icon"
                                       href="<!--{link m='app' app_id=$applist.app_id }-->"
                                       title="<!--{$applist.app_title}-->" target="_blank">
                                        <img src="<!--{$applist.app_logo}-->" alt="割绳子魔法">
                                    </a>

                                    <div class="mode-app-des">
                                        <p class="num">
                                            <!--{$applist.app_title}-->
                                        </p>
                                        <!--{round($applist.history_size/1024/1024,2)}-->MB
                                        <p class="star-wrap">
                                    <span class="star star-grey">
                                        <span class="star star-light stars-<!--{$applist.app_recomment}-->"><!--{$applist.app_grade}--></span>
                                    </span>
                                        </p>

                                        <div class="mode-app-func">
                                            <div class="mod-coll">

                                                <a href="<!--{link m='app' app_id=$applist.app_id }-->"
                                                   title="<!--{$applist.app_title}-->" class="coll-btn coll-down"></a>

                                                <a href="<!--{link m='app' app_id=$applist.app_id}-->"
                                                   title="<!--{$applist.app_title}-->" class="coll-btn coll-love "></a>
                                            </div>

                                            <span class="score"><!--{$applist.app_grade}-->分</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--{/applist}-->
                    </ul>
                </div>
                <div class="mod-cont ly-ta" style="display: none">

                    <ul class="mod-game mod-list clearfix">
                        <!--{applist parent=1  order="app.app_grade desc"}-->
                        <li class="">
                            <div class="mode-app-wrap">
                                <a class="mode-app-name" href="<!--{link m='app' app_id=$applist.app_id }-->"
                                   title="<!--{$applist.app_title}-->" target="_blank"><!--{$applist.app_title}--></a>

                                <div class="mode-app">
                                    <a class="mode-app-icon"
                                       href="<!--{link m='app' app_id=$applist.app_id }-->"
                                       title="<!--{$applist.app_title}-->" target="_blank">
                                        <img src="<!--{$applist.app_logo}-->" alt="割绳子魔法">
                                    </a>

                                    <div class="mode-app-des">
                                        <p class="num">
                                            <!--{$applist.app_title}-->
                                        </p>
                                        <!--{round($applist.history_size/1024/1024,2)}-->MB
                                        <p class="star-wrap">
                                    <span class="star star-grey">
                                        <span class="star star-light stars-<!--{$applist.app_recomment}-->"><!--{$applist.app_grade}--></span>
                                    </span>
                                        </p>

                                        <div class="mode-app-func">
                                            <div class="mod-coll">

                                                <a href="<!--{link m='app' app_id=$applist.app_id }-->"
                                                   title="<!--{$applist.app_title}-->" class="coll-btn coll-down"></a>

                                                <a href="<!--{link m='app' app_id=$applist.app_id}-->"
                                                   title="<!--{$applist.app_title}-->" class="coll-btn coll-love "></a>
                                            </div>

                                            <span class="score"><!--{$applist.app_grade}-->分</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--{/applist}-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- module-soft -->
    <!--最新安卓软件 end-->
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
    <!--安卓资讯 begin-->
    <div class="layout">
        <div class="mod-box">
            <div class="mod-head">
                <h2 class="cap-info"><a href="/" title="安卓资讯" target="_self">热门资讯</a></h2>
                <a class="mod-more" href="<!--{link m='infos' last_cate_id=4}-->" title="安卓资讯" target="_self">更多</a>
            </div>
            <div class="mod-cont">
                <ul class="mod-info clearfix">
                    <!--{infolist last_cate_id=2 row=1 start=0}-->
                    <li class="mod-thumb-b">
                        <a href="<!--{link m='info' info_id=$infolist.info_id}-->"
                           title="<!--{$infolist.info_title}-->" target="_blank" class="thumb-b-img" style="top: 0px;">
                            <img src="<!--{$infolist.info_img}-->" alt="<!--{$infolist.info_title}-->">
                        </a>
                        <a class="thumb-app" href="<!--{link m='info' info_id=$infolist.info_id}-->" title="<!--{$infolist.info_title}-->" target="_blank">
                            <!--{$infolist.info_title}--></a>

                        <div class="mod-cover"></div>
                        <div class="thumb-des-wrap">
                            <div class="thumb-des">
                                <em></em>
                                <a href="<!--{link m='info' info_id=$infolist.info_id}-->"
                                   title="<!--{$infolist.info_title}-->" target="_blank" class="thumb-des-txt">
                                    <!--{$infolist.info_desc}--></a>
                            </div>
                        </div>
                    </li>
                    <!--{/infolist}-->
                    <!--{infolist last_cate_id=2 row=6 start=1}-->
                    <li class="mod-thumb">
                        <a href="<!--{link m='info' info_id=$infolist.info_id}-->"
                           title="<!--{$infolist.info_title}-->" target="_blank" class="thumb-img" style="top: 0px;">
                            <img src="<!--{$infolist.info_img}-->" alt="<!--{$infolist.info_title}-->">
                        </a>
                        <a class="thumb-app" href="<!--{link m='info' info_id=$infolist.info_id}-->" title="<!--{$infolist.info_title}-->" target="_blank">
                            <!--{$infolist.info_title}--></a>

                        <div class="mod-cover"></div>
                        <div class="thumb-des-wrap">
                            <div class="thumb-des">
                                <em></em>
                                <a href="<!--{link m='info' info_id=$infolist.info_id}-->" target="_blank"
                                   class="thumb-des-txt"><!--{$infolist.info_desc}--></a>
                            </div>
                        </div>
                    </li>
                    <!--{/infolist}-->
                </ul>
            </div>
        </div>
    </div>
    <!--安卓资讯 end-->

    <!--/ 友情链接 -->

    <div class="layout content">
        <div class="mod-box">
            <h3 class="mod-course-tit">友情链接</h3>
            <div class="mod-cont mod-course clearfix">
                <div class="course clearfix">
                    <ul class="course-list">
                        <!--{friendlink type=1}-->
                        <!--{if !$friendlink.flink_img}-->
                        <li>
                            <a target="_blank" href="<!--{$friendlink.flink_url}-->">
                                <b><!--{$friendlink.flink_name}--></b>
                            </a>
                        </li>
                        <!--{else}-->
                        <li>
                            <a target="_blank" href="<!--{$friendlink.flink_url}-->">
                                <img style="display: inline-block; position: relative; top:3px;" width="20" height="20" src="<!--{$friendlink.flink_img}-->"/>
                                <b><!--{$friendlink.flink_name}--></b>
                            </a>
                        </li>
                        <!--{/if}-->
                        <!--{/friendlink}-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!--登录弹出框 e-->
<div class="overlay" id="overlay" style="display: none; height: 1978px;"></div>
<a id="toTop" title="返回顶部" target="_self" href="javascript:void(0)" style="display: none;"><i></i></a>

<script src="<!--{$tpl_path}-->js/index.js"></script>

<!--{include file="inc_foot.php"}-->

<script src="<!--{$tpl_path}-->js/base.js" type="text/javascript"></script>
<script type="text/javascript">
    $.lazyImg.start("scroll", {attributeTag: 'o-src'});
    $(function () {
        $("#key").autoSearch();
        //Adapt.init();
        $("#baseLog .log-now").attr("href", "http://oauth.d.cn/auth/goLogin.html");
        $(window).scroll(function () {
            toTopHide();
            $("#toTop").click(function () {
                window.scrollTo(0, 0);
                return false;
            });
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $(".mod-head .mb_nav1 li").click(function () {
            $(this).addClass("curr").siblings().removeClass("curr");
            $('.ly-tab').hide();
            $('.ly-tab').eq($(this).index()).show();
        });
    });

    $(function () {
        $(".mod-head .mb_nav li").click(function () {
            $(this).addClass("curr").siblings().removeClass("curr");
            $('.ly-ta').hide();
            $('.ly-ta').eq($(this).index()).show();
        });
    });

    $(function () {
        $('.app-list li').hover(function () {
            $(this).addClass('curr')
        }, function () {
            $(this).removeClass('curr')
        })
    });

</script>

<script src="<!--{$tpl_path}-->js/h.js" type="text/javascript"></script>

</body>
</html>
