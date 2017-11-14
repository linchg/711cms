<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">系统管理</a> » 网站导航</div><!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">

        <div class="clearfix"></div>

        <div class="mt10">
            <form method="post" action="<?php echo build_url('Navicat', 'save', array('navicat_id' => !empty($info['navicat_id']) ? $info['navicat_id'] : 0)); ?>" id="navicatForm">
                <table class="tb-2" border="1" bordercolor="#cee1ee">
                    <tr>
                        <td width="100" class="td-bg">导航名称：</td>
                        <td class="alignleft">
                            <input type="text" class="ipt ml15"  id="navicat_name" name="navicat_name" value="<?php echo isset($info['navicat_name']) ? $info['navicat_name'] : ''; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td width="100" class="td-bg">链接地址：(不可修改)</td>
                        <td class="alignleft">
                            <input type="text"  readonly class="ipt ml15"  id="navicat_url" name="navicat_url" value="<?php echo isset($info['navicat_url']) ? $info['navicat_url'] : ''; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td width="100" class="td-bg">SEO标题：</td>
                        <td class="alignleft">
                            <input type="text"  class="ipt ml15"  id="navicat_seotitle" name="navicat_seotitle" value="<?php echo isset($info['navicat_seotitle']) ? $info['navicat_seotitle'] : ''; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td width="100" class="td-bg">SEO关键字：</td>
                        <td class="alignleft">
                            <input type="text"  class="ipt ml15"  id="navicat_seokey" name="navicat_seokey" value="<?php echo isset($info['navicat_seokey']) ? $info['navicat_seokey'] : ''; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td width="100" class="td-bg">SEO描述：</td>
                        <td class="alignleft">
                            <input type="text"  class="ipt ml15"  id="navicat_seodesc" name="navicat_seodesc" value="<?php echo isset($info['navicat_seodesc']) ? $info['navicat_seodesc'] : ''; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">是否显示：</td>
                        <td colspan="3" class="alignleft">
                            <select id="navicat_enabled" name="navicat_enabled" class="ml15">
                                <option value="1" <?php echo isset($info['navicat_enabled']) && $info['navicat_enabled'] == 1 ? 'selected="selected"' : ''; ?>>显示</option>
                                <option value="2" <?php echo isset($info['navicat_enabled']) && $info['navicat_enabled'] == 2 ? 'selected="selected"' : ''; ?>>不显示</option>
                            </select>
                            &nbsp;&nbsp;* 必填</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">是否新窗口打开：</td>
                        <td colspan="3" class="alignleft">
                            <select id="navicat_blank" name="navicat_blank" class="ml15">
                                <option value="1" <?php echo isset($info['navicat_blank']) && $info['navicat_blank'] == 1 ? 'selected="selected"' : ''; ?>>新窗口打开</option>
                                <option value="2" <?php echo isset($info['navicat_blank']) && $info['navicat_blank'] == 2 ? 'selected="selected"' : ''; ?>>不是新窗口</option>
                            </select>
                            &nbsp;&nbsp;* 必填</a>
                        </td>
                    </tr>
                    <tr>
                        <td width="100" class="td-bg">导航排序：</td>
                        <td class="alignleft">
                            <input type="text"  class="ipt ml15"  id="navicat_order" name="navicat_order" value="<?php echo isset($info['navicat_order']) ? $info['navicat_order'] : ''; ?>" />
                        </td>
                    </tr>
                </table>
            </form>
            <div class="mt15 tc">
                <a href="javascript:void(0);" class="but2 ml5" onclick="save_navicat()" >确 定</a>
            </div>
        </div>

    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    function save_navicat()
    {
        $.post($('#navicatForm').attr('action'), $('#navicatForm').serialize(), function(result){
            if (result.code == 0) {
                window.location = '<?php echo build_url("Navicat"); ?>';
            } else {
                show_msg(result.msg);
            }
        }, 'json');
    }
</script>

<?php $this->load->view('/footer.php'); ?>
