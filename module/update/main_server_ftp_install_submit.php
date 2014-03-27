<?php


$pu = parse_url( $source_link );
$git_zip_host_url = "https://codeload.github.com";
$url = "$git_zip_host_url$pu[path]/zip/master";

//di($url);
/** sample
<?php
	$file_name = 'samplefilename.zip'
	$file = file_get_contents($url);
	file_put_contents(x::url()."/module/update/$file_name", $file);
?>

*/



// download $url and save it into a file(templorary folder like G5/data folder or /tmp foder) or variable.


// unzip it and correct the folder name if ncessary (rename it to the project name)


// upload the master folder  using phpseclib


