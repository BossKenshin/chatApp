var chatBox = document.getElementById("chatbox");
var room_id;
var sendBtn = document.getElementById("button-send");
var message;

getAtr();
userName();

function getAtr(){
    $(document).ready(function(){

     room_id = document.getElementById("hidden-data").getAttribute("data-roomuid");

    });
}


setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "get-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.responseText;
            chatbox.innerHTML = data;
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("rid="+room_id);
}, 500);


$(document).ready(function () {
  $("#button-send").click(function (event) {
      //stop submit the form, we will post it manually.
      event.preventDefault();

    var message = document.querySelector("#textarea").value;
    var rid = document.querySelector("#roomid").value;


    
      $.ajax({
          type: "POST",
          url: "insert-chat.php",
          data: { 
          msg: message,
          roomid: rid
          },
          success: function (data) {
            document.querySelector("#textarea").value = "";
          },
          error: function (e) {
            alert("SUCCESS");

          }
      });
  });
});


function userName(){

  $(document).ready(function () {
    var id = document.querySelector("#hidden-data").getAttribute("data-myid");
    var rid = document.querySelector("#hidden-data").getAttribute("data-roomuid");
    $.ajax({
      type: "POST",
      url: "get-info.php",
      data: { 
      id: id,
      room: rid
      },
      success: function (data) {
        var json = JSON.parse(data);
        document.querySelector("#receiverName").innerHTML = json[0].fullname;
      },
      error: function (e) {
        alert("SUCCESS");

      }
  });


  });
}

// function sendmessage(){
//   $(document).ready(function(){


//   var message = document.querySelector('#textarea').value;


//   alert(message + "  --  " + room_id);

//   $.ajax({
//     type: "POST",
//     url: "insert-chat.php",
//     message : message,
//     room : room_id,
//     success: function (data) {
//       let result = JSON.parse(data);

//       if(result.res == "success"){
//           alert(message, rid);
//       }else{
//         alert("Error, Something happened");
//     }
//    }
//   });


// });

// }
