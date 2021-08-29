# Laravel-ToDo-App
My First Laravel Project(Crud Operations)


Laravel Commands
________________________________________
01)	Checking Version
composer -v

02)	Creating Laravel Project
composer create-project laravel/laravel app-name 

03)	Starting php server
Php artisan server

Views Should end with .blade.php


Routing

To do routing in our website, we can do two options.
01)	Direct Routing 
Route::get('/contactus',function(){
    return view('contactus');
});

02)	Routing through the Controller
First we have to make a Controller by using terminal.
Command: php artisan make:controller <<controllerName>>
Create a function in controller class and return something.
public function indexaboutus(){
      return view('aboutus');
  }
		
After that in routes folder, web.php;
use App\Http\Controllers\PagesController;

// Route::get('/about',[<<controller name>>::class,'<<function name>>']);
// ex: Route::get('/about',[PagesController ::class,'indexaboutus']);
Route::get('/about',[PagesController::class,'indexaboutus']);

________________________________________
Creating a Model:-
php artisan make:model model_name
php artisan make:model model_name -m
php artisan migrate
m = creating migration while creating a model  
________________________________________
Connecting Database into Laravel Project
•	open localhost/phpMyAdmin in chrome or any other browser(make sure to start apache and MySQL serve via xampp).

•	Then create a Database. Since we use a framework we do not need to create tables through the phpMyAdmin panel. It automatically creates tables when we create database in laravel project
Database -.> Factories -> migrations


•	Go to .env(environment) file , then find DB_CONNECTION section,
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todoapp
DB_USERNAME=root
DB_PASSWORD= null or empty


•	Then go to relevant migration file and create your Schema inside the up function.
Ex:-
use Illuminate\Support\Facades\Schema;

public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('task');
            $table->boolean('iscompleted')->default(0);
            $table->timestamps();
        });
    }


•	Go to Providers_folder -> AppServiceProvider.php
use Illuminate\Support\Facades\Schema;
(To avoid exceptions regarding datatype sizes)
public function boot()
    {
        //
        Schema::defaultStringLength(191);
    }


•	Connecting table into database:-

Don’t forget to insert csrf = {{csrf_field()}} inside the form.
Task_Controller.php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; //Model path

class TaskController extends Controller
{
    public function store(Request $request){
        //die dom
        //dd($request->all());
        $task = new Task;
        $task->task = $request->task;
        $task->save();
        return redirect()->back();
        //return view('view_name');
    }
}


Web.php
Route::get('/tasks',function(){
    return view('tasks');
});
Route::post('saveTask',[TaskController::class,'store']);


Validation Part:

Inside the Controller Function:-
$this->validate($request,[
            'input_name'=>'required|max:100|min:5',
        ]);

At view file:-
@foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                    @endforeach





Route Methods
•	GET
•	POST
•	PUT
•	DELETE
•	PATCH
•	OPTIONS

