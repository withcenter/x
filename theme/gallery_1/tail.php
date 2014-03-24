
			</div><!--content-->						
	</div><!--body-wrapper-->	
	<div class='footer-wrapper'>
		<div class='footer'>
			<div class='footer-menu-copyright'>			
				<div class='footer-menu'>
					<ul>
						<?="<li class='first-menu'>" . implode( "</li><li>", x::menu_links('bottom') ) . "</li>"?>
					</ul>
					<div style="clear: left"></div>
				</div>
				<div class='copyright'>									
					<? 
						if ( $footer_text = meta('footer_text') ) echo nl2br($footer_text); 
						else echo "어드민 페이지에서 하단 문구를 입력해 주세요";
					?>
				</div>				
			</div>
			<div class='footer-search-logo'>
				<div class='footer-search'>
					<fieldset id="search_field">
							<legend>사이트 내 전체검색</legend>
							<form name="gallery_1_search_form" method="get" action="<?=x::url()?>" onsubmit="return fsearchbox_submit(this);">
							<input type="hidden" name="module" value="post">
							<input type="hidden" name="action" value="search">
							<input type='hidden' name='search_subject' value=1 />
							<input type='hidden' name='search_content' value=1 />
							<table cellpadding=0 cellspacing=0 width='100%'><tr>
								<td>
									<input type="text" name="key" id="gallery_1_search_text" maxlength="20" placeholder='검색어를 입력해 주세요.' autocomplete='off'>
								</td>
								<td>
									<input type="image" src='<?=x::url_theme()?>/img/footer_search_icon.png' id="gallery_1_search_submit">
								</td>
							</table>							
							</form>				
						</fieldset>			
				</div>
				<div class='footer-logo'>
					<img src="<?=x::theme_url('img/footer_logo.png')?>"/>
				</div>
			</div>
			<div style='clear: left'></div>
		</div>
	</div><!--footer-wrapper-->
</div><!--layout-->

<style>
	.footer-wrapper {
		background: url('<?=x::theme_url("img/footer_bg.png")?>');
	}
</style>