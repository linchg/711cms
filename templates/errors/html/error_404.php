<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Error</title>
    <style type="text/css">
        body {
            background-color: #fff;
            margin: 40px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }

        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
        }

        h1 {
            border-bottom: 1px solid #C8E0F1;
            background-color: #EEF5FF;
            margin: 0px;
            padding: 7px 0;
            font-family: "Microsoft Yahei";
            font-size: 18px;
            text-indent: 1.1em;

        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 15px;
        }

        #container {
            border: 1px solid #C8E0F1;
            background: #fff;
            overflow: hidden;
            width: 500px;
            margin: 0 auto;
        }

        p{
            margin: 12px 15px 12px 15px;
        }
        .ft-nav{ text-align: center; margin: 30px 0 0 0;}
        .ft-nav a{ margin: 0 7px;}
        .ft-nav .copyright{ padding: 20px 0 0;}
    </style>
</head>
<body>
<div id="container">
    <h1><?php echo $heading; ?></h1>
    <?php echo $message; ?>
</div>
<div class="ft-nav">
    <a href="http://www.711cms.com">711cms</a><a href="http://bbs.711cms.com">论坛</a><a href="http://bbs.711cms.com">安装问题</a>
    <div class="copyright"> Copyright @ 2014-2016
        <a href="http://www.711cms.com" target="_blank">711CMS</a>
        版权所有 powered by <a href="http://www.711cms.com" target="_blank">711CMS</a></div>
</div>

</body>
</html>
