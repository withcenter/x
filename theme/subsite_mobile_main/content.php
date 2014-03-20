<link rel="stylesheet" href="<?=x::theme_url()?>/css/content.css">

<table cellspacing='0' cellpadding='0' width='100%' class='content-table'>
	<tr valign='top'>
		<td class='left-content'>
			<div class='left-main-banner'>
				<img src="<?=x::theme_url('img/left_main_banner.png')?>"/>
			</div>
		</td>
		<td width='10' class='content-divider'></td>
		<td class='right-content'>
			<div class='right-main-banner'>
				<img src="<?=x::theme_url('img/right_main_banner.png')?>"/>
			</div>
			<div class='right-lower-panel'>
				<div class='lower-left'>
					<div class='lower-title'>
						<div class='title'>LOWER-LEFT</div>
					</div>
					<img src = '<?=x::url_theme()?>/img/lower-left.png'/>
				</div>
				<div class='lower-middle'>
					<div class='lower-title'>
						LOWER-MIDDLE
					</div>				
				</div>
				<div class='lower-right'>
					<?include x::theme('latest_posts')?>
				</div>
				<div style='clear: both'></div>
			</div>
		</td>
	</tr>
</table>
