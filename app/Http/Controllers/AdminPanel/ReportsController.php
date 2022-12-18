<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Http\Services\ReportFileUploaderService;
use App\Interfaces\ReportRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Client\Request;
use Illuminate\Http\JsonResponse;

class ReportsController extends Controller
{
    private ReportFileUploaderService $reportFileUploaderService;

    private ReportRepositoryInterface $reportRepository;

    /**
     * @param ReportFileUploaderService $reportFileUploaderService
     * @param ReportRepositoryInterface $reportRepository
     */
    public function __construct(ReportFileUploaderService $reportFileUploaderService,
                                ReportRepositoryInterface $reportRepository)
    {
        $this->reportFileUploaderService = $reportFileUploaderService;
        $this->reportRepository = $reportRepository;
    }

    public function uploadReportForm(): View
    {
        return view('admin/home', [
            'title' => 'Reports'
        ]);
    }

    /**
     * @param ReportRequest $request
     * @return JsonResponse
     */
    public function createReport(ReportRequest $request): JsonResponse
    {
        $reportFileName = $this->reportFileUploaderService->uploadReportFile($request);
        if (!$reportFileName) {
            return response()->json([
                'status' => false,
                'message' => 'could not upload file!'
            ]);
        }

        $reportDetails = $request->all();
        unset($reportDetails['report_file']);
        $reportDetails['file_name'] = $reportFileName;

        $this->reportRepository->createReport($reportDetails);

        return response()->json([
            'status' => true,
            'message' => $reportFileName
        ]);
    }
}
