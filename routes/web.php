<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\productController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\studentController;
use App\Models\product;

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


route::get('/register/{id}',[Controller::class,'delete']);
route::get('/update/{id}',[Controller::class,'update']);
route::post('/update/{id}',[Controller::class,'updated']);
route::get('/search',[Controller::class,'search']);

Route::get('/category',[categoryController::class,'category']);
Route::post('/category',[categoryController::class,'addcategory']);

Route::get('/product',[productController::class,'product']);// ->middleware('dontgodashboard');
Route::post('/product',[productController::class,'addProduct']);

Route::get('/updateproduct/{id}',[productController::class,'productEdit']);
Route::post('/updateproduct/{id}',[productController::class,'productUpdate']);



Route::get('/deletesession',[loginController::class,'deletesession']);
Route::get('/responseget',[loginController::class,'responseget']);
Route::get('/deletecookie',[loginController::class,'deletecookie']);
Route::get('/productone/{id}',[productController::class,'productOneToOne']);
route::get('/student/{id}',[studentController::class,'student']);
// route::get('/showmany',[studentController::class,'showmany']);

route::get('/movetotrash/{id}',[studentController::class,'moveToTrash']);
route::get('/showtrashdata',[studentController::class,'showTrashData']);
route::get('/restore/{id}',[studentController::class,'restore']);

route::post('/selectmovetotrash',[studentController::class,'selectMoveToTrash']);
route::post('/restoreselected',[studentController::class,'restoreSelected']);

route::get('/trashall',[studentController::class,'trashall']);
route::get('/restoreall',[studentController::class,'restoreAll']);



route::get('/deletedirect/{id}',[studentController::class,'deleteDirect']);

route::get('/deletepremenentfromrestore/{id}',[studentController::class,'deletepremenentfromrestore']);

route::post('/dall',[studentController::class,'dall']);

Route::get('/download/{id}', [productController::class,'downloadImage'])->name('image.download');


route::get('/showproduct',[productController::class,'showproduct']);
route::get('/down/{id}',[productController::class,'down']);

route::get('custom',[productController::class,'custom']);
Route::get('setsession',[loginController::class,'setSession']);
Route::get('getsession',[loginController::class,'getSession']);
Route::get('/login',[loginController::class,'login']) ->middleware('dontgologin');
Route::post('/login',[loginController::class,'loginUser']);



Route::group(['middleware'=>['routegroup']],function()
{
    Route::get('/', function () {
    // return help::ohh();
    return view('welcome');
});
// ->middleware('dontgodashboard');


    
    route::get('/register',[Controller::class,'register']);
    route::get('/showmany',[studentController::class,'showmany']);
    // route::post('/register',[Controller::class,'addUser']); 
});


Route::get('/navbarjs',[loginController::class,'navbarjs']);