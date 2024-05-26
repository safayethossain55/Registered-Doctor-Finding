$(document).ready(function(){
    $("#department").on('change',function(){
        var docnam=$(this).val();
        $.ajax({
            method:"POST",
            url:"ajax.php",
            data:{id:docnam},
            dataType:"html",
            success:function(data){
                $("#docname").html(data);
            }
        });
    });
}); 