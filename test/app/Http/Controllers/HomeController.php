<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */

    public function index()
    {
        // $salesPerMonth = Sale::selectRaw('MONTH(created_at) as month, SUM(total) as total')
        //     ->groupBy('month')
        //     ->pluck('total', 'month');

        // $salesPerItem = SaleItem::join('master_items', 'sale_item.item_id', '=', 'master_items.id')
        //     ->select('master_items.name', SaleItem::raw('SUM(qty) as total'))
        //     ->groupBy('master_items.name')
        //     ->pluck('total', 'master_items.name');

        // $totalSales = Sale::count();

        // $totalSalesAmount = Sale::sum('total');

        // $totalQty = SaleItem::sum('qty');

        // return view('home', compact('salesPerMonth', 'salesPerItem', 'totalSales', 'totalSalesAmount', 'totalQty'));
        return view('home');
    }
}
