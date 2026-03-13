 $(document).ready(function(){

$("#sendBtn").click(function(){

let ism = $("#feedback_ism").val();
let email = $("#feedback_email").val();
let baho = $("#feedback_baho").val();
let mavzu = $("#feedback_mavzu").val();
let matn = $("#feedback_matn").val();

$.ajax({

url: "server.php",
type: "POST",

data:{
feedback_ism: ism,
feedback_email: email,
feedback_baho: baho,
feedback_mavzu: mavzu,
feedback_matn: matn
},

success:function(response){

$("#result").hide();

$("#result")
.removeClass("error")
.addClass("success")
.html(response)
.fadeIn(800);

},

error:function(){

$("#result").hide();

$("#result")
.removeClass("success")
.addClass("error")
.html("Server bilan aloqa xatosi!")
.fadeIn(800);

}

});

});

});