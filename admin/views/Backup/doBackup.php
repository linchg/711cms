<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 数据备份  </div><!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">

        <h2 style="padding:0 0 10px; font-size:16px; color:#333">新建备份</h2>

        <div class="mt10">
            <form action="<?php echo build_url('Backup', 'doJob'); ?>" method="post" id="backupForm">
                <table class="tb-2" border="1" bordercolor="#cee1ee">
                    <tr>
                        <td width="150" class="td-bg">数据库名称：</td>
                        <td><?php echo $db_database; ?></td>
                        <td width="150" class="td-bg">数据库用户：</td>
                        <td><?php echo $db_username; ?></td>
                    </tr>
                    <tr>
                        <td width="150" class="td-bg">备份状态：</td>
                        <td colspan="3" class="td-bg alignleft">
                            <textarea id="backup_status" class="ml10" rows=15 cols="150" style="font-size:12px">备份任务已经就绪,请点击启动运行...</textarea>
                        </td>
                    </tr>
                </table>
                <div class="mt15 tc">
                    <a href="javascript:void(0);" class="but2" onclick="start_backup();">开始备份</a>
                    <a href="javascript:void(0);" class="but2" onclick="location.reload()">重新加载</a>
                </div>
            </form>
        </div>

    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    function start_backup()
    {
        $.post($('#backupForm').attr('action'), {}, function(result){
            var msg ='';
            if (result.msg != 'done') {
                msg = result.msg;
                if (result.code != 999) {
                    start_backup();
                }
            } else {
                msg = '备份完成！';
            }
            $('#backup_status').html($('#backup_status').html() + "\n" + msg).scrollTop($('#backup_status')[0].scrollHeight);
        }, 'json');
    }
</script>

<?php $this->load->view('/footer.php'); ?>
