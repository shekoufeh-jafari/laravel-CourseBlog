<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\course;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $courses=course::all();
        return view('admin.panel', compact('courses'));
    }

    public function showAdd()
    {
        return view('admin.addcourse');
    }

    public function addcourse(Request $request) {
        if($request->hasFile('image')){
            $myfile= time().".".$request->image->extension();
            $request->image->move(public_path('Admin'),$myfile);
            $dataForm = $request->all();
            $dataForm['image'] =$myfile;
            course::create($dataForm);
            return redirect()->route(('admin.add'));
        }
    }

    public function edit($id)
    {
        $courses = course::find($id);
        return view('admin.editcourse', compact('courses'));
    }

    public function update(Request $request,$id)
    {
        $courses=course::find($id);
        if ($request->hasFile('image')) {
            $myfile = time() . "." . $request->image->extension();
            $request->image->move(public_path('Admin'), $myfile);
            $dataForm = $request->all();
            $dataForm['image'] = $myfile;

            $courses->update($dataForm);
            return redirect()->route(('admin.panel'));
        }
    }


    public function delete($id){
        $courses=course::find($id);
        $courses->delete();
        return redirect()->route(('admin.panel'));
    }
}
