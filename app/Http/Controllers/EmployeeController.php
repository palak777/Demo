<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeData = Employee::all();

        return response()->json($employeeData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employeeData=new Employee([    
            'first_name'=>$request->get('first_name'),
            'last_name'=>$request->get('last_name'),
            'email'=>$request->get('email'),
            'password'=>$request->get('password'),
            'mobile_no'=>$request->get('mobile_no')
        ]); 
        
        $employeeData->save();  
        
        return response()->json( 'Successfully Added !');       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeeData=Employee::find($id);
        
        return response()->json($employeeData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employeeData=Employee::find($id);
        $employeeData->first_name=$request->get('first_name');
        $employeeData->last_name=$request->get('last_name');
        $employeeData->email=$request->get('email');
        $employeeData->password=$request->get('password');
        $employeeData->mobile_no=$request->get('mobile_no');
        
        $employeeData->save();

        return response()->json('Successfully Updated');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employeeData=Employee::find($id);
        $employeeData->delete();    
        return response()->json('Successfully Deleted !');
    }
}
