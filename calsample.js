
$('document').ready(function() {
    $.ajax({
        type:'POST',
        url:'sample.php',
        dataType:'JSON',
        data:{
        },
        success:function(data){
            console.log(data);
        },
        error:function(jqXHR,textStatus,errorThrown){
            console.log('Could not retrieve JSON');
        }

    });
});

