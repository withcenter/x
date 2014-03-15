<div id="ins_bar">
    <span id="bar_img">www.eXtended.kr</span>
    <span id="bar_txt">
	
		<? if ( strpos( $_SERVER['PHP_SELF'], "install_config.php" ) ) { ?>
		
		<? } else { ?>
	
		<?=ln("언어선택","Choose Your Language")?> :
		<a href='<?=url_language('en')?>'>English (en)</a> | <a href='<?=url_language('ko')?>'>한국어 (ko)</a></span>
		<? } ?>
</div>
