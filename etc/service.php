<?php
dlog("service begins");

if ( $rsd == 1 ) {
	$domain = etc::domain();
	$url = "http://$domain/$_SERVER[PHP_SELF]?api=metaweblog";
	
	$rsd=<<<EOH
<?xml version="1.0"?>
	<rsd version="1.0" xmlns="http://archipelago.phrasewise.com/rsd">
		<service>
			<engineName>Meta-Weblog API for GNUBoard version 4.8.0</engineName>
			<engineLink>$url</engineLink>
			<homePageLink>$url</homePageLink>
			<apis>
				<api name="MetaWeblog" blogID="$blog_id" preferred="true" apiLink="$url" />
				<api name="Blogger" preferred="false" apiLink="$url" blogID="$blog_id"/>
			</apis>
		</service>
	</rsd>
EOH;
	dlog("RSD\n$rsd");
	echo $rsd;
}


if ( $api == 'metaweblog' ) {
	$path = x::dir() . '/etc/service/metaweblog.php';
	dlog("path: $path");
	include $path;
	exit;
}
