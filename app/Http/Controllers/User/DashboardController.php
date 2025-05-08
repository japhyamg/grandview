<?php

namespace App\Http\Controllers\User;

use App\Models\Kpi;
use Illuminate\Http\Request;
use App\Models\PerformanceReport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        $kpis = auth()->user()->kpis->count();
        $reportCount = auth()->user()->performanceReports->count();
        return view('user.dashboard', compact('kpis', 'reportCount'));
    }

    public function viewKpis()
    {
        $kpis = auth()->user()->kpis;
        return view('user.kpis.index', compact('kpis'));
    }

    public function createReport()
    {
        $kpis = auth()->user()->kpis;
        return view('user.kpis.create-report', compact('kpis'));
    }

    public function submitReport(Request $request)
    {
        // Validate Input
        $validator = Validator::make($request->all(), [
            'kpi' => 'required',
            'report' => 'required',
            'score' => 'required'
        ]);
        if ($validator->fails()) {
            // If validation fails return with error
            return back()->withErrors($validator)->withInput();
        }else{
            $kpi = Kpi::where('id', $request->kpi)->first();
            // Create Report
            PerformanceReport::create([
                'kpi_id' => $kpi->id,
                'report' => $request->report,
                'score' => $request->score,
                'user_id' => auth()->user()->id,
            ]);
            return redirect(route('admin.kpis.index'))->with('success', 'Kpi added successfully.');
        }
    }
}
