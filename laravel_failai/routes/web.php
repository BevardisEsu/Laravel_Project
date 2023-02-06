<?php

use App\Http\Controllers\AddressesController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PersonsController;
use App\Models\address;
use App\Models\Carts;
use App\Models\Orders;
use App\Models\Payments;
use App\Models\Persons;
use App\Models\Products;
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

/*Route::resource([
    'products'=>ProductController::class,
    'categories'=>'Neturiu controlerio',
    'orders'=>OrdersController::class,
    'addresses'=>AddressesController::class,
    'persons'=>PersonsController::class,
    'payments'=>PaymentController::class,
    ])''

]);*/





            //Viskas su adresais

Route::get('/address/{address}',[AddressesController::class, 'show']);

Route::get('/addresses', function(){
    return Address::query()->with('user')->get();
});

            //Viskas su Cartsais

/*Route::get('/carts/{cart}',[CartsController::class,'show']);

Route::get('/carts',function (){
    return Carts::query()->with('carts')->get();

});*/ //TODO Išsiaiškinti kaip apjungti du ryšius ir tada sutvarkyti


            //Viskas su orders

/*Route::get('/orders/{orders}', [OrdersController::class, 'show']);

Route::get('/orders',function (){
    return Orders::query()->with('orders')->get();
});*/ //TODO Neveikia apjungimas nes nesutvarkytos migracijos, per savaitgalį op op nuo nulio pasidaryti viską

                    //Viskas su Payments

Route::get('/payments/{payments}',[PaymentController::class, 'show']);


Route::get('/payments', function(){
    return Payments::query()->with('payment')->get();
});

                    //Viskas su Persons

Route::get('/persons/{persons}',[PersonsController::class,'show']);

Route::get('/persons',function () {
    return Persons::query()->with('person')->get();
});


Route::get( '/products/{products}', [ProductController::class, 'show']);

Route::get('/products', function () {
    return Products::query()->with('category')->get();
});











/*Route::get('/order', function() {
    return Orders::query()->with('cart')->get();

});*/








/*$id = 1;
$user = User::find($id);

$posts = Posts::where('user_id',$user->id)->get();

//Trumpesnis aukščiau pateiktos funkcijos funkcija, kur where, tai vaikščiojimas per masyvą
$posts= $user->posts->where('active',1)->get();*/




