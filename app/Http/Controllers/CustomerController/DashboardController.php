<?php

namespace App\Http\Controllers\CustomerController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;

class DashboardController extends Controller
{
    /**
     * Display a count of the bookings with respective customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Data['total_bookings'] = Booking::where('cus_id', '=', auth()->user()->id)->get()->count();
        return view('customer.home',$Data);;
    }

    
}
