<div class='main-top-banner-image'>
<?php
	if ( !$main_top_banner_url = x::meta('main-top-banner_url') ) $main_top_banner_url = 'javascript:void(0)';
	
	if( file_exists( x::path_file( "main-top-banner" ) ) ) echo "<a href='$main_top_banner_url' target='_blank'><img src='".x::url_file( "main-top-banner" )."'></a>";
	else echo "대표 이미지 등록";
	
?>
</div>
<div class='main-top-tab-latest'>
	<?php
		include x::theme('multitab.latest');
	?>
</div>