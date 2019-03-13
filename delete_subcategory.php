<?php
include 'connection.php';
$id=$_GET["id"];
$sql=mysqli_query($conn,"delete from subcategory where subcategory_id=$id");
header('location:view_subcategory.php');
?>