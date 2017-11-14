<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--{row name='navicat' id=9}-->
    <title><!--{if $row.navicat_seotitle}--><!--{$row.navicat_seotitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
    <meta name="keywords" content="<!--{if $row.navicat_seokey}--><!--{$row.navicat_seokey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
    <meta name="description" content="<!--{if $row.navicat_seodesc}--><!--{$row.navicat_seodesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
    <!--{/row}-->

    <!--{include file="inc_head.php"}-->

    <!--{include file="inc_head.php"}-->
</head>
<body>
<!--{include file="inc_top.php"}-->

<!--{include file="inc_menu.php"}-->

<!--main-->
<div id="main" class="main w1000">
        <!--礼包-->
        <div class="mt30">
            <div>
                <ul class="k-title">
                    <li class="fl">礼包放号</li>
                    <li class="fr">
                        <!--{if !$p_type_id}-->
                        <a href="<!--{link m='list_packs' }-->" class="ly-current">全部</a>
                        <!--{else}-->
                        <a href="<!--{link m='list_packs'}-->">全部</a>
                        <!--{/if}-->
                        <!--{typenav}-->
                        <!--{if $p_type_id == $typenav.id }-->
                        <a href="<!--{link m='list_packs' p_type_id = $typenav.id}-->" class="ly-current"><!--{$typenav.name}--></a>
                        <!--{else}-->
                        <a href="<!--{link m='list_packs' p_type_id = $typenav.id}-->"><!--{$typenav.name}--></a>
                        <!--{/if}-->
                        <!--{/typenav}-->
                    </li>
                </ul>
                <div class="clear clearfix"></div>
                <div class="lk-table mt16">
                    <table class="k-tab">
                        <tbody>
                        <tr>
                            <th width=220>游戏礼包名称</th>
                            <th width=100>开服时间</th>
                            <th width=220>服务区域</th>
                            <th width=220>运营商</th>
                            <th width=100>专区地址</th>
                            <th width=100>礼包领取</th>
                        </tr>
                        <!--{openlist page=$page p_id=$p_type_id  per_page=10}-->
                        <!--{if $openlist.o_end_time-time()>0 && $openlist.o_status==2 && $openlist.open_name==$openlist.o_region}-->
                        <tr>
                            <td><!--{$openlist.o_apptitle}--><br/>【<!--{$openlist.pname}-->】</td>
                            <td><!--{$openlist.o_start_time|date_format:"m-d H:I"}--></td>
                            <td><!--{$openlist.o_region}--></td>
                            <td><!--{$openlist.o_app_company}--></td>
                            <td><a href="<!--{link m='app' app_id=$openlist.p_app_id}-->" class="k-btn">进入专区</a></td>
                            <td><a href="<!--{link m='open_packs' app_id=$openlist.p_app_id open_name=$openlist.open_name p_id=$openlist.p_id }-->" class="k-btn bac-ec">领取礼包</a></td>
                        </tr>
                        <!--{/if}-->
                        <!--{/openlist}-->
                        </tbody>
                    </table>
                    <!--{pagebar name='openlist' page=$page per_page=10 p_id=$p_type_id}-->
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function(){
                $('.k-title .fr a').click(function(){
                    $(this).addClass('ly-current').siblings().removeClass('ly-current');
                    $('.k-tab').hide();
                    $('.k-tab').eq($(this).index()).show();
                })
            });
        </script>
    </div>
</div>
<!--{include file="inc_flink.php"}-->
<!--{include file="inc_foot.php"}-->
</body>
</html>