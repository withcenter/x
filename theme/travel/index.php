<table width='100%' class='index-banner'>
	<tr>
		<td align='left'>
			<?if( $extra['banner_1'] ) {?><img src="<?=ms::url_site(etc::domain()).$extra['img_url'].$extra['banner_1']?>"><br><?}?>
		</td>
		<td align='right'>
			<?if( $extra['banner_1'] ) {?><img src="<?=ms::url_site(etc::domain()).$extra['img_url'].$extra['banner_2']?>"><br><?}?>
		</td>
	</tr>
</table>
<div>
<?php
//  최신글
$sql = " select bo_table from `{$g5['board_table']}` a left join `{$g5['group_table']}` b on (a.gr_id=b.gr_id)  where a.bo_device <> 'mobile' order by b.gr_order, a.bo_order LIMIT 9";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {

?>
    <div style="float:left;<?php echo $lt_style ?>">
        <?php
        // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
        // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
        echo latest("community", $row['bo_table'], 5, 25);
        ?>
    </div>
<?php
}
?>
</div>