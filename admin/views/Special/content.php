<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 专题管理</div><!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">

        <div class="clearfix"></div>
        <div class="mt10">
            <div>
                <form method="post" id="areaForm" action="<?php echo build_url('Special', 'save', array('area_id' => !empty($info['area_id']) ? $info['area_id'] : 0)); ?>">
                    <table class="tb-2" border="1" bordercolor="#cee1ee">
                        <tr>
                            <td width="150" class="td-bg">标题：</td>
                            <td class="alignleft">
                                <input type="text" class="ipt ml15" id="area_title" name="area_title" value="<?php echo isset($info['area_title']) ? $info['area_title'] : ''; ?>" />
                                * 用于显示文字或者标记
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
                                <input type="text" class="ipt ml15"  id="area_order" name="area_order" value="<?php echo isset($info['area_order']) ? $info['area_order'] : 0; ?>" />
                            </td>
                        </tr>
                        <tr id="list_tr">
                            <td  width="150" class="td-bg">内容ID列表：</td>
                            <td  class="alignleft">
                                <textarea id="area_ids" name="area_ids" class="ml15"><?php echo isset($info['area_ids']) ? $info['area_ids'] : ''; ?></textarea>
                                * 应用ID，用,分隔</span>
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
                        <tr>
                            <td width="100" class="td-bg">SEO标题：</td>
                            <td class="alignleft">
                                <input type="text"  class="ipt ml15"  id="special_seotitle" name="special_seotitle" value="<?php echo isset($info['special_seotitle']) ? $info['special_seotitle'] : ''; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td width="100" class="td-bg">SEO关键字：</td>
                            <td class="alignleft">
                                <input type="text"  class="ipt ml15"  id="special_seokey" name="special_seokey" value="<?php echo isset($info['special_seokey']) ? $info['special_seokey'] : ''; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td width="100" class="td-bg">SEO描述：</td>
                            <td class="alignleft">
                                <input type="text"  class="ipt ml15"  id="special_seodesc" name="special_seodesc" value="<?php echo isset($info['special_seodesc']) ? $info['special_seodesc'] : ''; ?>" />
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
        $.post($('#areaForm').attr('action'), $('#areaForm').serialize(), function(result){
            if (result.code == 0) {
                window.location = '<?php echo build_url("Special"); ?>';
            } else {
                show_msg(result.msg);
            }
        }, 'json');
    }
    $(function(){
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
</script>
<?php $this->load->view('/footer.php'); ?>
