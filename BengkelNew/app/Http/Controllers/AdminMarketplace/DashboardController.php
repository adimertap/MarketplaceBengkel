<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Customer;
use App\Transaction;



class DashboardController extends Controller
{
    public function index()
    {

        $customer = Customer::count();
        $revenue = Transaction::where('status_transaksi', 'DITERIMA')->sum('harga_total');
        $transaction = Transaction::count();
        return view('admin-views.pages.dashboard',[
            'customer' => $customer,
            'revenue' => $revenue,
            'transaction' => $transaction
            
        ]);
    }
}
