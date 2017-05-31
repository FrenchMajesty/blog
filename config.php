<?php
/// Code by Verdi.K
///
/// 2017 Copyright All rights reserved.

$bloggerName = "Caleb";
$sitename = "Caleb's Design";
$sitelink = "http://verdiks-macbook-air-2.local/blog";
$dbConfig = [
    "host" => "localhost",
    "username" => "root",
    "password" => "",
    "dbname" => "blog",
];

include('./src/Core/TwitterOAuth.php');

spl_autoload_register(function ($classname) {
	$classname = str_replace("\\","/", $classname);
	$class = "src/" . $classname . ".php";
	require_once($class);
});


// Initialize DB Connection
$Database = new Core\Database($dbConfig);
$Database->getConnection();
?>
