<div class='site_top'>
	<div class='inner'>
		<a href='<?=g::url()?>'>홈</a>
		<a href='<?=G5_BBS_URL?>/board.php?bo_table=<?=ms::board_id( etc::domain() ).'_1'?>'>자유토론</a>
		<? if ( !login() ) { ?> <a href='<?=G5_BBS_URL?>/register.php'>회원가입</a> <? } ?>
		<a href='<?=g::url()?>/?page=intro'>회사소개</a>
		<a href='<?=G5_BBS_URL?>/board.php?bo_table=<?=ms::meta('qna_forum')?>'>고객지원</a>
	</div>
</div>
