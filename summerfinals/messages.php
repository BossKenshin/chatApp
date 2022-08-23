<?php

session_start();

include "dbconnect.php";

$myid = $_SESSION['userid'];
$randomRID = $_SESSION['roomid'];
$receiverID = $_SESSION['fren'];


$sql_profile = "SELECT profile FROM users WHERE userid =  '$receiverID'";
$results = mysqli_query($conn,$sql_profile);

$row_profile = mysqli_fetch_assoc($results);
$profile = $row_profile['profile'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAHA CHAT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <script src="chat.js"></script>
</head>
<body>

<div class="container border mt-2 p-2 pb-4 rounded-3 bg-light bg-opacity-25"" style="width: 500px;">

<p id="hidden-data" data-roomuid="<?php echo $randomRID ?>" data-myid="<?php echo $myid ?>"  hidden></p>

<div class="container" style="display:flex; text-align:left;">
<a href="menu.php" class="h2 text-primary mt-2 mx-2"><i class="bi bi-arrow-left"></i></a>

<img src="profiles/<?php echo $profile; ?>" class="rounded-circle mt-1" id="profile" alt="profile" style="width: 50px; height: 50px;">
<p class="h4 mx-2 mt-3" id="receiverName">LOREN IMPSUM</p>
</div>
<hr>

<div class="container" id="chatbox" style="height: 390px;  overflow-y: scroll; overflow-x: hidden; display: block;">






</div>
<div class="row pt-3" id="message-form-container">
        <form class="container" id="form-forChat">

            <div class="input-group">
               
                <textarea class="form-control" name="text-message" id="textarea" aria-label="With textarea" style="resize: none; height: 20px;"></textarea>
                <input type="hidden" name="uniroomid" id="roomid" value="<?php echo $randomRID; ?>">
                <button class="btn btn-primary " type="submit" id="button-send"><i class="bi bi-send-fill"></i></button>
            </div>
        </form>
    </div>






</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>