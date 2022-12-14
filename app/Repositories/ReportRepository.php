<?php

namespace App\Repositories;

use App\Interfaces\ReportRepositoryInterface;
use App\Models\Report;
use Illuminate\Database\Eloquent\Collection;

class ReportRepository implements ReportRepositoryInterface
{

    public function getAllReports(): Collection
    {
        return Report::all();
    }

    public function getReportById(int $reportId)
    {
        return Report::findOrFail($reportId);
    }

    public function deleteReport(int $reportId)
    {
        Report::destroy($reportId);
    }

    public function createReport(array $reportDetails)
    {
        return Report::create($reportDetails);
    }
}
