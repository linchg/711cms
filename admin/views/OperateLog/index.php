<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>
<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 操作日志</div>

    <!-- 右侧主体内容开始 -->
    <div class="mbody">
        <table class="tb mt10" border="1" bordercolor="#cee1ee">
            <tr class="tr-title">
                <th width="5%">ID</th>
                <th width="10%">账号</th>
                <th width="15%">操作时间</th>
                <th width="10%">IP</th>
                <th width="30%">操作内容</th>
            </tr>
            <?php if (is_array($list) && sizeof($list) > 0) : ?>
                <?php foreach ($list as $ka => $va) : ?>
                    <tr>
                        <td><?php echo $va['log_id']; ?></td>
                        <td><?php echo $va['log_admin']; ?></td>
                        <td><?php echo date("Y-m-d H:i:s", $va['log_time']); ?></td>
                        <td><?php echo $va['log_ip']; ?></td>
                        <td><?php echo $va['log_content']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
        <!--分页码-->
        <div class="pagebar clearfix">
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
    <!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<?php $this->load->view('/footer.php'); ?>
