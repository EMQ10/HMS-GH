<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminController;
// use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\SuperAdmin\HospitalController;
use App\Http\Controllers\Receptionist\PatientController;
// use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Nurse\NurseController;
use App\Http\Controllers\Nurse\VisitController;
use App\Http\Controllers\Nurse\VitalController;
use App\Http\Controllers\Doctor\ConsultationController;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
// use Axiom\Rules\StrongPassword;
// use App\Http\Controllers\Receptionist\ReceptionistController;
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

Route::view('/','login');
Route::view('login','login');

Route::get('/forgot-password', function () {
    return view('auth.passwords.email');
})->name('password.request');

Route::post('/forgot-password', function (Request $request) {   
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:5|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('logout')->with('statusPassword', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->name('password.update');





Route::get('logout',[UserController::class, 'logout'])->name('logout');
Route::post('login',[UserController::class, 'login'])->name('login');

/* Need to be auhenticated to access the routes below  */

Route::group(['middleware' => ['auth','prevent_back_history']], function(){

    Route::get('login/{id}',[UserController::class, 'chosen'])->name('chosen');
    Route::get('login/r/{id}',[UserController::class, 'chosenRole'])->name('chosenRole');

    Route::group(['middleware' => 'AllAppUsersAuth'],function (){
        // Route::get('back', [UserController::class, 'back'])->name('back');
        
        Route::group(['middleware'=> 'SuperAdminAuth', 'prefix' => 'superadmin', 'as' => 'superadmin.'],function () {
            Route::get('/', [SuperAdminController::class, 'index'])->name('index');
            // Route::get('employees', [AdminController::class, 'employees'])->name('employees');
            // Route::get('employees/department/{id}', [AdminController::class, 'employeemployeesesByDepartment'])->name('employees');
            
            Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');
            Route::get('employees/create', [EmployeeController::class, 'create'])->name('employees.create');
            Route::get('employees/edit/{employee}', [EmployeeController::class, 'edit'])->name('employees.edit');
            Route::put('employees/update/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
            Route::post('employees/store', [EmployeeController::class, 'store'])->name('employees.store');
            Route::resource('departments', App\Http\Controllers\SuperAdmin\DepartmentController::class);
            Route::resource('doctors', App\Http\Controllers\Admin\DoctorController::class);
            Route::resource('nurses', App\Http\Controllers\Admin\NurseController::class);
            Route::resource('receptionists', ReceptionistController::class);
            Route::resource('hospitals', HospitalController::class);
        });

        Route::group(['middleware' => 'AdminAuth', 'prefix' => 'admin', 'as' => 'admin.' ],  function(){

            Route::get('/', [AdminController::class, 'index'])->name('index');
            // Route::get('employees', [AdminController::class, 'employees'])->name('employees');
            // Route::get('employees/department/{id}', [AdminController::class, 'employeemployeesesByDepartment'])->name('employees');
            
            Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');
            Route::get('employees/create', [EmployeeController::class, 'create'])->name('employees.create');
            Route::get('employees/edit/{employee}', [EmployeeController::class, 'edit'])->name('employees.edit');
            Route::put('employees/update/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
            Route::post('employees/store', [EmployeeController::class, 'store'])->name('employees.store');
            Route::resource('departments', DepartmentController::class);
            Route::resource('doctors', App\Http\Controllers\Admin\DoctorController::class);
            Route::resource('nurses', App\Http\Controllers\Admin\NurseController::class);
            Route::resource('receptionists', ReceptionistController::class);
        });
    
    
        Route::group(['middleware' => 'DoctorAuth', 'prefix' => 'doctor', 'as' => 'doctor.'],  function(){ 
            // Route::view('todayvitals','Doctor/today_vitals')->name('todayvitals');
            Route::get('/', [App\Http\Controllers\Doctor\DoctorController::class, 'index']);
            // Route::get('visits/{visit}', [App\Http\Controllers\Doctor\VisitController::class, 'index'])->name('v');
            Route::resource('visits', App\Http\Controllers\Doctor\VisitController::class)->only(['index','show']);
            

            Route::get('consultation/initiate/{visit}', [ConsultationController::class, 'create'])->name('consultation.initiate');
            
            Route::put('consultation/end/{visit}', [ConsultationController::class, 'end'])->name('consultation.end');
            Route::resource('consultation', ConsultationController::class);
           
    
        });
    
        Route::group(['middleware' => 'NurseAuth', 'prefix' => 'nurse', 'as' => 'nurse.'],  function(){ 
    
            Route::get('/', [NurseController::class, 'index'])->name('index');
            Route::get('visit/choice', [VisitController::class, 'choice'])->name('visit.choice');
            Route::get('visits', [VisitController::class, 'index'])->name('visit.index');
            Route::get('visit/create', [VisitController::class, 'create'])->name('visit.create');
            Route::post('visit/store', [VisitController::class, 'store'])->name('visit.store');
            Route::get('visit/edit/{visit_id}', [VisitController::class, 'edit'])->name('visit.edit');
            Route::put('visit/update/{visit}', [VisitController::class, 'update'])->name('visit.update');
            Route::get('vitals/save/{visit}', [VitalController::class, 'create'])->name('vitals.save');
            Route::get('vitals/patient/{patient}', [VitalController::class, 'index'])->name('vitals.patient');
            Route::resource('vitals', VitalController::class);
        });
    
        Route::group(['middleware' => 'ReceptionistAuth', 'prefix' => 'receptionist', 'as' => 'receptionist.'],  function(){ 
    
 
            Route::get('/', [App\Http\Controllers\Receptionist\ReceptionistController::class, 'index']);
            Route::get('patients', [PatientController::class, 'index'])->name('patients.index');
            Route::get('patient/{patient:registration_number}', [PatientController::class, 'generate_card'])->name('patients.card');
            Route::post('patients', [PatientController::class, 'index'])->name('patients.index');
            Route::get('patients/create', [PatientController::class, 'create'])->name('patients.create');
            Route::post('patients/store', [PatientController::class, 'store'])->name('patients.store');
            Route::get('patients/edit/{patient:registration_number}', [PatientController::class, 'edit'])->name('patients.edit');
            Route::put('patients/update/{patient:registration_number}', [PatientController::class, 'update'])->name('patients.update');
        });
        
    });
   

    



});

// Auth::routes();
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
