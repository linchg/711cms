<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 装机必备管理</div><!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">

        <div class="clearfix"></div>
        <div class="mt10">
            <div>
                <form method="post" id="necessaryForm" action="<?php echo build_url('Necessary', 'save', array('necessary_id' => !empty($info['necessary_id']) ? $info['necessary_id'] : 0)); ?>">
                    <table class="tb-2" border="1" bordercolor="#cee1ee">
                        <tr>
                            <td width="150" class="td-bg">标题：</td>
                            <td class="alignleft">
                                <input type="text" class="ipt ml15" id="necessary_title" name="necessary_title" style="width:400px;" value="<?php echo isset($info['necessary_title']) ? $info['necessary_title'] : ''; ?>" />
                                * 用于显示文字或者标记
                            </td>
                        </tr>
                        <tr>
                            <td  width="150" class="td-bg">类型：</td>
                            <td  class="alignleft">
                                <select name="necessary_type" id="necessary_type" class="ml15">
                                    <option value="1" <?php echo isset($info['necessary_type']) && $info['necessary_type'] == 1 ? 'selected="selected"' : ''; ?>>应用</option>
                                    <option value="2" <?php echo isset($info['necessary_type']) && $info['necessary_type'] == 2 ? 'selected="selected"' : ''; ?>>游戏</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td  width="150" class="td-bg">排序：</td>
                            <td  class="alignleft">
                                <input type="text" class="ipt ml15"  id="necessary_order" name="necessary_order" value="<?php echo isset($info['necessary_order']) ? $info['necessary_order'] : 0; ?>" />
                            </td>
                        </tr>
                        <tr id="list_tr">
                            <td  width="150" class="td-bg">应用ID列表：</td>
                            <td  class="alignleft">
                                <textarea id="necessary_list" name="necessary_list" class="ml15"><?php echo isset($info['necessary_list']) ? $info['necessary_list'] : ''; ?></textarea>
                                * 应用ID，用,分隔</span>
                            </td>
                        </tr>
                        <tr>
                            <td width="150" class="td-bg">描述：</td>
                            <td class="alignleft">
                                <textarea class="ml15" id="necessary_html" name="necessary_html"><?php echo isset($info['necessary_html']) ? $info['necessary_html'] : ''; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td  width="150" class="td-bg">备注：</td>
                            <td  class="alignleft">
                                <textarea id="necessary_remarks" name="necessary_remarks" class="ml15"><?php echo isset($info['necessary_remarks']) ? $info['necessary_remarks'] : ''; ?></textarea>
                                没有可留空
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="mt15 tc">
                <a href="javascript:void(0);" class="but2" onclick="save_necessary()">确 定</a>
            </div>
        </div>

    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    function save_necessary()
    {
        $.post($('#necessaryForm').attr('action'), $('#necessaryForm').serialize(), function(result){
            if (result.code == 0) {
                window.location = '<?php echo build_url("Necessary"); ?>';
            } else {
                show_msg(result.msg);
            }
        }, 'json');
    }
</script>
<?php $this->load->view('/footer.php'); ?>
