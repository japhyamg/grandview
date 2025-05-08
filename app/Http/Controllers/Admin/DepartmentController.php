<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::orderBy('name','asc')->get();
        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate Input
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:departments,name'
        ]);

        if ($validator->fails()) {
            // If validation fails return with error
            return back()->withErrors($validator)->withInput();
        }else{
            // Create Department
            Department::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ]);
            return redirect(route('admin.departments.index'))->with('success', 'Department added successfully.');
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
        // Fetch the Department By Id
        $department = Department::where('id', $id)->first();
        if($department){
            // Show view if found
            return view('admin.departments.edit',compact('department'));
        }
        // Return with error if not found
        return redirect(route('admin.departments.index'))->with('error', 'Invalid selection, try again!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Fetch the Department By Id
        $department = Department::where('id', $id)->first();
        if($department){
            // Validate Input
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:departments,name,'.$id
            ]);

            if ($validator->fails()) {
                // If validation fails return with error
                return back()->withErrors($validator)->withInput();
            }else{
                // Update Department
                $department->update([
                    'name' => $request->name,
                    'slug' => Str::slug($request->name)
                ]);
                return redirect(route('admin.departments.index'))->with('success', 'Department updated successfully.');
            }
        }
        // Return with error if not found
        return redirect(route('admin.departments.index'))->with('error', 'Invalid selection, try again!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Fetch the Department By Id
        $department = Department::where('id', $id)->first();
        if($department){
            // Delete Department
            $department->delete();
            return redirect(route('admin.departments.index'))->with('success', 'Department and related info deleted successfully');
        }
        // Return with error if not found
        return redirect(route('admin.departments.index'))->with('error', 'Invalid selection, try again!');
    }
}
