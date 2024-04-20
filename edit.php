<?php
include 'connect.php';

$id = $_GET['idno'];

$read = "SELECT * FROM image WHERE Id=$id";
$query = mysqli_query($connect,$read);
$row = mysqli_fetch_array($query);

if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
  
    $img_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    $upload = move_uploaded_file($tmp_name, "imgFolder/" . $img_name);
    if($upload){

        $update = "UPDATE image SET 
        name = '$name', 
        email ='$email',
        image ='$img_name' where id = $id";
        
        $query = mysqli_query($connect, $update);
        if($query){
            echo "<script>alert('update success') </script>";
            header("location:img_insert.php");
        }else{
            echo "<script>alert('update failed') </script>";
        }
    }else{
        echo "<script>alert('update failed') </script>";
    }


}

?>


<?php include 'header.php';?>
<body class="container text-center">

   <div class="col-sm-4 shadow">
                <!-- form start -->
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                <h1 class=" text-center text-primary py-5">Edit data</h1>
                    <div class="form_group ">
                        <div class="form-group mb-4">
                        <label for="name">Name:</label>
                            <input type="text" value="<?php echo $row['name'] ?> " name="name" class="form-control" placeholder="Enter Your name">

                        </div>
                        <div class="form-group mb-4">
                        <label for="name">Email:</label>
                            <input type="email" value="<?php echo $row['email'] ?> " name="email" class="form-control" placeholder="Enter Your email">

                        </div>
                       
                        <div class="mb-3">
            <label for="fle">Image:</label>
            <input type="file" class="form-control" name="image">
          </div>


                            <div class="text-center form-group mt-5">
                                <button type="submit" name="edit" class="btn btn-primary " ><i class="fa fa-save" aria-hidden="true"></i> save</button>
                            </div>
                </form>

                <?php include 'footer.php';?>

</body> 
</html>