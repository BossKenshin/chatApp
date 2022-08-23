<?php
session_start();
include 'dbconnect.php';



if (isset($_POST['submit'])) {

    $email =  $_POST['email'];
    $password =  $_POST['password'];

    $sql_get_user = "SELECT * FROM users where email = '$email' AND password = '$password'";
    $res = mysqli_query($conn, $sql_get_user);

    if ($res) {

        $row = mysqli_fetch_assoc($res);

        $id = $row['userid'];
        $fullname = $row['fullname'];

        $_SESSION['userid'] = $id;
        $_SESSION['fullname'] = $fullname;

        // $sql_check_chats = "SELECT DISTINCT roomID FROM chatmember where userid = '$id' LIMIT 1";
        // $result = mysqli_query($conn, $sql_check_chats);

        // $numrow = mysqli_num_rows($result);
        // if($numrow != 0){

        //     $row = mysqli_fetch_assoc($result);
        //     $room_id = $row['roomID'];
        //     $_SESSION['roomid'] = $room_id;
        //     header("Location: messages.php");
        // }
        // else{
            header("Location: menu.php");

//}

    } else {
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="index.css">
</head>

<body>


    <div class="container-fluid" id="whole-container">


        <div class="container">
            <form action="" class="row" method="POST">
                <div class="col-12 mt-4">
                    <p class="h3 text-primary">CHATTY</p>
                </div>
                <div class="col-md-12">

                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <label for=password" class="form-label">Password </label>
                    <input type="password" class="form-control" id="password" name="password" required>

                </div>



                <div class="col-12 mt-4">
                    <button class="btn btn-primary" type="submit" name="submit" value="submit">Login</button>
                    <p class="h6">Don't have an account?</p>
                    <a href="signup.php" class="h6">Signup!</a>
                </div>



            </form>
        </div>

    </div>







    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>