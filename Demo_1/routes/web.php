<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\RegisterationController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\LoginController;
use App\Models\Post;
use App\Models\Job;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// ------------------------------------- Jobs ----------------------------------- \\

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/jobs', function () {
//     // $jobs = Job::all();
//     // $jobs = Job::factory(5)->create(); 
//     // $jobs = Job::with('employer')->get();
//     $jobs = Job::with('employer')->paginate(2);

//     // dd($jobs);
    
//     return view('jobs' , ["jobs"=> $jobs]);
// });

// Route::get('/job/{id}', function ($id) {
//     $job = Job::find($id);
//     return view('job', ['job'=>$job]);
// });

// Route::Resource("jobs" , JobController::class);

Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');      
Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create'); 
Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');   
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');  
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit')->middleware('auth')->can("edit","job"); 
Route::patch('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy'); 


// ------------------------------------- Registeration ----------------------------------- \\
Route::get("/register" , [RegisterationController::class , 'create'])->name('register.create');
Route::post("/register" , [RegisterationController::class , 'store'])->name('register.store');


Route::get("/login" , [LoginController::class , 'create'])->name('login');
Route::post("/login" , [LoginController::class , 'store'])->name('login.store');
Route::post("/logout" , [LoginController::class , 'destroy'])->name('login.destroy');

// -----------------------------------------Queue and jobs------------------------------------------------ \\


Route::get('/dipatch-queued-closure', function () {
    dispatch(function () {
        Log::info('Hello from queue');
    });
    
    return "Dispatching a Queued Closure is done";
});

Route::get('/dipatch-job', function () {

    $job =  App\Models\Job::find(1);    
    App\Jobs\TranslatePostedJob::dispatch($job);
    
    return "Dispatching a job is done";
});
// ---------------------------------------------------------------------------------------------- \\
// Method 1
// Route::get("/posts" , [PostController::class , 'index'])->name('posts.index');
// Route::get("/posts/create" , [PostController::class , 'create'])->name('posts.create');
// Route::get("/posts/{post}" , [PostController::class , 'show'])->name('posts.show');
// Route::post("/posts" , [PostController::class , 'store'])->name('posts.store');
// Route::get('/posts/{post}/edit', [PostController::class , 'edit'] )->name('posts.edit');
// Route::patch('/posts/{post}',  [PostController::class , 'update'])->name('posts.update');
// Route::delete('/posts/{post}', [PostController::class , 'destroy'])->name('posts.delete');

// Method 2
// Route::controller(PostController::class)->group(function(){
//     Route::get("/posts" , [PostController::class , 'index'])->name('posts.index');
//     Route::get("/posts/create" , [PostController::class , 'create'])->name('posts.create');
//     Route::get("/posts/{post}" , [PostController::class , 'show'])->name('posts.show');
//     Route::post("/posts" , [PostController::class , 'store'])->name('posts.store');
//     Route::get('/posts/{post}/edit', [PostController::class , 'edit'] )->name('posts.edit');
//     Route::patch('/posts/{post}',  [PostController::class , 'update'])->name('posts.update');
//     Route::delete('/posts/{post}', [PostController::class , 'destroy'])->name('posts.delete');
// });

//Method 3
Route::Resource("posts" , PostController::class);

// Route::Resource("posts" , PostController::class , [
    // "only"=>['index' , 'show']
    // "except"=>['index' , 'show']
// ]);


//Auth 
// Route::get('/register' ,  [RegisterUserController::class , 'create'])->name("regiter.create");
// Route::post('/register' ,  [RegisterUserController::class , 'store'])->name("regiter.store");

// Route::get('/login' , [SessionController::class , 'create'])->name("login.create");
// Route::post('/login' , [SessionController::class , 'store'])->name("login.store");
// Route::post('/logout' , [SessionController::class , 'destroy'])->name("logout");

