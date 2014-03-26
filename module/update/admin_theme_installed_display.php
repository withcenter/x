<?php


				
	$name = $theme_config['name'][L];
	if ( empty($name) ) return;
	
	if ( empty($theme_config['type']) || $theme_config['type'] == 'none' ) return;
	
	$type = explode(',', $theme_config['type']);
	
	



	$url = x::url().'/theme/'.$dir.'/preview.jpg';
?>
	
	<div class='theme'>
		<div class='photo'><img src='<?=$url?>' ></div>
		<div class='name'><?=$name?></div>
		<div class='button'>[ <?=lang("Update", "업데이트")?> | <a href='?module=update&action=admin_ftp&mode=delete&dir=theme/<?=$dir?>'><?=lang("Delete", "삭제")?></a> ]</div>
	</div>
	
	