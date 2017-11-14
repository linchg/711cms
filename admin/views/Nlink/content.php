<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">系统管理</a> » 正文内链</div><!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">

        <div class="clearfix"></div>

        <div class="mt10">
            <form method="post" action="<?php echo build_url('Nlink', 'save', array('nlink_id' => !empty($info['nlink_id']) ? $info['nlink_id'] : 0)); ?>" id="nlinkForm">
                <table class="tb-2" border="1" bordercolor="#cee1ee">
                    <tr>
                        <td width="100" class="td-bg">内链关键词：</td>
                        <td class="alignleft">
                            <input type="text" class="ipt ml15"  id="nlink_txt" name="nlink_txt" value="<?php echo isset($info['nlink_txt']) ? $info['nlink_txt'] : ''; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td width="100" class="td-bg">链接地址：</td>
                        <td class="alignleft">
                            <input type="text"  class="ipt ml15"  id="nlink_url" name="nlink_url" value="<?php echo isset($info['nlink_url']) ? $info['nlink_url'] : ''; ?>" />
                        </td>
                    </tr>
                </table>
            </form>
            <div class="mt15 tc">
                <a href="javascript:void(0);" class="but2 ml5" onclick="save_nlink()" >确 定</a>
            </div>
        </div>

    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    function save_nlink()
    {
        $.post($('#nlinkForm').attr('action'), $('#nlinkForm').serialize(), function(result){
            if (result.code == 0) {
                window.location = '<?php echo build_url("Nlink"); ?>';
            } else {
                show_msg(result.msg);
            }
        }, 'json');
    }
</script>

<?php $this->load->view('/footer.php'); ?>
