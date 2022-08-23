<?php 
    session_start();
    if(isset($_SESSION['userid'])){
        include "dbconnect.php";
        $userid = $_SESSION['userid'];
        $rid = $_POST['room'];
        $receiverid = $_POST['id'];
    

            $sql_insert_chat = "SELECT users.fullname FROM `chatmember` INNER JOIN users ON
             users.userid = chatmember.userid WHERE chatmember.userid != '$receiverid' AND roomID = '$rid' ;";
            
            $res = mysqli_query($conn, $sql_insert_chat);

            $data = array();

            while($row = mysqli_fetch_assoc($res)){
                    $data[]= $row;

            }
       
            echo json_encode($data);
       
    }else{
        header("location: index.php");
    }


    
?>