<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Job;
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

        Gate::define('edit-job', function (User $user, Job $job) {
            return $job->employer->user_id === strval($user->id);
        });
        Gate::authorize('edit-job', $job);
      
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
