$(document).ready(function(){
    $("#show").click(function(){
        $("#myTable tr:hidden").slice(0, 10).show();
        var i = $("#myTable tr").length
        var j = $("#myTable tr:visible").length
        if(i == j){
            $("#show").hide();
        }
    });
    
     

});