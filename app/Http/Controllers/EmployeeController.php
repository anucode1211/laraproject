<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class EmployeeController extends Controller
{

    public function index()
    {
        $employee=Employee::all();
        return response()->json($employee);
    }


        public function store(Request $request)
    {
         $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'pancardno' 
        ]);
        if($request)
        {
        $employee = new Employee;
        $employee->name = $request->username;
        $employee->email = strtolower($request->email);
        $employee->contact = $request->contact;
        $employee->address = $request->address;
        $employee->pancardno = $request->pancardno;
        $employee->save();
        }
       
    }

    public function show($id)
    {
        $employee=DB::table('employees')->where('id',$id)->first();
        return response()->json($employee);
    }

 
}

