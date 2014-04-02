<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/multitab.latest.css' />
<script src='<?=x::url_theme()?>/js/multitab.latest.js'></script>
<div class='multi-tab-latest'>
	<ul class='tab-menu'>
<?php
$tab_menus = x::menu_links();
$posts = array();
$dot = "<img src='".x::url_theme()."/img/dot.png' />";
for ( $i=0; $i< 5; $i++ ) {

	$option = array(
					'domain'=>etc::domain(),
					'bo_table'=>bo_table($i+1),
					'limit'=>10,
					'order by'=>'wr_datetime DESC'
	);
	$posts[$i] = g::posts($option);
	echo "<li tab-menu='menu{$i}'>".$tab_menus[$i]."</li>";
}
?>
	</ul>
	<div style='clear:left;'></div>
<?php
for ( $i=0; $i < 5; $i++ ) {
echo "<div class='tab-submenu-content' tab-submenu='menu{$i}'>";
	if ( $i == 0 ) include 'post.ranking.php';
	echo "<div class='top-subjects'>";
		for( $j=0; $j < 5; $j++ ) {
			if ( $i != 0 ) {
				$date = "<span>".date('Y-m-d', strtotime($posts[$i][$j]['wr_datetime']))."</span>";
			}

			if ( $j == 0 ) $add_class = "class='first-row'";
			else $add_class = null;
			
			$subject = conv_subject ( $posts[$i][$j]['wr_subject'], 20, '...' );
			$url = G5_BBS_URL . '/board.php?bo_table='.$posts[$i][$j]['bo_table']."&wr_id=".$posts[$i][$j]['wr_id'];
			
			echo "<div {$add_class}>$dot<a href='$url'>$subject</a> $date</div>";
		}
	echo "
		</div>
		<div class='bottom-subjects'>";	
		
		for( $j=5; $j < 10; $j++ ) {
			if ( $i != 0 ) {
				$date = "<span>".date('Y-m-d', strtotime($posts[$i][$j]['wr_datetime']))."</span>";
			}
			if ( $j == 5 ) $add_class = "class='first-row'";
			else $add_class = null;
			
			$subject = conv_subject ( $posts[$i][$j]['wr_subject'], 20, '...' );
			$url = G5_BBS_URL . '/board.php?bo_table='.$posts[$i][$j]['bo_table']."&wr_id=".$posts[$i][$j]['wr_id'];
			
			echo "<div {$add_class}>$dot<a href='$url'>$subject</a> $date</div>";
		}
echo "</div>
	</div>";	
	}
?>	
</div>

<style>
	.tab-selected {
		background:url('<?=x::url_theme()?>/img/bar.png') repeat-x;
	}
</style>