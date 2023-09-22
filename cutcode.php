<?php

$.ajax({
    url:"supprdb.php",
    type:'POST',
    data: {
        data: "id"
    },
    DataType:'JSON',
    success:function(result){
        console.log(result);
    }
    });


    var row = table.row( $(this).parents('tr') );
    row.data();
    console.log(row);   console.log(row.data());
    $.post("supprdb.php", 
    {'data' : row.data()},
    function(data) {
        console.log(data);
    });
    row.remove()
    .draw();

?>