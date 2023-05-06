<?php

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    return response()->json([
        'status' => true,
        'message' => 'Welcome to laravel serverless api'
    ], 200);
});

Route::get('/run-cron', function () {

    $user = [
        'email' => "ayangefelix8@gmail.com",
        'name' => 'jonh doe'
    ];

    Mail::to($user['email'])->send(new TestMail($user));


    return response()->json([
        'status' => true,
        'message' => 'Mail successfully sent'
    ], 200);
});
