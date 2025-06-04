<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportedSet;
use App\Models\WordSet;
use App\Http\Requests\UpdateReportSetStatus;
use Illuminate\Support\Facades\DB;
use Throwable;

class ReportListController extends Controller
{
    private function queryReportedSet() {
        return ReportedSet::with('wordset')->get();
    }
    public function index(Request $request) {
        $reported = $this->queryReportedSet()->map(function ($report) {
            return [
                'report_id' => $report->report_id,
                'word_set_id' => $report->word_set_id,
                'report_status' => $report->report_status,
                'reason' => $report->reason,
                'reported_date' => $report->reported_date,
                'wordset_title' => $report->wordset?->title ?? null,
            ];
        });
        return response()->json($reported);
    }

    public function update(UpdateReportSetStatus $request) {
        $reportId = $request->route('reported_list');
        $setStatusTo = $request->report_status;

        try {
            DB::transaction(function () use ($reportId, $setStatusTo) {
                $reportTicket = ReportedSet::with('wordset')->findOrFail($reportId);
                $reportTicket->update([ 'report_status' => $setStatusTo ]);
                if ($setStatusTo == 1 && $reportTicket->wordset) {
                    $reportTicket->wordset->update([ 'is_hidden' => 1 ]);
                }
            });

            return response()->json([
                'success' => true,
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
            ], 500);
        }
    }
}
