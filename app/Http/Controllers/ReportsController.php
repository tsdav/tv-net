<?php

namespace App\Http\Controllers;

use App\Interfaces\ReportRepositoryInterface;
use Illuminate\Http\Request;
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

    public function getReportsAjax(Request $request) : View
    {
        $reports = $this->reportRepository->getReportsByCount(1);
        if ($request->ajax()) {
            return view('web/report_data', [
                'reports' => $reports
            ]);
        }

        return view('web/reports', [
            'reports' => $reports,
            'title' => '123'
        ]);
    }


}
