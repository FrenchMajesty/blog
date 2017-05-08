<?php
/// Code by Verdi.K
///
/// 2017 Copyright All rights reserved.

$sitename = "Spirit of Christ Church";
$sitelink = "http://verdiks-macbook-air-2.local/church";
$dbConfig = [
    "host" => "localhost",
    "username" => "root",
    "password" => "",
    "dbname" => "church",
];

spl_autoload_register(function ($classname) {
	$classname = str_replace("\\","/", $classname);
	$class = "src/" . $classname . ".php";
	require_once($class);
});


// Initialize DB Connection
$Database = new Core\Database($dbConfig);
$Database->getConnection();
?>
