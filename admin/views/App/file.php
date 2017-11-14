<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>文件选择</title>
    <link rel="stylesheet" media="screen" type="text/css" href="<?php echo static_url('/css/folder1.css'); ?>"/>
    <script language="javascript" type="text/javascript" src="<?php echo static_url('/js/jquery-1.7.1.min.js'); ?>"></script>
</head>

<body>
<div class="container">
    <div class="head">
        <h1>
            <a href="<?php echo build_url('App', 'file', array('folder' => '/','type'=>$type,'time'=>$time,'token'=>apptoken(array('folder' =>'/','type'=>$type,'time'=>$time),$private))); ?>" style="color: #0000ff;">根目录</a>&nbsp;&nbsp;
            <a href="javascript:history.go(-1);">返回</a>
        </h1>
        <ul class="ula">
            <li class="hli1">名称</li>
            <li class="hli2">修改日期</li>
            <li class="hli3">大小</li>
        </ul>
        <?php foreach ($file['folders'] as $k => $v): ?>
            <ul class="ula11">
                <li class="hli1">
                    <a href="<?php echo build_url('App', 'file', array('folder' => $folder.$v['folder'].'/','type'=>$type,'time'=>$time,'token'=>apptoken(array('folder' => $folder.$v['folder'].'/','type'=>$type,'time'=>$time),$private))); ?>">
                        <img src="<?php echo static_url('/images/folder1/pic2.png'); ?>">
                        <?php echo $v['folder']; ?>
                    </a>
                </li>
                <li class="hli2"><?php echo date('Y-m-d',$v['date']); ?></li>
                <li class="hli2"><?php echo round($v['size']/1024,2); ?>K</li>
            </ul>
        <?php endforeach; ?>

        <?php foreach ($file['apks'] as $k => $v): ?>
            <ul class="ula11">
                <li class="hli1" onclick="send_apk(this)" data-folder="<?php echo $folder;?>">
                    <img src="<?php echo static_url('/images/folder1/apk.png'); ?>">
                    <a><?php echo $v['apk'];?></a>
                </li>
                <li class="hli2"><?php echo date('Y-m-d',$v['date']); ?></li>
                <li class="hli2"><?php echo round($v['size']/1024/1024,2); ?>M</li>
            </ul>
        <?php endforeach; ?>

        <?php foreach ($file['images'] as $k => $v): ?>
            <ul class="ula11">
                <li class="hli1" onclick="send_apk(this)" data-folder="<?php echo $folder;?>">
                    <img src="<?php echo $folder.'/'.$v['image'];?>" width="26px" height="24px">
                    <a><?php echo $v['image'];?></a>
                </li>
                <li class="hli2"><?php echo date('Y-m-d',$v['date']); ?></li>
                <li class="hli2"><?php echo round($v['size']/1024,2); ?>K</li>
            </ul>
        <?php endforeach; ?>

    </div>
</div>
<script type="application/javascript">
        window.returnValue = undefined;
        opener.window.returnValue = undefined;
        function send_apk(obj) {
            var apk = $(obj).find('a').html();
            var folder = $(obj).attr('data-folder');
            window.returnValue = folder + apk;
            opener.window.returnValue = window.returnValue;
            window.close();
        }
</script>
</body>
</html>
