<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body"> 
    <!-- 当前位置开始 -->
   <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 分类列表</div><!-- 当前位置结束 -->
    <!-- 右侧主体内容开始 -->
    <div class="mbody">

        <div class="clearfix"></div>
        <!-- 添加编辑分类 -->
        <div id="addcate" class="category-content">
            <form method="post" action="<?php echo build_url('InfoCategory', 'save', array('cate_id' => !empty($info['cate_id']) ? $info['cate_id'] : 0)); ?>" id="cateForm">
                <div id="e_box" style="margin:15px 0 0;">
                    <table class="tb-2" width="100%" id="tab1" border="1" bordercolor="#cee1ee" >
                        <tr>
                            <td class="td-bg">分类名称：</td>
                            <td class="alignleft">
                                <input type="text" class="ipt ml15" id="cname" name="cname" value="<?php echo !empty($info['cname']) ? $info['cname'] : ''; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td class="td-bg">字母别名：</td>
                            <td class="alignleft">
                                <input type="text" class="ipt ml15" id="cname_py" name="cname_py"  value="<?php echo !empty($info['cname_py']) ? $info['cname_py'] : ''; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td class="td-bg">是否显示：</td>
                            <td class="alignleft">
                                <select id="cat_show" name="cat_show" class="ml15">
                                    <option value="1" <?php echo !empty($info['cat_show']) && $info['cat_show'] == 1 ? 'selected="selected"' : ''; ?>>显示</option>
                                    <option value="2" <?php echo !empty($info['cat_show']) && $info['cat_show'] == 2 ? 'selected="selected"' : ''; ?>>不显示</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="td-bg">排序：</td>
                            <td class="alignleft">
                                <input type="text" class="ipt ml15" id="corder" name="corder"  value="<?php echo !empty($info['corder']) ? $info['corder'] : 0; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td width="150" class="td-bg">SEO标题：</td>
                            <td class="alignleft" >
                                <textarea id="ctitle" name="ctitle" class="ipt ml15"><?php echo !empty($info['ctitle']) ? $info['ctitle'] : ''; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" class="td-bg">SEO关键词：</td>
                            <td class="alignleft">
                                <textarea id="ckey" name="ckey" class="ipt ml15"><?php echo !empty($info['ckey']) ? $info['ckey'] : ''; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="td-bg">SEO描述：</td>
                            <td class="alignleft">
                                <textarea id="cdesc" name="cdesc" class="ipt ml15"><?php echo !empty($info['cdesc']) ? $info['cdesc'] : ''; ?></textarea>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="mt15 tc">
                    <a href=" javascript:void(0);" class="but2 ml5" id="subtn"  onclick="save_category()" >确 定</a>
                </div>

            </form>
        </div>

    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    function save_category()
    {
        $.post($('#cateForm').attr('action'), $('#cateForm').serialize(), function(result){
            if (result.code == 0) {
                window.location = '<?php echo build_url("InfoCategory"); ?>';
            } else {
                show_msg(result.msg);
            }
        }, 'json');
    }
</script>
<?php $this->load->view('/footer.php'); ?>
