<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta charset="utf-8"/>
<meta name="robots" content="all"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no"/>
<link rel="stylesheet" href="<!--{$tpl_path}-->css/common.css"/>
<script type="text/javascript" src="<!--{$tpl_path}-->js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<!--{$tpl_path}-->js/responsiveslides.min.js"></script>
<script type="text/javascript" src="<!--{$tpl_path}-->js/slide.js"></script>
<script type="text/javascript" src="<!--{$tpl_path}-->js/common.js"></script>
<script type="text/javascript" src="<!--{$tpl_path}-->js/jcarousellite.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#j-nav-btn").click(function () {
            $("#j-head-menu").show();
            $(".mask").show();
        });
    });
    $(function () {
        $(".mask").click(function () {
            $(this).hide();
            $("#j-head-menu").hide();
        });
    });
</script>
