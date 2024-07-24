<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function index()
    {
        // $jobs = Job::latest()->get(); //order by the created at in asc 
        $jobs = Job::with('employer')->paginate(2);
        return view('jobs.index' , ["jobs"=>$jobs]);
    }

    public function create()
    {
        
        return view("jobs.create");
    }

    public function store(Request $request , Job $job)
    {
        request()->validate([
                'title'=>['required', 'min:3'],
                'salary'=>['required']
        ]);

        Job::create([
            'title'=>request('title'),
            'salary'=>request('salary'),
            'employer_id' => Auth::user()->employer->id
        ]);

        return redirect("/jobs");
    }

    public function show(Job $job)
    {
        return view("jobs.show", ["job" => $job]);
    }


    public function edit(Job $job)
    {
        if(Auth::guest()){
            return redirect("/jobs");
        }
        if($job->employer->user_id !== strval(Auth::id())){
            abort(403);
        }
        return view("jobs.edit", ["job" => $job]);

    }

    public function update(Request $request, Job $job)
    {
       
            request()->validate([
                'title'=>['required','min:3'],
                'salary'=>['required']
            ]);

            $job->update([
                'title'=>request('title'),
                'salary'=>request('salary'),
            ]);

            return redirect("/jobs");

    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect("/jobs/");
    }
}
