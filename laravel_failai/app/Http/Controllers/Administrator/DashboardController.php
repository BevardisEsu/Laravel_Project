<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Statuses;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
{
    $latestStatuses = Statuses::latest()->take(5)->get();
    $latestAddresses = Address::latest()->take(5)->get();
    $latestOrders = Orders::latest()->take(5)->get();
    $latestProducts = Products::latest()->take(5)->get();
    $latestUsers = User::latest()->take(5)->get();

    return view('administrator.dashboard', compact('latestAddresses', 'latestStatuses','latestProducts', 'latestUsers', 'latestOrders'));
}
}
