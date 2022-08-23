<?php 
    session_start();
    if(isset($_SESSION['userid'])){
        include "dbconnect.php";
        $userid = $_SESSION['userid'];
        $rid = $_POST['roomid'];
        $message = $_POST['msg'];
    

            $sql_insert_chat = "INSERT INTO messages_conversation (userid, roomid, message)
            VALUES ('$userid','$rid','$message')" ;
            
            $res = mysqli_query($conn, $sql_insert_chat);

            if($res){
                echo "{\"res\" : \"success\"}";            }
            else{
                echo "{\"res\" : \"error\"}";
    
    
            }

       
    }else{
        header("location: index.php");
    }


    
?>