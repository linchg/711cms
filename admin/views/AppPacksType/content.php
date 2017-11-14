<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 礼包类别</div><!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">

        <div class="clearfix"></div>
        <div class="mt10">
            <div>
                <form method="post" id="typeForm" action="<?php echo build_url('AppPacksType', 'save', array('id' => !empty($info['id']) ? $info['id'] : 0)); ?>">
                    <table class="tb-2" border="1" bordercolor="#cee1ee">
                        <tr>
                            <td width="150" class="td-bg">标题：</td>
                            <td class="alignleft">
                                <input type="text" class="ipt ml15" id="" name="name" style="width:400px;" value="<?php echo isset($info['name']) ? $info['name'] : ''; ?>" />
                                * 用于显示文字或者标记
                            </td>
                        </tr>
                        <tr>
                            <td  width="150" class="td-bg">排序：</td>
                            <td  class="alignleft">
                                <input type="text" class="ipt ml15"  id="necessary_order" name="t_order" value="<?php echo isset($info['t_order']) ? $info['t_order'] : 0; ?>" />
                            </td>
                        </tr>
                        <!--<tr id="list_tr">
                            <td  width="150" class="td-bg">应用ID列表：</td>
                            <td  class="alignleft">
                                <textarea id="t_ids" name="t_ids" class="ml15"><?php /*echo isset($info['t_ids']) ? $info['t_ids'] : ''; */?></textarea>
                                * 应用ID，用,分隔</span>
                            </td>
                        </tr>-->
                        <tr>
                            <td  width="150" class="td-bg">备注：</td>
                            <td  class="alignleft">
                                <textarea id="necessary_remarks" name="t_remarks" class="ml15"><?php echo isset($info['t_remarks']) ? $info['t_remarks'] : ''; ?></textarea>
                                没有可留空
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="mt15 tc">
                <a href="javascript:void(0);" class="but2" onclick="save_type()">确 定</a>
            </div>
        </div>

    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    function save_type()
    {
        $.post($('#typeForm').attr('action'), $('#typeForm').serialize(), function(result){
            if (result.code == 0) {
                window.location = '<?php echo build_url("AppPacksType"); ?>';
            } else {
                show_msg(result.msg);
            }
        }, 'json');
    }
</script>
<?php $this->load->view('/footer.php'); ?>
