<div class="layout">
   

    <ul class="erjinavbox clearfix">

            <!--{navicat}-->

        <li>
            <a href="<!--{link m=$navicat.navicat_m}-->"
            <!--{if ($navicat.nav_sort_show == 1 && empty($current_page)) || strpos($navicat.navicat_url,$current_page) >0}-->
            class="sydangqian"
            <!--{elseif isset($app_type_id) && $app_type_id == $navicat.navicat_m
            && $navicat.navicat_m !='list_service' && $current_page!='open_service'
            && $navicat.navicat_m !='list_packs' && $current_page!='open_packs'
            }-->
            class="sydangqian"
            <!--{elseif  $navicat.navicat_m =='list_info' && $current_page=='content_info'}-->
            class="sydangqian"
            <!--{elseif  $navicat.navicat_m =='list_service' && $current_page=='open_service'}-->
            class="sydangqian"
            <!--{elseif  $navicat.navicat_m =='list_packs' && $current_page=='open_packs'}-->
            class="sydangqian"
            <!--{elseif  $navicat.navicat_m =='list_special' && $current_page=='content_special'}-->
            class="sydangqian"
            <!--{/if}-->
            <!--{if $navicat.navicat_blank == 1 }-->
            target="_blank"
            <!--{/if}-->>
            <!--{$navicat.navicat_name}-->
            </a>
        </li>

            <!--{/navicat}-->
    </ul>

</div>