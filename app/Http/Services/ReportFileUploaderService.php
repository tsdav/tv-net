<?php

namespace App\Http\Services;

use App\Http\Requests\ReportRequest;

class ReportFileUploaderService
{
    public function uploadReportFile(ReportRequest $request) : ?string
    {
        if (!$request->hasFile('report_file')) {
            return null;
        }

        $originalExtension = $request->file('report_file')->getClientOriginalExtension();
        $newFileName = 'report_' . time() . '.' . $originalExtension;

        $request->file('report_file')->storeAs('public/reports/report_' . $request->get('report_name'), $newFileName);

        return $newFileName;
    }

}
