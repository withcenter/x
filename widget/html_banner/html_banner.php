<?php
	$path_banner = widget_data_path( $widget_config['code'], 'banner' );
	$url_banner = widget_data_url( $widget_config['code'], 'banner' );
?>


<?php
	if ( empty( $widget_config['html'] ) && ! file_exists( $path_banner ) ) {
		echo ln("Configure HTML & Banner", "HTML 과 배너를 설정하세요.");
		return;
	}

	if ( file_exists( $path_banner ) ) {
		if ( $widget_config['url'] ) $url = $widget_config['url'];
		else $url = "javascript:void(0);";
		if ( $widget_config['target'] ) $target = "target='$widget_config[target]'";
		echo "<a href='$url' $target><img src='$url_banner'></a>";
	}
	
	echo $widget_config['html'];
	
	