<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks',function(){
    $data = App\Models\Task::all();
    return view('tasks')->with('mydata',$data);
});


// Route::get('/about',function(){
//     return view('aboutus');
// });

// Route::get('/contactus',function(){
//     return view('contactus');
// });


// Route::get('/about',[<<controller name>>::class,'<<function name>>']);
// ex: Route::get('/about',[PagesController ::class,'indexaboutus']);
// Route::get('/about',[PagesController::class,'indexaboutus']);

// Route::get('/contact',[PagesController::class,'indexcontactus']);
Route::post('/saveTask',[TaskController::class,'store']);
Route::get('/markascompleted/{id}',[TaskController::class,'updateTaskAsCompleted']);
Route::get('/markasnotcompleted/{id}',[TaskController::class,'updateTaskAsNotCompleted']);
Route::get('/taskdelete/{id}',[TaskController::class,'taskDelete']);
Route::get('/taskupdate/{id}',[TaskController::class,'taskUpdate1']);
Route::post('/updateview',[TaskController::class,'taskUpdate2']);