<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><!--{$setting.seo_title}--></title>
    <!--{include file="inc_head.php"}-->
</head>

<body>
<div id="header">
    <!--{include file="inc_top.php"}-->
    <div class="erjinav clearfix">
        <!--{include file="inc_menu.php"}-->
    </div>
</div>

<div id="main" class="layout">
    <div class="box">
        <div class="itoptui">
            <div class="itoptui_tit"><!--{row name='recommend' id=33}--><!--{$row.area_title}--><!--{/row}--></div>
            <ul class="clearfix">
                <!--{recommend id=41 row=8}-->
                <li>
                    <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="app_90" target="_blank">
                        <i class="app_img_90"></i>
                        <img src="<!--{imageurl url = $recommend.app_logo}-->">
                    </a>

                    <p class="app_tit_90_new"><a href="<!--{link m='app' app_id=$recommend.app_id}-->">
                            <!--{$recommend.app_title}--></a></p>
                </li>
                <!--{/recommend}-->
            </ul>
        </div>
        <div class="adtu">

            <!-- banner -->
            <div class="banner public-bg">
                <div id="pic-box">
                    <ul id="show-pic" style="left:0;">
                        <!--{ad id=30}-->
                        <li><a href="<!--{$ad.link}-->" target="_blank"><img src="<!--{$ad.image}-->" width="508"
                                                                             height="296" alt="<!--{$ad.alt}-->"/></a>
                        </li>
                        <!--{/ad}-->
                    </ul>
                    <ul id="icon-num">
                        <!--{ad id=30}-->
                        <!--{if $ad.sort_show == 1 }-->
                        <li class="active"></li>
                        <!--{else}-->
                        <li></li>
                        <!--{/if}-->
                        <!--{/ad}-->
                    </ul>
                </div>
            </div>
            <!--/ banner -->
        </div>

        <div class="inews">
            <div class="itit"><a href="<!--{link m='infos' last_cate_id=2}-->" class="more">更多</a>新闻资讯</div>

            <div class="inewscon">
                <!--{infolist id=2 row=1}-->
                <h2><a href="<!--{link m='info' info_id=$infolist.info_id}-->" target="_blank"
                       title=" <!--{$infolist.info_title}-->"> <!--{$infolist.info_title}--></a></h2>
                <!--{/infolist}-->
                <p class="inewscon_tui clearfix">
                    <!--{infolist id=2 row=2 start=1}-->

                    <a href="<!--{link m='info' info_id=$infolist.info_id}-->" target="_blank">
                        <!--{$infolist.info_title}--></a>

                    <!--{/infolist}-->
                <ul>
                    <!--{infolist id=3 row=4}-->
                    <li><span class="time"> <!--{date('m-d',$infolist.create_time)}--></span><a
                            href="<!--{link m='info' info_id=$infolist.info_id}-->" target="_blank">
                            <!--{$infolist.info_title}--></a></li>
                    <!--{/infolist}-->

                </ul>

            </div>
        </div>

        <div class="box">
            <div class="itit"><a href="<!--{link m='recommends' id=42}-->" class="more" target="_blank"
                                 id="hod">更多</a>
                <a href="<!--{link m='recommends' id=29}-->" class="more" target="_blank" style="display:none;"
                   id="newapp">更多</a>
                <a href="javascript:showititbox('ihot');" id="dq_rmyy" class="itita" onclick="hod()"><!--{row name='recommend' id=42}--><!--{$row.area_title}--><!--{/row}--></a>
                <a href="javascript:showititbox('izuixin');" id="dq_zxyy" class="" onclick="newapp()"><!--{row name='recommend' id=40}--><!--{$row.area_title}--><!--{/row}--></a></div>
            <ul class="ihot">

                <!--{recommend id=42 row=14}-->
                <li>
                    <div class="ihot_list"><a>
                        </a><a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="app_100">
                            <i class="app_img_100"></i>
                            <img src="<!--{imageurl url = $recommend.app_logo}-->">
                        </a>

                        <p class="app_tit_100"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                                  target="_blank"><!--{$recommend.app_title}--></a></p>

                        <p class="app_info"><a href="<!--{link m='games' cate_id=$recommend.cate_id}-->"
                                               target="_blank"><!--{$recommend.cname}--></a> ·
                            <!--{round($recommend.history_size/1024/1024,2)}-->MB</p>

                        <div class="iremen_dwon"><a
                                href="<!--{link m='app' app_id=$recommend.app_id}-->">立即下载</a></div>
                    </div>
                </li>

                <!--{/recommend}-->
            </ul>
            <ul class="izuixin" style="display:none">
                <!--{recommend id=29 row=14}-->
                <li>
                    <div class="ihot_list"><a>
                        </a><a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="app_100">
                            <i class="app_img_100"></i>
                            <img src="<!--{imageurl url = $recommend.app_logo}-->">
                        </a>

                        <p class="app_tit_100"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                                  target="_blank"><!--{$recommend.app_title}--></a></p>

                        <p class="app_info"><a href="<!--{link m='games' cate_id=$recommend.cate_id}-->"
                                               target="_blank"><!--{$recommend.cname}--></a> ·
                            <!--{round($recommend.history_size/1024/1024,2)}-->MB</p>

                        <div class="iremen_dwon"><a
                                href="<!--{link m='app' app_id=$recommend.app_id}-->">立即下载</a></div>
                    </div>
                </li>
                <!--{/recommend}-->
            </ul>
        </div>

        <div class="anyx_zhuanti clearfix">
            <h2><a href="<!--{link m='specials'}-->" target="_blank">更多</a>精品专题</h2>
            <ul class="clearfix">
                <!--{list name='special' row=4 }-->

                <li><a href="<!--{link m='special' special_id=$list.area_id}-->" target="_blank"><img
                            src="<!--{$list.area_logo}-->" data-pinit="registered"></a>

                    <p><a href="<!--{link m='special' special_id=$list.area_id}-->" target="_blank">
                            <!--{$list.area_title}--></a></p></li>
                <!--{/list}-->
            </ul>
        </div>


        <div class="box">
            <div class="itit"><a href="<!--{link m='recommends' id=30}-->" class="more" target="_blank">更多</a><!--{row name='recommend' id=30}--><!--{$row.area_title}--><!--{/row}-->
            </div>
            <ul class="ifenlei clearfix">
                <!--{recommend id=30 row=4}-->
                <li>
                    <div class="ifenlei_list clearfix">
                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="app_90">
                            <i class="app_img_90"></i>
                            <img src="<!--{imageurl url = $recommend.app_logo}-->">
                        </a>

                        <p class="app_tit_90"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                                 target="_blank"><!--{$recommend.app_title}--></a></p>

                        <div class="app_intro"><!--{countdown down=$recommend.app_down}--> 人安装 ·
                            <!--{round($recommend.history_size/1024/1024,2)}-->MB
                        </div>
                    </div>
                </li>
                <!--{/recommend}-->
            </ul>
        </div>
        <div class="box">
            <div class="itit"><a href="<!--{link m='recommends' id=42}-->" class="more" target="_blank">更多</a><!--{row name='recommend' id=68}--><!--{$row.area_title}--><!--{/row}-->
            </div>
            <ul class="ifenlei clearfix">
                <!--{recommend id=42 row=4}-->
                <li>
                    <div class="ifenlei_list clearfix">
                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="app_90">
                            <i class="app_img_90"></i>
                            <img src="<!--{imageurl url = $recommend.app_logo}-->">
                        </a>

                        <p class="app_tit_90"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                                 target="_blank"><!--{$recommend.app_title}--></a></p>

                        <div class="app_intro"><!--{countdown down=$recommend.app_down}-->人安装 ·
                            <!--{round($recommend.history_size/1024/1024,2)}-->MB
                        </div>
                    </div>
                </li>
                <!--{/recommend}-->
            </ul>
        </div>

        <div class="box">
            <div class="itit"><a href="<!--{link m='recommends' id=44}-->" class="more" target="_blank">更多</a><!--{row name='recommend' id=61}--><!--{$row.area_title}--><!--{/row}-->
            </div>
            <ul class="ifenlei clearfix">
                <!--{recommend id=44 row=8}-->
                <li>
                    <div class="ifenlei_list clearfix">
                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="app_90">
                            <i class="app_img_90"></i>
                            <img src="<!--{imageurl url = $recommend.app_logo}-->">
                        </a>

                        <p class="app_tit_90"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                                 target="_blank"><!--{$recommend.app_title}--></a></p>

                        <div class="app_intro"><!--{countdown down=$recommend.app_down}-->人安装 ·
                            <!--{round($recommend.history_size/1024/1024,2)}-->MB
                        </div>
                    </div>
                </li>
                <!--{/recommend}-->
            </ul>
        </div>

        <!--游戏开服-->
            <!--{navicat}-->
            <!--{if ($navicat.navicat_m =='list_service' && $navicat.navicat_enabled =='1')}-->
            <div class="kf-box box">
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
                                    <!--{$seolist.o_start_time|date_format:"H:i"}-->
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
                                    <!--{$openlist.o_start_time|date_format:"H:i"}--><br/>
                                    <!--{$openlist.o_end_time|date_format:"m-d"}-->
                                    <!--{$openlist.o_end_time|date_format:"H:i"}-->
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
        <div class="box">
            <div class="itit"><a href="<!--{link m='necessaries'}-->" class="more" target="_blank">更多</a><!--{row name='recommend' id=31}--><!--{$row.area_title}--><!--{/row}--></div>
            <ul class="ifenlei clearfix">
                <!--{recommend id=31 row=8}-->
                <li>
                    <div class="ifenlei_list clearfix">
                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="app_90">
                            <i class="app_img_90"></i>
                            <img src="<!--{imageurl url = $recommend.app_logo}-->">
                        </a>

                        <p class="app_tit_90"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                                 target="_blank"><!--{$recommend.app_title}--></a></p>

                        <div class="app_intro"><!--{countdown down=$recommend.app_down}-->人安装 ·
                            <!--{round($recommend.history_size/1024/1024,2)}-->MB
                        </div>
                    </div>
                </li>
                <!--{/recommend}-->
            </ul>
        </div>
        <!-- f-link -->
        <div class="box">
            <div class="itit">友情链接</div>
            <div class="flink">
                <!--{friendlink type=1}-->
                <!--{if !$friendlink.flink_img}-->
                <a target="_blank" href="<!--{$friendlink.flink_url}-->">
                    <b><!--{$friendlink.flink_name}--></b>
                </a>
                <!--{else}-->
                <a target="_blank" href="<!--{$friendlink.flink_url}-->">
                    <img style="display: inline-block; position: relative; top:3px;" width="20" height="20" src="<!--{$friendlink.flink_img}-->"/>
                    <b><!--{$friendlink.flink_name}--></b>
                </a>
                <!--{/if}-->
                <!--{/friendlink}-->
            </div>
        </div>
        <!-- f-link -->
    </div>
</div>
<script>
    function hod() {
        $("#hod").css('display', 'block');
        $("#newapp").css('display', 'none');
    }
    function newapp() {
        $("#newapp").css('display', 'block');
        $("#hod").css('display', 'none');
    }
</script>
<script type="text/javascript">
    /**焦点广告js */
    var glide = new function () {
        function $id(id) {
            return document.getElementById(id);
        };
        this.layerGlide = function (auto, oEventCont, oSlider, sSingleSize, second, fSpeed, point) {
            var oSubLi = $id(oEventCont).getElementsByTagName('li');
            var interval, timeout, oslideRange;
            var time = 1;
            var speed = fSpeed
            var sum = oSubLi.length;
            var a = 0;
            var delay = second * 1000;
            var setValLeft = function (s) {
                return function () {
                    oslideRange = Math.abs(parseInt($id(oSlider).style[point]));
                    $id(oSlider).style[point] = -Math.floor(oslideRange + (parseInt(s * sSingleSize) - oslideRange) * speed) + 'px';
                    if (oslideRange == [(sSingleSize * s)]) {
                        clearInterval(interval);
                        a = s;
                    }
                }
            };
            var setValRight = function (s) {
                return function () {
                    oslideRange = Math.abs(parseInt($id(oSlider).style[point]));
                    $id(oSlider).style[point] = -Math.ceil(oslideRange + (parseInt(s * sSingleSize) - oslideRange) * speed) + 'px';
                    if (oslideRange == [(sSingleSize * s)]) {
                        clearInterval(interval);
                        a = s;
                    }
                }
            }

            function autoGlide() {
                for (var c = 0; c < sum; c++) {
                    oSubLi[c].className = '';
                }
                ;
                clearTimeout(interval);
                if (a == (parseInt(sum) - 1)) {
                    for (var c = 0; c < sum; c++) {
                        oSubLi[c].className = '';
                    }
                    ;
                    a = 0;
                    oSubLi[a].className = "active";
                    interval = setInterval(setValLeft(a), time);
                    timeout = setTimeout(autoGlide, delay);
                } else {
                    a++;
                    oSubLi[a].className = "active";
                    interval = setInterval(setValRight(a), time);
                    timeout = setTimeout(autoGlide, delay);
                }
            }

            if (auto) {
                timeout = setTimeout(autoGlide, delay);
            }
            ;
            for (var i = 0; i < sum; i++) {
                oSubLi[i].onmouseover = (function (i) {
                    return function () {
                        for (var c = 0; c < sum; c++) {
                            oSubLi[c].className = '';
                        }
                        ;
                        clearTimeout(timeout);
                        clearInterval(interval);
                        oSubLi[i].className = "active";
                        if (Math.abs(parseInt($id(oSlider).style[point])) > [(sSingleSize * i)]) {
                            interval = setInterval(setValLeft(i), time);
                            this.onmouseout = function () {
                                if (auto) {
                                    timeout = setTimeout(autoGlide, delay);
                                }
                                ;
                            };
                        } else if (Math.abs(parseInt($id(oSlider).style[point])) < [(sSingleSize * i)]) {
                            interval = setInterval(setValRight(i), time);
                            this.onmouseout = function () {
                                if (auto) {
                                    timeout = setTimeout(autoGlide, delay);
                                }
                                ;
                            };
                        }
                    }
                })(i)
            }
        }
    };
    glide.layerGlide(true, 'icon-num', 'show-pic', 508, 2, 0.1, 'left');
    /**参数设置
     *glide.layerGlide((oEventCont,oSlider,sSingleSize,sec,fSpeed,point);
     *@param auto type:bolean 是否自动滑动 当值是true的时候 为自动滑动
     *@param oEventCont type:object 包含事件点击对象的容器
     *@param oSlider type:object 滑动对象
     *@param sSingleSize type:number 滑动对象里单个元素的尺寸（width或者height）
     *@param second type:number 自动滑动的延迟时间  单位/秒
     *@param fSpeed type:float   速率 取值在0.05--1之间 当取值是1时  没有滑动效果
     *@param point type:string   向left滚动
     */
</script>
<!--{include file="inc_foot.php"}-->
