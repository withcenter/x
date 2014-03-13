

<ul>
<?for ( $i = 1; $i <= 7; $i++ ) {
	if( $i == 7 ) $no_margin = "class = 'no-margin'";
	else $no_margin = null;
?>
	<li <?=$no_margin?> menu_num = 'menu_<?=$i?>'>
	<a href='#'><img src='<?=x::url_theme()?>/img/icon<?=$i?>.png'/></a>
	<div class='label'><a href='#'>Menu</a></div>
	</li>
<?}?>
</ul>