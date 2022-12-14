@extends('admin.admin')
@section('page')
    @php
        if(isset($item)) {
            $itemName = $item['itemName'];
            $itemDescription = $item['itemDescription'];
            $itemDetails = $item['itemDetails'] ?? '';
        }
    @endphp
    <form method="post" enctype="multipart/form-data" id="upload-handler">
        @csrf
        <p class="important">*-ով նշվածները պարտադիր են!</p>
        <div class="form-group">
            <label for="report-name">Անուն <span class="important">*</span></label>
            <input type="text" class="form_input" id="report-name" name="{{ $itemType }}_name" value="{{ $itemName ?? '' }}">
        </div>
        <div class="form-group">
            <label for="report-date">Նկարագրություն<span class="important">*</span></label>
            <input type="text" class="form_input" id="report-date" name="{{ $itemType }}_description" value="{{ $itemDescription ?? '' }}">
        </div>
        @if($itemType == 'package')
            <div class="form-group">
                <label for="service">Ծառայություն<span class="important">*</span></label>
                <select name="service_id" id="service">
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" @if(isset($selectedServiceId) && $selectedServiceId == $service->id) {{ 'selected' }} @endif> {{ $service->service_name }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        <div class="form-group">
            <label for="report-file">Մանրամասներ<span class="important">*</span></label>
            <textarea name="{{ $itemType }}_details" class="form_input" id="" cols="30" rows="10">{{ $itemDetails ?? '' }}</textarea>
        </div>
        <button type="submit" name="update" id="upload-report" class="btn btn-danger">{{ isset($itemName) ? 'Փոփոխել' : 'Ստեղծել' }}</button>
    </form>
@endsection
@section('scripts')
    <script> var url = '{{isset($itemName) ? route($updateRoute, $item['id']) : route($createRoute) }}'</script>
    <script src="{{ asset('js/admin/formHandler.js' )}}"></script>
@endsection
