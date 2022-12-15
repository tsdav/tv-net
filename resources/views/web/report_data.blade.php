<div class="single-report-container" data-url="{{ asset($report->path) }}">
    <div>
        <span class="single-report-name">{{ $report->report_name }}</span>
        <span>{{$technicalData}}</span>
    </div>
    <div>
        <span>{{ $report->report_date }}</span>
        <a href="{{ asset($report->path) }}" target="_blank" download="{{ $report->report_name }}"><i
                class="fa fa-download" data-redirect="false"></i></a>
    </div>
</div>
