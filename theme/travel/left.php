<div class='popular-posts'>
<span><img src="<?=x::url_theme()?>/img/popular_icon.jpg"><span class='label'>조회수가 많은 글</span></span>
<?include x::theme('popular_posts');?>

</div>

<?php
$bo_table = ms::board_id(etc::domain()).'_1';
echo latest("x-latest-newpost", $bo_table, 5, 25);
?>