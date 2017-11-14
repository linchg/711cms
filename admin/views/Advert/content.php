<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 广告管理</div><!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">

        <div class="clearfix"></div>
        <div class="mt10">
            <a href="javascript:void(0);" class="but2" onclick="create_ad()">新建一条轮播图</a>
        </div>
        <div class="mt10">
            <div>
                <form method="post" id="areaForm" action="<?php echo build_url('Advert', 'save', array('ad_id' => !empty($info['ad_id']) ? $info['ad_id'] : 0)); ?>">
                    <table class="tb-2" border="1" bordercolor="#cee1ee">
                        <tr>
                            <td width="100" class="td-bg">广告名称：</td>
                            <td class="alignleft">
                                <input type="text" class="ipt ml15" id="ad_title" name="ad_title" style="width:400px;" value="<?php echo isset($info['ad_title']) ? $info['ad_title'] : ''; ?>" />
                                * 用于显示文字或者标记
                            </td>
                        </tr>
                        <tr>
                            <td width="100" class="td-bg">广告类型：</td>
                            <td class="alignleft">
                                <select id="ad_type" name="ad_type" class="ml15" onchange="change_type(this)">
                                    <option value="1" <?php echo isset($info['ad_type']) && $info['ad_type'] == 1 ? 'selected="selected"' : ''; ?>>PC端首页轮播</option>
                                    <option value="2" <?php echo isset($info['ad_type']) && $info['ad_type'] == 2 ? 'selected="selected"' : ''; ?>>WAP端首页轮播</option>
                                    <option value="3" <?php echo isset($info['ad_type']) && $info['ad_type'] == 3 ? 'selected="selected"' : ''; ?>>手助首页轮播</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="100" class="td-bg">备注：</td>
                            <td class="alignleft">
                                <textarea id="ad_remarks" name="ad_remarks" class="ml15"><?php echo isset($info['ad_remarks']) ? $info['ad_remarks'] : ''; ?></textarea>
                                没有可留空
                            </td>
                        </tr>
                        <?php if (isset($info['ad_images']) && is_array($info['ad_images']) && sizeof($info['ad_images'])) : ?>
                            <?php foreach ($info['ad_images'] as $key => $image) : ?>
                                <tr>
                                    <td width="100" class="td-bg">轮播图<?php echo $key + 1; ?>：</td>
                                    <td class="alignleft inline-uploadify">
                                        <div class="ml15">
                                            <div class="l">
                                                图片：<input type="text" class="ipt" style="width: 178px;" id="ad_image_<?php echo $key; ?>" name="ad_images[]" value="<?php echo isset($info['ad_images'][$key])  ? $info['ad_images'][$key]  : ''; ?>" />
                                                <input type="file" class="ipt" id="upload_logo_<?php echo $key; ?>" />
                                            </div>
                                            <div class="l" style="margin-left:110px">
                                                标题：<input type="text" class="ipt" style="width: 200px;" name="ad_alts[]" value="<?php echo isset($info['ad_alts'][$key])      ? $info['ad_alts'][$key]    : ''; ?>" />
                                                链接：<input type="text" class="ipt" style="width: 200px;" name="ad_links[]" value="<?php echo isset($info['ad_links'][$key])    ? $info['ad_links'][$key]   : ''; ?>" />
                                                <input type="button" value="上移" class="ipt" style="width: 40px;" onclick="up(this)">
                                                <input type="button" value="下移" class="ipt" style="width: 40px;" onclick="down(this)">
                                                <a href="javascript:;" onclick="remove_ad(this)">删除</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td width="100" class="td-bg">轮播图：</td>
                                <td class="alignleft inline-uploadify">
                                    <div class="ml15">
                                        <div class="l">
                                            图片：<input type="text" class="ipt" style="width: 178px" id="ad_image_0" name="ad_images[]" value="" />
                                            <input type="file" class="ipt" id="upload_logo_0" />
                                        </div>
                                        <div class="l" style="margin-left: 110px">
                                            标题：<input type="text" class="ipt" style="width: 200px" name="ad_alts[]" value="" />
                                            链接：<input type="text" class="ipt" style="width: 200px" name="ad_links[]" value="" />
                                            <a href="javascript:;" onclick="remove_ad(this)">删除</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </form>
            </div>
            <div class="mt15 tc">
                <a href="javascript:void(0);" class="but2" onclick="save_ad()">确 定</a>
            </div>
        </div>

    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    
    function up(t){
         var i=$(t).parent().parent().parent().parent().index();
         if(i>3){
           var tem0=$(t).parent().parent().parent().parent().html();
           var tem1=$(t).parent().parent().parent().parent().prev().html();
           $(t).parent().parent().parent().parent().prev().html(tem0);
           $(t).parent().parent().parent().parent().html(tem1);
         }
    }

    function down(t){
        var l=$(".tb-2 tr").length;
        var i=$(t).parent().parent().parent().parent().index();
        if(i<l-1){
           var tem0=$(t).parent().parent().parent().parent().html();
           var tem1=$(t).parent().parent().parent().parent().next().html();
           $(t).parent().parent().parent().parent().next().html(tem0);
           $(t).parent().parent().parent().parent().html(tem1);
        }
    } 
      
    function change_type(obj)
    {
        if ($(obj).val() == 3) {
            $('.type_name').html('应用id');
        } else {
            $('.type_name').html('链接');
        }
    }
    $('#ad_type').change();
    function create_ad()
    {
        var index = 0;
        var name = $('table tr:last').find("input").eq(0).attr('id');
        if (name) {
            name = parseInt(name.substring(name.lastIndexOf('_') + 1), 10);
            index = name + 1;
        }
        var html = '<tr>';
        html += '<td width="100" class="td-bg">轮播图：</td>';
        html += '<td class="alignleft inline-uploadify">';
        html += '    <div class="ml15">';
        html += '        <div class="l">';
        html += '            图片：<input type="text" class="ipt" style="width: 178px" id="ad_image_' + index + '" name="ad_images[]" value="" />';
        html += '            <input type="file" class="ipt" id="upload_logo_' + index + '" />';
        html += '        </div>';
        html += '        <div class="l" style="margin-left: 110px">';
        html += '            标题：<input type="text" class="ipt" style="width: 200px" name="ad_alts[]" value="" />';
        html += '            链接：<input type="text" class="ipt" style="width: 200px" name="ad_links[]" value="" />';
        html += '            <a href="javascript:;" onclick="remove_ad(this)">删除</a>';
        html += '        </div>';
        html += '    </div>';
        html += '</td></tr>';
        $('table').append(html);
        upload_logo(index);
    }
    function remove_ad(obj)
    {
        $(obj).parent().parent().parent().parent().remove();
    }
    function save_ad()
    {
        $.post($('#areaForm').attr('action'), $('#areaForm').serialize(), function(result){
            if (result.code == 0) {
                window.location = '<?php echo build_url("Advert"); ?>';
            } else {
                show_msg(result.msg);
            }
        }, 'json');
    }
    function upload_logo(id)
    {
        $('#upload_logo_' + id).uploadify({
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
                $('#ad_image_' + id).val($_site['upload_path'] + data);
            }
        });
    }
    <?php if (isset($info['ad_images']) && is_array($info['ad_images']) && sizeof($info['ad_images'])) : ?>
        <?php foreach ($info['ad_images'] as $key => $image) : ?>
        upload_logo('<?php echo $key; ?>');
        <?php endforeach; ?>
    <?php else : ?>
        upload_logo('0');
    <?php endif; ?>
</script>
<?php $this->load->view('/footer.php'); ?>
