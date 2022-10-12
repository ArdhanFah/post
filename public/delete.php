<?php 
include('../database/config.php');
$id = $_GET['id'];
$foto = $_GET['foto'];
$file = '../foto/'.$foto;


$query = ("DELETE FROM tabel_lks WHERE id='$id'");
$result = pg_query($db_conn, $query);

if(file_exists($file)){
    unlink ($file);
}

header('location: index.php');

?>