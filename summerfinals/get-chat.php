<?php 
    session_start();
    if(isset($_SESSION['userid'])){
        include_once "dbconnect.php";
        $userid = $_SESSION['userid'];
        $rid = mysqli_real_escape_string($conn, $_POST['rid']);

        $output = "";
        $sql = "SELECT * FROM messages_conversation where roomid = '$rid' ORDER BY messageid ASC;";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){

                
                    
                if($row['userid'] === $userid){
                    $output .= '<div class="container text-center text-light ">
                                <div class="row " style="position: relative; right: -280px;">
                                    <p class="text-start bg-primary border rounded-2" style="width: 150px; ">'. $row['message'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="container text-start ">
                                <div class="row">
                                    <p class="text bg-light border rounded-2 bg-opacirty-10"  style="width: 150px ;">'. $row['message'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: index.php");
    }

?>