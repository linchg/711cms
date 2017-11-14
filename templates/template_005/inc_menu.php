
    <!--主导航 begin-->
    <div class="nav">
        <div class="col_nav">
            <div class="Bnav">
                <!--{navicat }-->
                <a href="<!--{link m=$navicat.navicat_m}-->"
                <!--{if ($navicat.nav_sort_show == 1 && empty($current_page)) || strpos($navicat.navicat_url,$current_page) >0}-->
                class="navItem current"<!--{/if}--> <!--{if $navicat.navicat_blank == 1}-->target="_blank"
                <!--{/if}-->
                <!--{if isset($app_type_id) && $app_type_id == $navicat.navicat_m
           && $navicat.navicat_m !='list_service' && $current_page!='open_service'
           && $navicat.navicat_m !='list_packs' && $current_page!='open_packs'
           }-->
                class="navItem current"
                <!--{elseif  $navicat.navicat_m =='list_info' && $current_page=='content_info'}-->
                class="navItem current"
                <!--{elseif  $navicat.navicat_m =='list_packs' && $current_page=='open_packs'}-->
                class="navItem current"
                <!--{elseif  $navicat.navicat_m =='list_service' && $current_page=='open_service'}-->
                class="navItem current"
                <!--{elseif  $navicat.navicat_m =='list_special' && $current_page=='content_special'}-->
                class="navItem current"
                <!--{else}-->
                class="navItem"
                <!--{/if}-->><!--{$navicat.navicat_name}--></a>
                <!--{/navicat}-->
            </div>
        </div>
    </div>
    <!--主导航 end-->
