<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--{if $o_id}-->
    <!--{row name='list_service' id=$o_id}-->
    <title><!--{if $row.ctitle}--><!--{$row.ctitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
    <meta name="keywords" content="<!--{if $row.ckey}--><!--{$row.ckey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
    <meta name="description" content="<!--{if $row.cdesc}--><!--{$row.cdesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
    <!--{/row}-->
    <!--{else}-->
    <!--{row name='navicat' id=8}-->
    <title><!--{if $row.navicat_seotitle}--><!--{$row.navicat_seotitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
    <meta name="keywords" content="<!--{if $row.navicat_seokey}--><!--{$row.navicat_seokey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
    <meta name="description" content="<!--{if $row.navicat_seodesc}--><!--{$row.navicat_seodesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
    <!--{/row}-->
    <!--{/if}-->


    <!--{include file="inc_head.php"}-->
</head>
<body>
<!--{include file="inc_top.php"}-->

<!--{include file="inc_menu.php"}-->

<div id="main" class="mt30 bac-fff w1000">
        <!--游戏开服-->
        <div class="mt30">
            <ul class="k-title">
                <li class="fl">游戏开服</li>
                <li class="fr">
                    <!--{if !$o_type_id}-->
                    <a href="<!--{link m='list_service'}-->" class="ly-current">全部</a>
                    <!--{else}-->
                    <a href="<!--{link m='list_service'}-->">全部</a>
                    <!--{/if}-->
                    <!--{otimenav}-->
                    <!--{if $o_type_id == $otimenav.t_id}-->
                    <a href="<!--{link m='list_service' o_type_id = $otimenav.t_id}-->" class="ly-current"><!--{$otimenav.t_name}--></a>
                    <!--{else}-->
                    <a href="<!--{link m='list_service' o_type_id = $otimenav.t_id}-->"><!--{$otimenav.t_name}--></a>
                    <!--{/if}-->
                    <!--{/otimenav}-->
                </li>
            </ul>
            <div class="clear clearfix"></div>
            <div class="lk-table mt16">

                <table class="k-tab">
                    <tbody>
                    <tr>
                        <th width=200>开服游戏名称</th>
                        <th width=100>开服时间</th>
                        <th width=200>服务区域</th>
                        <th width=200>运营商</th>
                        <th width=80>专区地址</th>
                        <th width=80>领卡发号</th>
                        <th width=80>下载游戏</th>
                    </tr>
                    <!--{seolist  page=$page id=$o_type_id per_page=10}-->
                    <!--{if $seolist.o_status==2 &&
                    ($o_type_id==0 ||
                    ($o_type_id==1 && $seolist.o_end_time-time()>0 && $seolist.o_start_time-time()<0) ||
                    ($o_type_id==2 && $seolist.o_start_time-time()>0 && $seolist.o_end_time-time()>0) ||
                    ($o_type_id==3 && $seolist.o_end_time-time()<=0 && $seolist.o_start_time-time()<=0))}-->
                    <tr>
                        <td><!--{$seolist.o_apptitle}--></td>
                        <td><!--{$seolist.o_start_time|date_format:"m-d H:i"}--></td>
                        <td><!--{$seolist.o_region}--></td>
                        <td><!--{$seolist.o_app_company}--></td>
                        <td><a href="<!--{link m='app' app_id=$seolist.o_app_id}-->" class="k-btn">进入专区</a></td>
                        <td><a href="<!--{link m='open_service' app_id=$seolist.o_app_id open_name=$seolist.o_region}-->"
                               class="k-btn bac-ec">领取礼包</a></td>
                        <td><a href="<!--{link m='high_speed_download'}-->" class="k-btn">立即下载</a></td>
                    </tr>
                    <!--{/if}-->
                    <!--{/seolist}-->
                    </tbody>
                </table>
                <!--{pagebar name='seolist' page=$page  id=$o_type_id  per_page=10}-->
            </div>
        </div>
        <script type="text/javascript">
            $(function(){
                $('.k-title .fr a').click(function(){
                    $(this).addClass('ly-current').siblings().removeClass('ly-current');
                    $('.lk-table').hide();
                    $('.lk-table').eq($(this).index()).show();
                })
            });
        </script>
    </div>

</div>


</div>
<!--{include file="inc_flink.php"}-->
<!--{include file="inc_foot.php"}-->

</body>
</html>