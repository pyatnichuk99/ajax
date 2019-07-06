$('#form1').submit(function(e){
    e.preventDefault();
    // змінна для передачі даних форми

    var data = new FormData(this);

    $.ajax({
        // метод підключення форми
        type:'POST',
        // адреса куди буде відправлений запит
        url: '/php/check.php',
        data: data,
        // для того щоб сторінка не кешувалась браузером
        cache: false,
        // для того щоб дані н перетворювались на строку
        processData: false,
        // При успішному виконанні
        success: function(response){
            // виводить повідомлення про успішний вхід
            swal({
                text: "Користувач успішно зареєстрований!",               
            }).then(() => {
                location.reload();
            });
        }        
    });
});