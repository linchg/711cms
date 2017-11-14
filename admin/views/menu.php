<!-- 左侧菜单开始 -->
<div class="left_nav">
    <?php
        $menu = $_menu;

        for($i = 0; $i < count($menu); $i++) {
            $sonmenu = $menu[$i]['sonmenu'];
            for($j = 0; $j < count($sonmenu); $j++) {
                $show = $sonmenu[$j]['url'];
				if ($show) {
                    $menu[$i]['selected'] = $show;
                    $uri = $this->input->server('REQUEST_URI');
                    $pos = strpos($uri, $show);
                    if ($pos !== false) {
                        if ($pos + strlen($show) == strlen($uri) || substr($uri, $pos + strlen($show), 1) == '&') {
                            $menu[$i]['sonmenu'][$j]['selected'] = true;
                        }
                    }
                }
            }
        }

        echo '<ul>'."\n";
        foreach ($menu as $a) {

            $target   = !empty($a['target'])    ? ' target="'.$a['target'].'" ' : '';
            $li       = !empty($a['url'])       ? $a['url']                     : 'javascript:;';

            echo '<li class="gx-cur">'."\n";
            echo '    <a href="'.$li.'" '.$target.' class="menu_1" style="background:url('.$a['bgimg'].') 32px 0 no-repeat;">'."\n".$a['title'];
            if (!empty($a['rmbimg'])) {
                echo '    <i style="background: url('.$a['rmbimg'].') no-repeat;width: 13px;height: 18px;position: absolute;margin-top: 0px;margin-left:0;"></i>'."\n";
            }
            echo '</a>'."\n";

            if (!empty($a['selected'])) {
                if (is_array($a['sonmenu']) && sizeof($a['sonmenu']) > 0) {
                    foreach($a['sonmenu'] as $b) {
                        $selected = isset($b['selected']) ? 'selected'   : '';
                        $target   = !empty($b['target'])  ? ' target="'.$b['target'].'" ' : '';
                        echo '<a href="'.$b['url'].'" class="menu_2'.$selected.'"'.$target.'>'.$b['title'].'</a>'."\n";
                    }
                }
            }
            echo '</li>'."\n";
        }
        echo '</ul>'."\n";
    ?>
</div>
<!-- 左侧菜单结束 -->
<script>
    $('.left_nav .menu_1').click(function(){
        $('.menu_2, .menu_2selected').hide();
        $(this).siblings().show();
    });
    $('.left_nav a').hide().parent().removeClass('gx-cur');
    $('.left_nav .menu_1').show();
    $('.left_nav .menu_2selected').show().siblings().show().parent().addClass('gx-cur');
</script>
