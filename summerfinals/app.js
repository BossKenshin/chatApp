let users;

setInterval(() => {

    $(document).ready(function () {

        $.ajax({

            url: "people.php",
            success: function (data) {


                var json = JSON.parse(data);
                users = json;

                const template = document.querySelector("#people-template");

                const parent = document.querySelector(".form-select");

                $('.form-select').empty();



                for (let i = 0; i < json.length; i++) {

                    //clone the template
                    let clone = template.content.cloneNode(true);
                    room_array = json;

                    clone.querySelector("option.spe-people").innerHTML = json[i].fullname;
                    clone.querySelector("option.spe-people").value = json[i].userid;


                    //apppend
                    parent.append(clone);
                }

                getSelectedItems();
            }

        })



    });
}, 500);



function logmeout() {

    $(document).ready(function () {

        sessionStorage.clear();
        window.location.href = "index.php";

    });


}





function setNotFriends(results) {

    var options_ele = document.getElementsByClassName("spe-people");


    if (results.length === options_ele.length) {

        select = document.querySelector("form");
        select.innerHTML = " <hr> <p class='h4 text-secondary' >NO NEW USERS </p>";
        //select.removeChild(document.getElementById("selectUser"));
    }
    else {



        for (var i = 0; i < options_ele.length; i++) {

            for (var j = 0; j < results.length; j++) {

                if (options_ele[i].innerHTML === results[j]) {
                //    console.log(options_ele[i].innerHTML + " MATCHED " + results[j] + " AT " + j);
                    options_ele[i].remove(i);
                }
                else {
             //      console.log(options_ele[i].innerHTML + " NO MATCHED " + results[j] + " AT " + j);

                }

            }



        }

        // for (var i=0; i<options_ele.length; i++) {

        //     console.log(options_ele[i].innerHTML +"==="+ results[i])

        //      if(options_ele[i].innerHTML === results[i]){
        //         console.log("MATCHED" + i);
        //         options_ele[i].remove(i);

        //     }
        //     else{
        //         console.log("NO MATCHED");
        //     }
        // }
    }


}




function getSelectedItems() {
    // var elements = document.getElementsByClassName('spe-people');

    var elements = document.querySelectorAll("#btn-div button");

    var results = [];

    for (var i = 0; i < elements.length; i++) {
        var element = elements[i].getAttribute("data-user-fullname");
        results.push(element);
    }

    setNotFriends(results);

}

