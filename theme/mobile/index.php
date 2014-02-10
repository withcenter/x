<?php
	for( $i=1, $ctr=0 ; $i <= 6 ; $i++, $ctr++ ) {
		if( $extra['forum_no_'.$i] ) {
			$posts[$ctr] = db::rows("SELECT * FROM ".$g5['write_prefix'].$extra['forum_no_'.$i]);
			$posts[$ctr]['forum_name'] = db::result("SELECT bo_subject FROM ".$g5['board_table']." WHERE bo_table='".$extra['forum_no_'.$i]."'");
			$posts[$ctr]['bo_table'] = $extra['forum_no_'.$i];
		}
	}
?>
<div class='first-page'>
<img src="<?=ms::url_site(etc::domain()).$extra['img_url'].$extra['banner_1']?>" width=720 height=200></br>
<?php
	$i = 0;
	while($i<=2) {
		echo "<div class='index-posts'><h2>".$posts[$i]['forum_name']."</h2><ul>";
		for( $ctr=0 ; $ctr < 5 ; $ctr++ ) {
			$id = $posts[$i][$ctr]['wr_id'];
			if( $id ) echo "<li><a href=".g::url()."/bbs/board.php?bo_table=".$posts[$i]['bo_table']."&wr_id=$id>".$posts[$i][$ctr]['wr_subject']."</a></li>";
		}
		echo "</ul></div>";
		$i++;
	}
?>
<img src="<?=ms::url_site(etc::domain()).$extra['img_url'].$extra['banner_2']?>" width=720 height=200></br>
<?php
	while($i<=5) {
		echo "<div class='index-posts'><h2>".$posts[$i]['forum_name']."</h2><ul>";
		for( $ctr=0 ; $ctr < 5 ; $ctr++ ) {
			$id = $posts[$i][$ctr]['wr_id'];
			if( $id ) echo "<li><a href=".g::url()."/bbs/board.php?bo_table=".$posts[$i]['bo_table']."&wr_id=$id>".$posts[$i][$ctr]['wr_subject']."</a></li>";
		}
		echo "</ul></div>";
		$i++;
	}
?>
</div>

<style>
.first-page > .index-posts {
	display: inline-block;
	margin: 1em 5em 1em 2em;
	vertical-align: top;
}

.first-page > .index-posts > h2 {
	font-size: 1.5em;
}

.first-page .index-posts > ul {
	margin: 0;
	padding: 0;
}
</style>
