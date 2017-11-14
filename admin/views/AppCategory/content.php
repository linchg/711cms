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

        <div id="addcate" class="category-content mt10">
            <form method="post" action="<?php echo build_url('AppCategory', 'save', array('cate_id' => !empty($info['cate_id']) ? $info['cate_id'] : 0)); ?>" id="cateForm">
                <table class="tb-2" width="100%" id="tab1" border="1" bordercolor="#cee1ee" >
                    <tr>
                        <td width="150" class="td-bg">栏目类型：</td>
                        <td class="alignleft">
                            <select id="parent_id" name="parent_id" class="ml15">
                                <option value="1" <?php echo !empty($info['parent_id']) && $info['parent_id'] == 1 ? 'selected="selected"' : ''; ?>>软件</option>
                                <option value="2" <?php echo !empty($info['parent_id']) && $info['parent_id'] == 2 ? 'selected="selected"' : ''; ?>>游戏</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">分类名称：</td>
                        <td class="alignleft">
                            <input type="text" class="ipt ml15" id="cname" name="cname" value="<?php echo !empty($info['cname']) ? $info['cname'] : ''; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">分类logo：</td>
                        <td class="alignleft inline-uploadify">
                            <div class="l">
                                <input type="text" class="ipt ml15" style="width:178px;margin-right:10px" name="cate_logo" id="cate_logo" value="<?php echo isset($info['cate_logo']) ? $info['cate_logo'] : ''; ?>" />
                                <input type="file" name="upload_logo" id="upload_logo" />
                            </div>
                            <div class="l">
                                <span id="showimg">
                                    <?php echo !empty($info['cate_logo']) ? '<img src="'.$info['cate_logo'].'" width="36" height="36" />' : '' ?>
                                </span>
                            </div>
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
                        <td width="150" class="td-bg">分类SEO标题：</td>
                        <td class="alignleft">
                            <textarea cols="90" rows="2" id="ctitle" name="ctitle" class=" ml15"><?php echo !empty($info['ctitle']) ? $info['ctitle'] : ''; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" class="td-bg">分类SEO关键词：</td>
                        <td class="alignleft">
                            <textarea cols="90" rows="2" id="ckey" name="ckey" class="ml15"><?php echo !empty($info['ckey']) ? $info['ckey'] : ''; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">分类SEO描述：</td>
                        <td class="alignleft">
                            <textarea cols="90" rows="2" id="cdesc" name="cdesc" class="ml15"><?php echo !empty($info['cdesc']) ? $info['cdesc'] : ''; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg" colspan="2">
                            通过设置应用的SEO通用规则，可以自动生成此分类下所有应用的SEO信息，
                            如果单独给应用设置了SEO信息，则以单独设置的为准。
                            SEO标题、关键词和描述可以使用以下变量：<br />
                            网站名称：{site_name}，网站URL：{site_url}，
                            分类名称：{cate_name}，字母别名：{cate_name_py}，栏目类型：{cate_type}，
                            应用名称：{app_name}，应用标签：{app_tags}，开发商：{app_company}
                        </td>
                    </tr>
                    <tr>
                        <td width="150" class="td-bg">应用SEO标题：</td>
                        <td class="alignleft">
                            <textarea cols="90" rows="2" id="app_ctitle" name="app_ctitle" class="ml15"><?php echo !empty($info['app_ctitle']) ? $info['app_ctitle'] : ''; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" class="td-bg">应用SEO关键词：</td>
                        <td class="alignleft">
                            <textarea cols="90" rows="2" id="app_ckey" name="app_ckey" class="ml15"><?php echo !empty($info['app_ckey']) ? $info['app_ckey'] : ''; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">应用SEO描述：</td>
                        <td class="alignleft">
                            <textarea cols="90" rows="2" id="app_cdesc" name="app_cdesc" class="ml15"><?php echo !empty($info['app_cdesc']) ? $info['app_cdesc'] : ''; ?></textarea>
                        </td>
                    </tr>
                </table>

                <div class="mt15 tc">
                    <a href=" javascript:void(0);" class="but2 ml5" id="subtn"  onclick="save_category()" >确 定</a>
                </div>

            </form>
        </div>

    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    $(function() {
        $('#upload_logo').uploadify({
            'width': 84,
            'height': 32,
            'buttonImage': '<?php echo static_url("/images/add_more.jpg"); ?>',
            'formData': {
                'time': '<?php echo $time; ?>',
                'token': '<?php echo $token; ?>'
            },
            'swf': '<?php echo static_url("/js/uploadify/uploadify.swf"); ?>',
            'uploader': '<?php echo build_url("Index", "uploadLogo"); ?>',
            'onUploadSuccess': function (file, data, response) {
                if (data.indexOf('Error') >= 0) {
                    show_msg(data.substring(6));
                    return false;
                }
                $('#showimg').html('<img src="' + $_site['upload_path'] + data + '" width="36" height="36" />');
                $('#cate_logo').val($_site['upload_path'] + data);
            }
        });
    });
    function save_category()
    {
        $.post($('#cateForm').attr('action'), $('#cateForm').serialize(), function(result){
            if (result.code == 0) {
                window.location = '<?php echo build_url("AppCategory"); ?>';
            } else {
                show_msg(result.msg);
            }
        }, 'json');
    }
</script>
<?php $this->load->view('/footer.php'); ?>
