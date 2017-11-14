<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 关键字管理  </div><!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">
        <div class="clearfix"></div>
        <div class="mt10">
            <form method="post" action="<?php echo build_url('Search', 'save', array('q_id' => !empty($info['q_id']) ? $info['q_id'] : 0)); ?>" id="searchForm">
                <table class="tb-2" border="1" bordercolor="#cee1ee">
                    <tr>
                        <td width="100" class="td-bg">排序：</td>
                        <td class="alignleft"><input type="text" size="10" class="ipt ml15" id="qorder" name="qorder" value="<?php echo isset($info['qorder']) ? $info['qorder'] : ''; ?>" /></td>
                    </tr>
                    <tr>
                        <td width="100" class="td-bg">关键字名称：</td>
                        <td class="alignleft"><input type="text" class="ipt ml15" id="q" name="q" value="<?php echo isset($info['q']) ? $info['q'] : ''; ?>" /></td>
                    </tr>
                    <tr>
                        <td width="100" class="td-bg">搜索次数：</td>
                        <td class="alignleft"><input type="text"  class="ipt ml15" id="qnum" name="qnum" value="<?php echo isset($info['qnum']) ? $info['qnum'] : ''; ?>" /></td>
                    </tr>
                    <tr>
                        <td width="100" class="td-bg">关键字类型：</td>
                        <td class="alignleft">
                            <select class="ipt ml15" id="q_type" name="q_type">
                                <option value='0' <?php echo isset($info['q_type']) && $info['q_type'] == 0 ? 'selected="selected"' : ''; ?> >请选择</option>
                                <option value='1' <?php echo isset($info['q_type']) && $info['q_type'] == 1 ? 'selected="selected"' : ''; ?> >软件</option>
                                <option value='2' <?php echo isset($info['q_type']) && $info['q_type'] == 2 ? 'selected="selected"' : ''; ?> >游戏</option>
                            </select>
                        </td>
                    </tr>
                </table>

            </form>
            <div class="mt15 tc">
                <a href="javascript:void(0);" class="but2 ml5" onclick="save_search()" >确 定</a>
            </div>
        </div>
    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    function save_search()
    {
        $.post($('#searchForm').attr('action'), $('#searchForm').serialize(), function(result){
            if (result.code == 0) {
                window.location = '<?php echo build_url("Search"); ?>';
            } else {
                show_msg(result.msg);
            }
        }, 'json');
    }
</script>

<?php $this->load->view('/footer.php'); ?>
