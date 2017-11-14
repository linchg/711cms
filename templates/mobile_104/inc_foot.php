<div class="foot-bg">
    <footer class="foot">
        <!--{navicat row=3 start=0}-->
        <dl <!--{if ($navicat.nav_sort_show == 1 && empty($current_page)) || strpos($navicat.navicat_url,$current_page) >0}-->
        class="get-<!--{$navicat.nav_sort_show}-->"
        <!--{elseif isset($app_type_id) && $app_type_id == $navicat.navicat_m }-->
        class="get-<!--{$navicat.nav_sort_show}-->"
        <!--{elseif  $navicat.navicat_m =='list_info' && $current_page=='content_info'}-->
        class="get-<!--{$navicat.nav_sort_show}-->"
        <!--{elseif  $navicat.navicat_m =='list_special' && $current_page=='content_special'}-->
        class="get-<!--{$navicat.nav_sort_show}-->"
        <!--{else}-->
        class=""
        <!--{/if}-->>
        <!--{if $navicat.navicat_id==7}-->
        <dt class="f-com f-index"><a href="<!--{link m=$navicat.navicat_m}-->" class="btn-a"></a></dt>
        <!--{elseif $navicat.navicat_id==2}-->
        <dt class="f-com f-ruanjian"><a href="<!--{link m=$navicat.navicat_m}-->" class="btn-a"></a></dt>
        <!--{elseif $navicat.navicat_id==3}-->
        <dt class="f-com f-game"><a href="<!--{link m=$navicat.navicat_m}-->" class="btn-a"></a></dt>
        <!--{/if}-->
        <dd><a href="<!--{link m=$navicat.navicat_m}-->"><!--{$navicat.navicat_name}--></a></dd>
        </dl>
        <!--{/navicat}-->

        <!--{navicat row=1 start=5}-->
        <dl <!--{if ($navicat.nav_sort_show == 6 && empty($current_page)) || strpos($navicat.navicat_url,$current_page) >0}-->
        class="get-8"
        <!--{else}-->
        class=""
        <!--{/if}-->>
        <!--{if $navicat.navicat_id==6}-->
        <dt class="f-com f-range"><a href="<!--{link m=$navicat.navicat_m}-->" class="btn-a"></a></dt>
        <!--{/if}-->
        <dd><a href="<!--{link m=$navicat.navicat_m}-->"><!--{$navicat.navicat_name}--></a></dd>
        </dl>
        <!--{/navicat}-->
    </footer>
</div>