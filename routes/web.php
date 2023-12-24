<?php

use App\Models\Consultation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\LabTestController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\PaymentListController;
use App\Http\Controllers\UserPaymentController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ConsultationsController;

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



Route::get('/logo', function () {
    return response()->file(public_path('images/SUMAS-logo.png'));
})->name('logo');

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/healthcare', 'healthcare')->name('healthcare');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/submit', 'submitinfo')->name('submit');
});

Route::controller(UserAuthController::class)->group(function () {
    Route::get('/signin', 'getsignin')->name('getsignin');
    Route::post('/signin', 'postsignin')->name('postsignin');
    Route::get('/signup', 'getsignup')->name('getsignup');
    Route::post('/signup', 'postsignup')->name('postsignup');
    Route::get('/signout', 'signout')->middleware('auth')->name('signout');
    Route::get('/forgot-password', 'ForgetPassword')->middleware('guest')->name('password.request');
    Route::post('/forgot-password', 'requestResetMail')->middleware('guest')->name('password.email');
    Route::get('/reset-password/{token}', 'resetPassword')->middleware('guest')->name('password.reset');
    Route::post('/reset-password',  'updatePassword')->middleware('guest')->name('password.update');
});



Route::controller(AdminController::class)
    ->prefix('admin')->name('admin.')
    ->middleware(['auth', 'role:all'])
    ->group(function () {

        Route::get('/', 'index')->name('index');

        Route::get('/adduser', 'adduser')->name('adduser');
        Route::post('/submituser', 'submituser')->name('submituser');
        Route::get('/viewuserdata/{id?}', 'viewuserdata')->name('viewuserdata');
        //    Route::get('/viewuserdata', 'viewuserdata')->name('viewuserdata');
        Route::get('/user/{id}', 'getUser')->name('user-profile');


        Route::get('/addstaff', 'addstaff')->name('addstaff');
        Route::post('/submitstaff', 'submitstaff')->name('submitstaff');
        Route::get('/viewstaffdata', 'viewstaffdata')->name('viewstaffdata');


        Route::get('/deletedata/{type}/{id}', 'deletedata')->name('deletedata');

        Route::get('/search', 'search')->name('search');


        Route::post('/search', 'search')->name('search.post');
        Route::get('{id}/paymentstatus', 'updateForm')->name('payment.status');
        Route::get('allpayments', 'allPayments')->name('allpayments');
        Route::put('status/{id}/update', 'updatePaymentStatus')->name('paymentstatus.update');
    });


Route::controller(ExaminationController::class)
    ->prefix('admin')->name('admin.')
    ->middleware(['auth', 'role:all'])
    ->group(function () {
        Route::post('/examinations/create', 'create')->name('createexamination');
        Route::get('/examinations/{id}', 'indexForm')->name('addexamination');
        Route::get('/examinations', 'index')->name('viewexaminations');
        Route::get('/examination/{id}/edit', 'editForm')->name('editexamination');
        Route::put('/examination/{id}/update', 'update')->name('updateexamination');
        Route::get('/examination/delete/{id}', 'delete')->name('deleteexamination');
        Route::get('/examination/{id}', 'getExamination')->name('examination');
    });



Route::controller(ConsultationsController::class)
    ->prefix('admin')->name('admin.')
    ->middleware(['auth', 'role:all'])
    ->group(function () {
        Route::post('/consultations/create', 'create')->name('createconsultation');
        Route::get('/consultations/{id}', 'indexForm')->name('addconsultation');
        Route::get('/consultations', 'index')->name('viewconsultations');
        Route::get('/consultation/{id}/edit', 'editForm')->name('editconsultation');
        Route::put('/consultation/{id}/update', 'update')->name('updateconsultation');
        Route::get('/consultation/delete/{id}', 'delete')->name('deleteconsultation');
        Route::get('/consultation/{id}', 'getConsultation')->name('consultation');
    });

Route::controller(DiagnosisController::class)
    ->prefix('admin')->name('admin.')
    ->middleware(['auth', 'role:all'])
    ->group(function () {
        Route::post('/diagnosis/create', 'store')->name('creatediagnosis');
        Route::get('/diagnosis/{id}', 'index')->name('add-diagnosis');
        Route::get('/{id}/diagnosis', 'showDiagnosis')->name('user-diagnosis');
        Route::get('diagnosis/{id}/edit', 'updateForm')->name('editdiagnosis');
        Route::put('diagnosis/{id}/update', 'update')->name('diagnosis.update');
        Route::get('diagnosis/delete/{id}', 'delete')->name('diagnosis.delete');
    });


Route::controller(LabTestController::class)
    ->prefix('admin')->name('admin.')
    ->middleware(['auth', 'role:all'])
    ->group(function () {
        Route::get('/labtest/create/{id}', 'labForm')->name('add-labtest');
        Route::post('/labtest/create', 'store')->name('labtest.create');
        Route::get('/{id}/labtest', 'labResult')->name('user-labtest');
        Route::get('labtest/{id}/edit', 'updateForm')->name('editlabtest');
        Route::put('labtest/{id}/update', 'update')->name('labtest.update');
        Route::get('labtest/delete/{id}', 'delete')->name('labtest.delete');
        Route::get('labtest/download/{id}', 'download')->name('labtest.download');
    });


Route::controller(DrugController::class)
    ->prefix('admin')->name('admin.')
    ->middleware(['auth', 'role:all'])
    ->group(function () {
        Route::get('/drug/create/{id}', 'drugForm')->name('add-drug');
        Route::post('/drug/create', 'store')->name('drug.create');
        Route::get('/{id}/drug', 'show')->name('user-drug');
        Route::get('drug/{id}/edit', 'updateForm')->name('editdrug');
        Route::put('drug/{id}/update', 'update')->name('drug.update');
        Route::get('drug/delete/{id}', 'delete')->name('drug.delete');
    });


Route::controller(PrescriptionController::class)
    ->prefix('admin')->name('admin.')
    ->middleware(['auth', 'role:all'])
    ->group(function () {
        Route::get('/prescription/create/{id}', 'Form')->name('add-prescription');
        Route::post('/prescription/create', 'store')->name('prescription.create');
        Route::get('/{id}/prescription', 'show')->name('user-prescription');
        Route::get('prescription/{id}/edit', 'updateForm')->name('editprescription');
        Route::put('prescription/{id}/update', 'update')->name('prescription.update');
        Route::get('prescription/delete/{id}', 'delete')->name('prescription.delete');
    });




Route::controller(PaymentListController::class)
    ->prefix('admin')->name('admin.')
    ->middleware(['auth', 'role:all'])
    ->group(function () {
        Route::get('/paymentlist/create', 'form')->name('add-paymentlist');
        Route::post('/paymentlist/create', 'store')->name('paymentlist.create');
        Route::get('/paymentlists', 'index')->name('viewpaymentlist');
        Route::get('paymentlist/{id}', 'updateForm')->name('editpaymentlist');
        Route::put('paymentlist/{id}', 'update')->name('paymentlist.update');
        Route::get('paymentlist/delete/{id}', 'delete')->name('paymentlist.delete');
    });


Route::controller(UserController::class)
    ->prefix('user')->name('user.')
    ->middleware(['auth', 'role:user'])
    ->group(function () {

        Route::get('/', 'index')->name('index');
        Route::get('/viewsubscription/{id?}', 'viewsubscription')->name('viewsubscription');
        Route::get('/viewconsultations', 'viewconsultations')->name('viewconsultations');
        Route::get('/viewexaminations', 'viewexaminations')->name('viewexaminations');
        Route::get('diagnosis/{examination_id}', 'show')->name('showdiagnosis');
        Route::get('labresult/{id}', 'labResult')->name('showlabresult');
        Route::get('download/{id}', 'download')->name('resultdownload');
        Route::get('viewdrugprescription/{id}', 'viewdrugprescription')->name('showprescdrug');
        Route::get('viewpayments', 'viewpayments')->name('payment');
    });


Route::controller(UserPaymentController::class)
    ->prefix('user')->name('user.')
    ->middleware(['auth', 'role:user'])
    ->group(function () {

        Route::get('/payments/{id}', 'createPaymentForm')->name('payments');
        Route::post('/payment', 'storePayment')->name('payment.store');
        Route::get('/{user_id}/payment', 'index')->name('payment.show');
    });

Route::controller(AccountController::class)
    ->prefix('account')->name('account.')
    ->middleware('auth')
    ->group(function () {

        Route::get('/getaccount/{id?}', 'getaccount')->name('get');
        Route::post('/updateaccount', 'updateaccount')->name('update');
        Route::post('/updatepassword', 'updatepassword')->name('updatepassword');
        Route::get('/resetpassword/{id}', 'resetpassword')->name('resetpassword');
        Route::get('/delete/{id}', 'delete')->name('delete');
    });


Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('payments', PaymentController::class);
        Route::get('payments/confirm/{id}', [PaymentController::class, 'confirmPayment'])->name('payments.confirm');
        Route::get('/myPayment', [PaymentController::class, 'viewUserPayments'])->name('payments.user-payment');
    });
