<!DOCTYPE HTML>
<html>
<head>
    <!--网页标题-->
    <!--{if $last_cate_id}-->
    <!--{row name='info_category' id=$last_cate_id}-->
    <title><!--{$row.ctitle}--></title>
    <meta name="keywords" content="<!--{$row.ckey}-->" />
    <meta name="description" content="<!--{$row.cdesc}-->" />
    <!--{/row}-->
    <!--{else}-->
    <!--{row name='navicat' id=5}-->
    <title><!--{$row.navicat_seotitle}--></title>
    <meta name="keywords" content="<!--{$row.navicat_seokey}-->" />
    <meta name="description" content="<!--{$row.navicat_seodesc}-->" />
    <!--{/row}-->
    <!--{/if}-->
    <!--{include file="inc_head.php"}-->
</head>

<body>
<div class="container">
    <!--head-->
    <div class="search-head-bg">
        <header class="search-head">
            <h2>
                <a href="/"><img src="<!--{$tpl_path}-->images/fanhui.png" class="w7"></a>
                <a  class="fs24 col-fff">资讯</a>
                <input type="hidden" id="search-input" value="请输入搜索内容" onFocus="if(value=='请输入搜索内容'){value='';this.style.color='#333'}" onBlur="if(value==''){value='请输入搜索内容'}" class="search i-search"  data-rewrite="<!--{$setting.is_site_rewrite}-->">
                <a href="javascript:;" id="search-btn"><img src="<!--{$tpl_path}-->images/white-search.png" class="w14"></a>
            </h2>
        </header>
    </div>
    <div class="hot-bg  mt50 fs20">
        <h2>
            <!--{infonav}-->
            <a
            <!--{if $last_cate_id == $infonav.cate_id}-->
            class="btn-a current-back"
            <!--{else}-->
            <!--{/if}-->
            href="<!--{link m='list_info' last_cate_id=$infonav.cate_id}-->">
            <!--{$infonav.cname}-->
            </a>
            <!--{/infonav}-->
        </h2>
    </div>
    <div class="grayline1"></div>
    <div id="info_k" data-id="<!--{$last_cate_id}-->" >
        <!--{infolist id=$last_cate_id page=$page per_page=10}-->
        <div class="grayline"></div>
        <div class="con-bg">
            <div class="con">
                <ul>
                    <li>
                        <a href="<!--{link m='info' info_id=$infolist.info_id}-->"></a>
                    </li>
                    <li class="bbt fs34 lh">
                        <a href="<!--{link m='info' info_id=$infolist.info_id}-->">
                            <!--{$infolist.info_title}-->
                        </a>
                    </li>
                    <li class="fs20 col-666 lh"><!--{$infolist.info_desc}--></li>
                    <li class="fs18 col-999 lh">
                        <span>时间：<!--{$infolist.info_update_time|date_format:"%Y-%m-%d"}--> | </span>
                        <span>来源：<!--{infonav}--> <!--{if $infolist.last_cate_id == $infonav.cate_id}--><!--{$infonav.cname}--><!--{/if}--> <!--{/infonav}--></span>
                    </li>
                </ul>
            </div>
        </div>
        <!--{/infolist}-->
    </div>
    <div class="more dibu fs20">
        <p><a href="javascript:;" class="info"><<加载更多</a></p>
    </div>
</div>
<script style="text/javascript">
    $(function(){
        var i = 2;
        var last_cate_id = $('#info_k').attr('data-id');
        $(".info").click(function (){
            $.ajax({
                type: "POST",
                url: "api.php?c=ajax&m=infos",
                data: {'page': i++, 'last_cate_id':last_cate_id},
                dataType: 'json',
                success: function(msg) {
                    if (msg.status == '1') {
                        var html = '';
                        $.each(msg.list, function (k, v) {
                            var time = v.info_update_time;
                            newDate = new Date();
                            newDate.setTime(time * 1000);

                            html += '<div class="grayline"></div>';
                            html += '<div class="con-bg">';
                            html += '<div class="con">';
                            html += '<ul>';
                            html += '<li><a href="' + v.info_url + '"></a>';
                            html += '</li>';
                            html += '<li class="bbt fs34 lh">';
                            html += '<a href="' + v.info_url + '">' + v.info_title + '</a>';
                            html += '</li>';
                            html += '<li class="fs20 col-666 lh">' + v.info_desc +'</li>';
                            html += '<li class="fs18 col-999 lh">';
                            html += ' <span>时间：' + newDate.toJSON('YYYY-MM-DD').substr(0, 10); + ' | </span>';
                            html += ' <span>来源：' + v.info_from + '</span>';
                            html += '</li>';
                            html += '</ul>';
                            html += '</div>';
                            html += '</div>';
                        });
                        $("#info_k").append(html);
                    } else {
                        $(".info").html('天啦噜！你竟然看到底了！');
                    }
                }
            });
        });
        function num_star(num){
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

        function num_down(num){
            var down_umm = parseInt(num);
            if(down_umm >= 100000000){
                down_umm = Math.round(down_umm/100000000*100)/100 +'亿';
            }
            if(down_umm >= 10000 && down_umm < 100000000 ){
                down_umm = Math.round(down_umm/10000*100)/100 +'万';
            }
            return down_umm;
        }

        function image_url(url) {

            if(url == '' || url == 'undefined' || url == 'http://cdn.171cms.net/'){
                return '/templates/cates/no_picture.png';
            }
            return url;
        }
    });
</script>

</body>
</html>
