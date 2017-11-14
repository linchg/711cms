<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>


<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">SEO管理</a> » 友情链接</div><!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">

        <div class="clearfix"></div>

        <div class="mt10">
            <form method="post" action="<?php echo build_url('Flink', 'save', array('flink_id' => !empty($info['flink_id']) ? $info['flink_id'] : 0)); ?>" id="flinkForm">
                <table class="tb-2" border="1" bordercolor="#cee1ee">
                    <tr>
                        <td width="100" class="td-bg">友链名称：</td>
                        <td class="alignleft">
                            <input type="text" class="ipt ml15"  id="flink_name" name="flink_name" value="<?php echo isset($info['flink_name']) ? $info['flink_name'] : ''; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td width="100" class="td-bg">友链图片：</td>
                        <td class="alignleft inline-uploadify">
                            <div class="l">
                                <input type="text" class="ipt ml15" style="width:178px;margin-right: 10px" id="flink_img" name="flink_img" value="<?php echo isset($info['flink_img']) ? $info['flink_img'] : ''; ?>" />
                                <input type="file" name="upload_logo" id="upload_logo" />
                            </div>
                            <div class="l">
                                <span id="showimg">
                                    <?php echo !empty($info['flink_img']) ? '<img src="'.$info['flink_img'].'" width="36" height="36" />' : '' ?>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="100" class="td-bg">链接地址：</td>
                        <td class="alignleft">
                            <input type="text"  class="ipt ml15"  id="flink_url" name="flink_url" value="<?php echo isset($info['flink_url']) ? $info['flink_url'] : 'http://'; ?>" />
                            <span>* 格式以‘http://’开头</span>
                        </td>
                    </tr>
                    <tr>
                        <td width="100" class="td-bg">友链类型：</td>
                        <td class="alignleft">
                            <select id="flink_type" name="flink_type" class="ml15">
                                <option value="1" <?php echo !empty($info['flink_type']) && $info['flink_type'] == 1 ? 'selected="selected"' : ''; ?>>首页</option>
                                <option value="2" <?php echo !empty($info['flink_type']) && $info['flink_type'] == 2 ? 'selected="selected"' : ''; ?>>其它页面</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="100" class="td-bg">友链排序：</td>
                        <td class="alignleft">
                            <input type="text" class="ipt ml15"  id="flink_order" name="flink_order" value="<?php echo isset($info['flink_order']) ? $info['flink_order'] : ''; ?>" />
                        </td>
                    </tr>
                </table>
            </form>
            <div class="mt15 tc">
                <a href="javascript:void(0);" class="but2 ml5" onclick="save_flink()" >确 定</a>
            </div>
        </div>

    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    function save_flink()
    {
        $.post($('#flinkForm').attr('action'), $('#flinkForm').serialize(), function(result){
            if (result.code == 0) {
                window.location = '<?php echo build_url("Flink"); ?>';
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
                $('#flink_img').val($_site['upload_path'] + data);
            }
        });
    });
</script>

<?php $this->load->view('/footer.php'); ?>
