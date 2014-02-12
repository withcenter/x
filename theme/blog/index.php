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