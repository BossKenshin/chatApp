<?php
session_start();
include "dbconnect.php";

if(isset($_POST['submit'])){

$fullName = $_POST['fullname'];
$email =  $_POST['email'];
$password =  $_POST['password'];
$file_name = $_FILES['profile']['name'] ;


$file_size =$_FILES['profile']['size'];
$file_tmp =$_FILES['profile']['tmp_name'];
$file_type=$_FILES['profile']['type'] ;

$sql_insert_user = "INSERT INTO users (fullname, email,password, profile) VALUES('$fullName', '$email', '$password', '$file_name')";
$res = mysqli_query($conn, $sql_insert_user);

if($res){
    move_uploaded_file($file_tmp,"profiles/".$file_name);
    header("Location: index.php");
}
else{
echo 'error';


}





}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HAHA CHAT</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="signup.css">
</head>

<body>


<div class="container-fluid" id="whole-container">


    <div class="container">
        <form action="signup.php" class="row mt-3" method="POST" enctype="multipart/form-data">
                <div class="col-12 mt-4"><p class="h3 text-primary">CHATTY</p></div>
            <div class="col-md-12">
                <label for="fullname" class="form-label">Fullname</label>
                <input type="text" class="form-control" name="fullname" id="fullname" required>
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
                <label for=password" class="form-label">Password </label>
                <input type="password" class="form-control" name="password" id="password" required>
                <label for=profile class="form-label">Profile</label>
                <input type="file" accept=".jpg,.jpeg,.png" name="profile" id="profile" required>
              </div>

    

              <div class="col-12 mt-5">
                <button class="btn btn-primary" type="submit" name="submit" value="submit">Signup</button>
                <p class="h6">Already have an account?</p>
                <a href="index.php" class="h6">Sign in</a>
              </div>
           


        </form>
    </div>

</div>







    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>

</html>