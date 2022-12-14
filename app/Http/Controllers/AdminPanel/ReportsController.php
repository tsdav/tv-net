<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Http\Services\ReportFileUploaderService;
use App\Interfaces\ReportRepositoryInterface;
use App\Models\Report;
use App\Repositories\ReportRepository;
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

    /**
     * @param ReportRequest $request
     * @return JsonResponse
     */
    public function createReport(ReportRequest $request): JsonResponse
    {
        $this->reportRepository->createReport($request->all());

        $reportFileName = $this->reportFileUploaderService->uploadReportFile($request);

        return response()->json([
            'status' => true,
            'message' => $reportFileName
        ]);
    }
}
