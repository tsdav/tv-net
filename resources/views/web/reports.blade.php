@extends('web.base')
@php
    $technicalData = "Տեխնիկական ցուցանիշներ";
    $reportsTitle = "Հաշվետվություններ";
@endphp
@section('content')
    <div class="reports-content-container">
        <div class="reports-title">
            <h1>{{$reportsTitle}}</h1>
            <h3>{{$technicalData}}</h3>
        </div>
        <div id="report-list">
            @foreach($reports as $report)
                @include('web.report_data')
            @endforeach
        </div>

        {!! $reports->links() !!}
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page)
            {
                $.ajax({
                    type: "get",
                    url:"?page="+page,
                    success:function(data)
                    {
                        $('#report-list').html(data);
                    }
                });
            }

        });

        document.querySelectorAll('.single-report-container').forEach((e) => {
            e.addEventListener('click', function (item) {
                if (item.target.dataset.redirect) {
                    e.preventDefault();
                }
                window.open(e.dataset.url, '_blank');
            })
        })

    </script>
@endsection
