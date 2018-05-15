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
       // dd($employeeData);
        return response()->json($employeeData);
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
            'full_name'=>$request->get('full_name'),
            'email'=>$request->get('email'),
            'country'=>$request->get('country'),
            'address'=>$request->get('address'),
            'gender'=>$request->get('gender'),
            'bdate'=>$request->get('bdate'),     
            'hobbies'=>$request->get('hobbies')
        ]); 
        
        $employeeData->save();  
        return response()->json( 'Successfully Added !');       

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
        $employeeData->full_name=$request->get('full_name');
        $employeeData->email=$request->get('email');
        $employeeData->country=$request->get('country');
        $employeeData->address=$request->get('address');
        $employeeData->gender=$request->get('gender');
        $employeeData->bdate=$request->get('bdate');        
        $employeeData->hobbies=$request->get('hobbies');
        $employeeData.save();

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
        return redirect()->json('Successfully Deleted !');
    }
}
