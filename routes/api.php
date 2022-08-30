<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimpleQRcodeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('simple-qr-code', [SimpleQRcodeController::class, 'simpleQr']);
Route::get('color-qr-code', [SimpleQRcodeController::class, 'colorQr']);
Route::post('image-qr-code', [SimpleQRcodeController::class, 'imageQr']);
Route::get("simple-qrcode", [SimpleQRcodeController::class,"generate"]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
