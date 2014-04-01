<div class='main-menu-wrapper'>
<div class='main-menu'>
<ul>
	<li class='first-item home'><div class='inner'><a href='<?=g::url()?>'>홈</a></div></li>
	<?="<li><span class='menu-divider'></span></li><li>" . implode( "</li><li><span class='menu-divider'></span></li><li>", x::menu_links() ) . "</li>"?>
</ul>
</div>
<div style='clear:left;'></div>
</div>
<style>
.main-menu a[href*='<?=$bo_table?>'] {
	border-bottom: solid 2px #1789a2;
}
</style>


<script>
	$(function(){				
		if( '<?=$in['bo_table']?>' == '' ) $(".main-menu .home").addClass("selected");
	});
</script>