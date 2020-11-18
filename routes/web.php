<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\HasilController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kuesioner', [ParticipantController::class, 'index']);
Route::post('/kuesioner', [ParticipantController::class, 'create']);
Route::get('/ajax-name',function(Request $request){
	$title = $request->title;

	$sub = DB::table('product_participant')
      ->join('products', 'product_participant.product_id', '=', 'products.id')
      ->join('participants', 'product_participant.participant_id', '=', 'participants.id')
      ->where('product_participant.product_id', '=', $title)
      ->select('participants.id', 'participants.name')
      ->get();
	return Response::json($sub);
});

Route::get('/getTrainer', [ParticipantController::class, 'getTrainer']);


Route::get('hasil', 'HasilController@index')->name('hasil');

Route::get('training', 'HasilController@indexTraining')->name('training');
Route::get('training/detail/{id}', [HasilController::class, 'detail'])->name('training.detail');

