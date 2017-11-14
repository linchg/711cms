<div class="nav-wrap">
    <ul class="nav clearfix">
        <!--{navicat  start=0}-->
        <li <!--{if ($navicat.nav_sort_show == 1 && empty($current_page)) || strpos($navicat.navicat_url,$current_page) >0}-->
        class="curr"
        <!--{elseif isset($app_type_id) && $app_type_id == $navicat.navicat_m
      && $navicat.navicat_m !='list_service' && $current_page!='open_service'
      && $navicat.navicat_m !='list_packs' && $current_page!='open_packs'
      }-->
        class="curr"
        <!--{elseif  $navicat.navicat_m =='list_info' && $current_page=='content_info'}-->
        class="curr"

        <!--{elseif  $navicat.navicat_m =='list_special' && $current_page=='content_special'}-->
        class="curr"
        <!--{elseif  $navicat.navicat_m =='list_packs' && $current_page=='open_packs'}-->
        class="curr"
        <!--{elseif  $navicat.navicat_m =='list_service' && $current_page=='open_service'}-->
        class="curr"
        <!--{else}-->
        class=""
        <!--{/if}-->>

        <!--{if $navicat.navicat_blank == 1}-->
        <a href="<!--{link m=$navicat.navicat_m}-->" target="_blank">
            <!--{$navicat.navicat_name}--><span
            <!--{if ($navicat.nav_sort_show == 1 && empty($current_page)) || strpos($navicat.navicat_url,$current_page) >0}-->
            class="nav-bar"
            <!--{/if}-->
            ></span>
        </a>
        <!--{else}-->
        <a  href="<!--{link m=$navicat.navicat_m}-->">
            <!--{$navicat.navicat_name}-->
            <span
            <!--{if ($navicat.nav_sort_show == 1 && empty($current_page)) || strpos($navicat.navicat_url,$current_page) >0}-->
            class="nav-bar"
            <!--{elseif isset($app_type_id) && $app_type_id == $navicat.navicat_m
      && $navicat.navicat_m !='list_service' && $current_page!='open_service'
      && $navicat.navicat_m !='list_packs' && $current_page!='open_packs'
      }-->
            class="nav-bar"
            <!--{elseif  $navicat.navicat_m =='list_info' && $current_page=='content_info'}-->
            class="nav-bar"

            <!--{elseif  $navicat.navicat_m =='list_special' && $current_page=='content_special'}-->
            class="nav-bar"
            <!--{elseif  $navicat.navicat_m =='list_packs' && $current_page=='open_packs'}-->
            class="nav-bar"
            <!--{elseif  $navicat.navicat_m =='list_service' && $current_page=='open_service'}-->
            class="nav-bar"
            <!--{else}-->
            class=""
            <!--{/if}-->
            ></span>
        </a>
        <!--{/if}-->
        </li>
        <!--{/navicat}-->
    </ul>
</div>