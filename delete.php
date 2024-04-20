<?php
include 'connect.php';
$id=$_GET['idno'];
$image = $_GET['image_pic'];
$delete = "DELETE FROM image WHERE ID = $id";
$query = mysqli_query($connect,$delete);

if($query){
unlink("imgFolder/$image");
    header("location:img_insert.php");
}
?>