$('document').ready(function () {
    jQuery('body').append('<a href="https://www.google.com.ua/?hl=ru">Перейти в гугл!</a>');
    // $('div, hr').remove();
    // let cloneP = $('p').clone();
    // $('body').append(cloneP);

    // let katet1, katet2;
    // katet1 = 10;
    // katet2 = 20;

    // alert(Math.round(Math.sqrt((katet1 * katet1) + (katet2 * katet2))));
    // $('button').on('click', function () {
    $('input').on('keyup', function () {
        let value1, value2, value3;
        value1 = $('#val1').val();
        value2 = $('#val2').val();

        value1 = parseInt(value1);
        value2 = parseInt(value2);

        value3 = value1 + value2;


        // alert(value3);
        $('#some_div').val(value3);


    });

    // let value4 = prompt('Введите ваше имя', '');
    // $('#result').html(value4);

    let test;
    let a = 5551;

    if (a != 555) {
        alert ('Хорошо!');
    } else {
        alert ('Плохо!');
    }
});