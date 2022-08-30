<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimpleQRcodeController;

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
Route::get('simple-qr-code', [SimpleQRcodeController::class, 'simpleQr']);
Route::get('color-qr-code', [SimpleQRcodeController::class, 'colorQr']);
Route::post('image-qr-code', [SimpleQRcodeController::class, 'imageQr']);
Route::get("simple-qrcode", [SimpleQRcodeController::class,"generate"]);
Route::get('/', function () {
   // dd(phpinfo());
   
   return gettype(\QrCode::size(500)
   ->format('png')
   ->generate('codingdriver.com', public_path('qrcode.png')));
});
