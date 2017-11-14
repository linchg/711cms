<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>


<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">当前位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a>&nbsp;&nbsp;»&nbsp;&nbsp;应用列表</div>
    <!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">

        <form method="post"
              action="<?php echo build_url('App', 'save', array('app_id' => !empty($info['app_id']) ? $info['app_id'] : 0)); ?>"
              id="appform">
            <h2 style="padding:0 0 10px; font-size:16px; color:#333">应用基本信息</h2>

            <div class="mt10">
                <table class="tb-2" border="1" bordercolor="#cee1ee">
                    <tr>
                        <td width="120" class="td-bg">应用名称：</td>
                        <td colspan="3" class="alignleft">
                            <input type="text" size="50" class="ipt ml15" id="app_title" name="app_title"
                                   value="<?php echo isset($info['app_title']) ? $info['app_title'] : ''; ?>"/>
                            <span>* 不能为空</span>
                        </td>
                    </tr>
                    <tr>
                        <td width="120" class="td-bg">自定义SEO标题：</td>
                        <td colspan="3" class="alignleft">
                            <input type="text" class="ipt ml15" class="ipt" id="app_stitle" name="app_stitle"
                                   value="<?php echo isset($info['app_stitle']) ? $info['app_stitle'] : ''; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td width="120" class="td-bg">自定义SEO关键字：</td>
                        <td colspan="3" class="alignleft">
                            <input type="text" class="ipt ml15" class="ipt" id="app_seokey" name="app_seokey"
                                   value="<?php echo isset($info['app_seokey']) ? $info['app_seokey'] : ''; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td width="120" class="td-bg">自定义SEO描述：</td>
                        <td class="alignleft">
                            <input type="text" class="ipt ml15" class="ipt" id="app_seodesc" name="app_seodesc"
                                   value="<?php echo isset($info['app_seodesc']) ? $info['app_seodesc'] : ''; ?>"/>
                        </td>
                        <td class="td-bg">推荐星级：</td>
                        <td class="alignleft">
                            <input type="text" class="ipt ml15" id="app_recomment" name="app_recomment"
                                   value="<?php echo isset($info['app_recomment']) ? $info['app_recomment'] : rand(3,5); ?>"/>
                            &nbsp;&nbsp;*【<span style="color:red"> 1 至 5 </span>】
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">栏目分类：</td>
                        <td class="alignleft">
                            <select id="parent_id" class="ml15" onchange="app_category(this)">
                                <option value="0">请选择</option>
                                <option value="1">软件</option>
                                <option value="2">游戏</option>
                            </select>
                            <select id="last_cate_id" class="ml15" name="last_cate_id">
                                <option value="0">请选择</option>
                                <?php foreach ($category as $c) : ?>
                                    <option
                                        value="<?php echo $c['cate_id']; ?>" <?php echo isset($info['last_cate_id']) && $info['last_cate_id'] == $c['cate_id'] ? 'selected="selected"' : ''; ?>>
                                        <?php echo $c['cname']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select> &nbsp;&nbsp;* 必填
                        </td>
                        <td class="td-bg" width="120">标签：</td>
                        <td class="alignleft">
                            <input type="text" class="ipt ml15" id="app_tags" name="app_tags"
                                   value="<?php echo isset($info['app_tags']) ? $info['app_tags'] : ''; ?>"/>&nbsp;
                            <span> * 多个标签用,分开</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">缩略图：</td>
                        <td class="alignleft inline-uuploadifyploadify">
                            <div class="l">
                                <input type="text" class="ipt ml15" style="width:178px; margin-right:10px" name="app_logo" id="app_logo" value="<?php echo isset($info['app_logo']) ? $info['app_logo'] : ''; ?>"/>
                                <input type="file" name="upload_logo" id="upload_logo"/>
                            </div>
                            <div class="l">
                                <span id="showimg">
                                    <?php echo !empty($info['app_logo']) ? '<img src="' . $info['app_logo'] . '" width="36" height="36" />' : '' ?>
                                </span>
                            </div>
                        </td>
                        <td class="td-bg">评分：</td>
                        <td class="alignleft">
                            <input type="text" class="ipt ml15" id="app_grade" name="app_grade"
                                   value="<?php echo isset($info['app_grade']) ? $info['app_grade'] : rand(5,9); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">应用类型：</td>
                        <td class="alignleft">
                            <div class="l">
                                <select id="app_type" class="ml15" name="app_type">
                                    <option
                                        value="1" <?php echo isset($info['app_type']) && $info['app_type'] == 1 ? 'selected="selected"' : ''; ?>>
                                        普通应用
                                    </option>
                                    <?php if($author):?>
                                    <option
                                        value="2" <?php echo isset($info['app_type']) && $info['app_type'] == 2 ? 'selected="selected"' : ''; ?>>
                                        CPA
                                    </option>
                                    <option
                                        value="3" <?php echo isset($info['app_type']) && $info['app_type'] == 3 ? 'selected="selected"' : ''; ?>>
                                        CPS
                                    </option>
                                    <?php endif;?>
                                </select>
                            </div>
                            <div class="l"></div>
                        </td>
                        <td class="td-bg">排序：</td>
                        <td class="alignleft">
                            <input type="text" class="ipt ml15" id="app_order" name="app_order"
                                   value="<?php echo isset($info['app_order']) ? $info['app_order'] : 0; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">显示浏览量：</td>
                        <td class="alignleft">
                            <input type="text" class="ipt ml15" id="app_visitors" name="app_visitors"
                                   value="<?php echo isset($info['app_visitors']) ? $info['app_visitors'] : rand(10000,100000); ?>"/>
                        </td>
                        <td class="td-bg">显示评论量：</td>
                        <td class="alignleft">
                            <input type="text" class="ipt ml15" id="app_comments" name="app_comments"
                                   value="<?php echo isset($info['app_comments']) ? $info['app_comments'] : rand(0,10); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">显示下载量：</td>
                        <td class="alignleft">
                            <input type="text" class="ipt ml15" id="app_down" name="app_down"
                                   value="<?php echo isset($info['app_down']) ? $info['app_down'] : rand(1000,10000); ?>"/>
                        </td>
                        <td class="td-bg">更新时间：</td>
                        <td class="alignleft">
                            <input type="text" class="ipt ml15" id="app_update_time" onclick="laydate({istime:true, format: 'YYYY-MM-DD hh:mm:ss'})"
                                   name="app_update_time"  value="<?php echo isset($info['app_update_time']) &&  $info['app_update_time'] != 0 ? date('Y-m-d H:i:s', $info['app_update_time']) : date('Y-m-d H:i:s'); ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">应用详情：</td>
                        <td colspan="3" class="alignleft">
                            <textarea name="app_desc" class="ml15 app-desc"
                                      id="app_desc"><?php echo isset($info['app_desc']) ? $info['app_desc'] : ''; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">厂商名称：</td>
                        <td class="alignleft">
                            <div class="l">
                                <input type="text" class="ipt ml15" name="app_company" id="app_company"
                                       value="<?php echo isset($info['app_company']) ? $info['app_company'] : ''; ?>"/>
                            </div>
                            <div class="l"></div>
                        </td>
                        <td class="td-bg">厂商网站：</td>
                        <td class="alignleft">
                            <input type="text" class="ipt ml15" id="app_company_url" name="app_company_url"
                                   value="<?php echo isset($info['app_company_url']) ? $info['app_company_url'] : ''; ?>"/>
                        </td>
                    </tr>
                </table>
            </div>
<!-- box -->
            <?php if ((isset($info['data_app_id']) && $info['data_app_id'] == 0) || !isset($info['app_id'])  || !empty($info['data_history_id'])) : ?>
            <table class="tb-2" border="1" bordercolor="#cee1ee">
            <tr>
                <td class="td-bg"  width="12%"><h2 style="font-size:14px; color:#333">添加远程应用链接</h2</td>
                <td class="alignleft">
                    <div class="l">
                        <input type="text" class="ipt ml15" id="remote_apk" value=""/>
                    </div>
                </td>
                <td class="alignleft" width="10%">
                    <div class="l">
                        <a href="javascript:void(0);" class="but2 l" onclick="url_apk3()" style="margin:0 0 0 30px;font-size:15px;">添加</a>
                    </div>
                    <div class="l"></div>
                </td>
                <td class="td-bg"  width="10%"><h2 style="font-size:14px; color:#333">添加本地应用</h2</td>
                <td class="alignleft" width="23%">
                    <div class="l" style="position: relative; margin: -22px 0 0 5px;">
                        <input id="upload_apk" name="upload_apk" type="file"/>
                    </div>
                </td>
                <td class="td-bg" width="10%" align="center"><h2 style="font-size:14px; color:#333">添加服务器应用</h2></td>
                <td class="alignleft" width="23%">
                    <div class="l">
                        <a href="javascript:void(0);" class="but2 l" onclick="url_apk2()" style="margin:0 0 0 30px;font-size:15px;">添加</a>
                    </div>
                    <div class="l"></div>
                </td>
            </tr>
            </table>
            <?php endif; ?>
<!-- /box -->
            <div class="mt10">
                <table class="tb" border="1" bordercolor="#cee1ee">

                    <tr class="tr-title">
                        <th width="100">版本文件</th>
                        <th width="100">版本号</th>
                        <th width="100">程序大小</th>
                        <th width="100">APK包名</th>
                        <th width="100">系统要求</th>
                        <th width="100">操作</th>
                    </tr>
                    <tbody id="history_list">
                    <?php if (is_array($history) && sizeof($history) > 0) : ?>
                        <?php foreach ($history as $value) : ?>
                            <tr>
                                <?php if (!empty($value['data_history_id'])) : ?>
                                    <td width="100">数据中心ID：<?php echo $value['app_id']; ?></td>
                                <?php else : ?>
                                    <td width="100"><?php echo $value['history_file']; ?></td>
                                <?php endif; ?>
                                <td width="50"><?php echo $value['history_version']; ?></td>
                                <td width="50"><?php echo appSize($value['history_size']);?>M</td>
                                <td width="50"><?php echo $value['history_package']; ?></td>
                                <td width="50"><?php echo $value['history_system']; ?></td>
                                <td>
                                    <?php if (!empty($info['data_history_id']) || $info['data_app_id'] == 0) : ?>
                                        <a href="javascript:void(0)"
                                           onclick="delete_history(this, <?php echo $value['history_id']; ?>)">删除</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>

            </div>

            <table class="tb-2" border="1" bordercolor="#cee1ee">
                <tr>
                    <td class="td-bg"  width="12%"><h2 style="font-size:14px; color:#333">添加远程缩略图</h2</td>
                    <td class="alignleft">
                        <div class="l">
                            <input type="text" class="ipt ml15" id="remote_img" value=""/>
                        </div>
                    </td>
                    <td class="alignleft" width="12%">
                        <div class="l">
                            <a href="javascript:void(0);" class="but2 l" onclick="url_image3()" style="margin:0 0 0 30px;font-size:15px;">添加</a>
                        </div>
                        <div class="l"></div>
                    </td>
                    <td class="td-bg"  width="10%"><h2 style="font-size:14px; color:#333">添加本地缩略图</h2</td>
                    <td class="alignleft" width="23%">
                        <div class="l" style="position: relative; margin: -22px 0 0 5px;">
                            <input id="upload_image" name="upload_image" type="file"/>
                        </div>
                    </td>
                    <td class="td-bg" width="10%" align="center"><h2 style="font-size:14px; color:#333">添加服务器缩略图</h2></td>
                    <td class="alignleft" width="23%">
                        <div class="l">
                            <a href="javascript:void(0);" class="but2 l" onclick="url_image2()" style="margin:0 0 0 30px;font-size:15px;">添加</a>
                        </div>
                        <div class="l"></div>
                    </td>
                </tr>
            </table>
            <!--添加image链接end-->
            <div class="mt10">
                <table class="tb" border="1" bordercolor="#cee1ee">
                    <tr class="tr-title">
                        <th class="40%">缩略图</th>
                        <th width="15%">宽度</th>
                        <th width="15%">高度</th>
                        <th width="15%">大小（KB）</th>
                        <th width="15%">操作</th>
                    </tr>
                    <tbody id="resource_list">
                    <?php if (is_array($resource) && sizeof($resource) > 0) : ?>
                        <?php foreach ($resource as $value) : ?>
                            <tr>
                                <td>
                                    <a target="_blank" href="<?php echo $value['resource_url']; ?>">
                                        <img height="30" src="<?php echo $value['resource_url']; ?>"/>
                                    </a>
                                </td>
                                <td><?php echo $value['width']; ?></td>
                                <td><?php echo $value['height']; ?></td>
                                <td><?php echo $value['size']; ?></td>
                                <td><a href="javascript:void(0);"
                                       onclick="delete_resource(this, <?php echo $value['id']; ?>)">删除</a></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>

            </div>
            <div align="center" class="mb10">
                <a href="javascript:void(0);" class="but2" onclick="save_app()">确 定</a>
            </div>
        </form>

    </div>
    <!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    CKEDITOR.replace('app_desc', {height: '350px'});
    function save_app() {
        $('#app_desc').html(CKEDITOR.instances.app_desc.getData());
        $.post($('#appform').attr('action'), $('#appform').serialize(), function (result) {
            if (result.code == 0) {
                window.location = '<?php echo build_url("App"); ?>';
            } else {
                show_msg(result.msg);
            }
        }, 'json');
    }
    function app_category(obj) {
        var soft = '<?php echo implode(',', array_keys($parents[1])); ?>';
        var game = '<?php echo implode(',', array_keys($parents[2])); ?>';
        if ($(obj).val() == 1) {
            $('#last_cate_id option').each(function () {
                $(this).show();
                if ($(this).val() > 0) {
                    if (-1 == $.inArray($(this).val(), soft.split(','))) {
                        $(this).hide();
                    }
                }
            });
        }
        if ($(obj).val() == 2) {
            $('#last_cate_id option').each(function () {
                $(this).show();
                if ($(this).val() > 0) {
                    if (-1 == $.inArray($(this).val(), game.split(','))) {
                        $(this).hide();
                    }
                }
            });
        }
    }
    $('#last_cate_id option').hide();
    <?php if (isset($info['last_cate_id'])) : ?>
    var soft = [<?php echo implode(',', array_keys($parents[1])); ?>];
    var game = [<?php echo implode(',', array_keys($parents[2])); ?>];
    if (-1 != $.inArray(<?php echo $info['last_cate_id']; ?>, soft)) {
        $('#parent_id').val(1);
    } else if (-1 != $.inArray(<?php echo $info['last_cate_id']; ?>, game)) {
        $('#parent_id').val(2);
    }
    $('#parent_id').change();
    <?php endif; ?>
    function remove_line(obj) {
        $(obj).parent().parent().remove();
    }
    function delete_resource(obj, id) {
        show_msg('您确认要删除此图片吗?', true, function () {
            $.post(build_url('App', 'del_resource'), {"resource_id": id}, function (result) {
                if (!result) {
                    alert('远程主机无响应');
                    return false;
                }
                if (result.code != 0) {
                    alert(result.msg);
                    return false;
                }
                remove_line(obj);
            }, 'json');
        });
    }
    function delete_history(obj, id) {
        show_msg('您确认要删除此版本的文件吗?', true, function () {
            $.post(build_url('App', 'del_history'), {"history_id": id}, function (result) {
                if (!result) {
                    alert('远程主机无响应');
                    return false;
                }
                if (result.code != 0) {
                    alert(result.msg);
                    return false;
                }
                remove_line(obj);
            }, 'json');
        });
    }
    $(function () {
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
                $('#app_logo').val($_site['upload_path'] + data);
            }
        });
        $('#upload_image').uploadify({
            'width': 84,
            'height': 32,
            'left':30,
            'buttonImage': '<?php echo static_url("/images/add_more.jpg"); ?>',
            'formData': {
                'time': '<?php echo $time; ?>',
                'token': '<?php echo $token; ?>'
            },
            'swf': '<?php echo static_url("/js/uploadify/uploadify.swf"); ?>',
            'uploader': '<?php echo build_url("Index", "uploadImage"); ?>',
            'onUploadSuccess': function (file, data, response) {
                if (data.indexOf('Error') >= 0) {
                    show_msg(data.substring(6));
                    return false;
                }
                data = data.split('|');
                var html = '';
                html += '<tr>';
                html += '    <td>';
                html += '        <a target="_blank" href="' + $_site['upload_path'] + data[0] + '">';
                html += '            <img height="30" src="' + $_site['upload_path'] + data[0] + '" />';
                html += '        </a><input type="hidden" name="resource_image[]" value="' + $_site['upload_path'] + data[0] + '" />';
                html += '    </td>';
                html += '    <td>' + data[1] + '<input type="hidden" name="resource_weight[]" value="' + data[1] + '" /></td>';
                html += '    <td>' + data[2] + '<input type="hidden" name="resource_height[]" value="' + data[2] + '" /></td>';
                html += '    <td>' + data[3] + '<input type="hidden" name="resource_size[]" value="' + data[3] + '" /></td>';
                html += '    <td><a href="javascript:;" onclick="remove_line(this)">删除</a></td>';
                html += '</tr>';
                $('#resource_list').append(html);
            }
        });
        $('#upload_apk').uploadify({
            'width': 84,
            'height': 32,
            'left':30,
            'buttonImage': '<?php echo static_url("/images/add_more.jpg"); ?>',
            'formData': {
                'time': '<?php echo $time; ?>',
                'token': '<?php echo $token; ?>'
            },
            'swf': '<?php echo static_url("/js/uploadify/uploadify.swf"); ?>',
            'uploader': '<?php echo build_url("Index", "uploadApk"); ?>',
            'onUploadSuccess': function (file, data, response) {
                if (data.indexOf('Error') >= 0) {
                    show_msg(data.substring(6));
                    return false;
                }
                data = data.split('|');
                var html = '';
                html += '<tr>';
                html += '    <td>' + data[0] + '<input type="hidden" name="apk_path[]" value="' + data[0] + '" /></td>';
                html += '    <td>' + data[1] + '<input type="hidden" name="apk_version[]" value="' + data[1] + '" /></td>';
                html += '    <td>' + data[2] + '<input type="hidden" name="apk_size[]" value="' + data[2] + '" /></td>';
                html += '    <td>' + data[3] + '<input type="hidden" name="apk_package[]" value="' + data[3] + '" /></td>';
                html += '    <td>' + data[4] + '<input type="hidden" name="apk_system[]" value="' + data[4] + '" /></td>';
                html += '    <td>';
                html += '        <input type="hidden" name="apk_code[]" value="' + data[5] + '" />';
                html += '        <input type="hidden" name="apk_sdk[]" value="' + data[6] + '" />';
                html += '        <input type="hidden" name="apk_permission[]" value="' + data[7] + '" />';
                html += '        <a href="javascript:;" onclick="remove_line(this)">删除</a>';
                html += '    </td>';
                html += '</tr>';
                $('#history_list').append(html);
            }
        });
    });
    function _showModalDialog(url, width, height, closeCallback) {
        var modalDiv,
            dialogPrefix = window.showModalDialog ? 'dialog' : '',
            unit = 'px',
            maximized = width === true || height === true,
            w = width || 600,
            h = height || 500,
            border = 5,
            taskbar = 40, // windows taskbar
            header = 20,
            x,
            y;

        if (maximized) {
            x = 0;
            y = 0;
            w = screen.width;
            h = screen.height;
        } else {
            x = window.screenX + (screen.width / 2) - (w / 2) - (border * 2);
            y = window.screenY + (screen.height / 2) - (h / 2) - taskbar - border;
        }

        var features = [
                'toolbar=no',
                'location=no',
                'directories=no',
                'status=no',
                'menubar=no',
                'scrollbars=no',
                'resizable=no',
                'copyhistory=no',
                'center=yes',
                dialogPrefix + 'width=' + w + unit,
                dialogPrefix + 'height=' + h + unit,
                dialogPrefix + 'top=' + y + unit,
                dialogPrefix + 'left=' + x + unit
            ],
            showModal = function (context) {
                if (context) {
                    modalDiv = context.document.createElement('div');
                    modalDiv.style.cssText = 'top:0;right:0;bottom:0;left:0;position:absolute;z-index:50000;';
                    modalDiv.onclick = function () {
                        if (context.focus) {
                            context.focus();
                        }
                        return false;
                    }
                    window.top.document.body.appendChild(modalDiv);
                }
            },
            removeModal = function () {
                if (modalDiv) {
                    modalDiv.onclick = null;
                    modalDiv.parentNode.removeChild(modalDiv);
                    modalDiv = null;
                }
            };

        // IE
        if (window.showModalDialog) {
            window.showModalDialog(url, null, features.join(';') + ';');

            if (closeCallback) {
                closeCallback();
            }
            // Other browsers
        } else {
            var win = window.open(url, '', features.join(','));
            if (maximized) {
                win.moveTo(0, 0);
            }

            // When charging the window.
            var onLoadFn = function () {
                    showModal(this);
                },
            // When you close the window.
                unLoadFn = function () {
                    window.clearInterval(interval);
                    if (closeCallback) {
                        closeCallback();
                    }
                    removeModal();
                },
            // When you refresh the context that caught the window.
                beforeUnloadAndCloseFn = function () {
                    try {
                        unLoadFn();
                    }
                    finally {
                        win.close();
                    }
                };

            if (win) {
                // Create a task to check if the window was closed.
                var interval = window.setInterval(function () {
                    try {
                        if (win == null || win.closed) {
                            unLoadFn();
                        }
                    } catch (e) { }
                }, 500);

                if (win.addEventListener) {
                    win.addEventListener('load', onLoadFn, false);
                } else {
                    win.attachEvent('load', onLoadFn);
                }

                window.addEventListener('beforeunload', beforeUnloadAndCloseFn, false);
            }
        }
    }
    function url_apk2() {
        var url = '<?php echo build_url('App','file',array('folder'=>'/','type'=>'apk','time'=>$time,'token'=>apptoken(array('folder' =>'/','type'=>'apk','time'=>$time),$private)));?>';
        window.returnValue = undefined;
        window._showModalDialog(url,850,500,function(){
             if (window.returnValue != undefined) {
                 $.post('<?php echo build_url('App', 'addApkUrl'); ?>', {"apk_url": window.returnValue}, function (data) {
                     if (data.indexOf('Error') >= 0) {
                         show_msg(data.substring(6));
                         return false;
                     }
                     data = data.split('|');
                     var html = '';
                     html += '<tr>';
                     html += '    <td>' + data[0] + '<input type="hidden" name="apk_path[]" value="' + data[0] + '" /></td>';
                     html += '    <td>' + data[1] + '<input type="hidden" name="apk_version[]" value="' + data[1] + '" /></td>';
                     html += '    <td>' + data[2] + '<input type="hidden" name="apk_size[]" value="' + data[2] + '" /></td>';
                     html += '    <td>' + data[3] + '<input type="hidden" name="apk_package[]" value="' + data[3] + '" /></td>';
                     html += '    <td>' + data[4] + '<input type="hidden" name="apk_system[]" value="' + data[4] + '" /></td>';
                     html += '    <td>';
                     html += '        <input type="hidden" name="apk_code[]" value="' + data[5] + '" />';
                     html += '        <input type="hidden" name="apk_sdk[]" value="' + data[6] + '" />';
                     html += '        <input type="hidden" name="apk_permission[]" value="' + data[7] + '" />';
                     html += '        <a href="javascript:;" onclick="remove_line(this)">删除</a>';
                     html += '    </td>';
                     html += '</tr>';
                     $('#history_list').append(html);
                     window.returnValue = undefined;
                 });
             }
        });
    }
    function url_image2() {
        var url = '<?php echo build_url('App','file',array('folder'=>'/','type'=>'jpg|png|gif|jpeg|jpe','time'=>$time,'token'=>apptoken(array('folder' =>'/','type'=>'jpg|png|gif|jpeg|jpe','time'=>$time),$private)));?>';
        window.returnValue = undefined;
        window._showModalDialog(url,850,500,function() {
            if (window.returnValue != undefined) {
                $.post('<?php echo build_url('App', 'addImageUrl'); ?>', {"image_url": window.returnValue}, function (data) {
                    if (data.indexOf('Error') >= 0) {
                        show_msg(data.substring(6));
                        return false;
                    }
                    data = data.split('|');
                    var html = '';
                    html += '<tr>';
                    html += '    <td>';
                    html += '        <a target="_blank" href="' + data[0] + '">';
                    html += '            <img height="30" src="' + data[0] + '" />';
                    html += '        </a><input type="hidden" name="resource_image[]" value="' + data[0] + '" />';
                    html += '    </td>';
                    html += '    <td>' + data[1] + '<input type="hidden" name="resource_weight[]" value="' + data[1] + '" /></td>';
                    html += '    <td>' + data[2] + '<input type="hidden" name="resource_height[]" value="' + data[2] + '" /></td>';
                    html += '    <td>' + data[3] + '<input type="hidden" name="resource_size[]" value="' + data[3] + '" /></td>';
                    html += '    <td><a href="javascript:;" onclick="remove_line(this)">删除</a></td>';
                    html += '</tr>';
                    $('#resource_list').append(html);
                    window.returnValue = undefined;
                });
            }
        });
    }
    function url_apk3() {
        var apkUrl = $('#remote_apk').val();
        if(apkUrl.indexOf('http') === -1){
            show_msg('输入apk http地址');
            return false;
        }

        var url = build_url('app','remoteLink');
        $.post(url,{'url':encodeURIComponent(apkUrl)},function(result){
            result = $.parseJSON(result);
            if(result.code === 0){
                var data = result.msg;
                var size = data[2]/1024/1024;
                var html = '';
                html += '<tr>';
                html += '    <td>' + data[0] + '<input type="hidden" name="apk_path[]" value="' + data[0] + '" /></td>';
                html += '    <td>' + data[1] + '<input type="hidden" name="apk_version[]" value="' + data[1] + '" /></td>';
                html += '    <td>' + size.toFixed(2) + 'MB <input type="hidden" name="apk_size[]" value="' + data[2] + '" /></td>';
                html += '    <td>' + data[3] + '<input type="hidden" name="apk_package[]" value="' + data[3] + '" /></td>';
                html += '    <td>' + data[4] + '<input type="hidden" name="apk_system[]" value="' + data[4] + '" /></td>';
                html += '    <td>';
                html += '        <input type="hidden" name="apk_code[]" value="' + data[5] + '" />';
                html += '        <input type="hidden" name="apk_sdk[]" value="' + data[6] + '" />';
                html += '        <input type="hidden" name="apk_permission[]" value="' + data[7] + '" />';
                html += '        <a href="javascript:;" onclick="remove_line(this)">删除</a>';
                html += '    </td>';
                html += '</tr>';
                $('#history_list').append(html);
            }else{
                show_msg(result.msg);
                return false;
            }
        });
    }

    function url_image3() {
        var imgUrl = $('#remote_img').val();
        if(imgUrl.indexOf('http') === -1){
            show_msg('输入图片http地址');
            return false;
        }
        var url = build_url('app','remoteImage');
        $.post(url,{'url':imgUrl}, function (result) {
            result = $.parseJSON(result);
            if(result.code === 0){
                var data = result.msg;
                var html = '';
                html += '<tr>';
                html += '    <td>';
                html += '        <a target="_blank" href="' + data[0] + '">';
                html += '            <img height="30" src="' + data[0] + '" />';
                html += '        </a><input type="hidden" name="resource_image[]" value="' + data[0] + '" />';
                html += '    </td>';
                html += '    <td>' + data[1] + '<input type="hidden" name="resource_weight[]" value="' + data[1] + '" /></td>';
                html += '    <td>' + data[2] + '<input type="hidden" name="resource_height[]" value="' + data[2] + '" /></td>';
                html += '    <td>' + data[3] + '<input type="hidden" name="resource_size[]" value="' + data[3] + '" /></td>';
                html += '    <td><a href="javascript:;" onclick="remove_line(this)">删除</a></td>';
                html += '</tr>';
                $('#resource_list').append(html);
                $('#remote_img').val('');
            }else{
                show_msg(result.msg);
                return false;
            }
        });
    }
</script>

<?php $this->load->view('/footer.php'); ?>
