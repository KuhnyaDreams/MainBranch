function exit(){
    $.ajax({
        type: "POST",
        url: '../php/exit.php',
        data: {},
        success: function () {
            location.reload();
        },
    });
}