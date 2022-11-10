<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctoreController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AccountantController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ReviewController;
// use App\Models\Appointment;
// use App\Models\Review;
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
     Route::get('/lan-change', [LanguageController::class, 'langChange'])->name('lan.change');

     Route::get('/', function () {
      return view('welcome');
      });


        Route::middleware(['auth','account-access:Admin'])->prefix('/admin')->group(function(){
         Route::get('/', [AdminController::class, 'index'])->name('admin.dash');
      });

//////////////// Admin process////////////
   /* ---------------
       All patient processs
      --------------- */
   Route::middleware(['auth','account-access:Admin'])->prefix('/admin/patient')->group(function(){
      Route::get('/patientlist',[AdminController::class, 'patientList'] )->name('admin.patientlist');
      Route::get('/add_patient',[PatientController::class, 'create'] )->name('admin.add_patient');
      Route::post('/add_patient',[PatientController::class, 'store'])->name('admin.add_patient');
      Route::get('/deletepatient/{id}',[PatientController::class, 'delete']);
      Route::get('/appointmentlist/{id}',[PatientController::class, 'show'] )->name('admin.patient_appoi_list');
      Route::get('/editepatient/{id}',[PatientController::class, 'edit'] )->name('admin.editepatient');
      Route::post('/editepatient/{id}',[PatientController::class, 'update'] )->name('admin.updatepatient');
      Route::post('/findpatient',[PatientController::class, 'search'] )->name('admin.searchpatient');
      Route::post('/changpass',[AdminController::class, 'changPatientPass'] )->name('admin.chang-patient-pass');

   });

     /* ---------------
       All Appoinements processs
      --------------- */
   Route::middleware(['auth','account-access:Admin'])->prefix('/admin/appoinement')->group(function(){
      Route::get('/',[AppointmentController::class, 'index'] )->name('admin.appoilist');
      Route::get('/add',[AppointmentController::class, 'create'] )->name('admin.addappoi');
      Route::get('/add{id}',[AppointmentController::class, 'create2'])->name('admin.addappoi2');
      Route::post('/add',[AppointmentController::class, 'store'])->name('admin.appoistore');
      Route::get('/show/{id}',[AppointmentController::class, 'showReviews'] )->name('appoi.appoi_reviews');
      Route::get('/admin-accept-review/{id}',[ReviewController::class, 'acceptReview'] )->name('admin.accept-review');
      Route::get('/admin-delete-review/{id}',[ReviewController::class, 'deleteReview'] )->name('admin.delete-review');
      Route::get('/admin-reject-review/{id}',[ReviewController::class, 'rejectReview'] )->name('admin.reject-review');
   });


     /* ---------------
       All Doctor processs
      --------------- */
      Route::middleware(['auth','account-access:Admin'])->prefix('/admin/doctor')->group(function(){
        Route::get('/doctorlist',[DoctoreController::class, 'index'] )->name('admin.doctorlist');
        Route::get('/add_doctor',[DoctoreController::class, 'create'] )->name('admin.add_doctor');
        Route::post('/add_doctor',[DoctoreController::class, 'store'])->name('admin.add_doctor');
        Route::get('/editdoctorprofile/{id}',[DoctoreController::class, 'edit'] )->name('admin.editdoctorprofile');
        Route::post('/editdoctorprofile',[DoctoreController::class, 'update'] )->name('admin.editdoctorprofile');
        Route::post('/changpass',[AdminController::class, 'changDoctorPass'] )->name('admin.chang-doctor-pass');

     });

  /* ---------------
       All Department processs
      --------------- */
      Route::middleware(['auth','account-access:Admin'])->prefix('/admin/department')->group(function(){
        Route::get('/',[DepartmentController::class, 'index'] )->name('admin.deptlist');
        Route::get('/create',[DepartmentController::class, 'create'] )->name('admin.creatdept');
        Route::post('/store',[DepartmentController::class, 'store'] )->name('admin.adddept');

     });
////////////////End Admin process////////////


///////////////////// patient process////////////
Route::middleware(['auth','account-access:Patient'])->prefix('/patient')->group(function(){
    Route::get('/',[PatientController::class, 'index'] )->name('patient.home');
    Route::get('/appointmentlist',[PatientController::class, 'appointmentList'] )->name('patient.appoilist');
    Route::get('/createappoi',[AppointmentController::class, 'create5'])->name('patient.createappoi');
    Route::get('/createappoi2/{id}',[AppointmentController::class, 'create6'])->name('patient.createappoi2');
    Route::post('/add',[AppointmentController::class, 'store'])->name('patientappoi.store');
    Route::get('/profile',[PatientController::class, 'profile'] )->name('patient.prfile');
    Route::post('/update',[PatientController::class, 'update'] )->name('patient.update');
    Route::post('/changpass',[PatientController::class, 'changPass'] )->name('patient.changpass');
    });
/////////////////////end patient process////////////



///////////////////// Doctor process////////////
Route::middleware(['auth','account-access:Doctor'])->prefix('/doctor')->group(function(){
    Route::get('/',[DoctoreController::class, 'dash'] )->name('doctor.appoi_list');
    Route::get('/doc-accept-review/{id}',[ReviewController::class, 'acceptReview'] )->name('doctor.accept-review');
    Route::get('/doc-delete-review/{id}',[ReviewController::class, 'deleteReview'] )->name('doctor.delete-review');
    Route::get('/doc-reject-review/{id}',[ReviewController::class, 'rejectReview'] )->name('doctor.reject-review');
    });
/////////////////////end Doctor process////////////

///////////////////// Accountant process////////////
Route::middleware(['auth','account-access:Accountant'])->prefix('accountant')->group(function(){
    Route::get('/',[AccountantController::class, 'dash'] )->name('accountant.dash');
    Route::get('/patients',[AccountantController::class, 'patientList'] )->name('accountant.patientlist');
    Route::get('/createappoi',[AppointmentController::class, 'create3'] )->name('accountant.createappoi');
    Route::get('/createappoi/{id}',[AppointmentController::class, 'create4']);
    Route::post('/storeappo',[AppointmentController::class, 'store'])->name('accountant.storeappoi');
    Route::get('/createpatient',[PatientController::class, 'create2'] )->name('accountant.createpatient');
    Route::post('/storepatient',[PatientController::class, 'store'])->name('accountant.storepatient');
    Route::get('/accountant-accept-review/{id}',[ReviewController::class, 'acceptReview'] );
    Route::get('/accountant-reject-review/{id}',[ReviewController::class, 'rejectReview'] );
    });
/////////////////////end Accountant process////////////




//    use Faker\Generator as Faker;


// Route::get('/d3a', function (Faker $faker) {
//     return $faker->name;
// });

Route::get('/appointmentlist',[PatientController::class, 'appointmentList2'] )->name('patient.appoilist2');
