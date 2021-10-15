$(document).ready(function () {
    $("#btn").click(
            function () {
                sendAjaxForm('result_form', 'ajax_form', 'action_ajax_form.php');
                return false;
            }
    );
});

function myFunction() {
    var year1 = document.getElementById("year1").innerHTML;
    var month1 = document.getElementById("month1").innerHTML;
    var day1 = document.getElementById("day1").innerHTML;
    var year2 = document.getElementById("year2").innerHTML;
    var month2 = document.getElementById("month2").innerHTML;
    var day2 = document.getElementById("day2").innerHTML;
    var duration1 = document.getElementById("duration1").innerHTML;
    var duration2 = document.getElementById("duration2").innerHTML;

    var days1 = [...document.querySelector('.days1').cells];
    var startOfVacation1 = new Date(year1, month1, day1);
    var days2 = [...document.querySelector('.days2').cells];
    var startOfVacation2 = new Date(year2, month2, day2);
    for (i = 1; i <= 365; i++) {
        days1[i].style.backgroundColor = "white";
        days2[i].style.backgroundColor = "white";
    }
    for (i = ColvoDay(startOfVacation1); i <= ColvoDay(startOfVacation1) + Number(duration1); i++) {
        days1[i].style.backgroundColor = "red";
    }
    for (i = ColvoDay(startOfVacation2); i <= ColvoDay(startOfVacation2) + Number(duration2); i++) {
        days2[i].style.backgroundColor = "red";
    }
}

function ColvoDay(Day) {
    var dateOfTheDay = Day.getDate();
    var monthOfTheDay = Day.getMonth();
    var day = 0;
    for (let i = 0; i < monthOfTheDay; i++) {
        if (i == 1 || i == 3 || i == 5 || i == 7 || i == 8 || i == 10 || i == 12) {
            day = day + 31;
        }
        if (i == 4 || i == 6 || i == 9 || i == 11) {
            day = day + 30;
        }
        if (i == 2) {
            day = day + 28;
        }
    }
    day = day + dateOfTheDay;
    return day;
}

function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({
        url: url, //url страницы (action_ajax_form.php)
        type: "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#" + ajax_form).serialize(), // Сеарилизуем объект
        success: function (response) { //Данные отправлены успешно
            result = $.parseJSON(response);
            $('#day1').text(result.day1);
            $('#month1').text(result.month1);
            $('#year1').text(result.year1);
            $('#day2').text(result.day2);
            $('#month2').text(result.month2);
            $('#year2').text(result.year2);
            $('#duration1').text(result.duration1);
            $('#duration2').text(result.duration2);
            myFunction();
        },
        error: function (response) { // Данные не отправлены
            $('#result_form').html('Ошибка. Данные не отправлены.');
        }
    });
}

