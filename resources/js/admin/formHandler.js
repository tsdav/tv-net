$(document).ready(function () {
    $("#upload-report").on('click', function () {
        let hasError = formHandler();

        if (!hasError) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
    })
});



function formHandler() {
    let hasError = false;
    $('.form_input').each(function (item) {
       if (this.val() == '') {
           hasError = true;
           this.addClass('is--invalid')
       }
    });

    return hasError;
}

function sendRequest(url) {
    $("#upload-handler").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: url,
            data: new FormData(this),
            contentType: false,
            processData: false,
        }).done(function (res) {
            console.log(res);
            if(res.status === true) {
                alert("uploaded successfully")
            }
        })
    })
}
