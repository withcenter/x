
<div class='item widget'>
	<span class='caption'><?=ln("Widget", "위젯")?></span> :
	<input type='text' name='name' value="<?=$widget_config['name']?>" placeholder=" <?=ln('Select Widget', '위젯을 선택하십시오.')?>">

	<span class='widget-open'><?=ln("Open Widget List", "위젯 목록 열기")?></span>
	<span class='widget-close'><?=ln("Close Widget List", "위젯 목록 닫기")?></span>


	<div class='widget-list'>
		<?php
			$dirs = file::getDirs( x::dir() . '/widget' );
			foreach ( $dirs as $dir ) {
				if ( file_exists( x::dir() . "/widget/$dir/preview.jpg" ) ) {		
					$img = "<img src='".x::url()."/widget/$dir/preview.jpg'>";
					echo "
					<div class='a-widget'>
						<div class='preview'>$img</div>
						<div class='folder'>$dir</div>
					</div>
				";
				}
				
			}
		?>
		<div style='clear:both;'></div>
	</div>
</div>
