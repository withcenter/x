<?php
$gmnow = gmdate('D, d M Y H:i:s').' GMT';
header('Expires: 0'); // rfc2616 - Section 14.21
header('Last-Modified: ' . $gmnow);
header('Cache-Control: no-store, no-cache, must-revalidate'); // HTTP/1.1
header('Cache-Control: pre-check=0, post-check=0, max-age=0'); // HTTP/1.1
header('Pragma: no-cache'); // HTTP/1.0

include_once ('../config.php');
$title = G5_VERSION." 초기환경설정 2/3";
include_once ('./install.inc.php');

if (!isset($_POST['agree']) || $_POST['agree'] != '동의함') {
    echo "<div class=\"ins_inner\"><p>라이센스(License) 내용에 동의하셔야 설치를 계속하실 수 있습니다.</p>".PHP_EOL;
    echo "<div class=\"inner_btn\"><a href=\"./\">뒤로가기</a></div></div>".PHP_EOL;
    exit;
}
?>


<form id="frm_install" method="post" action="./install_db.php" autocomplete="off" onsubmit="return frm_install_submit(this)">

<div class="ins_inner">
    <table class="ins_frm">
    <caption>MySQL Information</caption>
    <colgroup>
        <col style="width:150px">
        <col>
    </colgroup>
    <tbody>
    <tr>
        <th scope="row"><label for="">Host</label></th>
        <td>
            <input name="mysql_host" type="text" value="localhost" id="mysql_host">
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="">MySQL User ID</label></th>
        <td>
            <input name="mysql_user" type="text" id="mysql_user">
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="">Password</label></th>
        <td>
            <input name="mysql_pass" type="text" id="mysql_pass">
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="">DB Name</label></th>
        <td>
            <input name="mysql_db" type="text" id="mysql_db">
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="">TABLE prefix</label></th>
        <td>
            <input name="table_prefix" type="text" value="g5_" id="table_prefix">
            <span><?=ln("Recommended not to change.","가능한 변경하지 마십시오")?></span>
        </td>
    </tr>
    </tbody>
    </table>

    <table class="ins_frm">
    <caption><?=ln("Web Site Admin Information", "최고관리자 정보입력")?></caption>
    <colgroup>
        <col style="width:150px">
        <col>
    </colgroup>
    <tbody>
    <tr>
        <th scope="row"><label for=""><?=ln("User ID","회원 ID")?></label></th>
        <td>
            <input name="admin_id" type="text" value="admin" id="admin_id">
        </td>
    </tr>
    <tr>
        <th scope="row"><label for=""><?=ln("Password","비밀번호")?></label></th>
        <td>
            <input name="admin_pass" type="text" id="admin_pass">
        </td>
    </tr>
    <tr>
        <th scope="row"><label for=""><?=ln("Name","이름")?></label></th>
        <td>
            <input name="admin_name" type="text" value="Admin" id="admin_name">
        </td>
    </tr>
    <tr>
        <th scope="row"><label for=""><?=ln("E-mail","이메일")?></label></th>
        <td>
            <input name="admin_email" type="text" value="admin@domain.com" id="admin_email">
        </td>
    </tr>
    </tbody>
    </table>

    <p>
		<?=ln('
        <strong class="st_strong">Warning! This may delete tables in database that are previously installed.</strong><br>&nbsp;<br>
        Click "Next" if you want to continue installation.
		','
		 <strong class="st_strong">주의! 이미 GNUBoard5 Extended 가 존재한다면 DB 자료가 망실되므로 주의하십시오.</strong><br>&nbsp;<br>
        주의사항을 이해했으며, 그누보드 설치를 계속 진행하시려면 다음을 누르십시오.
		')?>
    </p>

    <div class="inner_btn">
        <input type="submit" value="Next">
    </div>
</div>

<script>
function frm_install_submit(f)
{
    if (f.mysql_host.value == '')
    {
        alert('MySQL Host is required.'); f.mysql_host.focus(); return false;
    }
    else if (f.mysql_user.value == '')
    {
        alert('MySQL User is required.'); f.mysql_user.focus(); return false;
    }
    else if (f.mysql_db.value == '')
    {
        alert('MySQL DB is required.'); f.mysql_db.focus(); return false;
    }
    else if (f.admin_id.value == '')
    {
        alert('Super Admin ID is required.'); f.admin_id.focus(); return false;
    }
    else if (f.admin_pass.value == '')
    {
        alert('Super Admin Passsword is required.'); f.admin_pass.focus(); return false;
    }
    else if (f.admin_name.value == '')
    {
        alert('Super Admin Name is required.'); f.admin_name.focus(); return false;
    }
    else if (f.admin_email.value == '')
    {
        alert('Super Amdin E-mail is required.'); f.admin_email.focus(); return false;
    }


    if(/^[a-z][a-z0-9]/i.test(f.admin_id.value) == false) {
        alert('Super Amdin ID must begin with alphabet following alphanumeric.');
        f.admin_id.focus();
        return false;
    }

    return true;
}
</script>

<?php
include_once ('bottom.php');
?>
<?php exit; ?>
