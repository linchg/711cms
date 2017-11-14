<div class="layout content">
    <div class="mod-box">
        <h3 class="mod-course-tit">友情链接</h3>
        <div class="mod-cont mod-course clearfix">
            <div class="course clearfix">
                <ul class="course-list">
                    <!--{friendlink type=2}-->
                    <!--{if !$friendlink.flink_img}-->
                    <li>
                        <a target="_blank" href="<!--{$friendlink.flink_url}-->">
                        <b><!--{$friendlink.flink_name}--></b>
                        </a>
                    </li>
                    <!--{else}-->
                   <li>
                       <a target="_blank" href="<!--{$friendlink.flink_url}-->">
                        <img style="display: inline-block; position: relative; top:3px;" width="20" height="20" src="<!--{$friendlink.flink_img}-->"/>
                        <b><!--{$friendlink.flink_name}--></b>
                       </a>
                   </li>
                    <!--{/if}-->
                    <!--{/friendlink}-->
                </ul>
            </div>
        </div>
    </div>
</div>