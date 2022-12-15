@extends('web.base')
@section('content')
    <div>
        <h1>Reports</h1>
        <div id="report-list">
            @include('web.report_data')
        </div>
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
    </script>
@endsection
