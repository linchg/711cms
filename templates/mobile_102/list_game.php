<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="data-spm" content="1"/>
    <meta http-equiv="Cache-Control" content="max-age=3600"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!--{if $cate_id}-->
    <!--{row name='app_category' id=$cate_id}-->
    <title><!--{$row.ctitle}--></title>
    <meta name="keywords" content="<!--{$row.ckey}-->"/>
    <meta name="description" content="<!--{$row.cdesc}-->"/>
    <!--{/row}-->
    <!--{else}-->
    <!--{row name='navicat' id=3}-->
    <title><!--{$row.navicat_seotitle}--></title>
    <meta name="keywords" content="<!--{$row.navicat_seokey}-->"/>
    <meta name="description" content="<!--{$row.navicat_seodesc}-->"/>
    <!--{/row}-->
    <!--{/if}-->

    <!--{include file="inc_head.php"}-->
</head>
<body>
<!--nav-->
<div class=" text-center nav-color elementwidth text-big padding-left padding-right" style="height: 40px">
    <div class="line">
        <div class="xl2 xs2 xm2 xb2 padding-small-top">
            <a href="/"><span class="icon-home text-white text-large"></span></a>
        </div>

        <div class="xl8 xs8 xm8 xb8" style="height: 20px;overflow:hidden;margin-top: 8px">
            <span class="text-white text-big">
                <!--{row name='navicat' id=3}-->
                <!--{$row.navicat_name}-->
                <!--{/row}-->
            </span>
        </div>

        <div class="xl2 xs2 xm2 xb2 padding-small-top">
            <a href="javascript:void(0)" id="search"><span class="icon-search text-white" style="font-size: 20px"></span></a>
        </div>
    </div>
</div>

<div class="hidden" id="dialog"
     style="position:fixed;left:0;top:0;right:0;bottom:0;background:#FFFFFF;z-index:10;display:block;overflow-x:hidden;overflow-y:auto;">
    <div class="text-center elementwidth text-big padding-left padding-right bg-sub" style="height: 40px">
        <form method="get" action="#" class="form-inline">
            <div class="line">
                <div class="xl2 xs2 xm2 xb2 margin-small-top">
                    <span class="icon-angle-left text-large text-white" id="close"></span>
                </div>
                <div class="xl8 xs8 xm8 xb8 margin-small-top">
                    <input type="text" class="input" value="" data-url="/index.php?c=index&m=search" id="search-input"
                           onkeydown="if(event.keyCode == 13) search_app()" name="keyword" placeholder="精品应用、海量搜索"
                           style="height: 30px">
                </div>
                <div class="xl2 xs2 xm2 xb2 margin-small-top">
                    <button type="button" id="search-btn" onclick="search_app()" class="button button-small bg"><span
                            class="icon-search text-sub"></span></button>
                </div>
            </div>
        </form>
    </div>
    <div class="form-group">
        <div class="field">
            <div class="line">
                <p class="text-left">大家都在搜</p>
            </div>
            <ul class="list-inline height text-big">

                <!--{keyword row=4}-->
                <li style=" height:40px"><a href="<!--{link m='search' keywords=$keyword.q}-->"><!--{$keyword.q}-->
                        <!--<span class="text-green icon-arrow-up"></span>--></a></li>
                <!--{/keyword}-->
            </ul>
        </div>
    </div>
</div>
<!--banner-->

<div class="container padding-top padding-left padding-right">
    <div id="categary_hot_soft">
        <!--{applist parent=2 id=$cate_id page=$page per_page=12}-->
        <div class="line">
            <div class="xs9 xm9 xl9 xb9">
                <a href="<!--{link m='app' app_id=$applist.app_id}-->">
                    <div class="xs3 xm3 xl3 xb3">
                        <img src="<!--{imageurl url = $applist.app_logo}-->" class="radius-big float-left game-icon">
                    </div>
                    <div class="xs9 xm9 xl9 xb9 padding-left">
                        <p class="gamename"><!--{$applist.app_title}--></p>
                        <div class="line padding-bottom padding-top">
                            <span class="star bigstar50 text-left"></span>
                        </div>
                        <p class="text-left height-little margin-small-bottom text-small text-gray"><!--{countdown down=$applist.app_down}-->下载<span>|</span><!--{round($applist.history_size/1024/1024,2)}-->MB</p>
                    </div>
                </a>
            </div>
            <div class="xs3 xm3 xl3 xb3">
                <div class="float-right padding-top"><a href="<!--{link m='app' app_id=$applist.app_id}-->" class="button button-small border-sub">下载</a></div>
            </div>
        </div>
        <hr class="bg-line">
        <!--{/applist}-->
    </div>
</div>
<div class="ajax_loading text-center" id="appMore">
    <span class="rotate"></span>
    <a>更多>></a>
</div>


<div class="line" style="height:75px; color:#cccccc;"></div>
<!--footer-->
<!--{include file="inc_menu.php"}-->

<script>
    $(function () {
        var i = 2;
        $("#appMore").click(function () {
            $.ajax({
                type: "POST",
                url: "api.php?c=ajax&m=apps",
                data: {'page': i++,'parent_id':2},
                dataType: 'json',
                success: function (msg) {
                    if (msg.status == '1') {
                        var j = 15*(msg.page-1)+1;
                        var html = '';
                        $.each(msg.list, function (k, v) {

                            html += ' <div class="line">';
                            html += '<div class="xs9 xm9 xl9 xb9">';
                            html += '<a href="' + v.app_url + '">';
                            html += '<div class="xs3 xm3 xl3 xb3">';
                            html += '<img src="' + image_url(v.app_logo) + '" class="radius-big float-left game-icon">';
                            html += '</div>';
                            html += '<div class="xs9 xm9 xl9 xb9 padding-left">';
                            html += '<p class="gamename">'+ v.app_title +'</p>';
                            html += '<div class="line padding-bottom padding-top">';
                            html += '<span class="star bigstar50 text-left"></span>';
                            html += '</div>';
                            html += '<p class="text-left height-little margin-small-bottom text-small text-gray">'+ num_down(v.app_down) + '下载<span>|</span>' + Math.round(v.history_size / 1024 / 1024 * 100) / 100 +'MB</p>';
                            html += '</div>';
                            html += '</a>';
                            html += '</div>';
                            html += '<div class="xs3 xm3 xl3 xb3">';
                            html += '<div class="float-right padding-top"><a href="' + v.app_url + '" class="button button-small border-sub">下载</a></div>';
                            html += '</div>';
                            html += '</div>';
                            html += '<hr class="bg-line">';

                        });
                        $("#categary_hot_soft").append(html);
                    } else {
                        $("#appMore").css("display", "none");
                    }
                }
            });
        });

        function num_star(num) {
            var numm = parseInt(num);
            switch (numm) {
                case 1:
                    return 'style="width:20%"';
                    break;
                case 2:
                    return 'style="width:40%"';
                    break;
                case 3:
                    return 'style="width:60%"';
                    break;
                case 4:
                    return 'style="width:80%"';
                    break;
                case 5:
                    return 'style="width:100%"';
                    break;
                default:
                    return 'style="width:100%"';
                    break;
            }
        }

        function num_down(num) {
            var down_umm = parseInt(num);
            if (down_umm >= 10000000) {
                down_umm = Math.round(down_umm / 100000000 * 100) / 100 + '亿';
            }
            if (down_umm >= 10000 && down_umm < 10000000) {
                down_umm = Math.round(down_umm / 10000 * 100) / 100 + '万';
            }
            return down_umm;
        }

        function image_url(url) {

            if(url == '' || url == 'undefined' || url == 'http://cdn.711cms.net/'){
                return '/templates/cates/no_picture.png';
            }
            return url;
        }
    });




    function game_hold() {
        $("#game_holdrank").css('display', 'block');
        $("#game_giftrank").css('display', 'none');
        $("#game_soarrank").css('display', 'none');
    }
    function game_gift() {
        $("#game_giftrank").css('display', 'block');
        $("#game_soarrank").css('display', 'none');
        $("#game_holdrank").css('display', 'none');
    }
    function game_soar() {
        $("#game_soarrank").css('display', 'block');
        $("#game_giftrank").css('display', 'none');
        $("#game_holdrank").css('display', 'none');
    }
</script>

<!--{include file="inc_foot.php"}-->