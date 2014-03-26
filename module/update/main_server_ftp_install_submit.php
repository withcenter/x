<?php


$pu = parse_url( $source_link );
$git_zip_host_url = "https://codeload.github.com";
$url = "$git_zip_host_url$pu[path]/zip/master";

//di($url);




// download $url and save it into a file(templorary folder like G5/data folder or /tmp foder) or variable.


// unzip it and correct the folder name if ncessary (rename it to the project name)


// upload the master folder  using phpseclib


