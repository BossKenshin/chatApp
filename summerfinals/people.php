<?php

session_start();
include "dbconnect.php";

$myid = $_SESSION['userid'];



// $roomArr = array();
// $sql_get_rooms = "SELECT roomID FROM chatmember WHERE userid = '$myid'";
// $rs = mysqli_query($conn, $sql_get_rooms);

// while($row = mysqli_fetch_assoc($rs)){

//     array_push($roomArr, $row['roomID']);

// }

// $string = " roomID = ";
// foreach ($roomArr as $value) {
//   $string .="'". $value ."'" ." OR";
// }
//   $attach = substr($string,0,-3);
  


// $sql_chats = "SELECT
// (CASE
// WHEN chatmember.userid = '$myid' THEN chatmember.userid
//  WHEN chatmember.userid != '$myid' THEN chatmember.userid 
// END) AS id,
// users.fullname,
//  roomID FROM `chatmember` 
// INNER JOIN users ON users.userid = chatmember.userid
// WHERE ". $attach;
// $ress = mysqli_query($conn, $sql_chats);
// $pe = array();
// while($row = mysqli_fetch_assoc($ress)){

//     if($row['id'] != $uid){
//         array_push($pe, $row['id']);

//     }}



$sql_fetch_users = "SELECT * FROM users WHERE userid != '$myid'";
$res = mysqli_query($conn, $sql_fetch_users);

$users_array = Array();

while($row = mysqli_fetch_assoc($res)){
    
    $users_array[] = $row;

}

echo json_encode($users_array);


?>