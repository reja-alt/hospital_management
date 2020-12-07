<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Department;
use DB;

class DepartmentController extends Controller
{
    
    public function index()
    {
        $departments=Department::all();
        return view('backend.departments.index',compact('departments'));

    }

    
    public function create()
    {
        return view('backend.departments.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'dept_name' => 'required',
            'dept_description' => 'required',
         ]);
         $departments= new Department();
         $departments->dept_name=$request->dept_name;
         $departments->dept_description=$request->dept_description;
         $departments->status=$request->status;
         $departments->save();
         $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect('/department')->with( $notification);
    }

    
    public function show($dept_id)
    {
        //
    }

   
    public function edit($dept_id)
    {
        $department=Department::findorFail($dept_id);
        return view('backend.departments.edit',compact('department'));

    }

   
    public function update(Request $request, $dept_id)
    {
        $this->validate($request, [
            'dept_name' => 'required',
            'dept_description' => 'required',
         ]);
         $department=Department::findorFail($dept_id);
         $departments->dept_name=$request->dept_name;
         $departments->dept_description=$request->dept_description;
         $departments->status=$request->status;
         $departments->save();
         $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect('/department')->with( $notification);
    }

    
    public function destroy($dept_id)
    {
        DB::table('departments')->where('id',$dept_id)->delete();
        $notification=array(
            'message'=>'Successfully Deleted',
            'alert-type'=>'success'
        );
     
        return redirect()->route('department.index')->with($notification);
    }
}
