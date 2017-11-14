<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <meta http-equiv="cache-control" content="no-cache" />
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->"/>
    <meta name="description" content="<!--{$setting.seo_description}-->"/>
    <!--{include file="inc_head.php"}-->
</head>
<body>
<div id="doc">
    <header id="hds">
        <div class="titlebar" id="section_titlebar">
            <a class="g-block go-back" href="javascript:history.back();" ></a>
            <span class="sep"></span>
            <h2 class="g-ellipsis title"><!--{row name='app_category' id=$id }--><!--{$row.cname}--><!--{/row}--></h2>
            <a class="g-block go-home" href="/" id="link-go-home"></a>
        </div>
    </header>
    <!-- bd -->

    <div id="bd">
        <ul id="categary_hot_soft" class="soft_list" data-id="<!--{$id}-->">
            <!--{applist id=$id row=15 }-->
            <li>
                <a href="<!--{link m='app' app_id=$applist.app_id}-->" class="con">
                    <img src="<!--{imageurl url =$applist.app_logo}-->" class="photo" />
                    <div class="info">
                        <span class="size"><!--{round($applist.history_size/1024/1024,2)}-->MB <br /><!--{countdown down=$applist.app_down}-->次下载 </span>
                    </div>
                    <div class="detail">
                        <h3><!--{$applist.app_title}--></h3>
                        <div class="stars_holder">
                            <div class="stars" <!--{countstar star=$applist.app_recomment}-->></div>
                        </div>
                    </div>
                </a>
                <a href="<!--{link m='app' app_id=$applist.app_id}-->" class="down"> <span>下载</span> </a>
            </li>
            <!--{/applist}-->
        </ul>
        <div class="loadmore loadmore-normal" id="loadmore">
            <div class="load-status load-status-btn load-status-normal">
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
    </div>
    <!--{include file="inc_foot.php"}-->
</div>
        <script type="text/javascript">
            $(function(){
                var i = 2;
                var last_cate_id = $("#categary_hot_soft").attr("data-id");
                $(".load-status-normal").click(function(){
                    $.ajax({
                        type: "POST",
                        url: "api.php?c=ajax&m=apps",
                        data: {'page': i++, 'last_cate_id': last_cate_id},
                        dataType: 'json',
                        success: function (msg) {
                            if (msg.status == '1') {
                                var html = '';
                                $.each(msg.list, function (k, v) {

                                    html += "<li>";
                                    html += '<a href="' + v.app_url + '" class="con" >';
                                    html += '<img src="'+ image_url(v.app_logo) +'" class="photo" />';
                                    html += '<div class="info">';
                                    html += '<span class="size">'+ Math.round(v.history_size/1024/1024*100)/100 +' MB <br />'+ num_down(v.app_down) +'次下载 </span>';
                                    html += '</div>';
                                    html += '<div class="detail">';
                                    html += '<h3>'+ v.app_title +'</h3>';
                                    html += '<div class="stars_holder">';
                                    html += '<div class="stars" '+ num_star(v.app_recomment) +'></div>';
                                    html += ' </div>';
                                    html += ' </div> ';
                                    html += '</a>';
                                    html += '<a href="' + v.app_url + '" class="down" > <span>下载</span> </a>';
                                    html += '</li>';

                                });
                                $("#categary_hot_soft").append(html);
                            }else{
                                $(".load-status-normal").css("display", "none");
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