<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--{row name='navicat' id=9}-->
    <title><!--{if $row.navicat_seotitle}--><!--{$row.navicat_seotitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
    <meta name="keywords" content="<!--{if $row.navicat_seokey}--><!--{$row.navicat_seokey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
    <meta name="description" content="<!--{if $row.navicat_seodesc}--><!--{$row.navicat_seodesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
    <!--{/row}-->

    <!--{include file="inc_head.php"}-->
</head>

<div id="doc4">
    <div id="hd">
        <div class="mod-search-hd-bunny">
            <!--{include file="inc_top.php"}-->
            <!--{include file="inc_menu.php"}-->
        </div>
    </div>
    <div id="bd">
    <!--游戏开服-->
    <div class="mt30 bac-fff">
        <div class="kg-title"><h3><!--{$Packs_app.pname}--></h3></div>
        <div class="mt16 kf-game">
            <ul class="fl kf-pic">
                <li class="fl"><img src="<!--{imageurl url =$app.app_logo}-->" width=120 height=120></li>
                <li>游戏名称：<span><!--{$app.app_title}--></span></li>
                <li>标签：<span><!--{row name='app_category' id=$app.last_cate_id}--><!--{$row.cname}--><!--{/row}--></span></li>
                <li class="packs" >
                    <!--{if !$ball.b_ip && $Packs_app.p_state==2 && $Packs_app.p_number >0}-->
                    <a id="open" class="qw" data-id='<!--{$ball.b_id}-->' onclick="status(this)">立即领取</a>
                    <!--{elseif $ball.b_ip && $Packs_app.p_state==2 && $Packs_app.p_number >0}-->
                    <a id="open" class="wq" data-ip='<!--{$ball.b_ip}-->' onclick="status(this)">立即领取</a>
                    <!--{elseif  $ball.b_ip && $Packs_app.p_number==0}-->
                    <a id="open" class="wq" data-ip='<!--{$ball.b_ip}-->' onclick="status(this)">立即领取</a>
                    <!--{elseif  !$ball.b_ip && $Packs_app.p_number==0}-->
                    <a class="lq">
                        <span>已被领光了</span>
                    </a>
                    <!--{/if}-->
                </li>
                <li class="pack" style="display:none;" >
                    <!--{if  !$ball.b_ip && $Packs_app.p_number==0}-->
                    <a class="lq">
                        <span>已被领光了</span>
                    </a>
                    <!--{else}-->
                    <a class="lq" id="textarea"><!--{$ball.b_ball_id}--></a>
                    <button href="#" onclick="copyToClipboard('textarea')" class="fuzhi">复制</button>
                    <!--{/if}-->
                </li>
            </ul>
            <div class="fr k-range">
                <ul>
                    <li>有效时间：<!--{$open_app.o_start_time|date_format:"y-m-d H:i"}--> 至 <!--{$open_app.o_end_time|date_format:"y-m-d H:i"}--></li>
                    <li>礼包个数：
                        <span style="color: #ca6114"><!--{$Packs_app.p_number}--></span>个
                    </li>
                </ul>
            </div>
            <!--清除浮动-->
            <div><span class="clear clearfix"></span></div>
        </div>
        <div class="kg-title kg-gtitle">礼包说明</div>
        <p class="kf-p"><!--{$Packs_app.content}--></p>
        <div class="kg-title kg-gtitle">使用说明</div>
        <p class="kf-p"><!--{$Packs_app.use_desc}--></p>
        <div class="kg-title kg-gtitle">游戏说明</div>
        <p class="kf-p"><!--{$app.app_desc}--></p>

    </div>
    <!--{include file="inc_flink.php"}-->
</div></div>
<!--{include file="inc_foot.php"}-->
<!--复制礼包码提示框-->
     <div class="kf-frame" style="display: none">
       <div class="frame-con">
         <p class="kf-tishi"><span>提示</span><img src="<!--{$tpl_path}-->images/kf-none.png" class="ts-img fr"></p>
         <p class="ts-con"></p>
         <div class="ts-btn-box">
            <button class="ts-btn">确定</button>
         </div>
       </div>
     </div>
<!--[time=125.892ms][api=0]-->
</body>
<script type="text/javascript">
    function status(o){
        var ip= $(o).attr('data-ip');
        var b_id=$(o).attr('data-id');
        var app_id='<!--{$ball.b_app_id}-->';
        var b_ball_name='<!--{$Packs_app.pname}-->';
        var b_p_id='<!--{$Packs_app.p_id}-->';
        $.post('<!--{link m="packs_list"}-->',{'b_app_id':app_id,'b_id':b_id,'b_ip':ip,'b_ball_name':b_ball_name,'b_p_id':b_p_id},
            function(result){
                if(result.status ==1){
                    $('.ts-con').html(result.msg);
                }else if(result.status ==0) {
                    $('.ts-con').html(result.msg);
                }else if(result.status ==2){
                    $('.ts-con').html(result.msg);
                }
            }, 'json');
    }
    $('#open').click(function(){
        $(this).addClass('packs').siblings().removeClass('packs');
        $('.packs').hide();
        $('.pack').eq($(this).index()).show();
    })
</script>
<script>
    function copyToClipboard(elementId) {
        // 创建元素用于复制
        var aux = document.createElement("input");

        // 获取复制内容
        var content = document.getElementById(elementId).innerHTML || document.getElementById(elementId).value;

        // 设置元素内容
        aux.setAttribute("value", content);

        // 将元素插入页面进行调用
        document.body.appendChild(aux);

        // 复制内容
        aux.select();
        // 将内容复制到剪贴板
        document.execCommand("copy");

        // 删除创建元素
        document.body.removeChild(aux);
    }

</script>
<script>
  $(function(){
    $('#open').click(function(){
      $('.kf-frame').css('display','block')
    });
    $('.fuzhi').click(function(){
      $('.kf-frame').css('display','block');
      $('.ts-con').html('已复制好，可粘贴')
    })
    $('.ts-img,.ts-btn').click(function(){
      $('.kf-frame').css('display','none')
    })
  })
</script>
</html>