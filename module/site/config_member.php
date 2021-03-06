<div class='config config-member'>
<?php
if ( !admin() ) {
	return; 
}
	
	if ( $in['option'] == 'mb_edit' ) include_once 'config_member_edit.php';
	else {
		$cond = null;
		if ( $in['username'] || $in['block'] || $in['resign'] ) {
			$q = array();
			if ( $username ) $q[] = "( mb_id LIKE '%{$username}%' OR mb_nick LIKE '%{$username}%' )";
			if ( $block ) $q[] = "mb_intercept_date	 <> ''";
			if ( $resign ) $q[] = "mb_leave_date <> ''";
			
			if ( $q ) $cond =  " AND ".implode (" AND ", $q );
		}	
	
		
		if ( $in['page_no'] ) $page_no = $in['page_no'];
		else $page_no = 1;
		$no_of_post = 20;
		$start = ( $page_no - 1 ) * $no_of_post;
		
		if ( empty($domain) ) $domain = etc::domain();
		if ( $domain == 'NO DOMAIN' ) $domain_cond = " AND " .REGISTERED_DOMAIN." = ''";
		else $domain_cond = " AND " .REGISTERED_DOMAIN."='$domain'";
		
		
		$total_post = db::result ( "SELECT COUNT(*) FROM ".$g5['member_table']." WHERE  mb_id <> 'admin' $domain_cond $cond" );
		$rows = db::rows("SELECT * FROM ".$g5['member_table']." WHERE mb_id <> 'admin' $domain_cond $cond ORDER BY mb_no DESC LIMIT $start, $no_of_post");
?>
	<div class='config-main-title'>
		<div class='inner'>
			<img src='<?=module('img/direction.png')?>'> 회원 관리
		</div>				
	</div>

	<div class='config-main-container'>

		<div class='config-wrapper'>						
			<div class='config-title'>
				<span class='config-title-info'>회원 관리<span class='no-of-member'>검색 회원수: <strong><?=$total_post?></strong></span></span>
				<span class='config-title-notice'>
					<span class='user-google-guide-button' page = 'google_doc_member' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[설명 보이기]</span>
					<img src='<?=module('img/setting_2.png')?>'>
					</span>
			</div>	
			<div class='config-container'>

			<div class='hidden-google-doc google_doc_member'>	
			</div>
			
			<div class='search-form'>
				<form method='get'>
					<input type="hidden" name="module" value="<?=$module?>" />
					<input type="hidden" name="action" value="<?=$action?>" />
					<input type='hidden' name='domain' value="<?=$domain?>" />
					
					<span>아이디/닉네임 <input type="name" name="username" value="<?=$username?>" placeholder='아이디'/></span>
					<span>탈퇴한 회원 <input type='checkbox' name='resign' value=1 <?=$resign?'checked=1':''?>/></span>
					<span>차단된 회원 <input type='checkbox' name='block' value=1 <?=$block?'checked=1':''?>/></span>
					
					<input type="submit" value="검색" class='config-member-submit'/>
					
				</form>
			</div>

			<table class='config-member-table' cellpadding=0 cellspacing=0 width='100%' border='0'>
				<tr class='table-header' valign='top'>
					<td align='center'>번호</td>
					<td>아이디</td>
					<td>닉네임</td>
					<td>가입일</td>
					<td>탈퇴일</td>
					<td>차단일</td>
					<td>설정</td>
				</tr>
			<?php
				$setting_icon = "<img src='".x::url()."/module/".$module."/img/setting.png' />";
				foreach ( $rows as $m ) {
				
			?>
				<tr>
					<td align='center' class='member-no'><?=$m['mb_no']?></td>
					<td><?=$m['mb_id']?></td>
					<td><?=$m['mb_nick']?></td>
					<td><?=$m['mb_open_date']?></td>
					<td>
						<?=$m['mb_leave_date']?$m['mb_leave_date'] : '활동중'?>
					</td>
					<td><?=$m['mb_intercept_date']?$m['mb_intercept_date'] : '활동중'?></td>
					<td>&nbsp;&nbsp;<a href='<?=x::url()?>/?module=site&action=config_member&option=mb_edit&mb_id=<?=$m['mb_id']?>'><?=$setting_icon?></a></td>
				</tr>
			<? }?>
			</table>
		<?php
			/* 페이징 */
			$navigator_option = array ( 
										'total_post'=> $total_post,
										'page_no'=>$page_no,
										'no_of_post'=>$no_of_post,
										'no_of_page'=>10
			);


			if ( $navigator_option['total_post']  % $navigator_option['no_of_post'] == 0) $pages =  intval( $navigator_option['total_post']  / $navigator_option['no_of_post'] );
			else $pages =  intval( $navigator_option['total_post']  / $navigator_option['no_of_post'] )  + 1;

			$pn = array();
			$pn = array_chunk( range(1, $pages), $navigator_option['no_of_page'] );

			if ( empty($in['nav_no'] ) ) $nav_no = 1;
			else $nav_no = $in['nav_no'];

			unset( $in['nav_no'] );
			unset( $in['page_no'] );


			$qs = http_build_query ( $in );

			echo "
				<div class='paging'>
					<a class='first_page_no page_no' href='".x::url()."/?$qs&nav_no=1&page_no=1'>&lt;&lt;</a>
				";
					
			if ( $nav_no > 1 ) {
				echo "<a class='button page_no' href='".x::url()."/?$qs&nav_no=".($nav_no - 1)."&page_no=".$pn[$nav_no - 2][0] ."'>이전</a>";
			}

			$start = $nav_no - 1;
			for ( $i = 0; $i < $navigator_option['no_of_page'];  $i++ ) {
				if ( $no = $pn[$start][$i] ) {
					if ( $no == $page_no ) $add_class = "selected";
					else $add_class = null;
					
					echo "<a class='page_no $add_class' href='".x::url()."/?$qs&nav_no=$nav_no&page_no=".$no."'>".$no."</a>";
				}
			}
			if ( $nav_no < count ( $pn ) ) {
				echo "<a class='button page_no' href='".x::url()."/?$qs&nav_no=".($nav_no + 1). "&page_no=".$pn[$nav_no][0]."'>다음</a>";
			}
			echo "
					<a class='last_page_no page_no' href='".x::url()."/?$qs&nav_no=".count( $pn ) ."&page_no=$pages'>&gt;&gt;</a>
				</div>
			";
		}
		
			if ( $is_admin == 'super' ) echo "<a class='x-admin-button' href='".x::url()."/?module=statics&action=admin_member'>X Admin으로 이동</a>";
		?>
			</div>
		</div>
	</div>
</div>