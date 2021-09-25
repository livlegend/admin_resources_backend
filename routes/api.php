<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\HtmlSnippetController;
use App\Http\Controllers\LinkController;
use Illuminate\Http\Request;
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

Route::resource('files', FileController::class);
Route::post('files/{file}',[FileController::class, 'update']);
Route::resource('html_snippets', HtmlSnippetController::class);
Route::resource('links', LinkController::class);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
