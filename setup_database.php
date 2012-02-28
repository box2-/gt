<?php
require_once(dirname(__FILE__) . '/db.php');

$sql = <<<'SQL'
CREATE TABLE IF NOT EXISTS `games`
  `GID` int(11) unsigned NOT NULL, 
  `Title` varchar(255) DEFAULT NULL,
  `steam_id` varchar(255) DEFAULT NULL,
  `amazon_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`GID`)
ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE=utf8_bin;
SQL;

//DB::exec($sql);

foreach(DB::query("SELECT 1") as $row) {
	print_r($row);
}
?>
