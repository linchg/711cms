<!-- f-link -->
<div class="box">
    <div class="itit">友情链接</div>
    <div class="flink">
        <!--{friendlink type=2}-->
        <!--{if !$friendlink.flink_img}-->
        <a target="_blank" href="<!--{$friendlink.flink_url}-->">
            <b><!--{$friendlink.flink_name}--></b>
        </a>
        <!--{else}-->
        <a target="_blank" href="<!--{$friendlink.flink_url}-->">
            <img style="display: inline-block; position: relative; top:3px;" width="20" height="20" src="<!--{$friendlink.flink_img}-->"/>
            <b><!--{$friendlink.flink_name}--></b>
        </a>
        <!--{/if}-->
        <!--{/friendlink}-->
    </div>
</div>
<!-- f-link -->