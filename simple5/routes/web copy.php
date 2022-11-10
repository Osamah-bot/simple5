<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Models\Patient;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PatientController; 
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::get('/admin', function () {
    return view('admin_index');
})->middleware('auth');


Route::get('/d', function () {
    return view('dashboard');
});




Route::get('/', [LanguageController::class, 'index'])->name('home');
Route::get('/lan-change', [LanguageController::class, 'langChange'])->name('lan.change'); 

// //Route::get('/read', [PatientController::class, 'read']);
// Route::get('/read3', 'PatientController@index')->name('read');


// Route::get('/read2', function () {
//     $result=Patient::all();
//      echo $result; 
//      foreach($result as $r){
//       //   return $r->title;
//          //echo $result;  
//      }
    
//  });


//  Route::get('/read3', function () {
//     return view('index');
    
//  });

 
//  Route::post('/read4/{id}', function ($id) {
//     echo $id;
    
//  }); 

//  Route::get('/patientprofile', function () {
//     return view('patient-profile');
    
//  });

 
//  Route::get('/login', function () {
//     return view('login');
    
//  })->name('login');
//  Route::post('/login/{data}', 'AccountController@index');

// Auth::routes();


// // Route::get('login', [AuthController::class, 'index'])->name('login');
// // Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');

// Route::get('admin/home', 'HomeController@adminHome')->name('admin.home');

// Auth::routes();

// Route::get('/home2', 'HomeController@index')->name('home2');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');



// Route::get('/home', 'HomeController@index')->name('home');

// Route::group(['middleware' => ['auth:account']], function() {
//    Route::get('/read', [AccountController::class, 'index']);
//  });


 //Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'));


 Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

