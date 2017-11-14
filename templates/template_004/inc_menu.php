<div class="inner clearfix">
    <div class="mod-nav" id="section_1">
        <!--{navicat }-->
        <!--{if $navicat.navicat_id == 4}-->
                       <span class="install-all">
                           <a href="<!--{link m=$navicat.navicat_m}-->" id="mod-install" <!--{if $navicat.navicat_blank == 1}-->target="_blank"<!--{/if}-->><!--{$navicat.navicat_name}--></a>
                       </span>
        <!--{/if}-->
        <!--{/navicat}-->
        <!--{navicat}-->
        <!--{if $navicat.navicat_id != 4}-->
        <a href="<!--{link m=$navicat.navicat_m}-->"
        <!--{if ($navicat.nav_sort_show == 1 && empty($current_page)) || strpos($navicat.navicat_url,$current_page) >0}-->
        id="current"<!--{/if}-->
        <!--{if $navicat.navicat_blank == 1}-->target="_blank"<!--{/if}-->
        <!--{if $navicat.navicat_m =='list_soft'}-->
        class="soft"
        <!--{if isset($app_type_id) && $app_type_id == $navicat.navicat_m
            && $navicat.navicat_m !='list_service' && $current_page!='open_service'
            && $navicat.navicat_m !='list_packs' && $current_page!='open_packs'
            }-->
        id="current"
        <!--{/if}-->
        <!--{elseif $navicat.navicat_m =='index'}-->
        class="home"
        <!--{elseif $navicat.navicat_m =='list_game'}-->
        class="game"
        <!--{if isset($app_type_id) && $app_type_id == $navicat.navicat_m
            && $navicat.navicat_m !='list_service' && $current_page!='open_service'
            && $navicat.navicat_m !='list_packs' && $current_page!='open_packs'
            }-->
        id="current"
        <!--{/if}-->
        <!--{elseif $navicat.navicat_m =='list_info'}-->
        class="wallpaper"
        <!--{if $current_page=='content_info'}-->
        id="current"
        <!--{/if}-->

        <!--{elseif $navicat.navicat_m =='list_service'}-->
        class="wallpaper"
        <!--{if $current_page=='open_service'}-->
        id="current"
        <!--{/if}-->

        <!--{elseif $navicat.navicat_m =='list_packs'}-->
        class="wallpaper"
        <!--{if $current_page=='open_packs'}-->
        id="current"
        <!--{/if}-->

        <!--{elseif $navicat.navicat_m =='list_special'}-->
        class="soft"
        <!--{if $current_page=='content_special'}-->
        id="current"
        <!--{/if}-->
        <!--{else}-->
        <!--{/if}-->><i><!--{$navicat.navicat_name}--></i></a>
        <!--{if $navicat.navicat_count != $navicat.nav_sort_show}-->
        <span class="line"></span>
        <!--{/if}-->
        <!--{/if}-->
        <!--{/navicat}-->
    </div>
</div>