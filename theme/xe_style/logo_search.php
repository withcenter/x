<div class='logo_search'>
	<table cellpadding=0 cellspacing=0 border=0>
		<tr valign='top'>
			<td width='30%'>
				<a href="<?php echo G5_URL ?>">
					<?if( file_exists( path_logo() ) ) { ?>
							<img src="<?=url_logo()?>">
					<?} else {?>
							<img src='<?=x::url_theme()?>/img/logo.png'>
					<?}?>
				</a>
			</td>
			<td width='40%'>
				<form method="get" action="<?=x::url()?>" autocomplete='off'> 
					<input type="hidden" name="module" value="post">
					<input type="hidden" name="action" value="search">
					<input type='hidden' name='search_subject' value=1 />
					<input type='hidden' name='search_content' value=1 />
					<div class='main-top-search-form'>
						<input type="text" name="key" maxlength="20" placeholder='검색어를 입력해 주세요.'><input type="image" src="<?=x::url_theme()?>/img/search_button.png" />
					</div>
				</form>
				<div class='search-bar-bottom'>
				<?
					$search_bar_menus=x::menu_links( 'top' );
					for ( $i = 0; $i < count($search_bar_menus); $i++ ) {
						echo $search_bar_menus[$i];
						
						if ( ($i + 1) != count( $search_bar_menus ) ) echo " | ";
					}
				?>
				</div>
			</td>
			<td width='30%' valign='bottom'>
				<div class='main-top-right'>
					<?
						$search_bar_menus=x::menu_links( 'bottom' );
						for ( $i = 0; $i < count($search_bar_menus); $i++ ) {
							echo $search_bar_menus[$i];
							
							if ( ($i + 1) != count( $search_bar_menus ) ) echo " | ";
						}
					?>
				</div>
			</td>
		</tr>
	</table>
</div>				