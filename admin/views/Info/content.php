<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>


<!-- 右侧区域开始 -->
<div class="right_body"> 
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 文章正文  </div><!-- 当前位置结束 -->
    
    <!-- 右侧主体内容开始 -->
    <div class="mbody">

           <h2 style="padding:0 0 10px; font-size:16px; color:#333">文章正文</h2>

        <div class="mt10">
            <form action="<?php echo build_url('Info', 'save', array('info_id' => !empty($info['info_id']) ? $info['info_id'] : 0)); ?>" method="post" id="infoForm">
                <table class="tb-2" border="1" bordercolor="#cee1ee">
                    <tr>
                        <td width="150" class="td-bg">标题：</td>
                        <td  colspan="3" class="alignleft">
                            <input type="text" class="ipt ml15" id="info_title" name="info_title" value="<?php echo isset($info['info_title']) ? $info['info_title'] : ''; ?>" />
                            &nbsp;&nbsp;* 必填，信息标题
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">定时发布时间：</td>
                        <td colspan="3" class="alignleft">
                            <input type="text" class="ipt ml15" id="info_publish_time" onclick="laydate({istime:true, format: 'YYYY-MM-DD hh:mm:ss'})" name="info_publish_time"  value="<?php echo isset($info['info_publish_time']) &&  $info['info_publish_time'] != 0 ? date('Y-m-d H:i:s', $info['info_publish_time']) : ''; ?>" />
                            &nbsp;&nbsp;如：请修改你要上线的时间
                        </td>
                    </tr>
                    <tr>
                        <td width="150" class="td-bg">SEO标题：</td>
                        <td colspan="3" class="alignleft">
                            <input type="text" class="ipt ml15" id="info_stitle" name="info_stitle" value="<?php echo isset($info['info_stitle']) ? $info['info_stitle'] : ''; ?>" />
                            &nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td width="150" class="td-bg">SEO关键字：</td>
                        <td colspan="3" class="alignleft">
                            <input type="text" class="ipt ml15" id="info_seokey" name="info_seokey" value="<?php echo isset($info['info_seokey']) ? $info['info_seokey'] : ''; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td width="150" class="td-bg">SEO描述：</td>
                        <td colspan="3" class="alignleft">
                            <input type="text" class="ipt ml15" id="info_seodesc" name="info_seodesc" value="<?php echo isset($info['info_seodesc']) ? $info['info_seodesc'] : ''; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">所属分类：</td>
                        <td colspan="3" class="alignleft">
                            <select id="last_cate_id" name="last_cate_id" class="ml15">
                                <option value="0">≡ 选择分类 ≡</option>
                                <?php if (is_array($category) && sizeof($category) > 0) : ?>
                                    <?php foreach ($category as $value) : ?>
                                        <option value="<?php echo $value['cate_id']; ?>" <?php echo isset($info['last_cate_id']) && $info['last_cate_id'] == $value['cate_id'] ? 'selected="selected"' : '' ;?>>
                                            <?php echo $value['cname']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            &nbsp;&nbsp;* 必填 <a href="<?php echo build_url('InfoCategory'); ?>">分类管理</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">文章状态：</td>
                        <td colspan="3" class="alignleft">
                            <select id="info_status" name="info_status" class="ml15">
                                <option value="1" <?php echo isset($info['info_status']) && $info['info_status'] == 1 ? 'selected="selected"' : ''; ?>>显示</option>
                                <option value="2" <?php echo isset($info['info_status']) && $info['info_status'] == 2 ? 'selected="selected"' : ''; ?>>不显示</option>
                            </select>
                            &nbsp;&nbsp;* 必填</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">标签：</td>
                        <td colspan="3" class="alignleft">
                            <input type="text" class="ipt ml15" id="info_tags" name="info_tags"  value="<?php echo isset($info['info_tags']) ? $info['info_tags'] : ''; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">缩略图：</td>
                        <td colspan="3" class="alignleft inline-uploadify">
                            <div class="l">
                                <input type="text" class="ipt ml15" id="info_img" name="info_img" style="width: 178px;margin-right: 10px" value="<?php echo isset($info['info_img']) ? $info['info_img'] : ''; ?>" />
                                <input type="file" name="upload_logo" id="upload_logo" />
                            </div>
                            <div class="l">
                                <span id="showimg">
                                    <?php echo !empty($info['info_img']) ? '<img src="'.$info['info_img'].'" width="36" height="36" />' : '' ?>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">来源：</td>
                        <td colspan="3" class="alignleft">
                            <input type="text" class="ipt ml15" id="info_from" name="info_from" value="<?php echo isset($info['info_from']) ? $info['info_from'] : ''; ?>" />
                            &nbsp;&nbsp;如：新浪科技
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">作者：</td>
                        <td colspan="3" class="alignleft">
                            <input type="text" class="ipt ml15" id="info_author" name="info_author" value="<?php echo isset($info['info_author']) ? $info['info_author'] : ''; ?>" />
                            &nbsp;&nbsp;如：新浪科技
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">排序：</td>
                        <td colspan="3" class="alignleft">
                            <input type="text" class="ipt ml15" id="info_order" name="info_order" value="<?php echo isset($info['info_order']) ? $info['info_order'] : ''; ?>" />
                            &nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">跳转地址：</td>
                        <td colspan="3" class="alignleft">
                            <input type="text" class="ipt ml15" id="info_url" name="info_url"  value="<?php echo isset($info['info_url']) ? $info['info_url'] : ''; ?>" />
                            &nbsp;&nbsp;填写该地址则直接跳转
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">摘要：</td>
                        <td colspan="3" class="alignleft">
                            <textarea name="info_desc" id="info_desc" class="ipt ml15"><?php echo isset($info['info_desc']) ? $info['info_desc'] : ''; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">资讯详情：</td>
                        <td colspan="3">
                            <div style="position:relative;">
                                <textarea name="info_body" id="info_body" class="ml15"><?php echo isset($info['info_body']) ? $info['info_body'] : ''; ?></textarea>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
            <div class="mt15 tc">
                <a href="javascript:void(0);" class="but2" onclick="save_info();">确 定</a>
            </div>
        </div>

    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    CKEDITOR.replace('info_body', {height:'400px'});

    function save_info()
    {
        $('#info_body').html(CKEDITOR.instances.info_body.getData());
        $.post($('#infoForm').attr('action'), $('#infoForm').serialize(), function(result){
            if (result.code == 0) {
                window.location = '<?php echo build_url("Info"); ?>';
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
                $('#info_img').val($_site['upload_path'] + data);
            }
        });
    });
</script>

<?php $this->load->view('/footer.php'); ?>
