<?php

session_start();
include 'dbconnect.php';

if (isset($_GET['chatnow'])) {

    $myid = $_SESSION['userid'];

    $sql_checker = "SELECT * FROM chatmember where userid = '$myid' and ";
    $res = mysqli_query($conn, $sql_checker);

    if ($res) {
        $row = mysqli_fetch_assoc($res);

        $_SESSION['roomid'] = $row['roomID'];
        header("Location: messages.php");
    } else {

        $randomRID = randomRoomID();
        $_SESSION['roomid'] = $randomRID;
        $sql_create_room = "INSERT INTO chatroom (roomType) VALUE('$randomRID'); ";
        $result = mysqli_query($conn, $sql_create_room);

        if ($result) {

            $otherid = $_GET['personsDropdown'];
            $_SESSION['fren'] = $otherid;

            $sql_members = "INSERT INTO chatmember (roomID,userid) VALUES('$randomRID','$myid');";
            $sql_members .= "INSERT INTO chatmember (roomID,userid) VALUES('$randomRID','$otherid');";


            if (mysqli_multi_query($conn, $sql_members) === TRUE) {

                header("Location: messages.php");
            } else {
                echo "ERROR";
                echo $sql_members;
            }
        } else {
            echo "ERROR";
        }
    }
} elseif (isset($_POST['logout'])) {

    session_destroy();
    header("Location: index.php");
}


function randomRoomID()
{
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}





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
    <script src="app.js"></script>
    <script src="friend.js"></script>
</head>

<body>

    <template id="people-template">


        <option class="spe-people">NO DATA</option>


    </template>


    <div class="container-fluid p-5">

        <div class="container container-sm mt-5">

            <div class="container" id="list-friends">
                <p class="h4 text-primary">YOUR FRIENDS: </p>

                <?php

                if (isset($_SESSION['userid'])) {
                    $uid = $_SESSION['userid'];

                    $roomArr = array();
                    $sql_get_rooms = "SELECT roomID FROM chatmember WHERE userid = '$uid'";
                    $rs = mysqli_query($conn, $sql_get_rooms);

                    while ($row = mysqli_fetch_assoc($rs)) {

                        array_push($roomArr, $row['roomID']);
                    }

                    if(sizeOf($roomArr) != 0 ){

                    $newArr = array();
                    foreach ($roomArr as $value) {
                        array_push($newArr, "roomID = " . "'" . $value . "'");
                    }
                    $attach = implode(" OR ", $newArr);


                    $sql_chats = "SELECT
(CASE
WHEN chatmember.userid = '$uid' THEN chatmember.userid
 WHEN chatmember.userid != '$uid' THEN chatmember.userid 
END) AS id,
users.fullname,
 roomID FROM `chatmember` 
INNER JOIN users ON users.userid = chatmember.userid
WHERE " . $attach;


                    $ress = mysqli_query($conn, $sql_chats);

                    while ($row = mysqli_fetch_assoc($ress)) {

                        if ($row['id'] != $uid) {
                ?>
                            <div class="row mt-2 " id="btn-div">
                                <button class="btn btn-primary" data-chat-room="<?php echo $row['roomID']; ?>" data-receiver-id="<?php  echo $row['id']; ?>" data-user-fullname="<?php echo $row['fullname']; ?>" onclick="chatFren(this.getAttribute('data-chat-room'), this.getAttribute('data-receiver-id'));">
                                    <?php echo $row['fullname']; ?>
                                </button>
                            </div>


                <?php
                        }
                    }
                }
                }
                ?>

            </div>
            <form action="menu.php" method="get">

                <p class="h4 text-primary mt-5">SELECT A PERSON TO CHAT</p>

                <select class="form-select" id="selectUser" name="personsDropdown" aria-label="Default select example">


                </select>


                <div class="vstack gap-2 col-md-5 mx-auto mt-5">
                    <input type="submit" value="Chat Now" name="chatnow" class="btn btn-primary">
                </div>
            </form>
            <button class="btn btn-outline-secondary" id="logoutBtn" onclick="logmeout();">Logout</button>
        </div>




    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>