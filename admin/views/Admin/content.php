<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 后台账号</div>

    <!-- 右侧主体内容开始 -->
    <div class="mbody">

        <div class="mt10 clearfix"></div>

        <form method="post" action="<?php echo build_url('Admin', 'save', array('uid' => !empty($info['uid']) ? $info['uid'] : 0)); ?>" id="adminForm">
            <div class="mt10">
                <table class="tb-2" border="1" bordercolor="#cee1ee">
                    <tr>
                        <td class="td-bg">账　　号：</td>
                        <td class="alignleft">
                            <input type="text" <?php echo isset($info['uid']) ? 'readonly="readonly"': ''; ?> id="uname" name="uname" class="ipt ml15" value="<?php echo isset($info['uname']) ? $info['uname'] : ''; ?>" />
                        </td>
                    </tr>
                    <?php if(isset($info['uid'])):?>
                        <tr>
                            <td class="td-bg">原 密 码：</td>
                            <td class="alignleft">
                                <input type="password" id="oldpass" name="oldpass" class="ipt ml15" />
                            </td>
                            </td>
                        </tr>
                    <?php endif;?>
                    <tr>
                        <td class="td-bg"><?php echo isset($info['uid']) ? '新 密 码': '密 码'; ?>：</td>
                        <td class="alignleft">
                            <input type="password" id="upass" name="upass" class="ipt ml15" />
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">确认密码：</td>
                        <td class="alignleft">
                            <input type="password" id="re_pass" name="re_pass" class="ipt ml15" />
                        </td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="ustate" value="1" /></td>
                        <td colspan="2"><a href="javascript:void(0);" id="btn_update_user" onclick="save_admin()" class="but2 ml5">确 定</a></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
    <!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    function save_admin()
    {
        $.post($('#adminForm').attr('action'), $('#adminForm').serialize(), function(result){
            if (result.code == 0) {
                window.location = '<?php echo build_url("Admin"); ?>';
            } else {
                show_msg(result.msg);
            }
        }, 'json');
    }
</script>

<?php $this->load->view('/footer.php'); ?>
