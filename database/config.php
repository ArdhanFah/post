<?php 
$host = 'localhost';
$port = '5432';
$user = 'postgres';
$pass  = 'ardhan04';
$dbname = 'lks';

$conn_str = ("host={$host} port={$port} dbname={$dbname} user={$user} password={$pass}");
$db_conn = pg_connect($conn_str);

?>