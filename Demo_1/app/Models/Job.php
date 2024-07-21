<?php

namespace  App\Models;
use Illuminate\Support\Arr;

class Job  {
    public static function all (){
        return [
            [
                "id"=>1,
                "title"=> "Full Stack Developer",
                "salary"=> 25000
            ],
            [
                "id"=>2,
                "title"=> "Front End Developer",
                "salary"=> 20000
            ],
            [
                "id"=>3,
                "title"=> "Back End Developer",
                "salary"=> 20000
            ],
        ];
    }
    public static function find (int $id): array
    {
       $job = Arr::first(Job::all() , fn($job)=>$job['id'] == $id);
       if(! $job){
        abort(404);
       }
        return  $job;
    }
}
?>