<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\PerformanceReport;
use App\Http\Controllers\Controller;
use App\Models\Kpi;

class DashboardController extends Controller
{
    public function index()
    {
        $departments = Department::count();
        $users = User::where('role', 'user')->count();
        $kpis = Kpi::count();
        $reportCount = PerformanceReport::count();


        $reports = PerformanceReport::with(['user', 'kpi'])
            ->orderBy('user_id')
            ->orderBy('kpi_id')
            ->get()
            ->groupBy('user_id');
        return view('admin.dashboard', compact('reports', 'users', 'departments', 'kpis', 'reportCount'));
    }
}
