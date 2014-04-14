		</div><!--content-->
	</div><!--content-wrapper-->
	
	<div class='footer-wrapper'>
		<div class='footer'>
			<div class='footer-logo'>
				<div class='inner'>
					<?php
						if( file_exists( x::path_file( "gallery4_footer_logo" ) ) ) echo "<img src='".x::url_file( "gallery4_footer_logo" )."'>";
						else {
							$img = "<img src='".x::url_theme()."/img/footer_logo_default.png' />";
						}
					?>
					<img src="<?=$img?>"/>
				</div>
			</div>
			<div class='footer-right'>
				<div class='inner'>
					<div class='footer-menu'>
						<ul>
							<?="<li>" . implode( "</li><li>", x::menu_links('bottom') ) . "</li>"?>
						</ul>
						<div style='clear: left'></div>
					</div>
					<div class='footer-text'>
						<? if( $gallery4_contact_number = x::meta('gallery4_contact_number') ) echo "<div>$gallery4_contact_number</div>" ?>
						<?if ( x::meta('footer_text')) echo "<div>".nl2br(x::meta('footer_text'))."</div>";
						else {?>
							<div>회원님께서는 현재 필고 <b style='color:#506ab6;'>갤러리 테마 No.3</b>을 선택 하셨습니다.</div>
							<div>하단 문구는 사이트 설정에서 수정하실 수 있습니다.</div>
						<?}?>					
					</div>
				</div>
			</div>
			<div style='clear: left'></div>
		</div>
	</div>
	</div><!--inner_layout-->
</div><!--layout-->


<link rel="stylesheet" href="<?=x::theme_url('css/after.css')?>">

<? if ( $_SERVER['SCRIPT_NAME'] != '/index.php' ) { ?>
	<style>
		.layout .content {
			max-width: 970px;
			margin: 0 auto;
			padding: 1%;
		}
	</style>
<? } ?>