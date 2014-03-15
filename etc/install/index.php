<?php
include_once ('../config.php');
$title = G5_VERSION." 라이센스 확인 1/3";
require_once('./library.check.php');
include_once ('./install.inc.php');
?>

<?php
if ($exists_data_dir && $write_data_dir) {
?>
<form action="./install_config.php" method="post" onsubmit="return frm_submit(this);">

<div class="ins_inner">
    <p>
		<?=ln('
					<p><strong class="st_strong">License Agreement</strong></p><br>
					Check "Agree" and click "Next" to continue
				','
					<p><strong class="st_strong">라이센스(License) 내용을 반드시 확인하십시오.</strong></p><br>
					라이센스에 동의하시는 경우에만 설치가 진행됩니다.
				')?>
    </p>
	&nbsp;<br>

    <div class="ins_ta ins_license">
        <textarea name="textarea" id="ins_license" readonly><?php echo implode('', file('../LICENSE.txt')); ?></textarea>
    </div>

    <div id="ins_agree">
        <label for="agree"><?=ln("Yes, I agree", "네, 동의합니다.")?></label>
        <input type="checkbox" name="agree" value="동의함" id="agree">
    </div>

    <div class="inner_btn">
        <input type="submit" value="<?=ln("CONTINUE", "동의 & 설치 진행")?>">
    </div>
</div>

</form>

<script>
function frm_submit(f)
{
    if (!f.agree.checked) {
        alert("<?=ln("You have to check on the agree box to continue.", "라이센스 내용에 동의하셔야 설치가 가능합니다.")?>");
        return false;
    }
    return true;
}
</script>
<?php
} // if
?>

<?php
include_once ('bottom.php');
?>
<?php exit; ?>
