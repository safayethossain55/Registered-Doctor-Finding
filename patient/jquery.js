$(document).ready(function(){
    $("#department").on('change',function(){
        var specialties=this.value;
        $.ajax({
            method:"POST",
            url:"ajax.php",
            data:{id:specialties},
            dataType:"html",
            success:function(data){
                $("#doctor").html(data);
            }
        });
    });
}); 