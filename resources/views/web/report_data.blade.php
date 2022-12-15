<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th >ID</th>
            <th >Name</th>
            <th >Date</th>
            <th >File</th>
        </tr>
        @foreach($reports as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->report_name }}</td>
                <td>{{ $row->report_date }}</td>
                <td><a href="{{ url('public/storage/reports/report/report_' . $row->report_name . '/' . $row->file_name ) }}">{{ $row->file_name }}</a></td>
            </tr>
        @endforeach
    </table>

    {!! $reports->links() !!}
</div>

