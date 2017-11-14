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

        <div class="mt10 clearfix">
            <div class="l">
                <a href="<?php echo build_url('App', 'content'); ?>" class="but2">添加应用</a>
                <a href="javascript:void(0);" class="but2" onClick="app_delete_all()">删除选中</a>
                <a href="javascript:void(0);" class="but2" onclick="app_add_recommend()">添加到推荐位</a>
                <a href="javascript:void(0);" class="but2" onclick="app_add_assistant()">推荐到新手助</a>
            </div>

            <div class="r r-box">
                <div class="select-box l">
                    <div class="select-wrap">
                        <select id="parent_id" name="parent_id" class="search_type" onchange="app_category(this)">
                            <option value="0">分类类型</option>
                            <option value="1" <?php echo $parent_id == 1 ? 'selected="selected"' : ''; ?>>软件</option>
                            <option value="2" <?php echo $parent_id == 2 ? 'selected="selected"' : ''; ?>>游戏</option>
                        </select>
                    </div>
                </div>
                <div class="select-box l">
                    <div class="select-wrap">
                        <select id="cate_id" name="last_cate_id" class="search_type">
                            <option value="0">分类选择</option>
                            <?php if (is_array($category) && sizeof($category) > 0) : ?>
                                <?php foreach ($category as $value) : ?>
                                    <option
                                        value="<?php echo $value['cate_id']; ?>" <?php echo $last_cate_id == $value['cate_id'] ? 'selected="selected"' : ''; ?>>
                                        <?php echo $value['cname']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="select-box l">
                    <div class="select-wrap">
                        <select id="search_type" name="search_type" class="search_type">
                            <option value="0">选择排序</option>
                            <option value="app_id" <?php echo $search_type == "app_id" ? "selected" : ""; ?>>
                                应用ID
                            </option>
                            <option value="app_down"  <?php echo  $search_type == "app_down" ? "selected" : ""; ?>>
                                应用下载量
                            </option>
                            <option value="app_grade"  <?php echo  $search_type == "app_grade" ? "selected" : ""; ?>>
                                应用评分
                            </option>
                            <option value="app_recomment"  <?php echo  $search_type == "app_recomment" ? "selected" : ""; ?>>
                                推荐星级
                            </option>
                            <option value="app_update_time"  <?php echo  $search_type == "app_update_time" ? "selected" : ""; ?>>
                                更新时间
                            </option>
                            <option value="app_comments"  <?php echo  $search_type == "app_comments" ? "selected" : ""; ?>>
                                评论次数
                            </option>
                        </select>
                    </div>
                </div>
                <div class="l">
                    <input type="text" id="search_txt" name="search_txt" class="ipt seachIpt"
                           value="<?php echo $search_txt ? $search_txt : ''; ?>"
                           onKeyUp="if(event.keyCode==13){$('#search_apply').click()}"/>
                    <a href="javascript:void(0);" class="but2 mr0" id="search_apply" onclick="app_search();">查 询</a>
                </div>
            </div>
        </div>

        <div class="mt10">

            <table class="tb" border="1" bordercolor="#cee1ee">
                <thead>
                <tr class="tr-title">
                    <th width="5%"><a href="javascript:void(0);" onclick="check_all('.cklist');">全选/反选</a></th>
                    <th width="5%">ID</th>
                    <th width="20%" class="alignleft"><p class="ml10">应用名称</p></th>
                    <th width="6%">数据来源</th>
                    <th width="6%">分类分类</th>
                    <th width="6%">所属分类</th>
                    <th width="6%">应用类型</th>
                    <th width="6%">显示下载量</th>
                    <th width="6%">评分</th>
                    <th width="10%">更新时间</th>
                    <th width="16%">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if (is_array($list) && sizeof($list) > 0) : ?>
                    <?php foreach ($list as $kapp => $vapp) : ?>
                        <tr>
                            <td><input type="checkbox" value="<?php echo $vapp['app_id'] ?>" class="cklist"/></td>
                            <td><?php echo $vapp['app_id']; ?></td>
                            <td class="alignleft">
                                <a href="<?php if ($vapp['app_type'] != 2) : ?><?php echo build_url('App', 'content', array('app_id' => $vapp['app_id'])); ?><?php endif; ?>">
                                    <?php echo !empty($vapp['app_logo']) ? '<img class="ml10" src="' . $vapp['app_logo'] . '" width="30" height="30">&nbsp;&nbsp;' : ''; ?>
                                    <?php echo $vapp['app_title']; ?>
                                </a>
                            </td>
                            <td><?php echo isset($parents[1][$vapp['last_cate_id']]) ? '软件' : '游戏'; ?></td>
                            <td><?php echo isset($cates[$vapp['last_cate_id']]) ? $cates[$vapp['last_cate_id']] : $vapp['last_cate_id']; ?></td>
                            <td><?php echo isset($appTypeName[$vapp['app_type']]) ? $appTypeName[$vapp['app_type']] : $vapp['app_type']; ?></td>
                            <?php if (isset($source_id) && $source_id==2) : ?>
                                <td><?php if ($vapp['incomeShare']==1) : ?><span style="color:red">支持</span><?php else : ?>不支持<?php endif; ?></td>
                            <?php endif; ?>
                            <td><?php echo $vapp['app_down']; ?></td>
                            <td><?php echo $vapp['app_grade']; ?></td>
                            <td><?php echo date('Y-m-d', $vapp['app_update_time']); ?></td>
                            <td>
                                <?php if ($vapp['app_type'] == 2 && $vapp['charge_app_id'] != 0 && $vapp['data_app_id'] == 0) : ?>
                                    <a class="but2 but2s" href="javascript:void(0);" class="btn2" onClick="app_del(<?php echo $vapp['app_id']; ?>)">删除</a>
                                <?php else : ?>
                                    <a class="but2 but2s" href="<?php echo build_url('App', 'content', array('app_id' => $vapp['app_id'])); ?>" class="btn2">修改</a>
                                    <a class="but2 but2s" href="javascript:void(0);" class="btn2" onClick="app_del(<?php echo $vapp['app_id']; ?>)">删除</a>
                                <?php endif; ?>
                            </td>
                            <input type="hidden" id="title_<?php echo $vapp['app_id'];?>" value="<?php echo $vapp['app_title'];?>">
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
            <div class="pagebar clearfix">
                <div class="ly-page">
                <?php echo $this->pagination->create_links(); ?>
                </div>
                <div class="page-go">
                    <?php if ($count / $limit > 1) : ?>
                    <input class="page-num" type="text" id ="page" value="">
                    <a href="javascript:void(0);" onClick="page()" style="background:#0965B8;color:#fff">GO</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
    <!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>
</div>
<!-- 右侧区域结束 -->
<div class="go-box">
    <div class="go-top"><img src="<?php echo static_url('/images/go_top.png'); ?>" width=26 height=26 title="返回顶部"></div>
    <div class="go-bottom"><img src="<?php echo static_url('/images/go_bot.png'); ?>" width=26 height=26 title="返回底部"></div>
</div>
<!-- 返回顶部底部 -->
<script type="text/javascript">
    $(function(){
        $('.go-box').fadeOut(-1000);
        $(window).scroll(function() {
            if($(window).scrollTop() >= 230){
                $('.go-box').fadeIn(300);
            }else{
                $('.go-box').fadeOut(300);
            }
        });
        $('.go-top').click(function(){
            $('html,body').animate({scrollTop: '0px'}, 200);
        });
        $('.go-bottom').click(function(){
            $('html,body').animate({scrollTop:$('.bottom').offset().top}, 200);
        });
    });
</script>

<script>
    //全选
    function check_all(obj)
    {
        $(obj).prop("checked", !$(obj).prop('checked'));
    }
    function page(){
        var page = $('#page').val();
        if(page>0){
            <?php
            $url = build_url('App', 'main');
            if(!empty($parent_id)) $url .= "&parent_id=".$parent_id;
            if(!empty($last_cate_id)) $url .= "&last_cate_id=".$last_cate_id;
            if(!empty($search_type)) $url .= "&search_type=".$search_type;
            if(!empty($search_txt)) $url .= "&search_txt=".$search_txt;
            ?>
            window.location = "<?php echo $url.'&page='; ?>"+page;
        }
    }

    function app_del(app_id) {
        show_msg("您确定要删除此应用吗？相关的资源会被一并删除。", true, function () {
            $.post(build_url('App', 'del'), {"app_id": app_id}, function (result) {
                if (result.code != 0) {
                    show_msg(result.msg, false);
                } else {
                    location.reload();
                }
            }, 'json');
        });
    }
    function app_delete_all() {
        var size = $('.cklist:checked').size();
        if (size < 1) {
            show_msg('请先选择要删除的应用');
            return false;
        }
        show_msg("您确定要删除这些应用吗？相关的资源会被一并删除。", true, function () {
            $('.cklist:checked').each(function (index) {
                var o = $(this);
                var count = index + 1;
                $(document).queue('ajaxRequest', function () {
                    $.post(build_url('App', 'del'), {"app_id": o.val()}, function (result) {
                        if (result.code != 0) {
                            $(document).clearQueue('ajaxRequest');
                            show_msg(result.msg, false, function () {
                                location.reload();
                            });
                            return false;
                        } else {
                            show_msg("正在删除第" + count + "个应用，请稍等...", false, false, false);
                        }
                        $(document).dequeue('ajaxRequest');
                        if (count == size) {
                            location.reload();
                        }
                    }, 'json');

                });
            });
            $(document).dequeue('ajaxRequest');
        });
    }

    function app_category(obj) {
        var type = $(obj).val();
        $.post(build_url('App', 'app_category'), {"type": type}, function (data) {
            if (data.code == 0) {
                var list_html = '<option value="0">分类选择</option>';
                $.each(data.msg, function (k, v) {
                    list_html += '<option value="' + v['cate_id'] + '">' + v['cname'] + '</option>';
                });
                $("#cate_id").html(list_html);
            } else {
                return false;
            }
        }, 'json');
    }

    function app_search() {
        window.location = "<?php echo build_url("App", "main");?>" + '&source_id=' + $('#source_id').val() + '&parent_id=' + $('#parent_id').val() + '&last_cate_id=' + $('#cate_id').val() + '&search_type=' + $('#search_type').val() + '&search_txt=' + $('#search_txt').val();
    }

    function manager_select(obj) {
        var type = $(obj).val();
        if (type != 0) {
            $.post(build_url('App', 'manager_type'), {"type": type}, function (data) {
                if (data.code == 0) {
                    var list_html = '<option value="0">选择推荐位</option>';
                    $.each(data.msg, function (k, v) {
                        if (v['area_id'] == undefined) {
                            list_html += '<option value="' + v['necessary_id'] + '">' + v['necessary_id'] + '-' + v['necessary_title'] + '</option>';
                        } else {
                            list_html += '<option value="' + v['area_id'] + '">' + v['area_id'] + '-' + v['area_title'] + '</option>';
                        }
                    });
                    $("#recommend_id").html(list_html);
                } else {
                    alert(data.msg);
                    return false;
                }

            }, 'json');
        }

    }

    function app_add_recommend() {
        var size = $('.cklist:checked').size();
        if (size < 1) {
            show_msg2('请先选择要推荐的应用');
            return false;
        }
        show_msg2('请选择推荐类型!',false, ff,true,true,true);
    }

    function ff(){
        var type = $("#manager_id").val();
        var area_id = $("#recommend_id").val();
        if(type == 0){
            $('.po-item .ss').html('请选择推荐类型!');
            return false;
        }else if(area_id == 0){
            $('.po-item .ss').html('请选择推荐位!');
            return false;
        }
        var arrayObj = new Array();
        $('.cklist:checked').each(function (index) {
            arrayObj[index] = $(this).val();
        });
        var appids = arrayObj.join(",");
        $.post(build_url('App', 'add_recommend'), {
            "app_id": appids,
            'type': $("#manager_id").val(),
            'area_id': $("#recommend_id").val()
        }, function (result) {
            if (result.code == 0) {
                $('.po-item .ss').html(result.msg);
            } else {
                $('.po-item .ss').html(result.msg);
            }
            location.reload();
        }, 'json');
    }

    function app_add_assistant(){
        var size = $('.cklist:checked').size();
        if (size < 1) {
            show_msg_assistant('请先选择要推荐的应用');
            return false;
        }
        show_msg_assistant('请选择推荐类型!',false, tj,true,true,true);
    }

    function tj(){
        var ad_id = $("#second_id").attr("ad_id");
        var second_id = $("#second_id").val();
        var fourth_id = $("#fourth_id").val();

        if(second_id == 0){
            $('.po-item_advert .ss').html('请选择推荐导航!');
            return false;
        }else if(fourth_id == 0){
            $('.po-item_advert .ss').html('请选择推荐位!');
            return false;
        }
        var arrayObj = new Array();
        $('.cklist:checked').each(function (index) {
            arrayObj[index] = $(this).val();
        });
        var appids = arrayObj.join(",");
        $.post(build_url('Advert', 'add_commend_app',{},'Assistant'), {
            "app_id": appids,
            'fourth_id': fourth_id
        }, function (result) {
            $('.po-item_advert .ss').html(result.msg);
            location.reload();
        }, 'json');
    }

    //一级导航
    function advert_select(obj) {
        var id = $(obj).val(); //一级导航id
        if (id != 0) {
            $.post(build_url('Advert', 'second_type',{},'Assistant'), {"navicat_id": id,'type':1}, function (data) {
                if (data.code == 0) {
                    var list_html = '<option value="0">选择推荐位</option>';
                    $.each(data.msg, function (k, v) {
                        list_html += '<option value="' + k + '">' + v + '</option>';
                    });
                    $("#second_id").html(list_html);
                } else {
                    alert(data.msg);
                    return false;
                }

            }, 'json');
        }

    }
    //次级导航
    function second_select(obj) {
        var asn_id = $(obj).val(); //一级导航id
        if (asn_id != 0) {
            $.post(build_url('Advert', 'third_name',{},'Assistant'), {"asn_id": asn_id}, function (data) {
                if (data.code == 0) {
                    var list_html = '<option value="0">选择推荐位</option>';
                    $.each(data.msg, function (k, v) {
                        list_html += '<option value="' + k + '">' + v + '</option>';
                    });
                    $("#fourth_id").html(list_html);
                    $("#fourth_id_show").show();

                }else if(data.code == 1) {
                    var list_html = '<option value="0">选择推荐位</option>';
                    $.each(data.msg, function (k, v) {
                        list_html += '<option value="' + k + '">' + v + '</option>';
                    });
                    $("#third_id").html(list_html);
                    $("#third_id_show").show();

                } else {
                    alert(data.msg);
                    return false;
                }

            }, 'json');
        }
    }
    //三级判断是分类才会有四级标题
    function third_select(obj) {
        var att_id = $(obj).val(); //一级导航id
        if (att_id != 0) {
            $.post(build_url('Advert', 'fourth_name',{},'Assistant'), {"att_id": att_id}, function (data) {
                if (data.code == 0) {
                    var list_html = '<option value="0">选择推荐位</option>';
                    $.each(data.msg, function (k, v) {
                        list_html += '<option value="' + k + '">' + v + '</option>';
                    });
                    $("#fourth_id").html(list_html);
                    $("#fourth_id_show").show();

                } else {
                    alert(data.msg);
                    return false;
                }

            }, 'json');
        }

    }

    //弹窗广告和推荐位的推荐
    function show_msg_assistant(txt, cancel, okfun, ok, htm,close,lunbo) {
        $('.po-ok').hide();
        $('.po-loading').hide();
        $('.po-cancel').hide();
        $('#navicat').hide();
        $('.ly-wrong').hide();
        $('.lunbo').hide();
        $('.po-ok,.po-cancel,.ly-wrong').unbind('click').bind('click', function(){
            $('.po-item_advert').hide();
        });
        if (cancel == true) {
            $('.po-cancel').show();
        }
        if (htm == true){
            $('#navicat').show();
        }
        if (close == true){
            $('.ly-wrong').show();
        }
        if (lunbo == true){
            $('.lunbo').show();
        }
        if (ok != false) {
            $('.po-ok').show();
        } else {
            $('.po-loading').show();
        }
        if (typeof okfun == 'function') {
            $('.po-ok').unbind('click').bind('click', function(){
                if (!okfun()) {
                    $('.po-item_advert').show();
                }
            });
        }
        $('.po-item_advert .ss').html(txt);
        $('.po-item_advert').show().offset({top: $(window).scrollTop() + $(window).height() / 2 - 100});
    }
</script>
<div class="bottom"></div>
<?php $this->load->view('/footer.php'); ?>
