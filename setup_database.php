<?php
require_once(dirname(__FILE__) . '/db.php');

/* 
 * REQUIRES:
 * CREATE DATABASE <db_name>;
 * CREATE USER <user>@<host> IDENTIFIED BY <password>;
 * GRANT ALL ON <dbname>.* TO <user>@<host>;
 */

$sql = <<<'SQL'
DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `GID` int(11) unsigned NOT NULL, 
  `Title` varchar(255) DEFAULT NULL,
  `steam_id` varchar(255) DEFAULT NULL,
  `amazon_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`GID`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS `game_prices`;
CREATE TABLE IF NOT EXISTS `game_prices` (
  `PID` int(11) unsigned NOT NULL,
  `GID` int(11) unsigned NOT NULL,
  `Price` varchar(255) DEFAULT NULL,
  `on_sale` tinyint(1) unsigned DEFAULT 0,
  `When` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PID`),
  INDEX (`GID`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE=utf8_bin;
SQL;

DB::exec($sql);

/*
foreach(DB::query("SELECT 1") as $row) {
  print_r($row);
}
 */
?>
