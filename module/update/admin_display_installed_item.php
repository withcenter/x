<?php



	$name = $config['name'][L];
	
	if ( empty($name) ) return;
	
	$url = x::url()."/$type/".$dir.'/preview.jpg';
?>
	
	<div class='theme'>
		<div class='photo'><img src='<?=$url?>' ></div>
		<div class='name'><?=$name?></div>
		<div class='button'>[ <?=lang("Update", "업데이트")?> | 
		<a href='?module=update&action=admin_uninstall&type=<?=$type?>&name=<?=$dir?>'><?=lang("Delete", "삭제")?></a>
		]</div>
	</div>
	
	