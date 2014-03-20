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
					<div class='inner'>
						<div class='lower-title'>
							LOWER-LEFT
						</div>
						<div class='bottom-bar'></div>
						
					</div>
				</div>
				<div class='lower-middle'>
					<div class='inner'>
						<div class='lower-middle-title'>
							TEMPLATES
						</div>
						<div class='bottom-bar'></div>
						<div class='lower-middle-1'><img src="<?=x::theme_url('img/middle_lower_1.png')?>"/></div>
						<div class='lower-middle-2'><img src="<?=x::theme_url('img/middle_lower_2.png')?>"/></div>
						<div class='lower-middle-3'><img src="<?=x::theme_url('img/middle_lower_3.png')?>"/></div>			
						</div>
				</div>
				<div class='lower-right'>
					<div class='inner'>
						<?include x::theme('latest_posts')?>
					</div>
				</div>
				<div style='clear: both'></div>
			</div>
		</td>
	</tr>
</table>
