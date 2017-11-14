<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--{row name='navicat' id=8}-->
    <title><!--{if $row.navicat_seotitle}--><!--{$row.navicat_seotitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
    <meta name="keywords" content="<!--{if $row.navicat_seokey}--><!--{$row.navicat_seokey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
    <meta name="description" content="<!--{if $row.navicat_seodesc}--><!--{$row.navicat_seodesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
    <!--{/row}-->

    <!--{include file="inc_head.php"}-->
</head>

<body data-page="apps" class="apps PC">
<!--{include file="inc_top.php"}-->
<div class="container">
    <!--{include file="inc_menu.php"}-->
    <div class="mask" id="j-mask"></div>
    <div class="crumb">
        <a>您的位置：</a>
        <a href="/">首页</a>
        <span>&gt;</span>
        <a href="<!--{link m='services'}-->">游戏开服</a>
        <span>&gt;</span>
        <a href="<!--{link m='games' cate_id=$app.last_cate_id}-->"><!--{row name='app_category' id=$app.last_cate_id}--><!--{$row.cname}--><!--{/row}--></a>
        <span>&gt;</span>
        <span class="cur"><!--{$app.app_title}--></span>
    </div>
    <!--游戏开服-->
    <div class="mt16 bac-fff">
        <div class="kg-title">
            <h3>
                <!--{if !$Packs_app}-->
                <!--{$app.app_title}-->
                <!--{else}-->
                <!--{$Packs_app.pname}-->
                <!--{/if}-->
            </h3>
        </div>
        <div class="mt16 kf-game">
            <ul class="fl kf-pic">
                <li class="fl"><img src="<!--{imageurl url =$app.app_logo}-->" width=120 height=120></li>
                <li>游戏名称：<span><!--{$app.app_title}--></span></li>
                <li >标签：<span><!--{row name='app_category' id=$app.last_cate_id}--><!--{$row.cname}--><!--{/row}--></span></li>
                <li>
                    <span style="font-weight: bold;color: #333;font-size: 14px;">游戏介绍：</span>
                    <div style="height: 50px;overflow: hidden;font-size: 14px;line-height: 26px;"><!--{$app.app_desc}--></div>
                </li>
            </ul>
            <div class="fr k-range kf-down">
                <a href="<!--{link m='high_speed_download'}-->" class="ly-cur">下载游戏</a>
                <a href="<!--{link m='list_packs'}-->" class="">全部礼包</a>
            </div>
            <!--清除浮动-->
            <div><span class="clear clearfix"></span></div>
        </div>

        <div class="kg-title kg-ort"><!--{$_app.o_apptitle}-->的礼包列表（共有
            <span>
                <!--{if $_app.o_end_time-time()<0}-->
                0
                <!--{else}-->
                <!--{$cnt}-->
                <!--{/if}-->
            </span>个）</div>

        <!--{if $_app.o_end_time-time()>0}-->
        <div class="kf-tao">
            <!--{list  name="app_packs" page=$page per_page=9  p_status=0 app_title=$app.app_title }-->
            <dl>
                <dt><!--{$list.pname}-->【<!--{row name='type' id=$list.p_type_id}--><!--{$row.name}--><!--{/row}-->】</dt>
                <dd class="width"><!--{$list.content}--></dd>
                <dd class="dd-btn">
                    <a href="<!--{link m='open_packs' app_id=$list.p_app_id open_name=$list.open_name  p_id=$list.p_id }-->" class="fr korg-btn">领取</a>
                    礼包个数：<span class="col-ec6"><!--{$list.p_number}--></span>个
                </dd>
            </dl>
            <!--{/list }-->
        </div>
        <!--{else}-->
        <div class="kf-tao"></div>
        <!--{/if}-->
        <!--清除浮动-->
        <div><span class="clear clearfix"></span></div>
    </div>
</div>
<!--{include file="inc_flink.php"}-->

<!--{include file="inc_foot.php"}-->


<!--[time=125.892ms][api=0]-->
</body>
<!--{if $Packs_app}-->
<script type="text/javascript">
    function status(p_status){
        var p_id='<!--{$Packs_app.p_id}-->';
        var open_name='<!--{$Packs_app.open_name}-->';
        $.post('<!--{link m="packs"}-->',{'p_status':p_status,'p_id':p_id,"open_name":open_name},
            function(result){
                if(result.status !=0){
                    alert(result.msg);
                }else {
                    alert(result.msg);
                    location.reload();
                }
            }, 'json');
    }
    $('#open').click(function(){
        $(this).addClass('packs').siblings().removeClass('packs');
        $('.packs').hide();
        $('.pack').eq($(this).index()).show();
    })
</script>
<!--{/if}-->
</html>