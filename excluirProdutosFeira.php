<?php


include "util.php";
$conn = conecta();
$id = $_GET['id'];
$varSQL = "delete from feira where id = :id";
$delete = $conn -> prepare($varSQL);
$delete -> bindParam(':id',$id);


$delete -> execute();


header("Location: produtos.php");
exit;


?>
