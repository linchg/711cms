<!-- model start -->
<!-- f-link -->
<div class="home-friend-wrap f14 clear">
    <div class="model">
        <span>友情链接:</span>
        <!--{friendlink type=2}-->
        <!--{if !$friendlink.flink_img}-->
        <a href="<!--{$friendlink.flink_url}-->" target="_blank" title="<!--{$friendlink.flink_name}-->">&nbsp;
            <!--{$friendlink.flink_name}-->&nbsp;</a>
        <!--{else}-->
        <a href="<!--{$friendlink.flink_url}-->" target="_blank" title="<!--{$friendlink.flink_name}-->">
            &nbsp; <img style="display: inline-block; position: relative; top:3px;" width="20" height="20" src="<!--{$friendlink.flink_img}-->"/>
            <!--{$friendlink.flink_name}-->&nbsp;
        </a>
        <!--{/if}-->
        <!--{/friendlink}-->
    </div>
</div>
<!-- f-link -->
<!-- model end -->