<?php
$extra = ms::get_extra();
$option = db::rows("SELECT * FROM $g5[write_prefix]".$extra['menu_1']." ORDER BY wr_num");
for ( $i = 0; $i <= 2; $i++) { 
	if( !$option[$i]['wr_subject'] == '' ) {?>
		<div class='post-container'>
			<a href='<?=g::url()?>/bbs/board.php?bo_table=<?=$extra['menu_1']?>'>
				<span class='subject'><?=$option[$i]['wr_subject']?></span><br><span class='post-content'><?=$option[$i]['wr_content']?></span>
			</a>
		</div>
<?}}?>

<? 
	/** display 5 posts from each forum that is selected by the user on Config_Global */
	for ( $i = 1; $i <= 10; $i++ ) { 
		if ( $extra['forum_no_'.$i] != '' ) {
			$option = db::row( "SELECT bo_subject, bo_count_write FROM $g5[board_table] WHERE bo_table='".$extra['forum_no_'.$i]."'" );
			echo latest( "x-latest-blog" , $extra['forum_no_'.$i] , 5 , 25 );
		}
	}


	