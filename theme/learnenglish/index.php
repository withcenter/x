<?php
	for( $i=1, $ctr=0 ; $i <= 9 ; $i++, $ctr++ ) {
		if( $extra['forum_no_'.$i] ) {
			$posts[$ctr] = db::rows("SELECT * FROM ".$g5['write_prefix'].$extra['forum_no_'.$i]);
			$posts[$ctr]['forum_name'] = db::result("SELECT bo_subject FROM ".$g5['board_table']." WHERE bo_table='".$extra['forum_no_'.$i]."'");
			$posts[$ctr]['bo_table'] = $extra['forum_no_'.$i];
		}
	}
?>
<div style='width: 430px'> 
	<div class='main-banner'>
		<h2><?=$extra['banner1_text1']?></h2>
		<img src="<?=ms::url_site(etc::domain()).$extra['img_url'].$extra['banner_1']?>">
		<p><?=$extra['banner1_text2']?></p>
	</div>
	<div class='important-post'>
	<?	$i=0;
		echo "<ul>";
		for( $ctr=0 ; $ctr < 5 ; $ctr++ ) {
			$id = $posts[$i][$ctr]['wr_id'];
			$date = explode(" ", $posts[$i][$ctr]['wr_datetime']);
			if( $id ) echo "<li><a href=".g::url()."/bbs/board.php?bo_table=".$posts[$i]['bo_table']."&wr_id=$id><span>".$date[0].'</span>'.mb_substr($posts[$i][$ctr]['wr_subject'],0,50)."</a></li>";
		}
		echo "</ul>";
	?>
	</div>
	<table cellspacing=0 cellpadding=0 width='100%'>
	<?php
		$i = 1;
		$tr = 0;
		while($i<=2) {
			$tr++;
			if($tr==3) echo "<tr>";
			echo "<td valign='top'><div class='primary'><h2>".$posts[$i]['forum_name']."</h2><ul>";
			for( $ctr=0 ; $ctr < 5 ; $ctr++ ) {
				$id = $posts[$i][$ctr]['wr_id'];
				if( $id ) echo "<li><a href=".g::url()."/bbs/board.php?bo_table=".$posts[$i]['bo_table']."&wr_id=$id>".mb_substr($posts[$i][$ctr]['wr_subject'],0,25)."</a></li>";
			}
			echo "</ul></div></td>";
			if($tr==2	) {echo "</tr>"; $tr=0;}
			$i++;
		}
	?>
	</table>
</div>
<div style='width: 500px'>
	<?php
	$sql = " select bo_table from `{$g5['board_table']}` a left join `{$g5['group_table']}` b on (a.gr_id=b.gr_id)  where a.bo_device <> 'mobile' order by b.gr_order, a.bo_order LIMIT 6";
	$result = sql_query($sql);
	for ($i=0; $row=sql_fetch_array($result); $i++) {

	?>
		<div style="float:left; width: 215px">
			<?php
			echo latest("x-latest-community", $row['bo_table'], 5, 25);
			?>
		</div>
	<?php
	}
	?>
</div>