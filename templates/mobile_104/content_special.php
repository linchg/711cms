<!DOCTYPE HTML>
<html>
<head>
    <!--{if $special.special_seotitle}-->
    <title><!--{$special.special_seotitle}--></title>
    <meta name="keywords" content="<!--{$special.special_seokey}-->" />
    <meta name="description" content="<!--{$special.special_seodesc}-->" />
    <!--{else}-->
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->" />
    <meta name="description" content="<!--{$setting.seo_description}-->" />
    <!--{/if}-->

    <!--{include file="inc_head.php"}-->
</head>

<body>
<div class="container">
    <!--head-->
    <div class="search-head-bg">
        <header class="search-head">
            <h2>
                <a href="javascript:history.back();"><img src="<!--{$tpl_path}-->images/fanhui.png" class="w7"></a>
                <a href="#" class="fs24 col-fff">专题详情</a>
                <a href="/"><img src="<!--{$tpl_path}-->images/home.png" class="w14"></a>
            </h2>
        </header>
    </div>

    <!--grayline-->
    <div class="noline-grayline  mt50"></div>

    <!--content-->
    <div class="con-bg">
        <div class="con">
            <ul>
                <li>
                    <!--{row name='special' id=$special_id}-->
                    <img src="<!--{$row.area_logo}-->" style="width:100%" />
                    <!--{/row}-->
                </li>

            </ul>
        </div>
    </div>

    <!--grayline-->
    <div class="noline-grayline"></div>
    <!--content-->
    <div id="special_hot_soft"  data-id="<!--{$special_id}-->">
        <!--{special id=$special_id row=10}-->
        <div class="game">
            <div class="game-pic">
                <div class="fl"><a href="<!--{link m='app' app_id=$special.app_id}-->"><img src="<!--{imageurl url =$special.app_logo}-->" style="width:72px;"></a></div>
                <a href="<!--{link m='app' app_id=$special.app_id}-->">
                <ul>
                    <li class="fs16 col-333"><!--{$special.app_title}--></li>
                    <li class="fs12 col-999"><!--{countdown down=$special.app_down}-->万次下载 | <!--{round($special.history_size/1024/1024/2)}-->M</li>
                    <li class="fs12 col-666"><span class="btn-s col-999"><!--{$special.cname}--></span></li>
                </ul>
</a>
                <p class="fs14 fr load"><a href="<!--{link m='app' app_id=$special.app_id}-->" class="col-4FB0E4 btn-a">立即下载</a></p>
            </div>
        </div>
        <!--{/special}-->
    </div>
    <div class="more mb20">
        <p><a href="javascript:;" class="load-special"><<加载更多</a></p>
    </div>
</div>
<!--dibu-->
<div class="more dibu fs20" hidden="hidden">天啦噜！你竟然看到底了</div>
<script type="text/javascript">
    $(function(){
        var i = 2;
        var special_id = $("#special_hot_soft").attr("data-id");
        $(".load-special").click(function(){
            $.ajax({
                type: "POST",
                url: "api.php?c=ajax&m=special",
                data: {'page': i++, 'special_id':special_id},
                dataType: 'json',
                success: function (msg) {
                    if (msg.status == '1') {
                        var html = '';
                        $.each(msg.list, function (k, v) {

                            html += '<div class="game">';
                            html += '<div class="game-pic">';
                            html += '<div class="fl">';
                            html += '<a href="' + v.app_url + '"><img src="'+ image_url(v.app_logo) +'" width="72"/></a>';
                            html += '</div>';
                            html += '<a href="' + v.app_url + '">';
                            html += '<ul>';
                            html += '<li class="fs14 col-333">'+ v.app_title +'</li>';
                            html += '<li class="fs12 col-999">'+ num_down(v.app_down) +'次下载| '+ Math.round(v.history_size/1024/1024*100)/100 +' MB</li>';
                            html += '<li class="fs12 col-666"><span class="btn-s col-999">'+ v.cname +'</span></li>';
                            html += '</ul>';
                            html += '<a>';
                            html += '<p class="fs14 fr load"><a href="' + v.app_url + '" class="col-4FB0E4 btn-a">立即下载</a></p>';
                            html += '</div>';
                            html += '</div>';
                        });
                        $("#special_hot_soft").append(html);
                    }else{
                        $(".load-special").html('天啦噜！你竟然看到底了！');
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
