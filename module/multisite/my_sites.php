<?
	if ( ! login() ) return include login_first();
?>

<div class='view-site'>
	<div>
		<div class='title'><div class='inner'>사이트 리스트</div></div>
		<ul>
			<?php
				$i = 0;
				foreach ( ms::my_site() as $site ) {
				$i++;				
				$date_created = date("Y-m-d H:i:s A",($site['stamp_create']));
				if ( count( ms::my_site() ) == $i ) $is_last_count = "last-count";
			 ?>
				<li class='<?=$is_last_count?>'>
					<a href="<?=ms::url_site($site['domain'])?>">
						<div class='info'><span>사이트 주소</span><?=$site['domain']?></div>
						<div class='info'><span>사이트 제목</span><?=$site['title']?></div>
						<div class='info'><span>생성일</span><?=$date_created?></div>				
					</a>
				</li>
			<? }?>
		</ul>
	</div>
</div>