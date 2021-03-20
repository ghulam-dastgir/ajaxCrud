// Ajax Requist To Get Records

$(document).ready(function () {
    function show_table(page) {
        // Ajax Requist
        $.ajax({
            type: "POST",
            url: "includes/show-record.php",
            data : {page_no: page},
            success: function (Data) {
                if(Data) {
                    $("#table").html(Data);
                }
            }
        });
    }
    show_table();


    // Pagination Code

    $(document).on("click",".pagination li a",function(e){
        e.preventDefault();
        let page_id = $(this).attr("id");
        show_table(page_id);
    })
 // Click Event Show Modal Box
   $("#add-btn").on("click", function () {
       $("#modal").slideDown("slow").css("display","flex");
   });

//  Event To Colose The Modal

$("#close-modal").on("click", function () {
    $("#modal").slideDown("slow").css("display","none");
});



 // Ajax Requist To Add Records Into Databse
 $("#save-btn").on("click", function (e) {
     e.preventDefault();
     let name = $("#name").val();
     let email = $("#email").val();
     let password = $("#password").val();
    //  Ajax Requist
     $.ajax({
        type: "POST",
        url: "includes/add-student.php",
        data: {stu_name: name, stu_email: email, stu_pass: password},
        success: function (Data) {
            if(Data == "empty") {
                $(".msg").html("<p class='text-danger'>All fields required</p>");
            } else if(Data == "name<>") {
                $(".msg").html("<p class='text-danger'>Student name too small or large</p>");
            } else if(Data == "email<>") {
                $(".msg").html("<p class='text-danger'>Email name too small or large</p>");
            } else if(Data == "pass<>") {
                $(".msg").html("<p class='text-danger'>Password too small or large</p>");
            } else if(Data == "success") {
                $(".msg").html("<p class='spinner-border text-success' role='status'></p>");
                setTimeout(() => {
                    location.href="index.php";
                }, 1400);
            }
        }
    });
     
 });

//  Ajax Requist To Delete Data From Database

  $(document).on("click","#del-btn",function(e){
      e.preventDefault();
      console.log("Clicking On Del Button");
      let stu_id = $(this).data("did");

    //  Ajax Requist

    $.ajax({
        type: "POST",
        url: "includes/del-stu.php",
        data: {id: stu_id},
        success: function (Data) {
            if(Data == 1) {
                show_table().$("#table").fadeIn();
            }
        }
    });
  })

//   Update Record

   $(document).on("click","#update-btn", function () {
    $("#upade-modal").slideDown("slow").css("display","flex");

    let stu_id = $(this).data("eid");
    // Ajax Requist
    $.ajax({
        type: "POST",
        url: "includes/update-stu.php",
        data: {id: stu_id},
        success: function (Data) {
            if(Data) {
                $("#upade-modal").html(Data);
                $("#close-modal-up").on("click", function () {
                    $("#upade-modal").slideDown("slow").css("display","none");
                });
            }
        }
    });

   });

//    Save Update Form

    $(document).on("click","#up-btn",function(e) {
        e.preventDefault();
        let id = $("#sid").val();
        let sname = $("#sname").val();
        let semail = $("#semail").val();
        // Ajax Requist
        $.ajax({
            type: "POST",
            url: "includes/save-up-record.php",
            data: {id: id, name:sname, email:semail},
            success: function (Data) {
                if(Data == "empty") {
                    $(".msg").html("<p class='text-danger'>All fields required</p>");
                } else if(Data == "name<>") {
                    $(".msg").html("<p class='text-danger'>Name too small or large</p>");
                } else if (Data == "success") {
                    $(".msg").html("<p class='spinner-border text-success' role='status'></p>");
                    setTimeout(() => {
                        location.href="index.php";
                    }, 1400);
                }
            }
        });
    });

    // Live Search Keyup event

    $("#search").keyup(function (e) { 
        let search_term = $(this).val();

        // Ajax Requist TO Get Search Data

        $.ajax({
            type: "POST",
            url: "includes/get-search-data.php",
            data: {search: search_term},
            success: function (Data) {
                if(Data) {
                    $("#table").html(Data);
                }
            }
        });

    });
});