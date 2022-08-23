<?php 
    session_start();
    if(isset($_SESSION['userid'])){
        include "dbconnect.php";
        $userid = $_SESSION['userid'];
        $rid = $_POST['roomid'];
    

            $_SESSION['roomid']  = $rid;
            $_SESSION['fren']  = $_POST['frid'];
       
            echo "{\"res\" : \"success\"}";            

       
    }else{
        header("location: index.php");
    }


    
?>