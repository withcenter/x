<form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);">
	<input type="hidden" name="sfl" value="wr_subject||wr_content">
	<input type="hidden" name="sop" value="and">
	<input class='key' type='text' name="stx" autocomplete='off'><input class='submit' type='image' src='<?=x::url_theme()?>/img/search_icon.png'>
</form>