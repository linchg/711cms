<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 数据备份  </div><!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">

        <div class="mt10 clearfix">
            <div class="l">
                <a class="but2" href="<?php echo build_url('Backup', 'main'); ?>">全部备份</a>
                <a class="but2" href="<?php echo build_url('Backup', 'doBackup'); ?>">新建备份</a>
            </div>
            <div class="r r-box">
            </div>
        </div>

        <div class="mt10 clearfix">
            <table class="tb mt10" border="1" bordercolor="#cee1ee">
                <thead>
                <tr class="tr-title">
                    <th width="20%">备份名称</th>
                    <th width="10%">备份时间</th>
                    <th width="15%">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if (is_array($list) && sizeof($list) > 0) : ?>
                    <?php foreach ($list as $value) : ?>
                        <tr>
                            <td>
                                <a href="<?php echo build_url('Backup', 'download', array('name' => $value['name'])); ?>">
                                    <?php echo $value['name']; ?>
                                </a>
                            </td>
                            <td><?php echo date('Y-m-d H:i:s',$value['date']); ?></td>
                            <td>
                                <a class="but2 but2s" href="<?php echo build_url('Backup', 'download', array('name' => $value['name'])); ?>">查看</a>
                                <a class="but2 but2s" href="javascript:void(0);" onclick="backup_del('<?php echo $value['name']; ?>')">删除</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
            <div class="pagebar clearfix">
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>

    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    function backup_del(name){
        show_msg("确认删除？", true, function(){
            $.post(build_url('Backup', 'delete'), {'name':name}, function(result) {
                if(result.code != 0){
                    show_msg(result.msg);
                }else{
                    location.reload();
                }
            }, 'json');
        });
    }
</script>

<?php $this->load->view('/footer.php'); ?>
