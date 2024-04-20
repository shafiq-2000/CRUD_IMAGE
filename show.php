<?php 
//db connect
include 'connect.php';

$id= $_GET['idno'];
$select= "SELECT * FROM image WHERE id=$id";
$query=mysqli_query($connect,$select);
$row=mysqli_fetch_array($query);


?>

<?php include 'header.php';?>

<body class="container">
<div class="col-lg-8 shadow">
    <table class="table table-striped">
            <h1 class=" text-center text-primary py-3">Print Data</h1>
    
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th> print</th>
            <tr>
               <td><?php echo $row['id']; ?></td>
               <td><?php echo $row['name'];?> </td>
               <td><?php echo $row['email'];?></td>
               <td><img src="imgFolder/<?php echo $row['image']; ?>" height="50" width="50" alt=""></td>
               <td><button onClick="window.print()">Print</button></td>

            </tr>
          
    
            
    </table>

</div>

<?php include 'footer.php';?>
</body>
</html>