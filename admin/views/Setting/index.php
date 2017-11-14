<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>


<!-- 右侧区域开始 -->
<div class="right_body"> 
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 网站配置</div><!-- 当前位置结束 -->
    
    <!-- 右侧主体内容开始 -->
    <div class="mbody">
        <div class="main" style="margin-top:0">
             <div class="tab_table">
               <div class="btn_box" style="padding-left:0px;height:40px;width:100%; clear:both;border:1px solid #C8E0F1;background:#EEF5FF;">
                    <a href="javascript:void(0);" class="current">基本设置</a>
                    <a href="javascript:void(0);">上传设置</a>
                    <a href="javascript:void(0);">SEO优化</a>
                    <a href="javascript:void(0);">手机版</a>
                    <a href="javascript:void(0);">水印设置</a>
                    <a href="javascript:void(0);">其他设置</a>
                   <a href="javascript:void(0);">URL设置</a>
                </div>
            </div>
            <div style="border-bottom-left-radius: 5px;border-top-bottom-radius: 5px;background: #fff; padding:20px 10px">
                <form id="settingForm" name="settingForm" action="<?php echo build_url('Setting', 'save'); ?>" method="post">
                    <div class="tab">
                        <table class="tb-2" style="clear:both;width:100%" bordercolor="#cee1ee" border="1">
                            <tr>
                                <td width="100" class="td-bg"> 站点名称：</td>
                                <td class="alignleft">
                                    <input class="ipt ml15" id="site_name" name="site_name" value="<?php echo $_site['site_name'];?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="td-bg">站点域名：</td>
                                <td class="alignleft">
                                    <input class="ipt ml15" id="site_url" name="site_url" value="<?php echo $_site['site_url']; ?>" />
                                    网站首页网址，以http://开头，最后不要带斜杠 /（如有更换域名，请正确填写更换后的域名）
                                </td>
                            </tr>
                            <tr>
                                <td class="td-bg">站点LOGO：</td>
                                <td class="alignleft inline-uploadify">
                                    <div class="l">
                                        <input type="text" class="ipt ml15" style="width:178px;margin-right: 10px" id="site_logo" name="site_logo" value="<?php echo $_site['site_logo']; ?>" />
                                        <input type="file" name="upload_logo1" id="upload_logo1" />
                                    </div>
                                    <div class="l">
                                        <span id="showimg1">
                                            <?php echo !empty($info['site_logo']) ? '<img src="'.$info['site_logo'].'" width="36" height="36" />' : '' ?>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-bg">PC站模板风格：</td>
                                <td class="alignleft">
                                    <select id="template" name="template" class="ml15">
                                        <?php foreach ($templates as $value) : ?>
                                            <?php if(substr($value['name'],0,8) == 'template'):?>
                                        <option value="<?php echo $value['name']; ?>" <?php echo $_site['template'] == $value['name'] ? 'selected="selected"' : ''; ?>>
                                            <?php echo $value['name']; ?>
                                        </option>
                                        <?php endif;?>    
                                        <?php endforeach; ?>
                                    </select>
                                    <font color=red> * template_开头的一般为PC版的模板，mobile_开头的一般为手机版模板，但有些PC版的模板会自适应手机版的。</font>
                                </td>
                            </tr>
                            <tr>
                                <td width="100" class="td-bg"> 备案号：</td>
                                <td class="alignleft">
                                    <input class="ipt ml15" id="site_name" name="site_beian" value="<?php echo isset($_site['site_beian']) ? $_site['site_beian'] : ''; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td width="100" class="td-bg"> 版权信息：</td>
                                <td class="alignleft">
                                    <input class="ipt ml15" id="site_copyright" name="site_copyright" value="<?php echo isset($_site['site_copyright']) ? $_site['site_copyright'] : ''; ?>" />
                                </td>
                            </tr>
                            <?php if(true):?>
                                <tr>
                                    <td class="td-bg">评论代码：</td>
                                    <td class="alignleft" >
                                        <div class="l ml15">
                                            <textarea id="comment_code" name="comment_code" rows="5" cols="60"><?php echo base64_decode($_site['comment_code']); ?></textarea>
                                        </div>
                                        <div class="l">
                                            在这里粘贴申请的社会化评论的JS代码，<br />
                                            社会化评论有助于网站流量提升。<br />
                                            如果留空，将会显示默认本地评论。<br />
                                            社会化评论申请：<a href="http://www.duoshuo.com" target="_blank">多说</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif;?>
                            <tr>
                                <td class="td-bg">统计代码1：</td>
                                <td class="alignleft" >
                                    <div class="l ml15">
                                        <textarea id="count_code" name="count_code" rows="5" cols="60"><?php echo base64_decode($_site['count_code']); ?></textarea>
                                    </div>
                                    <div class="l">
                                        在这里粘贴申请的统计代码(不兼容百度统计)，如 <a href="http://zhanzhang.cnzz.com" target="_blank">CNZZ统计</a>，
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-bg">统计代码2：</td>
                                <td class="alignleft" >
                                    <div class="l ml15">
                                        <textarea id="count_code2" name="count_code2" rows="5" cols="60"><?php echo isset($_site['count_code2']) ? base64_decode($_site['count_code2']) : ''; ?></textarea>
                                    </div>
                                    <div class="l">
                                        在这里粘贴申请的统计代码(兼容百度统计)，如<a href="http://tongji.baidu.com" target="_blank">百度统计</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <a href=" javascript:void(0);" class="but2" onclick="saveSettings()" >确 定</a>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="tab" style="display: none;">
                        <table class="tb-2" border="1" bordercolor="#cee1ee">
                            <tr>
                                <td style="width:160px;" class="td-bg">图片上传路径：</td>
                                <td class="alignleft">
                                    <input class="ipt ml15" id="upload_path" name="upload_path" value="<?php echo $_site['upload_path']; ?>" />
                                    * 图片上传路径
                                </td>
                            </tr>
                            <tr>
                                <td class="td-bg">上传密钥：</td>
                                <td class="alignleft">
                                    <input class="ipt ml15" id="upload_key" name="upload_key" value="<?php echo $_site['upload_key'];?>" />
                                    * 上传密钥，建议不修改，该值安装时候自动生成，6-12位随机字母（大小写）数字，特殊符号
                                </td>
                            </tr>
                            <tr>
                                <td style="width:160px;" class="td-bg">APK上传路径：</td>
                                <td class="alignleft">
                                    <input class="ipt ml15" id="upload_path_apk" name="upload_path_apk" value="<?php echo $_site['upload_path_apk']; ?>" />
                                    * 资源上传路径,相对于上传文件夹 upload，需要开启PHP的ZIP模块
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <a href=" javascript:void(0);" class="but2" onclick="saveSettings()" >确 定</a>
                                </td>
                            </tr>
                        </table>  
                    </div>

                    <div class="tab" style="display: none;">
                        <table class="tb-2" style="clear:both;width:100%;" border="1" bordercolor="#cee1ee">
                            <tr>
                                <td width="160" class="td-bg">标题（title）：</td>
                                <td class="alignleft">
                                    <input class="ipt ml15" id="seo_title" name="seo_title" value="<?php echo $_site['seo_title']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="td-bg">关键字（keywords）：</td>
                                <td class="alignleft">
                                    <input class="ipt ml15" id="seo_keywords" name="seo_keywords" value="<?php echo $_site['seo_keywords']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="td-bg">描述（description）：</td>
                                <td class="alignleft">
                                    <textarea class="ml15" id="seo_description" name="seo_description" rows="5" cols="60"><?php echo $_site['seo_description']; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <a href=" javascript:void(0);" class="but2" onclick="saveSettings()" >确 定</a>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="tab" style="display: none;">
                        <table class="tb-2" style="clear:both;width:100%;" border="1" bordercolor="#cee1ee">
                            <tr>
                                <td width="160" class="td-bg">是否开启手机版：</td>
                                <td class="alignleft" >
                                    <input class="ml15" id="is_content_mobile" name="is_content_mobile" type="checkbox" value="1" <?php echo $_site['is_content_mobile'] ?  'checked="checked"' : ''; ?> />
                                    开启该项可以让用户使用手机浏览器访问网站时自适应手机屏幕
                                </td>
                            </tr>  
                            <tr>
                                <td class="td-bg">手机版独立域名：</td>
                                <td class="alignleft">
                                    <input class="ipt ml15" id="wap_url" name="wap_url" value="<?php echo $_site['wap_url']; ?>" />
                                    访问此域名时一直显示手机版，以http://开头，最后不要带斜杠 /
                                </td>
                            </tr>
                            <tr>
                                <td width="160" class="td-bg">手机标题（title）：</td>
                                <td class="alignleft">
                                    <input class="ipt ml15" id="wapseo_title" name="wapseo_title" value="<?php echo $_site['wap_seo_title']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="td-bg">手机关键字（keywords）：</td>
                                <td class="alignleft">
                                    <input class="ipt ml15" id="wapseo_keywords" name="wapseo_keywords" value="<?php echo $_site['wap_seo_keywords']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="td-bg">描述（description）：</td>
                                <td class="alignleft">
                                    <textarea class="ml15" id="wapseo_description" name="wapseo_description" rows="5" cols="60"><?php echo $_site['wap_seo_description']; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-bg">手机版LOGO：</td>
                                <td class="alignleft inline-uploadify">
                                    <div class="l">
                                        <input type="text" class="ipt ml15" id="wap_logo" style="width: 178px;margin-right: 10px;" name="wap_logo" value="<?php echo $_site['wap_logo']; ?>" />
                                        <input type="file" name="upload_logo2" id="upload_logo2" />
                                    </div>
                                    <div class="l">
                                        <span id="showimg2">
                                            <?php echo !empty($info['wap_logo']) ? '<img src="'.$info['wap_logo'].'" width="36" height="36" />' : '' ?>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-bg">手机版模板风格：</td>
                                <td class="alignleft">
                                    <select id="wap_template" name="wap_template" class="ml15">
                                        <?php foreach ($templates as $value) : ?>
                                            <?php if(substr($value['name'],0,6) == 'mobile'):?>
                                                <option value="<?php echo $value['name']; ?>" <?php echo $_site['wap_template'] == $value['name'] ? 'selected="selected"' : ''; ?>>
                                                    <?php echo $value['name']; ?>
                                                </option>
                                            <?php endif;?>
                                        <?php endforeach; ?>
                                    </select>
                                    <font color=red> * template_开头的一般为PC版的模板，mobile_开头的一般为手机版模板，但有些PC版的模板会自适应手机版的。</font>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <a href=" javascript:void(0);" class="but2" onclick="saveSettings()">确 定</a>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="tab" style="display: none">
                        <table class="tb-2" style="clear:both;width:100%;" border="1" bordercolor="#cee1ee">
                            <tr>
                                <td class="td-bg" width="180">上传水印图片：</td>

                                <td class="alignleft inline-uploadify">
                                    <div class="l">
                                        <input type="text" class="ipt ml15" style="width:178px;margin-right: 10px" id="water_logo" name="water_logo" value="<?php echo isset($_site['water_logo']) ? $_site['water_logo'] : ''; ?>" />
                                        <input type="file" name="upload_logo3" id="upload_logo3" />
                                    </div>
                                    <div class="l">
                                        <span id="showimg3">
                                            <?php echo isset($_site['water_logo']) && !empty($_site['water_logo']) ? '<img src="'.$_site['water_logo'].'" width="36" height="36" />' : '' ?>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-bg">添加水印开关：</td>
                                <td class="alignleft">
                                    <select id="water_button" name="water_button" class="ml15">
                                        <option value="1" <?php echo isset($_site['water_button']) && $_site['water_button']== 1 ? 'selected="selected"' : '' ?>>开</option>
                                        <option value="2" <?php echo isset($_site['water_button']) && $_site['water_button']== 2 ? 'selected="selected"' : '' ?>>关</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <a href=" javascript:void(0);" class="but2" onclick="saveSettings()">确 定</a>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="tab" style="display: none">
                        <table class="tb-2" style="clear:both;width:100%;" border="1" bordercolor="#cee1ee">
                            <tr>
                                <td class="td-bg">默认每页显示行数：</td>
                                <td class="alignleft">
                                    <input class="ipt ml15" id="pagesize" name="pagesize" value="<?php echo $_site['pagesize'];?>" <?php echo $vip_change ? '':'readonly="readonly"' ;?>/>
                                    列表显示条数(10-100)之间 (会员可编辑)
                                </td>
                            </tr>
                            <tr>
                                <td class="td-bg">缓存时间：</td>
                                <td class="alignleft">
                                    <input class="ipt ml15" id="cache_time" name="cache_time" value="<?php echo $_site['cache_time']; ?>" />
                                    缓存时间，0或不填为不缓存，以秒计算
                                </td>
                            </tr>
                            <tr>
                                <td class="td-bg">后台登录认证码：</td>
                                <td class="alignleft">
                                    <input class="ipt ml15" id="site_safe_code" name="site_safe_code" value="<?php echo $_site['site_safe_code']; ?>" />
                                    该认证码用于提升后台安全性，可留空
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <a href=" javascript:void(0);" class="but2" onclick="saveSettings()">确 定</a>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="tab" style="display: none">
                        <table class="tb-2" style="clear:both;width:100%;" border="1" bordercolor="#cee1ee">
                            <tr>
                                <td class="td-bg" width="180">URL重定向：</td>

                                <td class="alignleft inline-uploadify">
                                    <div class="l">
                                        <?php if(is_nginx() !== false):?>
                                            服务器是nginx,确定有如下配置后，再开启<br>
                                            location / {<br>
                                            try_files $uri $uri/ /index.php;<br>
                                            }<br>
                                            如果启动失败，更改回来，对cms没有任何影响<br>
                                        <?php else:?>
                                            服务器是apache，确定服务器根目录下有.htaccess文件<br>
                                            RewriteEngine On<br>
                                            RewriteCond %{REQUEST_FILENAME} !-f<br>
                                            RewriteCond %{REQUEST_FILENAME} !-d<br>
                                            RewriteRule ^(.*)$ index.php/$1 [L]<br>
                                            如果启动失败，更改回来，对cms没有任何影响<br>
                                        <?php endif;?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-bg">重定向开关：</td>
                                <td class="alignleft">
                                    <select id="is_site_rewrite" name="is_site_rewrite" class="ml15">
                                        <option value="1" <?php echo isset($_site['is_site_rewrite']) && $_site['is_site_rewrite']== 1 ? 'selected="selected"' : '' ?>>开</option>
                                        <option value="-1" <?php echo isset($_site['is_site_rewrite']) && $_site['is_site_rewrite']== -1 ? 'selected="selected"' : '' ?>>关</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <a href=" javascript:void(0);" class="but2" onclick="saveSettings()">确 定</a>
                                </td>
                            </tr>
                        </table>
                    </div>

                </form>
            </div>
        </div>
    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    $('.btn_box a').click(function(){
        $('.btn_box a').removeClass('current');
        $(this).addClass('current');
        $('.tab').hide().eq($(this).index()).show()
    });

    function saveSettings()
    {
        $.post($('#settingForm').attr('action'), $('#settingForm').serialize(), function(result){
            if (!result) {
                show_msg('远程服务器没有响应');
                return false;
            }
            if (result.code != 0) {
                show_msg(result.msg);
                return false;
            }
            show_msg(result.msg);
        }, 'json');
    }
    $(function(){
        $('#upload_logo1').uploadify({
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
                $('#showimg1').html('<img src="' + $_site['upload_path'] + data +'" width="36" height="36" />');
                $('#site_logo').val($_site['upload_path'] + data);
            }
        });
        $('#upload_logo2').uploadify({
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
                $('#showimg2').html('<img src="' + $_site['upload_path'] + data +'" width="36" height="36" />');
                $('#wap_logo').val($_site['upload_path'] + data);
            }
        });
        $('#upload_logo3').uploadify({
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
                $('#showimg3').html('<img src="' + $_site['upload_path'] + data +'" width="36" height="36" />');
                $('#water_logo').val($_site['upload_path'] + data);
            }
        });
    });
</script>

<?php $this->load->view('/footer.php'); ?>
