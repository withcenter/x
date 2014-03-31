<div class='title'>Skin Gallery <span class='more-button'><a href="?page=skin_gallery">MORE <img src="<?=x::theme_url('img/more-button.png')?>"/></a></span></div>
	<table cellspacing='0' cellpadding='0' width='100%' class='skin_gallery'>
		<tr valign='top'>
<?php
	$dirs = file::getDirs( x::dir() . '/skin/latest' );
	for ( $i = 1, $image_count = 1; $i <= count($dirs); $i++ ) {
		if ( $image_count % 3 == 1 ) echo "</tr><tr valign='top'>";
 		if ( file_exists( x::dir() . "/skin/latest/".$dirs[$i]."/preview.png" ) ) {		
			$image_count++;
			$img = "<img src='".x::url()."/skin/latest/".$dirs[$i]."/preview.png'>";
			echo "<td>
					<div class='skin-thumb'>
						<div class='inner-skin'>
							<div class='preview'>$img</div>
						</div>
					</div>
				</td>
			";
		}
		if ( $image_count > 6 ) break;
	}
?>

</table>