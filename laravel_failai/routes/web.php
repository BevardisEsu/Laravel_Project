<?php

use App\Http\Controllers\Administrator\AddressesController;
use App\Http\Controllers\Administrator\CategoriesController;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Administrator\OrdersController;
use App\Http\Controllers\Administrator\OrdersDetailsController;
use App\Http\Controllers\Administrator\PaymentController;
use App\Http\Controllers\Administrator\PaymentsTypesController;
use App\Http\Controllers\Administrator\PeoplesController;
use App\Http\Controllers\Administrator\ProductsController;
use App\Http\Controllers\Administrator\StatusesController;
use App\Http\Controllers\Administrator\SubCategoriesController;
use App\Http\Controllers\Administrator\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeController::class);

Route::get('product/{product:slug}',[ProductController::class, 'show'])->name('product.show');
Route::get('statuses/{status:type}',[StatusesController::class, 'show'])->name('status.show');

//Dashboard kontrolerio įdiegimas

Route::get('/', DashboardController::class)->name('administrator.dashboard');




//Grupė grupėje nurodant lokalę
Route::group(['middleware'=> SetLocale::class],function(){
    Route::get('/',HomeController::class);
    // Nurodoma, kad dabar bus localhost/administrator/route
    Route::group(['prefix'=>'administrator', 'name'=>'admin'], function(){
        Route::resources([
            'products'=>ProductsController::class,
            'categories'=> CategoriesController::class,
            'subcategories'=> SubCategoriesController::class, // Susitvarkyti, erroras:
            'orders'=>OrdersController::class,
            'odetails'=> OrdersDetailsController::class,
            'addresses'=>AddressesController::class,
            'peoples'=>PeoplesController::class,
            'payments'=>PaymentController::class,
            'ptypes'=> PaymentsTypesController::class,
            'users'=> UsersController::class,
            'statuses'=> StatusesController::class
        ]);
    });

});















/*$id = 1;
$user = User::find($id);

$posts = Posts::where('user_id',$user->id)->get();

//Trumpesnis aukščiau pateiktos funkcijos funkcija, kur where, tai vaikščiojimas per masyvą
$posts= $user->posts->where('active',1)->get();*/




