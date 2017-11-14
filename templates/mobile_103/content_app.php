<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <meta http-equiv="cache-control" content="no-cache" />
    <!--{if $app.app_stitle}-->
    <title><!--{$app.app_stitle}--></title>
    <meta name="keywords" content="<!--{$app.app_seokey}-->" />
    <meta name="description" content="<!--{$app.app_seodesc}-->" />
    <!--{else}-->
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->" />
    <meta name="description" content="<!--{$setting.seo_description}-->" />
    <!--{/if}-->

    <!--{include file="inc_head.php"}-->
</head>
<body>
<div id="doc">
    <header id="hds">
        <div class="titlebar" id="section_titlebar">
            <a class="g-block go-back" href="javascript:history.back();"></a>
            <span class="sep"></span>

            <h2 class="g-ellipsis title"><!--{$app.app_title}--></h2>
            <a class="g-block go-home" href="/" id="link-go-home"></a>
        </div>
    </header>
    <div id="bd">
        <div class="soft_detail" id="soft_detail">
            <div class="info">
                <img width="45" height="45" src="<!--{imageurl url =$app.app_logo}-->" class="photo"/>

                <div class="con">
                    <h3><!--{$app.app_title}--></h3>
                    <input type="hidden" value="<!--{$app.app_title}-->" id="soft_name"/>

                    <div class="stars_holder">
                        <div class="stars" <!--{countstar star=$app.app_recomment}-->></div>
                    </div>
                    <p class="size"><!--{round($app.history_size/1024/1024,2)}-->MB</p>

                    <p class="source">来自：<!--{$app.app_title}--></p>
                </div>
                <div class="down">
                    <p>下载：<!--{countdown down=$app.app_down}-->次</p>
                    <a href="<!--{link m='download' app_id=$app.app_id}-->" class="download">下载</a>
                </div>
            </div>
            <div class="from">
                <div class="check_pass">
                    <p>已通过安全检测</p>
                </div>

            </div>
            <div class="appImg clearf">
                <div class="img">
                    <!--{imagelist app_id=$app.app_id}-->
                    <img src="<!--{$imagelist.resource_url}-->"/>
                    <!--{/imagelist}-->
                </div>
            </div>
            <div class="version">
                <ul>
                    <li>版本：<!--{$app.history_version}--></li>
                    <li>系统：<!--{$app.history_system}--></li>
                    <li>分类：<!--{row name='app_category' id=$app.last_cate_id}-->
                        <!--{$row.cname}-->
                        <!--{/row}-->
                    </li>
                    <li>作者：<!--{$app.app_company}--></li>
                    <li>更新：<!--{$app.app_update_time|date_format:"%Y-%m-%d"}--> </li>
                </ul>
            </div>
            <div class="intro">
                <div class="details-item-r-text" >
                    <!--{$app.app_desc}-->
                 </div>
                <div class="control">
                    <span id="btn_open">展开</span>
                </div>
            </div>



            <dl class="comment" id="comment" style="display: block;">
                <dt class="g-title">
                    用户评价
                    <span id="comment_total">(<!--{$comment_count}-->)</span>
                </dt>
                <dd>
                    <ul id="comment_list">
                        <!--{list name='app_comment' id=$app.app_id row=10}-->
                        <li>
                            <div>
                                <span><!--{$list.comment_date|date_format:"%Y-%m-%d %H:%i:%s"}--></span>

                                <h3><!--{$list.comment_uname}--></h3>
                            </div>
                            <p><!--{$list.comment_content}--></p>
                        </li>
                        <!--{/list}-->
                    </ul>
                    <div class="loadmore loadmore-normal" id="loadmore">
                        <div class="load-status load-status-btn load-status-normal" style="display: none;">
                            加载更多&gt;&gt;
                        </div>
                        <div class="load-status load-status-btn load-status-loading" style="display: none;">
                            <span>加载中</span>
                        </div>
                        <div class="load-status load-status-btn load-status-failed" style="display: none;">
                            加载失败
                        </div>
                        <div class="load-status load-status-btn load-status-reload" style="display: none;">
                            重新加载&gt;&gt;
                        </div>
                    </div>
                </dd>
            </dl>
        </div>
        <div class="picbox" id="picbox">
            <ul id="pageWrap"
                style="width: 1920px; height: 470px; backface-visibility: hidden; transform: translate3d(0px, 0px, 0px);">
                <li style="transform: translate3d(0px, 0px, 0px); width: 1920px;"><img
                        src="<!--{$tpl_path}-->images/t016c28726532911ef7.png"/></li>
                <li style="transform: translate3d(1920px, 0px, 0px); width: 1920px;"><img
                        src="<!--{$tpl_path}-->images/t012e90056b05f87388.png"/></li>
                <li style="transform: translate3d(3840px, 0px, 0px); width: 1920px;"><img
                        src="<!--{$tpl_path}-->images/t011250125fe02a8147.png"/></li>
            </ul>
        </div>
        <style>
            .details-item-r-text{overflow: hidden;}
            .details-item-r-text p{ line-height: 1.6em; text-indent: 2em; }
            .details-item-r-text{ height: 64px;}
             .current_detail{ height: auto; }

            .picbox {
                background-color: rgba(0, 0, 0, .7);
                display: none;
                overflow: hidden;
                position: absolute;
                top: 0;
                z-index: 100
            }

            .picbox > ul {
                height: 100%;
                width: 300%
            }

            .picbox li {
                -webkit-box-align: center;
                display: -webkit-box;
                height: 100%;
                position: absolute;
                top: 0
            }

            .picbox img {
                display: block;
                margin: 0 auto;
                max-height: 95%;
                max-width: 95%
            }</style>

        <!--{include file="inc_foot.php"}-->
        <script>
            $(function(){

                $("#btn_open").toggle(function(){
                    $(this).addClass("close");
                    $(".details-item-r-text").addClass("current_detail");
                },function(){
                    $(this).removeClass("close");
                    $(".details-item-r-text").removeClass("current_detail");
                });//详情隐藏

            });
            function slide(e, t) {
                function p() {
                    isSliding = !1, d(), r.style.webkitTransition = "-webkit-transform 0 ease-out", r.style.webkitBackfaceVisibility = "hidden", r.style.webkitTransform = "translate3d(0,0,0)", r.addEventListener("touchstart", g, !1), r.addEventListener("touchmove", y, !1), r.addEventListener("touchend", b, !1), r.addEventListener("webkitTransitionEnd", m, !1), window.addEventListener("orientationchange"in window ? "orientationchange" : "resize", v, !1)
                }

                function d() {
                    o = window.innerWidth, r.style.width = o + "px", r.style.height = window.innerHeight + "px";
                    for (var e = 0; e < s; e++)i[e].style.webkitTransform = "translate3d(" + o * e + "px,0,0)", i[e].style.width = o + "px"
                }

                function v() {
                    setTimeout(d, 200)
                }

                function m() {
                    isSliding = !1
                }

                function g() {
                    if (isSliding)return;
                    var e = event.touches[0];
                    a = e.screenX, f = 0, isMoving = !1
                }

                function y() {
                    event.preventDefault();
                    if (isSliding)return;
                    var e = event.touches[0];
                    f = e.screenX - a, N(l + parseInt(f) / 2, 0)
                }

                function b() {
                    if (isSliding)return;
                    Math.abs(f) < 10 ? E() : f > 10 ? S() : f < -10 ? x() : T(c, u)
                }

                function w() {
                    n.style.display = "block"
                }

                function E() {
                    n.style.display = "none"
                }

                function S() {
                    c = --c >= 0 ? c : 0, T(c, u)
                }

                function x() {
                    c = ++c < s ? c : s - 1, T(c, u)
                }

                function T(e, t) {
                    isSliding = !0;
                    var n = -1 * e * o;
                    N(n, t), l = n
                }

                function N(e, t) {
                    r.style.webkitTransform = "translate3d(" + e + "px,0,0)", r.style.webkitTransitionDuration = t
                }

                var n = document.getElementById(e), r = t.wrap || n, i = t.conTn ? n.getElementsByTagName(t.conTn) : n.getElementsByClassName(t.conCn), s = i.length, o = 0, u = t.duration || ".3s", a = 0, f = 0, l = 0, c = 0, h = {
                    init: p,
                    slideTo: function (e, t) {
                        c != e && (c = e, T(e, u), isSliding = !1)
                    },
                    showSelf: w,
                    hideSelf: E
                };
                return h
            }
            (function () {
                var e = 0, t = 0, n = 0, r = 0, i = !1, s, o = slide("picbox", {
                    wrap: document.getElementById("pageWrap"),
                    conTn: "li"
                });
                setTimeout(function () {
                    o.init()
                }, 500), $(document.body).on("touchmove", function () {
                    if (i) {
                        var s = event.touches[0];
                        n = s.screenX - e, r = s.screenY - t
                    }
                }).on("touchend", function () {
                    if (!i)return;
                    Math.abs(n) < 5 && Math.abs(r) < 5 && (document.body.scrollTop = 0, o.showSelf(), o.slideTo(s)), e = 0, t = 0, n = 0, r = 0, i = !1
                }), $("#pic li>img").each(function (n) {
                    $(this).on("touchstart", function () {
                        s = n, e = event.touches[0].screenX, t = event.touches[0].screenY, i = !0
                    })
                })
            })()
        </script>

</body>
</html>