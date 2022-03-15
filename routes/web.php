<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\producttypeController;
use App\Http\Controllers\productController;
use App\Http\Controllers\storageController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\supplierController;
use App\Http\Controllers\positionController;
use App\Http\Controllers\pageController;

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
Route::get('/clear-cache-all',function () {  
    Artisan::call('cache:clear');
    Artisan::call('session:clear');
    Artisan::call('session:clear');
  
    dd ( "Xóa tất cả bộ nhớ cache" );
});


/*MANAGER ADMIM*/

// Route::get('/', function () { return view('index');});

Route::get('/logout_admin', [userController::class, 'getAdLogout'])-> name('logout_admin');
Route::get('/register', [userController::class, 'getAdRegister'])-> name('g_register_admin');
Route::post('/register', [userController::class, 'postAdRegister'])-> name('register_admin');
Route::get('/login_admin', [userController::class, 'getAdLogin'])-> name('g_login_admin');
Route::post('/login_admin', [userController::class, 'postAdLogin'])-> name('login_admin');
 Route::get('/list-users', [userController::class, 'getLstUsers']) -> name('lst_users');
Route::get('delUsers/{id}', [userController::class, 'getDelUsers']) -> name('del_users');
Route::get('/user-search', [userController::class, 'userSearch']) -> name('search_user');

Route::get('/index', [userController::class, 'getIndexAdmin']);

Route::get('/list-product-type', [producttypeController::class, 'getLstPrdType']) -> name('lst_prd_type');
Route::get('/crt-prd-type', [producttypeController::class, 'getCrtPrdType']) -> name('g_crt_prd_type');
Route::post('/crt-prd-type', [producttypeController::class, 'postCrtPrdType']) -> name('crt_prd_type');
Route::get('/edit-prd-type-{id}', [producttypeController::class, 'getEditPrdType']) -> name('g_edit_prd_type');
Route::post('/edit-prd-type-{id}', [producttypeController::class, 'postEditPrdType']) -> name('edit_prd_type');
Route::get('delPrdType/{id}', [producttypeController::class, 'getDelPrdType']) -> name('del_prd_type');
Route::get('export_Product_Type', [producttypeController::class, 'getExpPrdType']) -> name('export_prd_type');
Route::post('import_Product_Type', [producttypeController::class, 'postImportPrdType']) -> name('p_import_prd_type');
Route::get('/product-type-search', [producttypeController::class, 'prdTypeSearch']) -> name('search_prdt');

Route::get('/detail-prd-{id}', [productController::class, 'getDetailPrd']) -> name('prd_detail');
Route::get('/list-product', [productController::class, 'getLstPrd']) -> name('lst_prd');
Route::get('/crt-prd', [productController::class, 'getCrtPrd']) -> name('g_crt_prd');
Route::post('/crt-prd', [productController::class, 'postCrtPrd']) -> name('crt_prd');
Route::get('/edit-prd-{id}', [productController::class, 'getEditPrd']) -> name('g_edit_prd');
Route::post('/edit-prd-{id}', [productController::class, 'postEditPrd']) -> name('edit_prd');
Route::get('delPrd/{id}', [productController::class, 'getDelPrd']) -> name('del_prd');
Route::delete('delMultiPrd', [productController::class, 'delMultiPrd']) -> name('del_multi_prd');
Route::get('export_Product', [productController::class, 'getExpPrd']) -> name('export_prd');
Route::post('import_Product', [productController::class, 'postImportPrd']) -> name('p_import_prd');
Route::get('search-product', [productController::class, 'prdSearch']) -> name('prd_search');

Route::get('/file-upload', [storageController::class, 'fileUpload']) -> name('file_upload');
Route::post('/file-upload', [storageController::class, 'fileUploadPost']) -> name('file_upload_post');
Route::get('/download/{file}',[storageController::class, 'download'])->name('download');

Route::get('create-email', [storageController::class, 'createEmail'])-> name('email');
Route::post('send-email', [storageController::class, 'sendEmail'])-> name('sendMailAttach');

Route::get('/list-payment', [paymentController::class, 'getLstPayment']) -> name('lst_payment');
Route::get('/crt-payment', [paymentController::class, 'getCrtPayment']) -> name('g_crt_payment');
Route::post('/crt-payment', [paymentController::class, 'postCrtPayment']) -> name('crt_payment');
Route::get('/edit-payment-{id}', [paymentController::class, 'getEditPayment']) -> name('g_edit_payment');
Route::post('/edit-payment-{id}', [paymentController::class, 'postEditPayment']) -> name('edit_payment');
Route::get('delPayment/{id}', [paymentController::class, 'getDelPayment']) -> name('del_payment');
Route::get('/search_payment', [paymentController::class, 'searchPayment']) -> name('search_payment');

Route::get('/list-orders', [orderController::class, 'getLstOrder']) -> name('lst_order');
Route::get('/search_order', [orderController::class, 'searchOrder']) -> name('search_order');
Route::get('/order_detail-{id}', [orderController::class, 'getDetailOrder']) -> name('order_detail');

Route::get('/list-supplier', [supplierController::class, 'getLstsupplier']) -> name('lst_supplier');
Route::get('/crt-supplier', [supplierController::class, 'getCrtsupplier']) -> name('g_crt_supplier');
Route::post('/crt-supplier', [supplierController::class, 'postCrtsupplier']) -> name('crt_supplier');
Route::get('/edit-supplier-{id}', [supplierController::class, 'getEditsupplier']) -> name('g_edit_supplier');
Route::post('/edit-supplier-{id}', [supplierController::class, 'postEditsupplier']) -> name('edit_supplier');
Route::get('delSupplier/{id}', [supplierController::class, 'getDelSupplier']) -> name('del_supplier');
Route::get('/search_supplier', [supplierController::class, 'searchSupplier']) -> name('search_supplier');
Route::get('export_supplier', [supplierController::class, 'getExpSupplier']) -> name('export_supplier');

Route::get('/list-position', [positionController::class, 'getLstPosition']) -> name('lst_position');
Route::get('/crt-position', [positionController::class, 'getCrtPosition']) -> name('g_crt_position');
Route::post('/crt-position', [positionController::class, 'postCrtPosition']) -> name('crt_position');
Route::get('/edit-position-{id}', [positionController::class, 'getEditPosition']) -> name('g_edit_position');
Route::post('/edit-position-{id}', [positionController::class, 'postEditPosition']) -> name('edit_position');
Route::get('delPosition/{id}', [positionController::class, 'getDelPosition']) -> name('del_position');
Route::get('/search_position', [positionController::class, 'searchPosition']) -> name('search_position');


/*MANAGER ADMIM END*/






/** Manager Pages */
Route::get('/login', [pageController::class, 'getLogin']) -> name('g_login');
Route::post('/login', [pageController::class, 'postLogin'])-> name('login');
Route::get('/logout', [pageController::class, 'getLogout'])-> name('logout');
Route::get('/', [pageController::class, 'getDataIndex']) -> name('index');
Route::get('/about', [pageController::class, 'getAbout']) -> name('about');
Route::get('/add-to-cart/{id}', [pageController::class, 'getAddtoCart']) -> name('add-to-cart');
Route::get('/cart', [pageController::class, 'getCart'])->name('view_cart');
Route::get('/checkout', [pageController::class, 'getCheckout'])->name('checkout');
Route::get('/buy-now-{id}', [pageController::class, 'getBuyNow']) -> name('buynow');
Route::post('/order', [pageController::class, 'postOrder'])->name('order');
Route::get('/product_detail-{id}', [pageController::class, 'getDetailProduct']) -> name('product_detail');
Route::get('/product-search', [pageController::class, 'searchProduct']) -> name('search_prd');
/** Manager Pages End */