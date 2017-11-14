<link rel="stylesheet" href="<!--{$tpl_path}-->css/common.css" type="text/css">
<script type="text/javascript" src="<!--{$tpl_path}-->js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<!--{$tpl_path}-->js/TouchSlide.1.1.js"></script>
<script>
    function build_url_js(c, m, arg, d, rewrite) {
        var c = c.toLowerCase();
        var url = {};
        var build = '';
        var query = '';
        if (rewrite == 1) {
            var keywords = arg.keywords;
            return "/search/?keywords=" + encodeURI(keywords);
        }
        if (d != undefined) {
            $.extend(url, {"d": d});
        }
        if (c != undefined) {
            $.extend(url, {"c": c});
        }
        if (m != undefined) {
            $.extend(url, {"m": m});
        }
        if (typeof arg == 'object') {
            $.extend(url, arg);
        }
        query = $.param(url);
        if (query.length > 0) {
            query = '?' + query;
        }
        build = "/index.php" + query;
        return build;
    }
    $(function(){
        $('#search-btn').click(function(){
            window.location = build_url_js('index','search',{'keywords': $('#search-input').val()},undefined,rewrite = $('#search-input').attr('data-rewrite'));
            // window.location = $('#search-form').attr('action') + "&keywords=" + $('#search-input').val();
        });
    });
</script>



