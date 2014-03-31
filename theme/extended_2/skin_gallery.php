<div class='skin_gallery'>
<?php
	$dirs = file::getDirs( x::dir() . '/skin/latest' );
	for ( $i = 1, $image_count = 1; $i <= count($dirs); $i++ ) {
		if ( $image_count % 2 == 1 ) echo "<div style='clear: left'></div>";
 		if ( file_exists( x::dir() . "/skin/latest/$dirs[$i]/preview.png" ) ) {		
			$image_count++;
			$img = "<img src='".x::url()."/skin/latest/$dirs[$i]/preview.png'>";
			echo "
					<div class='skin'>
						<div class='inner-skin'>
							<div class='preview'>$img</div>
							<span class='skin_name'>$dirs[$i]</span>
						</div>
					</div>
			
			";
		}
	}
?>
	<div style="clear: left"></div>
</div>
</div>