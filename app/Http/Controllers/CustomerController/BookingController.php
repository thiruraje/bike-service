<?php

namespace App\Http\Controllers\CustomerController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Service;
use App\Booking;
use Mail;

class BookingController extends Controller
{
    /**
     * Display a listing of the respective customer booking details and send to the view blade.
     */
    public function index()
    {
        $Data['bookings'] = Booking::where('cus_id', '=', auth()->user()->id)->get();
        return view('customer.booking.view',$Data);
    }

    /**
     * Show the form for creating a new booking with combained the list of service list.
     */
    public function create()
    {
        $Data['services'] = Service::get();
        return view('customer.booking.add',$Data);
    }

    /**
     * Store a newly created booking in db.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_name' =>'required',
            'address' =>'required',
            'services' =>'required'
        ]);
        try {
            /**
             * Initialize the Booking model and save booking through this model.
             * Get the data's from view blade using request.
             * Get a array of services convert a string then store to the services column.
             * Set the default status code '0' while adding a booking.The status code '0' denotes bending service status.
             */
            // 
            $booking=new Booking;
            $booking->cus_id=auth()->user()->id;
            $booking->vehicle_name=$request->get('vehicle_name');
            $booking->address = $request->get('address');
            $booking->services = implode(",",$request->get('services'));
            $booking->date = $request->get('date');
            $booking->status = "0";
            $booking->save();

            /**
             * Once the customer booked a service, send an email notification with details about th
                service requested by the customer.
             */
            $services_list = Service::whereIn('id', $request->get('services'))->get('name');
            $mail_booking_data = [
                'name'  => auth()->user()->name,
                'mobile' => auth()->user()->mobile,
                'date' => $request->get('date'),
                'services' => $services_list
            ]; 
            /**
             * In this Mail:sent() add the view blade 'mail' and from,to address with subject
             */
            try {
                Mail::send(['html'=>'mail'], $mail_booking_data, function($message) { 
                    $message->to('thiruscholar@gmail.com', 'Bike-service')->subject('Booking-alert');
                    $message->from(auth()->user()->email,'Bike-Service'); 
                });
                    
            } catch (Exception $e) {
                
            }

            return back()->with('success', ['Booking', 'Created Successfully!']);
        } catch (Exception $e) {
            return back()->with('danger','Something went wrong!');
        }
    }

}
