<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--{row name='navicat' id=6}-->
<title><!--{if $row.navicat_seotitle}--><!--{$row.navicat_seotitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
<meta name="keywords" content="<!--{if $row.navicat_seokey}--><!--{$row.navicat_seokey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
<meta name="description" content="<!--{if $row.navicat_seodesc}--><!--{$row.navicat_seodesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
<!--{/row}-->
<!--{include file="inc_head.php"}-->
</head>

<body>

<!--{include file="inc_top.php"}-->

<!--{include file="inc_menu.php"}-->


 <div class="content clearfix">
    <div class="left">
    		<div class="crumb02">
                <a>您的位置：</a>
                <a href="/">首页</a>
                <span>&gt;</span>
                <!--{row name='navicat' id=6}-->
                        <a href="/">
                            <!--{$row.navicat_name}-->
                        </a>
                <!--{/row}-->
            </div>
        <div class="list-title clearfix" style="padding-left:0">
            <h2 class="con"><span class="title-bg iconSprite"></span>精品专题</h2>
        </div>
        <div class="mod-special">
            <!--{list name='special'}-->
            <div class="mod-special-list">
                <div class="hd clearfix">
                    <h2>
                        <a href="<!--{link m='special' special_id=$list.area_id}-->" target="_blank">
                            <!--{$list.area_title}--></a>
                    </h2>
                </div>
                <div class="bd clearfix">
                    <div class="show">
                        <a href="<!--{link m='special' special_id=$list.area_id}-->" target="_blank">
                            <img src="<!--{$list.area_logo}-->" alt="<!--{$list.area_title}-->">
                        </a>
                    </div>
                    <div class="slide">
                        <a href="javascript:;" class="prev js-prev<!--{$list.special_sort_show -1}--> disabled">&lt;</a>

                        <div class="roll-list js-roll-list">
                            <ul class="clearfix">
                                <!--{special id=$list.area_id row=12}-->
                                <li>
                                    <a class="pic tsicon" href="<!--{link m='app' app_id=$special.app_id}-->"
                                       title="<!--{$special.app_title}-->" target="_blank">
                                        <img src="<!--{imageurl url =$special.app_logo}-->" alt="<!--{$special.app_title}-->">
                                    </a>

                                    <h3 class="js-pro-name" style="display: block;"><!--{$special.app_title}--></h3>
                                    <a href="<!--{link m='app' app_id=$special.app_id}-->"
                                       class="js-btn bt-install"
                                       style="display: none;" target="_blank">安装</a>
                                </li>
                                <!--{/special}-->
                            </ul>
                        </div>
                        <a href="javascript:;" class="next js-next<!--{$list.special_sort_show -1}-->">&gt;</a>
                    </div>
                </div>
            </div>
            <!--{/list}-->
        </div>
    </div>
    <div class="right">
        <!--{include file="right-div.php"}-->
    </div>
</div>

<div class="overlay" id="overlay" style="display: none; height: 1978px;"></div>
<a id="toTop" title="返回顶部" target="_self" href="javascript:void(0)" style="display: none;"><i></i></a>
<!--/ 友情链接 -->

<!--{include file="inc_flink.php"}-->
<script src="<!--{$tpl_path}-->js/index.js"></script>
<!--{include file="inc_foot.php"}-->


<script type="text/javascript">
  (function ($) {
    if($("#ifDetail").length > 0) {
      detailArgs = {
        ifDetail: true,
        rt: $("#newsResType").length > 0 ? $("#newsResType").val() : $("#appType").val(),
        ri: $("#newsResId").length > 0 ? $("#newsResId").val() : $("#appId").val()
      };
    }
  })(jQuery);

</script>
<script src="<!--{$tpl_path}-->js/base.js" type="text/javascript"></script>
<script type="text/javascript">
    $.lazyImg.start("scroll", { attributeTag: 'o-src' });
    $(function(){
        $("#key").autoSearch();
        //Adapt.init();
        $("#baseLog .log-now").attr("href", "#");
        $(window).scroll(function () {
          toTopHide();
          $("#toTop").click(function () {
            window.scrollTo(0, 0);
            return false;
          });
        });
    });
</script>
<script type="text/javascript" src="<!--{$tpl_path}-->js/qc_loader.js" data-appid="100248959" charset="utf-8"></script>
<script src="<!--{$tpl_path}-->js/qc-1.0.1.js" type="text/javascript" data-appid="100248959" charset="utf-8"></script>

<script>
    $(function () {
        $('.app-list li').hover(function () {
            $(this).addClass('curr')
        }, function () {
            $(this).removeClass('curr')
        })
    })
</script>
</body>
</html>