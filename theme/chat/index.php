<?
/*currently I set the height to 420px just to display 3 student comments*/
?>

<iframe class="iframe-data" src="https://iframe.ontue.com//?module=post&amp;post_id=rate_teacher&amp;user_id=&amp;idx=&amp;action=list"
border="0" frameborder="0" scrolling="no" scrollbar="no" allowtransparency="true" height='100%' style="height: 420px; width: 699px"></iframe>

<br>
<div>
<?php
//  최신글
$sql = " select bo_table from `{$g5['board_table']}` a left join `{$g5['group_table']}` b on (a.gr_id=b.gr_id)  where a.bo_device <> 'mobile' order by b.gr_order, a.bo_order LIMIT 3";
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