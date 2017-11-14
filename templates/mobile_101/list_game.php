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
    <meta name="keywords" content="<!--{$row.ckey}-->" />
    <meta name="description" content="<!--{$row.cdesc}-->" />
    <!--{/row}-->
    <!--{else}-->
    <!--{row name='navicat' id=3}-->
    <title><!--{$row.navicat_seotitle}--></title>
    <meta name="keywords" content="<!--{$row.navicat_seokey}-->" />
    <meta name="description" content="<!--{$row.navicat_seodesc}-->" />
    <!--{/row}-->
    <!--{/if}-->

    <!--{include file="inc_head.php"}-->
</head>
<body>

<div class="header">
    <a href="/"><img src="<!--{$setting.wap_logo}-->" alt="<!--{$setting.site_name}-->" height="55"/></a>
    <a class="sear icon-ic_search-01" href="<!--{link m='page_search'}-->"></a>
</div>
<div class="pad10 mart14">
    <table width="0" border="0" cellspacing="0" cellpadding="0" class="table">
        <tbody>
        <tr>
            <td><a href="<!--{link m='list_game'}-->" title="全部"><span>全部</span></a> </td>
            <!--{appnav parent=2 row=3 start=0}-->
            <td>
                <a href="<!--{link m='list_game' cate_id=$appnav.cate_id}-->" title="<!--{$appnav.cname}-->">
                    <span><!--{$appnav.cname}--></span>
                </a>
            </td>
            <!--{/appnav}-->
        </tr>

        <!--{for $foo=1 to 3 }-->
        <tr>
            <!--{appnav parent=2 row=4 start=$foo*4-1}-->
            <td>
                <a href="<!--{link m='list_game' cate_id=$appnav.cate_id}-->" title="<!--{$appnav.cname}-->">
                    <span><!--{$appnav.cname}--></span>
                </a>
            </td>
            <!--{/appnav}-->
        </tr>
        <!--{/for}-->

        </tbody>
    </table>
</div>
<div class="rank-box-div block list-box">
    <ul class="rank">
        <!--{applist parent=2 id=$cate_id row=3}-->
        <li>
            <a href="<!--{link m='content_app' app_id=$applist.app_id}-->"  class="link">
                <span class="num icon-ic_flag-01"><i><!--{$show_sort_id++}--></i></span>
                <span class="sj-top"></span>
                <img src="<!--{imageurl url =$applist.app_logo}-->" alt="<!--{$applist.app_title}-->" style="display: inline-block;">

                <h3><!--{$applist.app_title}--></h3>

                <p><!--{$applist.cname}--> <!--{round($applist.history_size/1024/1024,2)}-->M</p>
            </a>
            <a href="<!--{link m='content_app' app_id=$applist.app_id}-->"  class="download">下载</a>
        </li>
        <!--{/applist}-->
    </ul>
    <!--列表-->
    <div class="rank-list">
        <ul class="speApp" id="categary_hot_soft" data-id="<!--{$cate_id}-->">
            <!--{applist parent=2 id=$cate_id start2=3 page=$page per_page=12}-->
            <li>
                <span class="num"><!--{$show_sort_id++}--></span>
                <a href="<!--{link m='content_app' app_id=$applist.app_id}-->"  class="link">
                    <img src="<!--{imageurl url =$applist.app_logo}-->" style="display: block;">

                    <h3><font style="max-width:60%" class="overcut"><!--{$applist.app_title}--></font></h3>

                    <p><!--{round($applist.history_size/1024/1024,2)}-->M <!--{countdown down=$applist.app_down}-->
                        +次下载</p>

                    <p><!--{$applist.app_seodesc}--></p>
                </a>
                <a href="<!--{link m='content_app' app_id=$applist.app_id}-->"  class="download">下载</a>
            </li>
            <!--{/applist}-->
        </ul>
    </div>
</div>
<div class="more-div" id="appMore"><a>更多</a></div>
<!--footer-->
<!--{include file="inc_foot.php"}-->
<script type="text/javascript">
    $(function () {
        var i = 2;
        var last_cate_id = $("#categary_hot_soft").attr("data-id");
        $("#appMore").click(function () {
            $.ajax({
                type: "POST",
                url: "api.php?c=ajax&m=apps",
                data: {'page': i++, 'last_cate_id': last_cate_id,'parent_id':2},
                dataType: 'json',
                success: function (msg) {
                    if (msg.status == '1') {
                        var j = 15*(msg.page-1)+1;
                        var html = '';
                        $.each(msg.list, function (k, v) {

                            html += "<li>";
                            html += '<span class="num">'+ j++ +'</span>';
                            html += '<a href="' + v.app_url + '" class="con"  >';
                            html += '<img src="' + image_url(v.app_logo) + '" class="photo" style="display: block;" />';
                            html += '<h3><font style="max-width:60%" class="overcut">'+ v.app_title +'</font></h3>';
                            html += ' <p>'+ Math.round(v.history_size / 1024 / 1024 * 100) / 100 +'M&nbsp'  + num_down(v.app_down) + '+次下载</p>';
                            html += '<p>'+ v.app_seodesc +'</p>';
                            html += '<a href="' + v.app_url + '"  class="download">下载</a>';
                            html += '</li>';

                        });
                        $("#categary_hot_soft").append(html);
                    } else {
                        $(".more-div").css("display", "none");
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
</script>

</body>
</html>