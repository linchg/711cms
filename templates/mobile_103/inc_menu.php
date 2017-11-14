<section class="index-hotarea">

            <div class="bingo-wrapper">
                <ul class="pics" id="pics">
                </ul>
                <div class="msg">
                    <ul class="tabFn" id="tabFn"></ul>
                </div>
            </div>
            <div><span class="clear clearfix"></span></div>
            <ul class="index-tuiguang">
                <!--{navicat row=4 start=4}-->
                <li  <!--{if ($navicat.nav_sort_show ==1)}-->
                        class="tuiguang-item tuiguang-bibei"
                     <!--{elseif ($navicat.nav_sort_show ==2)}-->
                         class="tuiguang-item tuiguang-paihang"
                     <!--{elseif ($navicat.nav_sort_show ==3)}-->
                        class="tuiguang-item tuiguang-zhuanti"
                     <!--{elseif ($navicat.nav_sort_show ==4)}-->
                         class="tuiguang-item tuiguang-luntan"
                     <!--{else}-->
                        class="tuiguang-item"
                     <!--{/if}-->>

                    <a class="g-block" href="<!--{link m = $navicat.navicat_m}-->"><!--{$navicat.navicat_name}--></a>
                </li>
                <!--{/navicat}-->
            </ul>
                <div><span class="clear clearfix"></span></div>
                <ul class="index-tuiguang">
                <!--{navicat row=4 start=8}-->
                <li  <!--{if ($navicat.nav_sort_show ==1)}-->
                    class="tuiguang-item tuiguang-luntan"
                     <!--{elseif ($navicat.nav_sort_show ==2)}-->
                    class="tuiguang-item tuiguang-zhuanti"
                    <!--{elseif ($navicat.nav_sort_show ==3)}-->
                    class="tuiguang-item tuiguang-paihang"
                     <!--{elseif ($navicat.nav_sort_show ==4)}-->
                    class="tuiguang-item tuiguang-bibei"
                     <!--{else}-->
                        class="tuiguang-item"
                     <!--{/if}-->>

                    <a class="g-block" href="<!--{link m = $navicat.navicat_m}-->"><!--{$navicat.navicat_name}--></a>
                </li>
                <!--{/navicat}-->
            </ul>
</section>
<div><span class="clear clearfix"></span></div>