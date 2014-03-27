<?php


$pu = parse_url( $source_link );
$git_zip_host_url = "https://codeload.github.com";
$url = "$git_zip_host_url$pu[path]/zip/master";

//di($url);
/** sample

<?php

	$file = file_get_contents('https://github.com/thruthesky/office/archive/master.zip');
	file_put_contents('c:/work/sapcms_1_2/gnu_x/data/office.zip', $file);

	$zip = new ZipArchive;
	if ($zip->open('c:/work/sapcms_1_2/gnu_x/data/office.zip') === TRUE) {
		$zip->extractTo('c:/work/sapcms_1_2/gnu_x/data/');
		$zip->close();
		echo 'ok';
	} else {
		echo 'failed';
	}
	
	if ( file_exists('c:/work/sapcms_1_2/gnu_x/data/office' ) ) echo "Folder Theme Already Exists";
	else rename( 'c:/work/sapcms_1_2/gnu_x/data/office-master', 'c:/work/sapcms_1_2/gnu_x/data/office' );
	
	unlink ( 'c:/work/sapcms_1_2/gnu_x/data/office.zip' );
	
?>

	
http://ca2.php.net/file_get_contents
*/



// download $url and save it into a file(templorary folder like G5/data folder or /tmp foder) or variable.


// unzip it and correct the folder name if ncessary (rename it to the project name)


// upload the master folder  using phpseclib


