<?php

namespace App\Repositories;

use App\Interfaces\ReportRepositoryInterface;
use App\Models\Report;
use Illuminate\Database\Eloquent\Collection;

class ReportRepository implements ReportRepositoryInterface
{

    /**
     * @return Collection
     */
    public function getAllReports(): Collection
    {
        return Report::all();
    }

    /**
     * @param int $reportId
     * @return mixed
     */
    public function getReportById(int $reportId): mixed
    {
        return Report::findOrFail($reportId);
    }

    /**
     * @param int $reportId
     * @return void
     */
    public function deleteReport(int $reportId): void
    {
        Report::destroy($reportId);
    }

    /**
     * @param array $reportDetails
     * @return mixed
     */
    public function createReport(array $reportDetails): mixed
    {
        return Report::create($reportDetails);
    }

    /**
     * @param int $count
     * @return mixed
     */
    public function getReportsByCount(int $count): mixed
    {
        return Report::paginate($count);
    }
}
