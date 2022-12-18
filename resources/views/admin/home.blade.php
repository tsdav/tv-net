@extends('admin.admin')
@section('page')
    <form method="post" enctype="multipart/form-data" id="upload-handler">
        @csrf
        <p class="important">*-ով նշվածները պարտադիր են!</p>
        <div class="form-group">
            <label for="report-name">Report Name<span class="important">*</span></label>
            <input type="text" class="form_input" id="report-name" name="report_name">
        </div>
        <div class="form-group">
            <label for="report-date">Report Date<span class="important">*</span></label>
            <input type="date" class="form_input" id="report-date" name="report_date">
        </div>
        <div class="form-group">
            <label for="report-file">Report File<span class="important">*</span></label>
            <input type="file" class="form_input" id="report-file" name="report_file" accept=".doc,.docx,.pdf">
        </div>
        <button type="submit" name="update" id="upload-report" class="btn btn-danger">Փոփոխել</button>
    </form>
@endsection
@section('scripts')
    <script> var url = '{{route('upload.report')}}'</script>
    <script src="{{asset('js/admin/formHandler.js')}}"></script>
@endsection
