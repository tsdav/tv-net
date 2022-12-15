<?php

namespace App\Interfaces;

interface ReportRepositoryInterface
{
    public function getAllReports();
    public function getReportById(int $reportId);
    public function deleteReport(int $reportId);
    public function createReport(array $reportDetails);
    public function getReportsByCount(int $count);
}
