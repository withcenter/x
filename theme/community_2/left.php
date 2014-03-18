<?=outlogin('x-outlogin-community-2')?>
<div class='company-banner'>
	<a href='http://www.philgo.com' target='_blank'><img src='<?=x::url_theme()?>/img/company_banner.png' /></a>
</div>
<?php
include 'popular.posts.php';
include 'new.posts.php';
echo visit('x-visit-community-1');
