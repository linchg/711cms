<!DOCTYPE HTML>
<html>
<head>
    <!--{row name='navicat' id=4}-->
    <title><!--{if $row.navicat_seotitle}--><!--{$row.navicat_seotitle}--><!--{else}--><!--{$setting.seo_title}-->
        <!--{/if}--></title>
    <meta name="keywords"
          content="<!--{if $row.navicat_seokey}--><!--{$row.navicat_seokey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->"/>
    <meta name="description"
          content="<!--{if $row.navicat_seodesc}--><!--{$row.navicat_seodesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->"/>
    <!--{/row}-->
    <!--{include file="inc_head.php"}-->
</head>
<body>
<div class="container">
    <!--head-->
    <div class="search-head-bg">
        <header class="search-head">
            <h2>
                <a href="/"><img src="<!--{$tpl_path}-->images/fanhui.png" class="w7"></a>
                <a href="/" class="fs24 col-fff">必备</a>
                <input type="hidden" id="search-input" value="请输入搜索内容" onFocus="if(value=='请输入搜索内容'){value='';this.style.color='#333'}" onBlur="if(value==''){value='请输入搜索内容'}" class="search i-search"  data-rewrite="<!--{$setting.is_site_rewrite}-->">
                <a href="javascript:;" id="search-btn"><img src="<!--{$tpl_path}-->images/white-search.png" class="w14"></a>
            </h2>
        </header>
    </div>

    <!--grayline-->
    <div class="grayline  mt50"></div>
    <!--title-->
    <div class="title2 title-gre">
        <span>
         <!--{row name='navicat' id=4}-->
            <h2 class="fs30">
                <!--{$row.navicat_name}-->
                 <span class="fr">
                    <!--{list name='necessary'}-->
                        <a
                        <!--{if (isset($necessary_type) && $necessary_type ==$list.necessary_type) || ($necessary_type ==0 && $list.special_sort_show==1)  }-->
                        class="curr"<!--{/if}--> href="<!--{link m='necessaries' necessary_type=$list.necessary_type}-->">
                        <!--{$list.necessary_title}-->
                     </a>
                     <!--{/list}-->
                 </span>
            </h2>
         <!--{/row}-->
        </span>

    </div>
    <div id="categary_hot_soft"  data-id="<!--{$necessary_type}-->">
        <!--{list name='necessary' type=$necessary_type}-->
        <!--{necessary id=$list.necessary_id row=10}-->
        <div class="game">
            <div class="game-pic">
                <div class="fl"><a href="<!--{link m='app' app_id=$necessary.app_id}-->">

                        <img src="<!--{imageurl url =$necessary.app_logo}-->" style="width: 72px;"/></a></div>
                <a href="<!--{link m='app' app_id=$necessary.app_id}-->">
                <ul>
                    <li class="fs14 col-333 g-title"><!--{$necessary.app_title}--></li>
                    <li class="fs12 col-999"><!--{countdown down=$necessary.app_down}-->次下载<span class="m-none"> | <!--{round($necessary.history_size/1024/1024,2)}-->MB</span></li>
                    <li class="fs12 col-666">
                        <span class="btn-s col-999"><!--{row name='app_category' id=$necessary.last_cate_id}--><!--{$row.cname}-->
                            <!--{/row}--></span>
                    </li>
                </ul>
                </a>
                <p class="fs14 fr load"><a href="<!--{link m='app' app_id=$necessary.app_id}-->" class="col-4FB0E4 btn-a">立即下载</a></p>
            </div>
        </div>
        <!--{/necessary}-->
        <!--{/list}-->

    </div>
    <div class="more" style="line-height: 40px;color: #5c5c5c;font-size: 14px;">
        <p><a href="javascript:;" class="load-status" ><<加载更多</a></p>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        var i = 2;
        var necessary_type = $("#categary_hot_soft").attr("data-id");
        $(".load-status").click(function(){
            $.ajax({
                type: "POST",
                url: "api.php?c=ajax&m=necessaries",
                data: {'page': i++, 'necessary_type':necessary_type},
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
                            html += '<li class="fs12 col-999">'+ num_down(v.app_down) +'次下载<span class="m-none"> | '+ Math.round(v.history_size/1024/1024*100)/100 +' M</span></li>';
                            html += '<li class="fs12 col-666"><span class="btn-s col-999">'+ v.cname +'</span></li>';
                            html += '</ul>';
                            html += '</a>';
                            html += '<p class="fs14 fr load"><a href="' + v.app_url + '" class="col-4FB0E4 btn-a">立即下载</a></p>';
                            html += '</div>';
                            html += '</div>';
                        });
                        $("#categary_hot_soft").append(html);
                    }else{
                        $(".more").html('天啦噜！你竟然看到底了！');
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
