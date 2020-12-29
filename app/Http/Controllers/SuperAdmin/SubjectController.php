<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\SuperAdmin\Subject;
use Illuminate\Http\Request;
use DB;

class SubjectController extends Controller
{
    public function create()
    {
        return view('SuperAdmin.Subject.Add_Subject');
    }

    public function store(Request $request)
    {
<<<<<<< HEAD
    	try{
    		DB::transaction(function () use ($request){
    			DB::table('subject')->insert([
    				'name'	=>	$request->name
    			]);
    		});
    	}
    	catch(\Exception $e){
    		return back()->with('error','Subject Not Added SuccsFully');
    	}
=======
        try{
            DB::transaction(function () use ($request){
                DB::table('subject')->insert([
                    'name'  =>  $request->name
                ]);
            });
        }
        catch(\Exception $e){
            return back()->with('error','Subject Not Added SuccsFully');
        }
>>>>>>> 7d5cf9776c445f63ba04f7dc019bb9a0a57d6f5f
        return view('SuperAdmin.Subject.Add_Subject');
    }

    public function index()
    {
<<<<<<< HEAD
    	$Subject =Subject::all();
        return view('SuperAdmin.Subject.View_subject', compact('Subject'));
    }

    public function edit($id){
        $Subject = Subject::find($id)->first();
        return view('SuperAdmin.Subject.Edit_Subject', compact('Subject'));
    }

    public function update(Request $request, $id){
        try{
            DB::transaction(function() use($request, $id){
                // INSERT DATA IN SUBJECT TABLE
                Subject::find($id)->update([
                    'name' =>$request->name,
                ]);
            });
        }
        catch(/Exception $e){
          $s = explode('for', $e->errorInfo[2]);
          return back()->with('warning', $s[0]);
        }
        return redirect('class/index')->with('success', 'Subject Updated Successfully..!!');
    }

    public function delete($id){
        try{
            DB::transaction(function() use($id)){
                // DELETE DATA IN  SUBJECT TABLE
                 Subject::find($id)->delete();
            });
        }
        catch(\Exception $e){
           $s = explode('for', $e->errorInfo[2]);
          return back()->with('warning', $s[0]);
        }
        return redirect('class/index')->with('success', 'Subject has been Deleted');
=======
        $Subject =Subject::all();
        return view('SuperAdmin.Subject.View_subject', compact('Subject'));
>>>>>>> 7d5cf9776c445f63ba04f7dc019bb9a0a57d6f5f
    }

    public function edit($id){
        $Subject = Subject::find($id)->first();
        return view('SuperAdmin.Subject.Edit_Subject', compact('Subject'));
    }

    public function update(Request $request, $id){
        try{
            DB::transaction(function() use($request, $id){
                // INSERT DATA IN SUBJECT TABLE
                Subject::find($id)->update([
                    'name' =>$request->name,
                ]);
            });
        }
        catch(/Exception $e){
          $s = explode('for', $e->errorInfo[2]);
          return back()->with('warning', $s[0]);
        }
        return redirect('class/index')->with('success', 'Subject Updated Successfully..!!');
    }

    public function delete($id){
        try{
            DB::transaction(function() use($id)){
                // DELETE DATA IN  SUBJECT TABLE
                 Subject::find($id)->delete();
            });
        }
        catch(\Exception $e){
           $s = explode('for', $e->errorInfo[2]);
          return back()->with('warning', $s[0]);
        }
        return redirect('class/index')->with('success', 'Subject has been Deleted');
    }
}