$(document).ready(function () {
    $("#upload-handler").on('submit', function (e) {
        e.preventDefault();
        let hasError = formHandler();

        if (!hasError) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let fd = new FormData(this);
            sendRequest(url, fd);
        }
    })
});


function formHandler() {
    let hasError = false;
    $('.form_input').each(function (item) {
        if ($(this).val() == '') {
            hasError = true;
            $(this).addClass('is--invalid')
        }
    });

    return hasError;
}

function sendRequest(url, data) {
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        contentType: false,
        processData: false,
    }).done(function (res) {
        console.log(res);
        if (res.status === true) {
            alert("uploaded successfully");
            $("#report-name").val('');
            $("#report-date").val('');
            $("#report-file").val('');
        }
    })
}
