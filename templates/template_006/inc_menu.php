<div class="menu">
    <div class="m_main">
        <div class="min">
            <ul>
                <!--{navicat}-->
                <li <!--{if ($navicat.nav_sort_show == 1 && empty($current_page)) || strpos($navicat.navicat_url,$current_page) >0}-->
                    class="min_on"

                <!--{elseif isset($app_type_id) && $app_type_id == $navicat.navicat_m
      && $navicat.navicat_m !='list_service' && $current_page!='open_service'
      && $navicat.navicat_m !='list_packs' && $current_page!='open_packs'
      }-->
                    class="min_on"

                    <!--{elseif  $navicat.navicat_m =='list_info' && $current_page=='content_info'}-->
                    class="min_on"

                    <!--{elseif  $navicat.navicat_m =='list_special' && $current_page=='content_special'}-->
                    class="min_on"
                    <!--{elseif  $navicat.navicat_m =='list_packs' && $current_page=='open_packs'}-->
                    class="min_on"
                    <!--{elseif  $navicat.navicat_m =='list_service' && $current_page=='open_service'}-->
                    class="min_on"
                    <!--{else}-->
                    class=""
                    <!--{/if}-->>
                    <!--{if $navicat.navicat_blank == 1}-->
                    <a  href="<!--{link m=$navicat.navicat_m}-->" target="_blank">
                        <!--{$navicat.navicat_name}-->
                    </a>
                    <!--{else}-->
                    <a  href="<!--{link m=$navicat.navicat_m}-->">
                        <!--{$navicat.navicat_name}-->
                    </a>
                    <!--{/if}-->
                </li>
                <!--{/navicat}-->    
            </ul>        
        </div>
    </div>
</div>