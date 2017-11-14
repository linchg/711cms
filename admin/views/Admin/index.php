<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 后台账号</div>

    <!-- 右侧主体内容开始 -->
    <div class="mbody">
        <div class="mt10">
            <a href="<?php echo build_url('Admin', 'content'); ?>" class="but2">添加账号</a>
        </div>
        <table class="tb mt10" border="1" bordercolor="#cee1ee">
            <tr class="tr-title">
                <th width="80">账号ID</th>
                <th width="80">账号</th>
                <th width="80">开通时间</th>
                <th width="60">操作</th>
            </tr>
            <?php if (is_array($list) && sizeof($list) > 0) : ?>
                <?php foreach ($list as $ka => $va) : ?>
                    <tr>
                        <td>
                            <?php echo $va['uid']; ?>
                        </td>
                        <td>
                            <a href="<?php echo build_url('Admin', 'content', array('uid' => $va['uid'])); ?>">
                                <?php echo $va['uname']; ?>
                            </a>
                        </td>
                        <td>
                            <?php echo date("Y-m-d H:i:s", $va['reg_date']); ?>
                        </td>
                        <td align="center">
                            <a class="but2 but2s" href="<?php echo build_url('Admin', 'content', array('uid' => $va['uid'])); ?>">编辑</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
        <!--分页码-->
        <div class="pagebar clearfix">
            <?php echo $this->pagination->create_links(); ?>
        </div>

    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<?php $this->load->view('/footer.php'); ?>
