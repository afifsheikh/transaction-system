<?php
	if(!empty($_ENV['MYSQL_HOST']))
   $DB_SERVER = $_ENV['MYSQL_HOST'];
else
   $DB_SERVER = 'moe-mysql-app';
if(!empty($_ENV['MYSQL_USER']))
   $DB_USERNAME = $_ENV['MYSQL_USER'];
else
   $DB_USERNAME = 'geekware_etsbanking';
if(!empty($_ENV['MYSQL_PASSWORD']))
   $DB_PASSWORD = $_ENV['MYSQL_PASSWORD'];
else
   $DB_PASSWORD = 'DIEqFfC@e_v@';
if(!empty($_ENV['MYSQL_DB']))
   $DB_DATABASE = $_ENV['MYSQL_DB'];
else
   $DB_DATABASE = 'geekware_bankingsystem';
//echo "Connecting to Database: $DB_SERVER $DB_USERNAME $DB_PASSWORD $DB_DATABASE";
   //define('DB_SERVER', 'localhost');
   //define('DB_USERNAME', 'geekware_etsbanking');
   //define('DB_PASSWORD', 'DIEqFfC@e_v@');
   //define('DB_DATABASE', 'geekware_bankingsystem');
$db = mysqli_connect($DB_SERVER,$DB_USERNAME,$DB_PASSWORD,$DB_DATABASE);
  // $db = new mysqli($DB_SERVER,$DB_USERNAME,$DB_PASSWORD,$DB_DATABASE);
   $conStr = sprintf("mysql:host=%s;dbname=%s", $DB_SERVER, $DB_DATABASE);
   try {
      $pdo = new PDO($conStr, $DB_USERNAME, $DB_PASSWORD);
  } catch (PDOException $e) {
      die($e->getMessage());
  }
?>
