<?php


use App\Http\Controllers\EditProfileController;
use App\Models\Orderan;
use App\Models\Profile;
use App\Models\Pelanggan;
use App\Models\DataBarang;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotifController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\OrderanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\BEController\DataBarangProcess;


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
// ROUTE LOGIN LOGOUT
Route::get('/login', function () {
    return view('login', ["title" => "login"]);
});

Route::get('/logout', function () {
    auth()->logout();
    return redirect('/login');
})->name('web.logout');

Route::get('/', function () {
    return view('login', ["title" => "login"]);
});


// ROUTE CS
Route::get('/cs/semua-orderan', [OrderanController::class, 'index'])->name('semua-orderanCS');
Route::get('/cs/belum-proses-orderan', [OrderanController::class, 'belumproses'])->name('belum-proses-orderanCS');
Route::get('/cs/menunggu-dicek-orderan', [OrderanController::class, 'menunggudicek'])->name('menunggu-dicek-orderanCS');
Route::get('/cs/dalam-proses-orderan', [OrderanController::class, 'dalamproses'])->name('dalam-proses-orderanCS');
Route::get('/cs/orderan-selesai', [OrderanController::class, 'orderanselesai'])->name('orderan-selesaiCS');
Route::get('/cs/tulisOrderan', function () {
    return view('customer-service.tulis-orderan.tulisOrderan', ["title" => "Tulis Orderan"]);
});
Route::get('/cs/invoice/{orderNumber}', [OrderanController::class, 'cetakInvoiceCs'])
    ->name('customer-service.dashboard-invoice.invoice');
Route::get('/cs/dataBarang', [BarangController::class, 'index']);
Route::get('/cs/charts', function () {
    return view('customer-service.charts.charts', [
        "title" => "Charts"
    ]);
});
Route::get('/cs/dataBarang', [BarangController::class, 'indexcs'])->name('dataBarangCs');
Route::post('cs/dataBarang/store', [BarangController::class, 'create'])->name('barangs.store');
Route::delete('cs/dataBarang/destroy/{id}', [BarangController::class, 'destroy'])->name('barangs.destroy');
// Route::match(['get','put', 'patch'], 'cs/dataBarang/update/{id}', [BarangController::class, 'update'])->name('barangs.update');
// Route::get('cs/dataBarang/update/{id}', [BarangController::class, 'showUpdate'])->name('barangs.update');

Route::get('/dataPelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
Route::get('/pelanggan/{id}', [PelangganController::class, 'show'])->name('pelanggan.show');
Route::post('/dataPelanggan/store', [PelangganController::class, 'create'])->name('pelanggan.store');
Route::get('/invoice', function () {
    return view('customer-service.data-pelanggan.invoice', ["title" => "Invoice"]);
});

Route::get('/cs/profile/{id}', [ProfileController::class, 'show'])->name('show');

Route::get('/cs/profile/edit-profile/{id}', [ProfileController::class, 'edit'])->name('edit.profile');
Route::post('/cs/profile/edit-profile-process/{id}', [ProfileController::class, 'update'])->name('update.profile');

Route::get('/cs/profile/edit-password/{id}', [ProfileController::class, 'ubahPassword'])->name('ubahPassword.password');
Route::post('/cs/profile/edit-password/{id}', [ProfileController::class, 'ubahPassword'])->name('editPassword');

// Route::middleware('auth')->get('/dataPelanggan', [PelangganController::class, 'index'])->name('dataPelanggan');
Route::get('/pelanggan/{id}', [PelangganController::class, 'show'])->name('pelanggan.show');
Route::get('/cs/riwayat', function () {
    return view('customer-service.data-pelanggan.dataTransaksi', ["title" => "Data Pelanggan"]);
});





// ROUTE ADMIN
Route::get('/admin/profile', [ProfileController::class, 'myProfile']);
Route::get('/admin/profile/edit', [ProfileController::class, 'editAdmin']);
Route::get('/admin/profile/ubah-password', [ProfileController::class, 'passwordAdmin']);
Route::get('/admin/riwayat', function () {
    return view('admin.data-pelanggan.dataTransaksi', ["title" => "Data Pelanggan"]);
});
Route::get('/admin/tulisOrderan', function () {
    return view('admin.tulis-orderan.tulisOrderan', ["title" => "Tulis Orderan"]);
});
Route::get('/admin/suntingOrderan', function () {
    return view('admin.sunting-orderan.main', ["title" => "Sunting Orderan"]);
});
Route::get('/password', [AuthController::class, 'lupaPassword']);
Route::get('/password/verifikasi', function () {
    return view('login.lupa-password.verifikasi', [
        "title" => "Verifikasi OTP",
        "email" => "adminSI_08@gmail.com"
    ]);
});

Route::get('/password/reset', function () {
    return view('login\lupa-password\resetPassword', ["title" => "Reset Password"]);
});
Route::get('/admin/dataBarang', [BarangController::class, 'indexAdmin']);

Route::post('admin/dataBarang/store', [BarangController::class, 'createA'])->name('barangs.storeA');

Route::delete('/dataBarang/destroy/{barang}', [BarangController::class, 'destroy'])->name('barangs.destroy');
Route::patch('/dataBarang/update/{barang}', [BarangController::class, 'update'])->name('barangs.update');
Route::get('/cs/charts', function () {
    return view('customer-service.charts.charts', [
        "title" => "Charts"
    ]);
});
Route::get('/admin/charts', [ChartsController::class, 'indexAdmin']);
Route::get('/admin/notif', [NotifController::class, 'index']);
Route::get('/admin/notif/store', [NotifController::class, 'store'])->name('notif.store');
Route::get('/admin/data-cs', [EmployeeController::class, 'indexCs'])->name('dataCs');
Route::get('/admin/data-cs/edit', [EmployeeController::class, 'edit']);
Route::get('/admin/data-cs/add', [EmployeeController::class, 'addCs']);
Route::post('/admin/data-cs/add', [EmployeeController::class, 'createCs'])->name('tambah');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/update-check-payment/{orderId}', [DashboardController::class, 'updateCheckPayment'])
    ->name('update.check.payment');
Route::post('/update-on-process/{orderId}', [DashboardController::class, 'updateOnProcess'])
    ->name('update.on.process');
Route::get('/admin/juragan', function () {
    return view('admin.data-juragan.dataJuragan', ["title" => "Data Juragan"]);
});
// request edit (admin)
Route::get('/admin/request', function () {
    return view('admin.request.main', ['title' => 'Request']);
});
Route::get('/admin/editRequest', function () {
    return view('admin.request.requestEdit', ['title' => 'Request']);
});
//end
// admin data Pelanggan
Route::get('/admin/dataPelanggan', function () {
    return view('admin.data-pelanggan.dataPelanggan', ["title" => " Data Pelanggan"]);
});
Route::get('/admin/detail', function () {
    return view('admin.data-pelanggan.detailPelanggan', ["title" => "Data Pelanggan"]);
});
Route::get('/admin/riwayat', function () {
    return view('admin.data-pelanggan.dataTransaksi', ["title" => "Data Pelanggan"]);
});
Route::get('/admin/invoice/{orderNumber}', [OrderanController::class, 'cetakInvoiceAdmin'])
    ->name('admin.data-pelanggan.invoice');





// ROUTE SUPER ADMIN
Route::get('/superAdmin/semua-orderan', [OrderanController::class, 'indexSA'])->name('semua-orderan');
Route::get('/superAdmin/belum-proses-orderan', [OrderanController::class, 'belumprosesSA'])->name('belum-proses-orderan');
Route::get('/superAdmin/menunggu-dicek-orderan', [OrderanController::class, 'menunggudicekSA'])->name('menunggu-dicek-orderan');
Route::get('/superAdmin/dalam-proses-orderan', [OrderanController::class, 'dalamprosesSA'])->name('dalam-proses-orderan');
Route::get('/superAdmin/orderan-selesai', [OrderanController::class, 'orderanselesaiSA'])->name('orderan-selesai');
Route::get('/superAdmin/tulisOrderan', function () {
    return view('super-admin.tulis-orderan.tulisOrderan', ["title" => "Tulis Orderan"]);
});
Route::get('/superAdmin/juragan', function () {
    return view('super-admin.data-juragan.dataJuragan', ["title" => "Data Juragan"]);
});
// Route::get('/superAdmin/charts', function () {
//     return view('super-admin.charts.charts', ["title" => "charts"]);
// });
Route::get('/superAdmin/charts', [ChartsController::class, 'indexSA']);
Route::get('/superAdmin/tulisOrderan', function () {
    return view('super-admin.tulis-orderan.tulisOrderan', ["title" => "Tulis Orderan"]);
});
Route::get('/superAdmin/suntingOrderan', function () {
    return view('super-admin.sunting-orderan.main', ["title" => "Sunting Orderan"]);
});
Route::get('superAdmin/riwayat', function () {
    return view('super-admin.data-pelanggan.dataTransaksi', ["title" => "Data Pelanggan"]);
});
Route::get('/riwayat', function () {
    return view('super-admin.data-pelanggan.dataTransaksi', ["title" => "Riwayat Transaksi"]);
});
Route::get('/superadmin/data-ekpedisi', function () {
    return view('super-admin.data-ekspedisi.data-ekspedisi', ["title" => "Data Expedisi"]);
});
Route::get('/superAdmin/dataBarang', [BarangController::class, 'indexSuperadmin']);
Route::post('superAdmin/dataBarang/store', [BarangController::class, 'create'])->name('barangs.storeSA');
Route::get('/superadmin/profile', [ProfileController::class, 'profileSuper']);
Route::get('/superadmin/profile/edit', [ProfileController::class, 'editSuper']);
Route::get('/superadmin/profile/ubah-password', [ProfileController::class, 'passwordSuper']);
Route::get('/superadmin/notif', [NotifController::class, 'indexSuperadmin']);
// request edit (super-admin)
Route::get('/superAdmin/request', function () {
    return view('super-admin.request.main', ['title' => 'Request']);
});
Route::get('/superAdmin/editRequest', function () {
    return view('super-admin.request.requestEdit', ['title' => 'Request']);
});
// end
// data admin(super-admin)
Route::get('superAdmin/dataAdmin', function () {
    return view('super-admin.data-admin.main', ['title' => 'Data Admin']);
})->name('dataAdmin');
Route::get('superAdmin/data-Admin', [EmployeeController::class, 'indexAdmin']);

Route::get('superAdmin/tambahAdmin', function () {
    return view('super-admin.data-admin.tambahAdmin', ['title' => 'Data Admin']);
})->name('tambahAdmin');
Route::get('superAdmin/editAdmin', function () {
    return view('super-admin.data-admin.editAdmin', ['title' => 'Data Admin']);
})->name('editAdmin');
//end

// data CS(super-admin)
Route::get('/superadmin/data-cs', function () {
    return view('super-admin.data-CS.data-cs', ['title' => 'Data CS']);
});
Route::get('/superadmin/tambah-cs', function () {
    return view('super-admin.data-CS.tambah-cs', ['title' => 'Tambah CS']);
});
Route::get('/superadmin/edit-cs', function () {
    return view('super-admin.data-CS.edit-cs', ['title' => 'Edit CS']);
});
//end
// superAdmin data pelanggan
Route::get('/superAdmin/dataPelanggan', function () {
    return view('super-admin.data-pelanggan.dataPelanggan', ["title" => "Data Pelanggan"]);
});
Route::get('/superAdmin/detail', function () {
    return view('super-admin.data-pelanggan.detailPelanggan', ["title" => "Data Pelanggan"]);
});
Route::get('superAdmin/riwayat', function () {
    return view('super-admin.data-pelanggan.dataTransaksi', ["title" => "Data Pelanggan"]);
});
Route::get('/superAdmin/invoice/{orderNumber}', [OrderanController::class, 'cetakinvoiceSa'])
    ->name('super-admin.dashboard-invoice.invoice');
