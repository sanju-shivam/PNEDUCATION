<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\SuperAdmin\Subject;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Cache;

class SubjectController extends Controller
{
    public function create()
    {
        return view('SuperAdmin.Subject.Add_Subject');
    }

    public function store(Request $request)
    {

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
        return view('SuperAdmin.Subject.Add_Subject');
    }

    public function index()
    {

    	$Subject = Cache::remember('subjects',60*60,function(){
            return Subject::all();
        });
        return view('SuperAdmin.Subject.View_subject', compact('Subject'));
    }

    public function edit($id){
        $Subject = Subject::find($id)->first();
        return view('SuperAdmin.Subject.Edit_Subject', compact('Subject'));
    }

    public function update(Request $request, $id){
        try{

            DB::transaction(function () use ($request){
                DB::table('subject')->insert([
                    'name'  =>  $request->name,
                    'created_at'    =>  Carbon::now(),
                    'updated_at'    =>  Carbon::now(),

                ]);
            });
        }
        catch(\Exception $e){
          $s = explode('for', $e->errorInfo[2]);
          return back()->with('warning', $s[0]);
        }

        return redirect('class/index')->with('success', 'Subject Updated Successfully..!!');

    }

    public function delete($id){
        try{
            DB::transaction(function() use($id){
                // DELETE DATA IN  SUBJECT TABLE
                 Subject::find($id)->delete();
            });
        }
        catch(\Exception $e){
           $s = explode('for', $e->errorInfo[2]);
          return back()->with('warning', $s[0]);
        }
        return redirect('subject/index')->with('success', 'Subject has been Deleted');

        $Subject =Subject::all();
        return view('SuperAdmin.Subject.View_subject', compact('Subject'));
    }


    public function deleted_Subjects()
    {
        $Subject = Cache::remember('deleted-subjects',60*60,function(){
            return Subject::onlyTrashed()->get();
        });
        return view('SuperAdmin.Subject.deleted_Subjects', compact('Subject'));
    }


    public function permanent_delete($id)
    {
        Subject::onlyTrashed()->find($id)->forceDelete();
        return back()->with('success', 'Subject has been Deleted Permanent');
    }


    public function restore($id)
    {
        Subject::onlyTrashed()->find($id)->restore();
        return back()->with('success', 'Subject has been Restored');
    }
}