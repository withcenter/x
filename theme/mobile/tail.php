
    </div>
</div>

<!-- } 콘텐츠 끝 -->

<hr>

<!-- 하단 시작 { -->
<div id="ft">
    <?php echo popular('basic'); // 인기검색어  ?>
    <?php echo visit('basic'); // 방문자수  ?>
    <div id="ft_catch"><?=__FILE__?></div>
    <div id="ft_copy">
        <p>
           <?=$extra['footer_text']?>
            <a href="#">상단으로</a>
        </p>
    </div>
</div>

<?php
if(G5_USE_MOBILE && !G5_IS_MOBILE) {
    $seq = 0;
    $href = $_SERVER['PHP_SELF'];
    if($_SERVER['QUERY_STRING']) {
        $sep = '?';
        foreach($_GET as $key=>$val) {
            if($key == 'device')
                continue;

            $href .= $sep.$key.'='.strip_tags($val);
            $sep = '&amp;';
            $seq++;
        }
    }
    if($seq)
        $href .= '&amp;device=mobile';
    else
        $href .= '?device=mobile';
?>
<a href="<?php echo $href; ?>" id="device_change">모바일 버전으로 보기</a>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
//include_once(G5_PATH."/tail.sub.php");
?>