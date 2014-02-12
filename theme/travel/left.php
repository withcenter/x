<div class='popular-posts'>
<span><img src="<?=x::url_theme()?>/img/popular_icon.jpg"><span class='label'>Popular Posts</span></span>
<table width='90%' cellpadding='10px'>
	<tr><td><a href='#'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></td></tr>
	<tr><td><a href='#'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></td></tr>
</table>
<p><a href='#'>view more</a></p>
</div>

<?php
$bo_table = ms::board_id(etc::domain()).'_1';
echo latest("x-latest-newpost", $bo_table, 5, 25);
?>