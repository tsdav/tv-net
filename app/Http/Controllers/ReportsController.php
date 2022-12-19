<?php

namespace App\Http\Controllers;

use App\Interfaces\ReportRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ReportsController extends Controller
{
    private ReportRepositoryInterface $reportRepository;

    /**
     * @param ReportRepositoryInterface $reportRepository
     */
    public function __construct(ReportRepositoryInterface $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function getReportsAjax(Request $request) : View
    {
        $reports = $this->reportRepository->getReportsByCount(5);
        if ($request->ajax()) {
            return view('web/report_data', [
                'title' => 'Հաշվետվություններ',
                'reports' => $reports
            ]);
        }

        foreach ($reports as $report) {
            $report->path = 'storage/reports/report_' . $report->report_name . '/' . $report->file_name;
            $report->report_date = date('Y.m.d', strtotime($report->report_date));
        }

        return view('web/reports', [
            'reports' => $reports,
            'title' => 'Հաշվետվություններ'
        ]);
    }
}
