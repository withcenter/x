<div class='page-header'>
	<div>
		생성된 사이트 목록						
	</div>
</div>
<div class='content'>
<?
	$rows = db::rows("SELECT * FROM x_site_config ORDER BY `domain`");	
	if( !$rows ) {echo "empty"; return;}
	?>
	<div class='listed_posts left'>
		<div class='inner'>
		<?				
			$skipped_domains = 0;
			
			foreach( $rows as $r ){
				if ( $r['domain'][0] == '.' ) continue;
				$user_domains[] = $r;
			}			
			
			$total_domains = count( $user_domains );
			
			for( $i = 0; $i < ceil($total_domains/2); $i++ ) {
				if ( $user_domains[$i]['domain'][0] == '.' ) continue;
				$url = site_url( $user_domains[$i]['domain'] );
				$title = meta_get( $user_domains[$i]['domain'], 'title' );
				$theme = meta_get( $user_domains[$i]['domain'], 'theme' );
				if($user_domains[$i]['mb_id']) $site_owner = $user_domains[$i]['mb_id'];
				else $site_owner = "none";
				
				if( ($i + 1) >= $total_domains/2 ) $last_post = 'last_post';								
				?>
			<div class = 'list_item <?=$last_post?>'>
				<a href='<?=$url?>' target='_blank'><?=$user_domains[$i]['domain']?> - <?=$site_owner?> : <?=$title?> , <?=$theme?></a>
			</div>
		<?
			}
			$last_post = null;
		?>
		</div>
	</div>
	<div class='listed_posts right'>
		<div class='inner'>
		<?	
			for( $i =  ceil($total_domains/2); $i < $total_domains; $i++ ) {
				if ( $user_domains[$i]['domain'][0] == '.' ) continue;
				$url = site_url( $user_domains[$i]['domain'] );
				$title = meta_get( $user_domains[$i]['domain'], 'title' );
				$theme = meta_get( $user_domains[$i]['domain'], 'theme' );
				if($user_domains[$i]['mb_id']) $site_owner = $user_domains[$i]['mb_id'];
				else $site_owner = "none";
				
				if( ($i + 1) == $total_domains ) $last_post = 'last_post';
				
				?>
			<div class = 'list_item <?=$last_post?>'>
				<a href='<?=$url?>' target='_blank'><?=$user_domains[$i]['domain']?> - <?=$site_owner?> : <?=$title?> , <?=$theme?></a>
			</div>
		<?
			}
			
			$last_post = null;
		?>
		</div>
	</div>
	<div style='clear:both'></div>
</div>
