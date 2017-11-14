<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 推荐位管理</div><!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">
        <div class="clearfix"></div>
        <div class="mt10">
            <div>
                <form method="post" id="areaForm" action="<?php echo build_url('Recommend', 'save', array('area_id' => !empty($info['area_id']) ? $info['area_id'] : 0)); ?>">
                    <table class="tb-2" border="1" bordercolor="#cee1ee">
                        <tr>
                            <td width="150" class="td-bg">标题：</td>
                            <td class="alignleft">
                                <input type="text" class="ipt ml15" id="area_title" name="area_title" value="<?php echo isset($info['area_title']) ? $info['area_title'] : ''; ?>" />
                                * 用于显示文字或者标记
                            </td>
                        </tr>
                        <tr>
                            <td width="150" class="td-bg">类型：</td>
                            <td class="alignleft">
                                <select name="area_type" id="area_type" class="ml15">
                                    <option value="1" <?php echo isset($info['area_type']) && $info['area_type'] == 1 ? 'selected="selected"' : ''; ?>>网站推荐位</option>
                                    <option value="2" <?php echo isset($info['area_type']) && $info['area_type'] == 2 ? 'selected="selected"' : ''; ?>>手助推荐位</option>
                                    <option value="3" <?php echo isset($info['area_type']) && $info['area_type'] == 3 ? 'selected="selected"' : ''; ?>>wap推荐位</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td  width="150" class="td-bg">LOGO：</td>
                            <td  class="alignleft inline-uploadify">
                                <div class="l">
                                    <input type="text" class="ipt ml15" style="width: 178px;margin-right: 10px" id="area_logo" name="area_logo" value="<?php echo isset($info['area_logo']) ? $info['area_logo'] : ''; ?>" />
                                    <input type="file" name="upload_logo" id="upload_logo" />
                                </div>
                                <div class="l">
                                    <span id="showimg">
                                        <?php echo !empty($info['area_logo']) ? '<img src="'.$info['area_logo'].'" width="36" height="36" />' : '' ?>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td  width="150" class="td-bg">排序：</td>
                            <td  class="alignleft">
                                <input type="text" class="ipt ml15" style="width: 90px;" id="area_order" name="area_order" value="<?php echo isset($info['area_order']) ? $info['area_order'] : 0; ?>" /> * 数字越小越靠前
                            </td>
                        </tr>
                        <tr>
                            <td  width="150" class="td-bg">操作类型：</td>
                            <td class="alignleft">
                                <p style="float: left;">
                                <select name="operate_type" id="operate_type" class="ml15" onchange="operate_select(this)">
                                    <option value="1" <?php echo isset($info['operate_type']) && $info['operate_type'] == 1 ? 'selected="selected"' : ''; ?>>手动添加</option>
                                    <option value="2" <?php echo isset($info['operate_type']) && $info['operate_type'] == 2 ? 'selected="selected"' : ''; ?>>自动获取</option>
                                </select>
                                </p>
                                <p style="float: left;" id="list_auto_tr">
                                <select name="auto_type" id="auto_type" class="ml15" onchange="auto_type_select(this)">
                                    <option value="0" <?php echo isset($info['auto_type']) && $info['auto_type'] == 0 ? 'selected="selected"' : ''; ?>>请选择类别</option>            
                                    <option value="1" <?php echo isset($info['auto_type']) && $info['auto_type'] == 1 ? 'selected="selected"' : ''; ?>>软件</option>
                                    <option value="2" <?php echo isset($info['auto_type']) && $info['auto_type'] == 2 ? 'selected="selected"' : ''; ?>>游戏</option>
                                </select>
                                </p>
                                <p style="float: left;" id="list_auto_tr2">
                                <select name="cate_id" id="cate_id" class="ml15">
                                    <option value="0" <?php echo isset($info['cate_id']) && $info['cate_id'] == 0 ? 'selected="selected"' : ''; ?>>请选择分类</option>
                                    <?php if (is_array($category) && sizeof($category) > 0) : ?>
                                        <?php foreach ($category as $value) : ?>
                                            <option
                                                value="<?php echo $value['cate_id']; ?>" <?php echo $info['cate_id'] == $value['cate_id'] ? 'selected="selected"' : ''; ?>>
                                                <?php echo $value['cname']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                </p>
                                <p style="float: left;" id="list_auto_tr3">
                                <select name="auto_order" id="auto_order" class="ml15">
                                    <option value="0" <?php echo isset($info['auto_order']) && $info['auto_order'] == 0 ? 'selected="selected"' : ''; ?>>请选择排序</option>
                                    <option value="1" <?php echo isset($info['auto_order']) && $info['auto_order'] == 1 ? 'selected="selected"' : ''; ?>>最近更新</option>
                                    <option value="2" <?php echo isset($info['auto_order']) && $info['auto_order'] == 2 ? 'selected="selected"' : ''; ?>>下载排行</option>
                                </select>
                                </p>
                                <p style="content: '';clear: both;"></p>
                            </td>
                        </tr>
                        <tr id="list_tr">
                            <td  width="150" class="td-bg">内容ID列表：</td>
                            <td  class="alignleft">
                                <textarea id="area_ids" name="area_ids" class="ml15"><?php echo isset($info['area_ids']) ? $info['area_ids'] : ''; ?></textarea>
                                * 应用ID，用,分隔，ID越靠前页面显示越靠前</span>
                            </td>
                        </tr>
                        <tr>
                            <td  width="150" class="td-bg">详情描述：</td>
                            <td class="alignleft">
                                <textarea id="area_html" name="area_html" class="ml15"><?php echo isset($info['area_html']) ? $info['area_html'] : ''; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td  width="150" class="td-bg">备注：</td>
                            <td  class="alignleft">
                                <textarea id="area_remarks" name="area_remarks" class="ml15"><?php echo isset($info['area_remarks']) ? $info['area_remarks'] : ''; ?></textarea>
                                没有可留空
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="mt15 tc">
                <a href="javascript:void(0);" class="but2" onclick="save_area()">确 定</a>
            </div>
        </div>

    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    function save_area()
    {
        var operate_type = $("#operate_type").val();
        var auto_type = $("#auto_type").val();
        var cate_id = $("#cate_id").val();
        if(operate_type ==2){
            if(auto_type == 0){
            show_msg("请选择类别...");
            return false;
            }
            if(cate_id == 0){
                show_msg("请选择分类...");
                return false;
            }   
        }
        $.post($('#areaForm').attr('action'), $('#areaForm').serialize(), function(result){
            if (result.code == 0) {
                window.location = '<?php echo build_url("Recommend"); ?>';
            } else {
                show_msg(result.msg);
            }
        }, 'json');
    }
    $(function(){
        var operate_type = $('#operate_type').val();
        if (operate_type == 1) {
            $("#list_auto_tr").hide();
            $("#list_auto_tr2").hide();
            $("#list_auto_tr3").hide();
            $("#list_tr").show();
        }else if (operate_type == 2) {
            $("#list_tr").hide();
            $("#list_auto_tr").show();
            $("#list_auto_tr2").show();
            $("#list_auto_tr3").show();  
        }
        $('#upload_logo').uploadify({
            'width'             : 84,
            'height'            : 32,
            'buttonImage'       : '<?php echo static_url("/images/add_more.jpg"); ?>',
            'formData'          : {
                'time'          : '<?php echo $time; ?>',
                'token'         : '<?php echo $token; ?>'
            },
            'swf'               : '<?php echo static_url("/js/uploadify/uploadify.swf"); ?>',
            'uploader'          : '<?php echo build_url("Index", "uploadLogo"); ?>',
            'onUploadSuccess'   : function(file, data, response) {
                if (data.indexOf('Error') >= 0) {
                    show_msg(data.substring(6));
                    return false;
                }
                $('#showimg').html('<img src="' + $_site['upload_path'] + data +'" width="36" height="36" />');
                $('#area_logo').val($_site['upload_path'] + data);
            }
        });
    });
    function operate_select(obj){
        var operate_type = $(obj).val();
        if (operate_type == 1) {
            $("#list_auto_tr").hide();
            $("#list_auto_tr2").hide();
            $("#list_auto_tr3").hide();
            $("#list_tr").show();
        }else if (operate_type == 2) {
            $("#list_tr").hide();
            $("#list_auto_tr").show();
            $("#list_auto_tr2").show();
            $("#list_auto_tr3").show();
        }
    }
    function auto_type_select(obj){
        var auto_type = $(obj).val();
        var list_html = '<option value="0">请选择分类</option>';
        if (auto_type != 0) {
            $.post(build_url('App', 'app_category'), {"type": auto_type}, function (data) {
                if (data.code == 0) {  
                    $.each(data.msg, function (k, v) {
                        list_html += '<option value="' + v['cate_id'] + '">' + v['cname'] + '</option>';   
                    });
                    $("#cate_id").html(list_html);
                } else {
                    return false;
                }
            }, 'json');   
        }else{
            $("#cate_id").html(list_html);
        }
    }
    
</script>

<?php $this->load->view('/footer.php'); ?>
