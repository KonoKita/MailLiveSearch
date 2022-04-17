'use strict'
/*==============================[Variables]==============================*/
let btn = document.querySelector('.validation__button');//кнопка
let validationTable = document.querySelector('.table');
let input = document.querySelector('.input');
let urlForRequest = '../ajax.php';
let xhr = new XMLHttpRequest();
/*==============================[Listeners]==============================*/

$(".input").on('keyup', function () {
    input.value.trim();
    if (isInputEmpty(input)) {
        // let strRequest = 'strRequest=' + JSON.stringify(input.value);
        let strRequest = JSON.stringify(input.value);
        doPostRequest(
            strRequest,
            urlForRequest
        );
    }
});

/*==============================[Logic]==============================*/
function doPostRequest(str, url) {
    console.log('jquery ajax zapros');
    $.ajax({
        type: "POST",
        url: url,
        data: {strRequest: str},
        success: function (response) {
            refreshDataToTable(JSON.parse(response), validationTable);
        }
    });
}


function refreshDataToTable(arTableData, table) {
    if (arTableData === 'no suggestion') {
        table.innerHTML = '';

    } else {
        table.innerHTML = '';
        for (let i = 0; i < arTableData.length; i++) {
            let tr = $('<tr/>', {}).appendTo(table);
            $('<td>' + arTableData[i]['email'] + '<td/>', {}).appendTo(tr);
            $('<td>' + arTableData[i]['name'] + '<td/>', {}).appendTo(tr);
            $('<td>' + arTableData[i]['sname'] + '<td/>', {}).appendTo(tr);
            $('<td>' + arTableData[i]['id'] + '<td/>', {}).appendTo(tr);
        }
    }

}

function isInputEmpty(input) {
    if (input.value === '') {
        input.classList.add('trambling');
        return false;
    } else {
        if (input.classList.contains('trambling')) {
            input.classList.remove('trambling');
        }
        return true;
    }
}
