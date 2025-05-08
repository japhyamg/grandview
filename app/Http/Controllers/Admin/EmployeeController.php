<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = User::where('role', 'user')->orderBy('created_at', 'desc')->get();
        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('admin.employees.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate Input
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required',
            'department' => 'required'
        ]);

        if ($validator->fails()) {
            // If validation fails return with error
            return back()->withErrors($validator)->withInput();
        }else{
            $department = Department::where('slug', $request->department)->first();
            // Create Employee
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'department_id' => $department->id
            ]);
            return redirect(route('admin.employees.index'))->with('success', 'Employee added successfully.');
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
        $employee = User::where('id', $id)->first();
        if($employee){
            // Show view if found
            $departments = Department::all();
            return view('admin.employees.edit',compact('employee', 'departments'));
        }
        // Return with error if not found
        return redirect(route('admin.employees.index'))->with('error', 'Invalid selection, try again!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Fetch the User By Id
        $user = User::where('id', $id)->first();
        if($user){
            // Validate Input
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$user->id,
                'role' => 'required',
                'department' => 'required'
            ]);

            if ($validator->fails()) {
                // If validation fails return with error
                return back()->withErrors($validator)->withInput();
            }else{
                $department = Department::where('slug', $request->department)->first();
                $user->name =  $request->name;
                $user->email =  $request->email;
                $user->role =  $request->role;
                $user->department_id =  $department->id;
                if($request->password != null && empty($request->password)){
                    $user->password =  Hash::make($request->password);
                }
                // Update user
                $user->save();
                return redirect(route('admin.employees.index'))->with('success', 'Employee updated successfully.');
            }
        }
        // Return with error if not found
        return redirect(route('admin.employees.index'))->with('error', 'Invalid selection, try again!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Fetch the Department By Id
        $user = user::where('id', $id)->first();
        if($user){
            // Delete user
            $user->delete();
            return redirect(route('admin.employees.index'))->with('success', 'Employee deleted successfully');
        }
        // Return with error if not found
        return redirect(route('admin.employees.index'))->with('error', 'Invalid selection, try again!');
    }
}
