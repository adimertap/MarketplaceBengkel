<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Customer;
use App\Transaction;
use App\Bengkel;
use App\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $bengkel = Bengkel::count();
        $customer = Customer::count();
        $revenue = Transaksi::where('transaksi_status', 'DITERIMA')->sum('harga_total');
        $transaction = Transaksi::count();
        return view('admin-views.pages.dashboard',[
            'customer' => $customer,
            'revenue' => $revenue,
            'transaction' => $transaction,
            'bengkel' => $bengkel           
        ]);
    }
}
