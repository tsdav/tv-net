<html>
<head>
    <title>asd</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body>
<form id="upload-handler" method="post">
    @csrf
    <input type="text" class="form_input" id="report-name" name="report_name">
    <input type="date" class="form_input" id="report-date" name="report_date">
    <input type="file" class="form_input" id="report-file" name="report_file" accept=".doc,.docx,.pdf">
    <button id="upload">Upload</button>
</form>
<script
    src="https://code.jquery.com/jquery-3.6.2.min.js"
    integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA="
    crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#upload-handler").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '{{ route('upload.report') }}',
            data: new FormData(this),
            contentType: false,
            processData: false,
        }).done(function (res) {
            if(res.status === true) {
                alert("uploaded successfully")
            }
        })

    })
</script>
</body>
</html>
