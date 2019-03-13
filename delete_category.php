<?php
include 'connection.php';
$id=$_GET["id"];
$sql=mysqli_query($conn,"delete from category where category_id=$id");
header('location:view_category.php');
?>