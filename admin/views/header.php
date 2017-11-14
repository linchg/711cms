<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns=http://www.w3.org/1999/xhtml>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>711CMS后台管理</title>
    <link rel="stylesheet" media="screen" type="text/css" href="<?php echo static_url('/css/main.css'); ?>" />
    <link rel="stylesheet" media="screen" type="text/css" href="<?php echo static_url('/js/uploadify/uploadify.css'); ?>" />
    <script language="javascript" type="text/javascript" src="<?php echo static_url('/js/jquery-1.7.1.min.js'); ?>"></script>
    <script language="javascript" type="text/javascript" src="<?php echo static_url('/js/uploadify/jquery.uploadify.min.js'); ?>"></script>
    <script language="javascript" type="text/javascript" src="<?php echo static_url('/js/ckeditor/ckeditor.js'); ?>"></script>
    <?php if(isset($time) && isset($token)):?>
        <script type="text/javascript">
            CKEDITOR.editorConfig = function( config ) {
                config.image_previewText = ' '; //预览区域显示内容
                config.filebrowserUploadUrl = "<?php echo build_url('index','upload_info',array('token'=>$token,'time'=>$time));?>";
            };
        </script>
    <?php else:?>
        <script language="javascript" type="text/javascript" src="<?php echo static_url('/js/ckeditor/cccc.js'); ?>"></script>
    <?php endif;?>
    <script language="javascript" type="text/javascript" src="<?php echo static_url('/js/laydate/laydate.js'); ?>"></script>
    <!--[if lte IE 6]>
    <script language="javascript" type="text/javascript" src="<?php echo static_url('/js/png.js'); ?>" ></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('div, ul, li, input , a, a:hover, h2, b');
    </script>
    <![endif]-->
    <script>
        function show_msg(txt, cancel, okfun, ok,cancelfun) {
            $('.po-ok').hide();
            $('.po-loading').hide();
            $('.po-cancel').hide();
            $('#recommend').hide();
            $('.ly-wrong').hide();
            $('.po-ok').unbind('click').bind('click', function(){
                $('.po-item').hide();
            });
            if (cancel == true) {
                $('.po-cancel').show();
            }
            if (ok != false) {
                $('.po-ok').show();
            } else {
                $('.po-loading').show();
            }
            if (typeof okfun == 'function') {
                $('.po-ok').unbind('click').bind('click', function(){
                    okfun();
                    $('.po-item').hide();
                });
            }
            if(typeof cancelfun == 'function'){
                $('.po-cancel').unbind('click').bind('click', function(){
                    cancelfun();
                    $('.po-item').hide();
                });
            }
            $('.po-item .ss').html(txt);
            $('.po-item').show().offset({top: $(window).scrollTop() + $(window).height() / 2 - 100});
        }
        function show_msg2(txt, cancel, okfun, ok, htm,close) {
            $('.po-ok').hide();
            $('.po-loading').hide();
            $('.po-cancel').hide();
            $('#recommend').hide();
            $('.ly-wrong').hide();
            $('.po-ok,.po-cancel,.ly-wrong').unbind('click').bind('click', function(){
                $('.po-item').hide();
            });
            if (cancel == true) {
                $('.po-cancel').show();
            }
            if (htm == true){
                $('#recommend').show();
            }
            if (close == true){
                $('.ly-wrong').show();
            }
            if (ok != false) {
                $('.po-ok').show();
            } else {
                $('.po-loading').show();
            }
            if (typeof okfun == 'function') {
                $('.po-ok').unbind('click').bind('click', function(){
                    if (!okfun()) {
                        $('.po-item').show();
                    }
                });
            }
            $('.po-item .ss').html(txt);
            $('.po-item').show().offset({top: $(window).scrollTop() + $(window).height() / 2 - 100});
        }

        function show_msg3(okfun, ok) {
            $('.ly-wrong').show();
            $('.po-ok,.po-cancel,.ly-wrong').unbind('click').bind('click', function(){
                $('.po-item2').hide();
            });
            if (typeof okfun == 'function') {
                $('.po-ok').unbind('click').bind('click', function(){
                    okfun();
                    $('.po-item2').hide();
                });

            }
            $('.po-item2').show().offset({top: $(window).scrollTop() + $(window).height() / 2 - 100});
        }

        function show_msg4() {
            $('.ly-wrong').show();
            $('.po-ok,.po-cancel,.ly-wrong').unbind('click').bind('click', function(){
                $('.po-item3').hide();
            });
            $('.po-item3').show().offset({top: $(window).scrollTop() + $(window).height() / 2 - 100});
        }

        function build_url($c, $m, $arg, $d) {
            $url = {};
            if ($d != undefined) {
                $.extend($url, {"<?php echo get_instance()->config->item('directory_trigger'); ?>": $d});
            }
            if ($c != undefined) {
                $.extend($url, {"<?php echo get_instance()->config->item('controller_trigger'); ?>": $c});
            }
            if ($m != undefined) {
                $.extend($url, {"<?php echo get_instance()->config->item('function_trigger'); ?>": $m});
            }
            if (typeof $arg == 'object') {
                $.extend($url, $arg);
            }
            $query = $.param($url);
            if ($query.length > 0) {
                $query = '?' + $query;
            }
            return '<?=admin_index()?>' + $query;
        }
        function check_all(obj) {
            $(obj).prop("checked", !$(obj).prop('checked'));
        }
        var $_site = {
            'upload_path'       : "<?php echo $_site['upload_path']; ?>",
            'upload_path_apk'   : "<?php echo $_site['upload_path_apk']; ?>",
            'version'           : "<?php echo $_site['version'];?>",
            'auth_code'         : "<?php echo $_site['auth_code'];?>"
        };
    </script>
</head>
<body>
