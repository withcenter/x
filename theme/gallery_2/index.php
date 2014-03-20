<div class='banner' style='height: 318px; width: 968px; border: solid 1px #333333; text-align: center; font-size: 24pt;'>
BANNER PLACE HOLDER
</div>

<div class='posts-container'>
	<div class='left-posts-container'>
		<?=latest( 'x-latest-left-gallery', bo_table(2) , 3, 40 )?>
	</div>
	<div class='right-posts-container'>
		<div class='right-panel-posts'>
			<div class='right-posts-1'>
				<?=latest( 'x-latest-gallery-posts', bo_table(1), 10, 40 )?>
			</div>
			<div class='right-posts-2'>
				<?=latest( 'x-latest-gallery-posts', bo_table(4), 5, 40 )?>
			</div>
		</div>
		<div class='right-gallery-post'>
			<?=latest( 'x-latest-right-gallery', bo_table(5) , 1, 40 )?>
		</div>
		<div style='clear: left'></div>
	</div>
	<div style='clear: left'></div>
</div>


