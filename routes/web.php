<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfesiController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\OrganisasiProfesiController;

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

//landing
Route::get('/',[App\Http\Controllers\HomeController::class,'index'])->name('root');
Route::get('home',[App\Http\Controllers\HomeController::class,'index']);
Route::get('admin',[App\Http\Controllers\HomeController::class,'admin'])->name('admin')->middleware('auth');
Route::get('web',[App\Http\Controllers\HomeController::class,'web'])->name('web');
Route::post('settings',[App\Http\Controllers\HomeController::class,'settings'])->name('settings');
Route::get('about',[App\Http\Controllers\HomeController::class,'about'])->name('home.about');
Route::get('services',[App\Http\Controllers\HomeController::class,'services'])->name('home.services');
Route::get('foto',[App\Http\Controllers\HomeController::class,'foto'])->name('home.foto');
Route::get('video',[App\Http\Controllers\HomeController::class,'video'])->name('home.video');
Route::get('contact',[App\Http\Controllers\HomeController::class,'contact'])->name('home.contact');


//login
Route::get('/login',[App\Http\Controllers\AuthController::class,'index'])->name('login')->middleware('guest');
Route::post('/auth',[App\Http\Controllers\AuthController::class,'login'])->name('auth');
Route::get('/registration',[App\Http\Controllers\AuthController::class,'registration'])->name('registration')->middleware('guest');
Route::post('/register',[App\Http\Controllers\AuthController::class,'register'])->name('register');
Route::get('/activate/{username}',[App\Http\Controllers\AuthController::class,'activate'])->name('activate');
Route::post('/activate/{username}',[App\Http\Controllers\AuthController::class,'aktifkan'])->name('aktifkan');
Route::get('/forgot',[App\Http\Controllers\AuthController::class,'forgot'])->name('forgot')->middleware('guest');
Route::post('/forgot',[App\Http\Controllers\AuthController::class,'call_user'])->name('call_user')->middleware('guest');

Route::get('/reset/{username}',[App\Http\Controllers\AuthController::class,'reset'])->name('reset_akun')->middleware('guest');
Route::post('/reset/{username}',[App\Http\Controllers\AuthController::class,'reset_password'])->name('reset_password')->middleware('guest');
Route::post('/logout',[App\Http\Controllers\AuthController::class,'logout'])->name('logout');

//user
//profile
Route::get('/profile',[App\Http\Controllers\UserController::class,'profile'])->name('profile')->middleware('auth');
Route::get('/profile/edit',[App\Http\Controllers\UserController::class,'profileedit'])->name('profile.edit')->middleware('auth');
Route::post('/profile/update/{id}',[App\Http\Controllers\UserController::class,'profileupdate'])->name('profile.update')->middleware('auth');

//education user
Route::get('/profile/education/create',[\App\Http\Controllers\EducationUserController::class,'create'])->name('education.user.create')->middleware('auth');
Route::post('/profile/education/stote', [\App\Http\Controllers\EducationUserController::class,'store'])->name('education.user.store')->middleware('auth');
Route::get('/profile/education/show/{slug}',[\App\Http\Controllers\EducationUserController::class,'show'])->name('education.user.show')->middleware('auth');
Route::get('/profile/education/edit/{slug}',[\App\Http\Controllers\EducationUserController::class,'edit'])->name('education.user.edit')->middleware('auth');
Route::post('/profile/education/update/{id}',[\App\Http\Controllers\EducationUserController::class,'update'])->name('education.user.update')->middleware('auth');
Route::post('/profile/education/destroy/{id}',[\App\Http\Controllers\EducationUserController::class,'destroy'])->name('education.user.destroy')->middleware('auth');


//kontributor
//Education
//type
Route::get('/education/type',[\App\Http\Controllers\EducationTypeController::class,'index'])->name('education.type')->middleware('auth');
Route::post('/education/type/store',[\App\Http\Controllers\EducationTypeController::class,'store'])->name('education.type.store')->middleware('auth');

//level
Route::get('/education/level',[\App\Http\Controllers\EducationLevelController::class,'index'])->name('education.level')->middleware('auth');
Route::post('/education/level/store',[\App\Http\Controllers\EducationLevelController::class,'store'])->name('education.level.store')->middleware('auth');


//wilayah indonesia
Route::get('/provinsi',[App\Http\Controllers\ProvinsiController::class,'index'])->name('home.wilayah');
Route::get('/provinsi/{code}',[App\Http\Controllers\ProvinsiController::class,'kota'])->name('home.wilayah.kota');

//events
//home
Route::get('events',[App\Http\Controllers\EventController::class,'index'])->name('home.events');
Route::get('event/detail/{slug}',[App\Http\Controllers\EventController::class,'detail'])->name('home.event.detail');

//by user
Route::get('event/daftar/{slug}',[App\Http\Controllers\EventController::class,'detail'])->name('event.daftar');
Route::get('event/mine',[App\Http\Controllers\EventController::class,'detail'])->name('event.mine');
Route::get('event/mine/detail/{slug}',[App\Http\Controllers\EventController::class,'main_detail'])->name('event.mine.detail');

//manage by kontributor
Route::get('event/list',[EventController::class,'list'])->name('event.list')->middleware('auth');
Route::get('event/show',[EventController::class,'show'])->name('event.show')->middleware('auth');
Route::get('event/create',[EventController::class,'create'])->name('event.create')->middleware('auth');
Route::post('event/action',[EventController::class,'action'])->name('event.action')->middleware('auth');
Route::get('event/edit',[EventController::class,'edit'])->name('event.edit')->middleware('auth');
Route::post('event/update/{slug}',[EventController::class,'update'])->name('event.update')->middleware('auth');
Route::post('event/delete/{slug}',[EventController::class,'delete'])->name('event.delete')->middleware('auth');




//manage by admin
Route::get('/admin/events',[EventController::class,'all'])->name('admin.event')->middleware('auth');
Route::get('/admin/event/add',[EventController::class,'add'])->name('admin.event.add')->middleware('auth');
Route::post('admin/event/store',[App\Http\Controllers\EventController::class,'store'])->name('event.store')->middleware('auth');
Route::get('/admin/event/detail/{slug}',[EventController::class,'detail_event'])->name('admin.event.detail_event')->middleware('auth');
Route::get('/admin/event/edit/{slug}',[EventController::class,'edit_event'])->name('admin.event.edit_event')->middleware('auth');
Route::post('/admin/event/update/{slug}',[EventController::class,'update'])->name('admin.event.update_event')->middleware('auth');

//skp event
Route::post('admin/event/skp/store', [\App\Http\Controllers\AccreditationController::class, 'store'])->name('event.skp.store')->middleware('auth');

//end of event

//admin area menggunakan theme admin LTE
//user
Route::get('/admin/user',[UserController::class,'index'])->name('user')->middleware('auth');
Route::post('/admin/user/store',[UserController::class,'store']);
Route::get('/admin/user/show/{id}',[UserController::class,'show'])->name('user.show')->middleware('auth');
Route::get('/admin/user/edit/{id}',[UserController::class,'edit'])->name('user.edit')->middleware('auth');
Route::post('/admin/user/update/{id}',[UserController::class,'update'])->middleware('auth');
Route::delete('/admin/user/delete/{id}',[UserController::class,'delete'])->middleware('auth');


//customer
Route::get('/admin/customer',[App\Http\Controllers\CustomerController::class,'index'])->name('customer')->middleware('auth');
Route::get('/admin/customer/add',[App\Http\Controllers\CustomerController::class,'create'])->name('customer.add')->middleware('auth');
Route::post('/admin/customer/insert-data',[App\Http\Controllers\CustomerController::class,'store'])->name('customer.insert')->middleware('auth');
Route::get('/admin/customer/{id}',[App\Http\Controllers\CustomerController::class,'edit'])->name('customer.edit')->middleware('auth');
Route::get('/admin/customer/show/{id}',[App\Http\Controllers\CustomerController::class,'show'])->name('customer.edit')->middleware('auth');
Route::post('/admin/customer/update/{id}',[App\Http\Controllers\CustomerController::class,'update'])->name('customer.update')->middleware('auth');
Route::post('/admin/customer/delete/{id}',[App\Http\Controllers\CustomerController::class,'destroy'])->name('customer.destroy')->middleware('auth');


//profesi
Route::get('/admin/profesi',[ProfesiController::class,'index'])->name('profesi')->middleware('auth');
Route::get('/admin/profesi/pdf',[ProfesiController::class,'pdf'])->name('profesi.pdf')->middleware('auth');
Route::post('/admin/profesi/store',[ProfesiController::class,'store'])->middleware('auth');
Route::get('/admin/profesi/show/{id}',[ProfesiController::class,'show'])->middleware('auth');

//OP
Route::get('/admin/op',[OrganisasiProfesiController::class,'index'])->name('op')->middleware('auth');
Route::get('/admin/op/read',[OrganisasiProfesiController::class,'read'])->name('op.read')->middleware('auth');
Route::get('/admin/op/create',[OrganisasiProfesiController::class,'create'])->middleware('auth');
Route::get('/admin/op/store',[OrganisasiProfesiController::class,'store'])->middleware('auth');
Route::get('/admin/op/show/{id}',[OrganisasiProfesiController::class,'show'])->middleware('auth');
Route::get('/admin/op/update/{id}',[OrganisasiProfesiController::class,'update'])->middleware('auth');

//organisasi
Route::get('/admin/organisasi',[OrganisasiController::class,'index'])->name('organisasi')->middleware('auth');
Route::get('/admin/organisasi/show/{id}',[OrganisasiController::class,'show'])->name('organisasi.show')->middleware('auth');
Route::post('/admin/organisasi/store',[OrganisasiController::class,'store'])->middleware('auth');
Route::get('/qrcode/{id}', [OrganisasiController::class, 'edit'])->name('generate')->middleware('auth');

//website
Route::get('/admin/website',[WebController::class,'admin'])->name('web_admin')->middleware('auth');

//partner
//home
Route::get('partner', [\App\Http\Controllers\PartnerController::class, 'index'])->name('partner');
Route::get('partner/detail/{slug}', [\App\Http\Controllers\PartnerController::class, 'show'])->name('partner.show');

//my partner
Route::get('partner/main', [\App\Http\Controllers\PartnerController::class, 'main'])->name('partner.main')->middleware('auth');
Route::get('partner/daftar', [\App\Http\Controllers\PartnerController::class, 'daftar'])->name('partner.daftar')->middleware('auth');
Route::post('partner/register', [\App\Http\Controllers\PartnerController::class, 'register'])->name('partner.register')->middleware('auth');
Route::get('partner/edit', [\App\Http\Controllers\PartnerController::class, 'edit'])->name('partner.edit')->middleware('auth');
Route::post('partner/update', [\App\Http\Controllers\PartnerController::class, 'update'])->name('partner.update')->middleware('auth');

//admin
Route::get('admin/partner/list', [\App\Http\Controllers\PartnerController::class, 'list'])->name('admin.partner.list')->middleware('auth');
Route::get('admin/partner/create', [\App\Http\Controllers\PartnerController::class, 'create'])->name('admin.partner.create')->middleware('auth');
Route::post('admin/partner/store', [\App\Http\Controllers\PartnerController::class, 'store'])->name('admin.partner.store')->middleware('auth');
Route::get('admin/partner/detail/{slug}', [\App\Http\Controllers\PartnerController::class, 'detail'])->name('admin.partner.detail')->middleware('auth');
Route::get('admin/partner/edit/{slug}', [\App\Http\Controllers\PartnerController::class, 'edit_partner'])->name('admin.partner.edit')->middleware('auth');
Route::post('admin/partner/update/{id}', [\App\Http\Controllers\PartnerController::class, 'update_partner'])->name('admin.partner.update')->middleware('auth');
Route::post('partner/delete/{id}', [\App\Http\Controllers\PartnerController::class, 'destroy'])->name('partner.destroy')->middleware('auth');

//admin
Route::get('admin/video/category', [\App\Http\Controllers\VideoCategoryController::class, 'index'])->name('admin.video.categoty')->middleware('auth');
Route::post('admin/video/category/store', [\App\Http\Controllers\VideoCategoryController::class, 'store'])->name('admin.video.categoty.store')->middleware('auth');
Route::get('admin/video/category/detail/{slug}', [\App\Http\Controllers\VideoCategoryController::class, 'show'])->name('admin.video.categoty.show')->middleware('auth');
Route::post('admin/video/category/update/{slug}', [\App\Http\Controllers\VideoCategoryController::class, 'update'])->name('admin.video.categoty.update')->middleware('auth');
Route::post('admin/video/category/delete/{id}', [\App\Http\Controllers\VideoCategoryController::class, 'destroy'])->name('admin.video.categoty.destroy')->middleware('auth');

//admin
Route::get('admin/video', [\App\Http\Controllers\VideoController::class, 'index'])->name('admin.video')->middleware('auth');
Route::post('admin/video/store', [\App\Http\Controllers\VideoController::class, 'store'])->name('admin.video.store')->middleware('auth');
Route::get('admin/video/detail/{slug}', [\App\Http\Controllers\VideoController::class, 'show'])->name('admin.video.show')->middleware('auth');

//user job
Route::get('profile/job/create', [\App\Http\Controllers\UserJobController::class, 'create'])->name('user.job.create')->middleware('auth');
Route::post('profile/job/store', [\App\Http\Controllers\UserJobController::class, 'store'])->name('user.job.store')->middleware('auth');
Route::get('profile/job/edit/{slug}', [\App\Http\Controllers\UserJobController::class, 'edit'])->name('user.job.edit')->middleware('auth');
Route::post('job/update/{slug}', [\App\Http\Controllers\UserJobController::class, 'update'])->name('job.update')->middleware('auth');
Route::get('profile/job/delete/{slug}', [\App\Http\Controllers\UserJobController::class, 'delete'])->name('user.job.delete')->middleware('auth');
Route::post('job/destroy/{id}', [\App\Http\Controllers\UserJobController::class, 'destroy'])->name('job.destroy')->middleware('auth');

//user organisasi
Route::get('profile/organisasi/create', [\App\Http\Controllers\UserOrganizationController::class, 'create'])->name('user.organisasi.create')->middleware('auth');
Route::post('profile/organisasi/store', [\App\Http\Controllers\UserOrganizationController::class, 'store'])->name('user.organisasi.store')->middleware('auth');
Route::get('profile/organisasi/show', [\App\Http\Controllers\UserOrganizationController::class, 'show'])->name('user.organisasi.show')->middleware('auth');
Route::get('profile/organisasi/edit/{slug}', [\App\Http\Controllers\UserOrganizationController::class, 'edit'])->name('user.organisasi.edit')->middleware('auth');
Route::get('profile/organisasi/delete/{slug}', [\App\Http\Controllers\UserOrganizationController::class, 'delete'])->name('user.organisasi.delete')->middleware('auth');
Route::post('profile/organisasi/update/{slug}', [\App\Http\Controllers\UserOrganizationController::class, 'update'])->name('user.organisasi.update')->middleware('auth');
Route::post('profile/organisasi/destroy/{id}', [\App\Http\Controllers\UserOrganizationController::class, 'destroy'])->name('user.organisasi.destroy')->middleware('auth');

//trainings
Route::get('admin/trainings', [\App\Http\Controllers\TrainingController::class, 'index'])->name('admin.training')->middleware('auth');
Route::post('admin/training/store', [\App\Http\Controllers\TrainingController::class, 'store'])->name('admin.training.store')->middleware('auth');
Route::get('admin/training/edit/{slug}', [\App\Http\Controllers\TrainingController::class, 'edit'])->name('admin.training.edit')->middleware('auth');
Route::post('admin/training/update/{slug}', [\App\Http\Controllers\TrainingController::class, 'update'])->name('admin.training.update')->middleware('auth');
Route::post('admin/training/destroy/{slug}', [\App\Http\Controllers\TrainingController::class, 'destroy'])->name('admin.training.destroy')->middleware('auth');

//materi type
Route::get('admin/materi/type', [\App\Http\Controllers\MateriTypeController::class, 'index'])->name('admin.materi.type')->middleware('auth');
Route::post('admin/materi/type/store', [\App\Http\Controllers\MateriTypeController::class, 'store'])->name('admin.materi.type.store')->middleware('auth');
Route::get('admin/materi/type/edit/{slug}', [\App\Http\Controllers\MateriTypeController::class, 'edit'])->name('admin.materi.type.edit')->middleware('auth');
Route::post('admin/materi/type/update/{slug}', [\App\Http\Controllers\MateriTypeController::class, 'update'])->name('admin.materi.type.update')->middleware('auth');
Route::post('admin/materi/type/delete/{slug}', [\App\Http\Controllers\MateriTypeController::class, 'destroy'])->name('admin.materi.type.destroy')->middleware('auth');

//study method
Route::get('admin/study/methode', [\App\Http\Controllers\StudyMethodController::class, 'index'])->name('admin.study.methode')->middleware('auth');
Route::post('admin/study/methode/store', [\App\Http\Controllers\StudyMethodController::class, 'store'])->name('admin.study.methode.store')->middleware('auth');
Route::get('admin/study/methode/edit/{slug}', [\App\Http\Controllers\StudyMethodController::class, 'edit'])->name('admin.study.methode.edit')->middleware('auth');
Route::post('admin/study/methode/update/{slug}', [\App\Http\Controllers\StudyMethodController::class, 'update'])->name('admin.study.methode.update')->middleware('auth');
Route::post('admin/study/methode/destroy/{slug}', [\App\Http\Controllers\StudyMethodController::class, 'destroy'])->name('admin.study.methode.destroy')->middleware('auth');

// kurikulum
Route::get('admin/kurikulum', [\App\Http\Controllers\KurikulumController::class, 'index'])->name('admin.kurikulum')->middleware('auth');
Route::get('admin/kurikulum/materi', [\App\Http\Controllers\KurikulumController::class, 'materi'])->name('admin.kurikulum.materi')->middleware('auth');
Route::get('admin/kurikulum/create/{slug}', [\App\Http\Controllers\KurikulumController::class, 'create'])->name('admin.kurikulum.create')->middleware('auth');
Route::get('admin/kurikulum/show/{slug}', [\App\Http\Controllers\KurikulumController::class, 'show'])->name('admin.kurikulum.show')->middleware('auth');
Route::post('admin/kurikulum/store', [\App\Http\Controllers\KurikulumController::class, 'store'])->name('admin.kurikulum.store')->middleware('auth');
Route::get('admin/kurikulum/detail/{slug}', [\App\Http\Controllers\KurikulumController::class, 'detail'])->name('admin.kurikulum.detail')->middleware('auth');
Route::get('admin/kurikulum/edit/{slug}', [\App\Http\Controllers\KurikulumController::class, 'edit'])->name('admin.kurikulum.edit')->middleware('auth');
Route::post('admin/kurikulum/update/{slug}', [\App\Http\Controllers\KurikulumController::class, 'update'])->name('admin.kurikulum.update')->middleware('auth');
Route::post('admin/kurikulum/destroy/{slug}', [\App\Http\Controllers\KurikulumController::class, 'destroy'])->name('admin.kurikulum.destroy')->middleware('auth');

//kurikulum detail
Route::get('admin/kurikulum/detail/show/{slug}', [\App\Http\Controllers\KurikulumDetailController::class, 'show'])->name('admin.kurikulum.detail.show')->middleware('auth');
Route::post('admin/kurikulum/detail/store', [\App\Http\Controllers\KurikulumDetailController::class, 'store'])->name('admin.kurikulum.detail.store')->middleware('auth');

//materi pada event
Route::post('admin/materi/store/{slug}', [\App\Http\Controllers\MateryController::class, 'store'])->name('admin.materi.store')->middleware('auth');


//Pendaftaran peserta
Route::post('participant/store/{slug}', [\App\Http\Controllers\ParticipantController::class, 'store'])->name('participant.store');
Route::get('participant/transaksi/{slug}', [\App\Http\Controllers\ParticipantController::class, 'transaksi'])->name('participant.transaksi');

//Transaksi
Route::get('transaksi/show/{slug}', [\App\Http\Controllers\TransactionController::class, 'show'])->name('transaction.show');
Route::post('transaksi/store', [\App\Http\Controllers\TransactionController::class, 'store'])->name('transaction.store');
Route::post('transaksi/payment/{slug}', [\App\Http\Controllers\TransactionController::class, 'create_va'])->name('transaction.payment');
Route::post('transaksi/payment/callback', [\App\Http\Controllers\TransactionController::class, 'call_back'])->name('transaction.payment.call_back');
Route::post('transaksi/payment/callback/request/{slug}', [\App\Http\Controllers\TransactionController::class, 'get_call_back'])->name('transaction.payment.get_call_back');
Route::get('transaksi/payment/status/{slug}', [\App\Http\Controllers\TransactionController::class, 'cek_transaksi'])->name('transaction.status');


//Answer type
Route::get('admin/answertype', [\App\Http\Controllers\AnswerTypeController::class, 'index'])->name('answer_type.index')->middleware('auth');
Route::post('admin/answertype/store', [\App\Http\Controllers\AnswerTypeController::class, 'store'])->name('answer_type.store')->middleware('auth');

//Question
Route::get('admin/question', [\App\Http\Controllers\QuestionController::class, 'index'])->name('question')->middleware('auth');
Route::get('admin/question/list/{slug}', [\App\Http\Controllers\QuestionController::class, 'list'])->name('question.list')->middleware('auth');
Route::post('admin/question/store/{slug}', [\App\Http\Controllers\QuestionController::class, 'store'])->name('question.store')->middleware('auth');
Route::post('admin/question/jawaban/{slug}', [\App\Http\Controllers\QuestionController::class, 'jawaban'])->name('question.jawaban')->middleware('auth');
Route::post('admin/question/update/{slug}', [\App\Http\Controllers\QuestionController::class, 'update'])->name('question.update')->middleware('auth');

//answer
Route::get('admin/answer/list/{slug}', [\App\Http\Controllers\AnswerController::class, 'list'])->name('answer.list')->middleware('auth');
Route::post('admin/answer/store/{slug}', [\App\Http\Controllers\AnswerController::class, 'store'])->name('answer.store')->middleware('auth');


//atm sehat
//user
Route::get('/tsi/user',[\App\Http\Controllers\TsiController::class,'user'])->name('tsi.user');
Route::get('/tsi/user/{id}',[\App\Http\Controllers\TsiController::class,'user_show'])->name('tsi.user.show');

//user
Route::get('/tsi/pemeriksaan',[\App\Http\Controllers\TsiController::class,'pemeriksaan'])->name('tsi.pemeriksaan');
Route::get('/tsi/user/{id}',[\App\Http\Controllers\TsiController::class,'user_show'])->name('tsi.user.show');



//wallet
Route::get('/tsi/wallet',[\App\Http\Controllers\TsiController::class,'wallet'])->name('tsi.wallet')->middleware('auth');
Route::get('/tsi/wallet/{id}',[\App\Http\Controllers\TsiController::class,'show_wallet'])->name('tsi.wallet.show')->middleware('auth');

//device
Route::get('/tsi/device',[\App\Http\Controllers\TsiController::class,'device'])->name('tsi.device')->middleware('auth');
Route::get('/tsi/device/{id}',[\App\Http\Controllers\TsiController::class,'show_device'])->name('tsi.device.show')->middleware('auth');

//doctor
Route::get('/tsi/doctor',[\App\Http\Controllers\TsiController::class,'doctor'])->name('tsi.doctor')->middleware('auth');
Route::get('/tsi/doctor/{id}',[\App\Http\Controllers\TsiController::class,'show_doctor'])->name('tsi.doctor.show')->middleware('auth');

//user
Route::get('/tsi/consultation',[\App\Http\Controllers\TsiController::class,'consultation'])->name('tsi.consultation')->middleware('auth');
Route::get('/tsi/consultation/{id}',[\App\Http\Controllers\TsiController::class,'show_consultation'])->name('tsi.consultation.show')->middleware('auth');


//testing
Route::get('/tsi/observation',[\App\Http\Controllers\TsiController::class,'observation'])->name('tsi.observation')->middleware('auth');
Route::get('/tsi/observation/{id}',[\App\Http\Controllers\TsiController::class,'show_observation'])->name('tsi.observation.show')->middleware('auth');

//observer
Route::get('/tsi/observer',[\App\Http\Controllers\TsiController::class,'observer'])->name('tsi.observer')->middleware('auth');
Route::get('/tsi/observer/{id}',[\App\Http\Controllers\TsiController::class,'show_observer'])->name('tsi.observer.show')->middleware('auth');

//ping
Route::get('/tsi/ping',[\App\Http\Controllers\TsiController::class,'ping'])->name('tsi.ping')->middleware('auth');
Route::get('/tsi/ping/{id}',[\App\Http\Controllers\TsiController::class,'show_ping'])->name('tsi.ping.show')->middleware('auth');

//status
Route::get('/tsi/status',[\App\Http\Controllers\TsiController::class,'status'])->name('tsi.ping')->middleware('auth');
Route::get('/tsi/status/{id}',[\App\Http\Controllers\TsiController::class,'show_status'])->name('tsi.ping.show')->middleware('auth');

//device_user
Route::get('/tsi/deviceuser',[\App\Http\Controllers\TsiController::class,'device_user'])->name('tsi.device_user')->middleware('auth');
Route::get('/tsi/deviceuser/{id}',[\App\Http\Controllers\TsiController::class,'show_device_user'])->name('tsi.device_user.show')->middleware('auth');

