<form name="fsearchbox" method="get" action="<?=x::url()?>">
	<input type='hidden' name='module' value='post' />
	<input type='hidden' name='action' value='search' />
	<input type='hidden' name='search_subject' value=1 />
	<input type='hidden' name='search_content' value=1 />
	<input class='key' type='text' name="key" autocomplete='off'><input class='submit' type='image' src='<?=x::url_theme()?>/img/search_icon.png'>
</form>