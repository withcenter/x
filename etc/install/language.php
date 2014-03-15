<?php
setcookie('lang', $_GET['lang'], 0, '/');
?>
<script>
location.href="<?=$_GET['return_url']?>";
</script>
