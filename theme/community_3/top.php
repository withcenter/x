
		<div class='inner'>
			<?
			?>
			<div class='left'>
				<a href='<?=g::url()?>'><?=lang('HOME')?></a>
				<? if ( login() ) { ?>
					<a href='<?=G5_BBS_URL?>/logout.php'><?=lang("SIGN-OUT")?></a>
					<a href='<?=G5_BBS_URL?>/member_confirm.php?url=register_form.php'><?=lang('ACCOUNT')?></a>
				<? } else { ?>
					<a href='<?=G5_BBS_URL?>/login.php'><?=lang('SIGN-IN')?></a>
					<a href='<?=G5_BBS_URL?>/register.php'><?=lang('REGISTER')?></a>
				<? } ?>
				
				
				<? 
					for ( $i=1; $i <=3; $i++ ) {
						 if ( x::meta('forum_no_'.$i.'_name') ) {
							$top_menu = x::meta('forum_no_'.$i.'_name');				
						  }
						  else {
							$row = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".meta('forum_no_'.$i)."'");
							$top_menu = $row['bo_subject'];
						 }		
							
						
						if ( $top_menu ) {?>
						
						<a page = '<?=x::meta('forum_no_'.$i)?>' href='<?=G5_BBS_URL?>/board.php?bo_table=<?=x::meta('forum_no_'.$i)?>'><?=cut_str($top_menu,10,'...')?></a>
						
					<?	}
					}
				?>
				
			</div>
			
			<div class='right'>
				<? 
					for ( $i=4; $i <=6; $i++ ) {
						 if ( x::meta('forum_no_'.$i.'_name') ) {
							$top_menu = x::meta('forum_no_'.$i.'_name');				
						  }
						  else {
							$row = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".meta('forum_no_'.$i)."'");
							$top_menu = $row['bo_subject'];
						 }	
							
						
						if ( $top_menu ) {?>
						
						<a page = '<?=x::meta('forum_no_'.$i)?>' href='<?=G5_BBS_URL?>/board.php?bo_table=<?=x::meta('forum_no_'.$i)?>'><?=cut_str($top_menu,10,'...')?></a>
						
					<?	}
					} 
				?>
			
				<? if ( !$com3_contact_number = x::meta('tel') ) $com3_contact_number = '+82 070 7529 1749'?>
				<a href='javascript:void(0)' class='contact-num'><?=lang("CALL")?> : <?=$com3_contact_number?></a>
				
				<a href='<?=url_language_setting()?>'><?=lang("Change Language")?></a>
				<a href='<?=g::url()?>?device=mobile'><?=lang("Mobile View")?></a>
			</div>
			
			
			
			
		</div>