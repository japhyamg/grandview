<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kpi;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class KPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kpis = Kpi::all();
        return view('admin.kpis.index', compact('kpis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.kpis.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate Input
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'target' => 'required',
            'weight' => 'required',
            'user' => 'required'
        ]);
        if ($validator->fails()) {
            // If validation fails return with error
            return back()->withErrors($validator)->withInput();
        }else{
            $user = User::where('id', $request->user)->first();
            // Create Kpi
            Kpi::create([
                'title' => $request->title,
                'description' => $request->description,
                'target' => $request->target,
                'weight' => $request->weight,
                'user_id' => $user->id,
            ]);
            return redirect(route('admin.kpis.index'))->with('success', 'Kpi added successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Fetch the employee By Id
        $kpi = Kpi::where('id', $id)->first();
        if($kpi){
            // Show view if found
            $users = User::where('role', 'user')->get();
            return view('admin.kpis.edit',compact('kpi', 'users'));
        }
        // Return with error if not found
        return redirect(route('admin.kpis.index'))->with('error', 'Invalid selection, try again!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Fetch the KPI By Id
        $kpi = Kpi::where('id', $id)->first();
        if($kpi){
            // Validate Input
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'description' => 'required',
                'target' => 'required',
                'weight' => 'required',
                'user' => 'required'
            ]);
            if ($validator->fails()) {
                // If validation fails return with error
                return back()->withErrors($validator)->withInput();
            }else{
                $user = User::where('id', $request->user)->first();
                // Update Kpi
                $kpi->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'target' => $request->target,
                    'weight' => $request->weight,
                    'user_id' => $user->id,
                ]);
                return redirect(route('admin.kpis.index'))->with('success', 'Kpi updated successfully.');
            }
        }
        // Return with error if not found
        return redirect(route('admin.kpis.index'))->with('error', 'Invalid selection, try again!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Fetch the KPI By Id
        $kpi = Kpi::where('id', $id)->first();
        if($kpi){
            //Delete KPI
            $kpi->delete();
            return redirect(route('admin.kpis.index'))->with('success', 'Kpi deleted successfully.');
        }
        // Return with error if not found
        return redirect(route('admin.kpis.index'))->with('error', 'Invalid selection, try again!');
    }
}
