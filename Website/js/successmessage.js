$(document).ready(function(){
    $("#form").submit(function (e){
        $("#submitbutton1").hide();
        $("#successmessage1").show();
            return true;
    });
    $("#form2").submit(function (e){
        $("#submitbutton2").hide();
        $("#successmessage2").show();
            return true;
    });
    $("#form3").submit(function (e){
        $("#submitbutton3").hide();
        $("#successmessage3").show();
            return true;
    });

});
