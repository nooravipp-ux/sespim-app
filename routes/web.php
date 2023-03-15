<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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
Route::get('/system/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('route:clear');   
    return 'DONE'; //Return anything
});

Route::get('/', function(){
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('/admin/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('/admin/user/save', [App\Http\Controllers\UserController::class, 'save'])->name('user.save');
Route::get('/admin/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/admin/user/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('/admin/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');

Route::get('/admin/user/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('user.change-password');
Route::post('/admin/user/change-password/update', [App\Http\Controllers\UserController::class, 'storeChangedPassword'])->name('user.update.change-password');

Route::get('/admin/role', [App\Http\Controllers\RoleController::class, 'index'])->name('role.index');
Route::get('/admin/role/create', [App\Http\Controllers\RoleController::class, 'create'])->name('role.create');
Route::post('/admin/role/save', [App\Http\Controllers\RoleController::class, 'save'])->name('role.save');
Route::get('/admin/role/edit/{id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('role.edit');
Route::post('/admin/role/update', [App\Http\Controllers\RoleController::class, 'update'])->name('role.update');
Route::get('/admin/role/delete/{id}', [App\Http\Controllers\RoleController::class, 'delete'])->name('role.delete');

Route::get('/admin/serdik', [App\Http\Controllers\SerdikController::class, 'index'])->name('serdik.index');
Route::post('/admin/serdik/save', [App\Http\Controllers\SerdikController::class, 'saveInit'])->name('serdik.save.init');

Route::get('/admin/serdik/identitas/{user_id}', [App\Http\Controllers\SerdikController::class, 'createIdentitas'])->name('serdik.create.identitas'); //identitas
Route::post('/admin/serdik/identitas/save', [App\Http\Controllers\SerdikController::class, 'saveIdentitas'])->name('serdik.save.identitas'); //identitas

Route::get('/admin/serdik/pendidikan/{user_id}', [App\Http\Controllers\SerdikController::class, 'createPendidikan'])->name('serdik.create.pendidikan'); //pendidikan
Route::post('/admin/serdik/pendidikan/save', [App\Http\Controllers\SerdikController::class, 'savePendidikan'])->name('serdik.save.pendidikan'); //pendidikan
Route::get('/admin/serdik/pendidikan/edit/{id}', [App\Http\Controllers\SerdikController::class, 'editPendidikan'])->name('serdik.edit.pendidikan'); //pendidikan
Route::post('/admin/serdik/pendidikan/update', [App\Http\Controllers\SerdikController::class, 'updatePendidikan'])->name('serdik.update.pendidikan'); //pendidikan
Route::get('/admin/serdik/pendidikan/delete/{id}', [App\Http\Controllers\SerdikController::class, 'deletePendidikan'])->name('serdik.delete.pendidikan'); //pendidikan

Route::get('/admin/serdik/kepangkatan/{user_id}', [App\Http\Controllers\SerdikController::class, 'createKepangkatan'])->name('serdik.create.kepangkatan'); //kepangkatan
Route::post('/admin/serdik/kepangkatan/save', [App\Http\Controllers\SerdikController::class, 'saveKepangkatan'])->name('serdik.save.kepangkatan'); //kepangkatan
Route::get('/admin/serdik/kepangkatan/edit/{id}', [App\Http\Controllers\SerdikController::class, 'editKepangkatan'])->name('serdik.edit.kepangkatan'); //kepangkatan
Route::post('/admin/serdik/kepangkatan/update', [App\Http\Controllers\SerdikController::class, 'updateKepangkatan'])->name('serdik.update.kepangkatan'); //kepangkatan
Route::get('/admin/serdik/kepangkatan/delete/{id}', [App\Http\Controllers\SerdikController::class, 'deleteKepangkatan'])->name('serdik.delete.kepangkatan'); //kepangkatan

Route::get('/admin/serdik/jabatan/{user_id}', [App\Http\Controllers\SerdikController::class, 'createJabatan'])->name('serdik.create.jabatan'); //jabatan
Route::post('/admin/serdik/jabatan/save', [App\Http\Controllers\SerdikController::class, 'saveJabatan'])->name('serdik.save.jabatan'); //jabatan
Route::get('/admin/serdik/jabatan/edit/{id}', [App\Http\Controllers\SerdikController::class, 'editJabatan'])->name('serdik.edit.jabatan'); //jabatan
Route::post('/admin/serdik/jabatan/update', [App\Http\Controllers\SerdikController::class, 'updateJabatan'])->name('serdik.update.jabatan'); //jabatan
Route::get('/admin/serdik/jabatan/delete/{id}', [App\Http\Controllers\SerdikController::class, 'deleteJabatan'])->name('serdik.delete.jabatan'); //jabatan

Route::get('/admin/serdik/penghargaan/{user_id}', [App\Http\Controllers\SerdikController::class, 'createPenghargaan'])->name('serdik.create.penghargaan'); //penghargaan
Route::post('/admin/serdik/penghargaan/save', [App\Http\Controllers\SerdikController::class, 'savePenghargaan'])->name('serdik.save.penghargaan'); //penghargaan
Route::get('/admin/serdik/penghargaan/edit/{id}', [App\Http\Controllers\SerdikController::class, 'editPenghargaan'])->name('serdik.edit.penghargaan'); //penghargaan
Route::post('/admin/serdik/penghargaan/update', [App\Http\Controllers\SerdikController::class, 'updatePenghargaan'])->name('serdik.update.penghargaan'); //penghargaan
Route::get('/admin/serdik/penghargaan/delete/{id}', [App\Http\Controllers\SerdikController::class, 'deletePenghargaan'])->name('serdik.delete.penghargaan'); //penghargaan

Route::get('/admin/serdik/bahasa/{user_id}', [App\Http\Controllers\SerdikController::class, 'createBahasa'])->name('serdik.create.bahasa'); //bahasa
Route::post('/admin/serdik/bahasa/save', [App\Http\Controllers\SerdikController::class, 'saveBahasa'])->name('serdik.save.bahasa'); //bahasa
Route::get('/admin/serdik/bahasa/edit/{id}', [App\Http\Controllers\SerdikController::class, 'editBahasa'])->name('serdik.edit.bahasa'); //bahasa
Route::post('/admin/serdik/bahasa/update', [App\Http\Controllers\SerdikController::class, 'updateBahasa'])->name('serdik.update.bahasa'); //bahasa
Route::get('/admin/serdik/bahasa/delete/{id}', [App\Http\Controllers\SerdikController::class, 'deleteBahasa'])->name('serdik.delete.bahasa'); //bahasa

Route::get('/admin/serdik/hobi/{user_id}', [App\Http\Controllers\SerdikController::class, 'createHobi'])->name('serdik.create.hobi'); //hobi
Route::post('/admin/serdik/hobi/save', [App\Http\Controllers\SerdikController::class, 'saveHobi'])->name('serdik.save.hobi'); //hobi
Route::get('/admin/serdik/hobi/edit/{id}', [App\Http\Controllers\SerdikController::class, 'editHobi'])->name('serdik.edit.hobi'); //hobi
Route::post('/admin/serdik/hobi/update', [App\Http\Controllers\SerdikController::class, 'updateHobi'])->name('serdik.update.hobi'); //hobi
Route::get('/admin/serdik/hobi/delete/{id}', [App\Http\Controllers\SerdikController::class, 'deleteHobi'])->name('serdik.delete.hobi'); //hobi

Route::get('/admin/serdik/pasangan/{user_id}', [App\Http\Controllers\SerdikController::class, 'createPasangan'])->name('serdik.create.pasangan'); //pasangan
Route::post('/admin/serdik/pasangan/save', [App\Http\Controllers\SerdikController::class, 'savePasangan'])->name('serdik.save.pasangan'); //pasangan

Route::get('/admin/serdik/anak/{user_id}', [App\Http\Controllers\SerdikController::class, 'createAnak'])->name('serdik.create.anak'); //anak
Route::post('/admin/serdik/anak/save', [App\Http\Controllers\SerdikController::class, 'saveAnak'])->name('serdik.save.anak'); //anak
Route::get('/admin/serdik/anak/edit/{id}', [App\Http\Controllers\SerdikController::class, 'editAnak'])->name('serdik.edit.anak'); //anak
Route::post('/admin/serdik/anak/update', [App\Http\Controllers\SerdikController::class, 'updateAnak'])->name('serdik.update.anak'); //anak
Route::get('/admin/serdik/anak/delete/{id}', [App\Http\Controllers\SerdikController::class, 'deleteAnak'])->name('serdik.delete.anak'); //anak

Route::get('/admin/serdik/kontak-darurat/{user_id}', [App\Http\Controllers\SerdikController::class, 'createKontakDarurat'])->name('serdik.create.kontak-darurat'); //kontak darurat
Route::post('/admin/serdik/kontak-darurat/save', [App\Http\Controllers\SerdikController::class, 'saveKontakDarurat'])->name('serdik.save.kontak-darurat'); //kontak darurat
Route::get('/admin/serdik/kontak-darurat/edit/{id}', [App\Http\Controllers\SerdikController::class, 'editKontakDarurat'])->name('serdik.edit.kontak-darurat'); //kontak-darurat
Route::post('/admin/serdik/kontak-darurat/update', [App\Http\Controllers\SerdikController::class, 'updateKontakDarurat'])->name('serdik.update.kontak-darurat'); //kontak-darurat
Route::get('/admin/serdik/kontak-darurat/delete/{id}', [App\Http\Controllers\SerdikController::class, 'deleteKontakDarurat'])->name('serdik.delete.kontak-darurat'); //kontak-darurat

Route::get('/admin/serdik/edit/{id}', [App\Http\Controllers\SerdikController::class, 'edit'])->name('serdik.edit');
Route::post('/admin/serdik/update', [App\Http\Controllers\SerdikController::class, 'update'])->name('serdik.update');
Route::get('/admin/serdik/delete/{id}', [App\Http\Controllers\SerdikController::class, 'delete'])->name('serdik.delete');

Route::post('/admin/serdik/import', [App\Http\Controllers\SerdikController::class, 'import'])->name('serdik.import');

Route::get('/admin/jadwal', [App\Http\Controllers\JadwalController::class, 'index'])->name('jadwal.index');
Route::get('/admin/jadwal/create', [App\Http\Controllers\JadwalController::class, 'create'])->name('jadwal.create');
Route::post('/admin/jadwal/save', [App\Http\Controllers\JadwalController::class, 'save'])->name('jadwal.save');
Route::get('/admin/jadwal/edit/{id}', [App\Http\Controllers\JadwalController::class, 'edit'])->name('jadwal.edit');
Route::post('/admin/jadwal/update', [App\Http\Controllers\JadwalController::class, 'update'])->name('jadwal.update');
Route::get('/admin/jadwal/delete/{id}', [App\Http\Controllers\JadwalController::class, 'delete'])->name('jadwal.delete');


