<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 概况和升级</div><!-- 当前位置结束 -->
    <!-- 右侧主体内容开始 -->
    <div class="mbody">
        <div class="panel">

            <div class="p-sty  panel-one l">
                <div class="box" style="margin:0 15px 15px 0">
                    <span class="panel-tit">711CMS更新消息</span>
                    <div class="sponsored-linkss">
                        <h2>欢迎使用711CMS网站内容管理系统，您当前版本为：V<?php echo $_site['version']; ?></h2>
                        <P>
                            您系统版本最后更新时间为：
                            <?php echo !empty($_site['update_time']) ? date('Y-m-d H:i:s', $_site['update_time']) : '从未更新'; ?>
                        </P>
                    </div>
                </div>
            </div>

            <div class="p-sty panel-two r">
                <div class="box" style="margin:0 0 15px 0">
                    <span class="panel-tit">网站公告</span>
                    <div class="train-item">
                        <ul>
                            <li>您使用的是版本<?=VERSION_711CMS?>的程序。</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="p-sty panel-three">
                <div class="box" style="margin:0 15px 15px 0">
                    <span class="panel-tit">我的操作</span>
                    <div class="my-operating">
                        <a class="cur" href="https://jq.qq.com/?_wv=1027&k=4CMNpRv" target="_blank"><strong>点击链接加入群【711cms官方】：</strong></a>
                        <?php if($site_apk):?>
                        <a class="cur" id="site_apk" href="<?=$site_apk?>" target="_blank"><strong>手机助手下载地址</strong></a>
                        <?php endif;?>
                        <div class="" style="float:left; position:relative;">
                            <input id="upload_apk" name="upload_apk" type="file"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-sty panel-three">
                <div class="box" style="margin:0 0 15px 0">
                    <span class="panel-tit">快速导航</span>
                    <div class="shortcuts">
                        <a href="<?php echo build_url('App'); ?>">应用管理</a>
                        <a href="<?php echo build_url('AppCategory'); ?>">应用分类</a>
                        <a href="<?php echo build_url('Advert'); ?>">广告管理</a>
                        <a href="<?php echo build_url('Nlink'); ?>">SEO管理</a>
                        <a href="<?php echo build_url('Setting'); ?>">系统管理</a>
                    </div>
                </div>
            </div>

        </div>
    </div><!-- 右侧主体内容结束 -->
    <?php $this->load->view('/right.php'); ?>
</div><!-- 右侧区域结束 -->
<script type="application/javascript">
    $('#upload_apk').uploadify({
        'width': 84,
        'height': 30,
        'buttonImage': '<?php echo static_url("/images/add_more.jpg"); ?>',
        'formData': {
            'time': '<?php echo $time; ?>',
            'token': '<?php echo $token; ?>'
        },
        'swf': '<?php echo static_url("/js/uploadify/uploadify.swf"); ?>',
        'uploader': '<?php echo build_url("Index", "uploadSiteApk"); ?>',
        'onUploadSuccess': function (file, data, response) {
            if (data.indexOf('Error') >= 0) {
                show_msg(data.substring(6));
                return false;
            }
            data = data.split('|');
            show_msg("上传成功");
            if($('#site_apk').length > 0) {
                $('#site_apk').attr("href", data[0]);
            }else{
                $('.my-operating a').after('<a class="cur" id="site_apk" href="'+data[0]+'"><strong>手机助手下载地址</strong></a>');
            }
        }
    });
    $('#upload_apk').css('top', '15px').css('left', '10px');
</script>
<?php $this->load->view('/footer.php'); ?>
