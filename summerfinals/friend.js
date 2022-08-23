

function chatFren(passedRoomID, friendID){


    $(document).ready(function(){

        $.ajax({
            type: "POST",
            url: "open-chat.php",
            data: { 
            roomid: passedRoomID,
            frid: friendID
            },
            success: function (data) {
                console.log(friendID);

             window.location.href = "messages.php";
            },
            error: function (e) {
              alert("SUCCESS");
  
            }
        });


});

}

