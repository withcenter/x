<?php

	if ( $in['mode'] == 'forum_setting' ) include_once module('forum_setting');
	else {
		
			$rows = x::forums();
			$no_of_board = count($rows);
			
		?>
	<div class='config config_forum'>
	<div class='config-main-title'>
		<div class='inner'>
			<span class='config-title-info'><img src='<?=module('img/direction.png')?>'> 게시판은 게시판 제목을 입력하시면 생성이 됩니디.</span>
			<span class='config-title-notice'>
				<span class='user-google-guide-button inner-title' page = 'google_doc_forum' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[설명 보이기]</span>
			</span>
			<div style='clear: both'></div>
		</div>
	</div>
		<div class='hidden-google-doc google_doc_forum'>	
		</div>
		<div class='config-wrapper'>
			<div class='config-title'><span class='config-title-info'><span class='title-forum'>게시판 목록</span>
			게시판 수 : <b><?=count($rows)?></span>
			<span class='config-title-notice'><img src='<?=module('img/setting_2.png')?>'></span></div>	
			<div class='config-container'>
		<form class='create-forum' autocomplete='off'>
			<input type='hidden' name='module' value='<?=$module?>' />
			<input type='hidden' name='action' value='config_forum_submit' />
			<input class='create-forum-input' type='text' name='subject' placeholder='게시판 제목을 입력하세요.' />
			<input type='submit' value='생성' class='config-forum-submit'/>
		</form>
		
		<div style='clear:right;'></div>
		
		<table class='board_list' cellpadding=0 cellspacing=0 width='100%'>
			<tr class='header1'>
				<td width=30%><strong>게시판 아이디</strong></td>
				<td width=30%><strong>게시판 제목</strong></td>
				<td width=25%><strong>글 수</strong></td>
				<td width=15% class='padding-extra1'><strong>설정</strong></td>
			</tr>
		<?php
		$i = 0;
		foreach ( $rows as $row ) {
			if ( $i % 2 ) $background="background";
			else $background = null;
			$i++;
			$url = url_forum_list( $row['bo_table'] );
			echo "
				<tr  class='row $background' >
					<td width=3%><a href='$url'>$row[bo_table]</a></td>
					<td width=30%>$row[bo_subject]</td>
					<td width=25% >".number_format($row['bo_count_write'])."</td>
					<td width=15% class='padding-extra2'>
						<a href='?module=$module&action=config_forum&mode=forum_setting&bo_table=$row[bo_table]'><img class='setting-icon' src='".x::url().'/module/'.$module."/img/setting.png' /></a>
					</td>
				</tr>
			";
		}
		?>
		</table>
		<iframe src='javascript:void(0);' name='hidden_iframe' style='width: 100%; height: 300px; display:none;'></iframe>
		</div></div>
	</div>
<?}?>
