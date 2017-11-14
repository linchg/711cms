<div class="nav-wrap">
    <div class="nav" id="globalNav">
        <ul class="nav-con f16" id="menu_select">
            <!--{navicat}-->
            <li
            <!--{if ($navicat.nav_sort_show == 1 && empty($current_page)) || strpos($navicat.navicat_url,$current_page) >0}-->
            class="nav-home"<!--{/if}-->
            <!--{if isset($app_type_id) && $app_type_id == $navicat.navicat_m
            && $navicat.navicat_m !='list_service' && $current_page!='open_service'
            && $navicat.navicat_m !='list_packs' && $current_page!='open_packs'
            }-->
            class="nav-home"
            <!--{/if}-->
            <!--{if  $navicat.navicat_m =='list_info' && $current_page=='content_info'}-->
            class="nav-home"
            <!--{/if}-->
            <!--{if  $navicat.navicat_m =='list_packs' && $current_page=='open_packs'}-->
            class="nav-home"
            <!--{/if}-->
            <!--{if  $navicat.navicat_m =='list_service' && $current_page=='open_service'}-->
            class="nav-home"
            <!--{/if}-->
            <!--{if  $navicat.navicat_m =='list_special' && $current_page=='content_special'}-->
            class="nav-home"
            <!--{/if}-->>
            <!--{if $navicat.navicat_blank == 1}-->
            <a class="first-link" href="<!--{link m=$navicat.navicat_m}-->" target="_blank">
                <span><!--{$navicat.navicat_name}--></span>
            </a>
            <!--{else}-->
            <a class="first-link" href="<!--{link m=$navicat.navicat_m}-->">
                <span><!--{$navicat.navicat_name}--></span>
            </a>
            <!--{/if}-->
            </li>
            <!--{/navicat}-->
        </ul>
    </div>
</div>
