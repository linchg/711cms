<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 文章正文  </div><!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">

        <h2 style="padding:0 0 10px; font-size:16px; color:#333">文章正文</h2>

        <div class="mt10">
            <form action="<?php echo build_url('Gather', 'doJob'); ?>" method="post" id="gatherForm">
                <table class="tb-2" border="1" bordercolor="#cee1ee">
                    <tr>
                        <td width="150" class="td-bg">采集名称：</td>
                        <td>
                            <?php echo $info['gather_name']; ?>
                        </td>
                        <td width="150" class="td-bg">采集网站域名：</td>
                        <td>
                            <?php echo $info['gather_site']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="150" class="td-bg">采集状态：</td>
                        <td colspan="3" class="td-bg alignleft">
                            <textarea id="gather_status" class="ml10" rows=15 cols="150" style="font-size:12px">采集任务已经就绪,请点击启动运行...</textarea>
                        </td>
                    </tr>
                </table>
                <div class="mt15 tc">
                    <a href="javascript:void(0);" class="but2" onclick="start_gather(<?php echo $info['gather_id']; ?>);">启动任务</a>
                    <a href="javascript:void(0);" class="but2" onclick="location.reload()">重新加载</a>
                </div>
            </form>
        </div>

    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    function start_gather(gather_id)
    {
        $.post($('#gatherForm').attr('action'), {"gather_id" : gather_id}, function(result){
            var msg ='';
            if (result.msg != 'done') {
                msg = result.msg;
                if (result.code != 999) {
                    start_gather(gather_id);
                }
            } else {
                msg = '采集完成！';
            }
            $('#gather_status').html($('#gather_status').html() + "\n" + msg).scrollTop($('#gather_status')[0].scrollHeight);
        }, 'json');
    }
</script>

<?php $this->load->view('/footer.php'); ?>
