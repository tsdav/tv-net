<html>
<head>
    <title>asd</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body>
<form id="upload-handler" method="post">
    @csrf
    <button id="upload">Upload</button>
</form>
<script
    src="https://code.jquery.com/jquery-3.6.2.min.js"
    integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA="
    crossorigin="anonymous"></script>

</body>
</html>
