<?php

namespace App\Http\Controllers\OwnerController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;
class DashboardController extends Controller
{
    /**
     * Display a counts of total_bookings,delivered_bookings,ready_for_delivery_bookings,bending_bookings to view page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Data['total_bookings'] = Booking::get()->count();
        $Data['delivered_bookings'] = Booking::where('status','2')->get()->count();
        $Data['ready_for_delivery_bookings'] = Booking::where('status','1')->get()->count();
        $Data['bending_bookings'] = Booking::where('status','0')->get()->count();

        return view('owner.home',$Data);
    }
}
