<link href="<!--{$tpl_path}-->css/common.css" rel="stylesheet"/>
<script type="text/javascript" src="<!--{$tpl_path}-->js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<!--{$tpl_path}-->js/common.js"></script>
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
    function search_app(){
        if($('#search-input').val()!=''){
            window.location = build_url_js('index','search',{'keywords': $('#search-input').val()},undefined,rewrite = $('#search-input').attr('data-rewrite'));
           // window.location = $('#search-input').attr('data-url') + "&keywords=" + $('#search-input').val();
        }
    }
</script>






