<?php

use App\Http\Controllers\FileController;
use App\Models\file;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Route;

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

Route::resource('/file', FileController::class);
Route::get('/file/download/{id}', function( $file){
    //$filepath= public_path().$file->document;
    $user = file::find($file)->get();

    $headers = array(
              'Content-Type: application/pdf',
            );
            dd($user);

    return response()->download($filepath, 'filename.pdf', $headers);
})->name('download');
