<?
	add_stylesheet( "<link rel='stylesheet' type='text/css' href='".x::url()."/module/".$module."/site.css' >" );
	
	if ( ! login() ) return include login_first();
?>

<div class='view-site'>
	<div>
		<div class='title'><div class='inner'>사이트 리스트</div></div>
		<ul>
			<?php
				$i = 0;
				foreach ( sites( my('id') ) as $site ) {
				$i++;
				$date_created = date("Y-m-d H:i:s A",($site['stamp_created']));
				if ( count( sites( my('id') ) ) == $i ) $is_last_count = "last-count";
			 ?>
				<li class='<?=$is_last_count?>'>
					<a href="<?=site_url($site['domain'])?>">
						<div class='info'><span class='item2'>사이트 주소</span><?=$site['domain']?></div>
						<div class='info'><span class='item2'>사이트 제목</span><?=site_title($site['domain'])?></div>
						<div class='info'><span class='item2'>생성일</span><?=$date_created?></div>
					</a>
				</li>
			<? }?>
		</ul>
	</div>
</div>