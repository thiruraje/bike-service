<?php

namespace App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;
use App\Customer;
use Mail;

class BookingController extends Controller
{

    /**
     * Display a listing of the bookings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->get('type') == 'all'){
            //Return the all booking list from booking table

            $Data['bookings'] = Booking::orderBy(DB::raw("DATE_FORMAT(date,'%Y-%M-%d')"), 'ASC')->get();
            return view('owner.booking.view',$Data);
        }else{
            //Return only particular type ('completed bookings','ready for delivery bookings','bending bookings') from the booking table

            $Data['bookings'] = Booking::where('status',$request->get('type'))->orderBy(DB::raw("DATE_FORMAT(date,'%Y-%M-%d')"), 'ASC')->get();
            return view('owner.booking.view',$Data);
        }
        
    }

    /**
     * Display the specified details of bookings and customer data.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Data['booking'] = Booking::find($id);
        $Data['customer'] = Customer::find($Data['booking']->cus_id);
        return view('owner.booking.detail',$Data);
    }

    /**
     * Update the status of booking from ajax call.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function update_booking_status(Request $request)
    {
        /**
         * Updating the booking status through booking_id from ajax.
         * Get the updated status from ajax.
         */
        // 
        try{
            $update_status = Booking::find($request->get('booking_id'));
            $update_status->status = $request->get('status');
            $update_status->save();

            // Wrote a code for once owner change ready for delivery state then send an email to the specific booking (of a customer) your bike is ready for delivery.

            if( $request->get('status')  == "1"){
                $cus_id = Booking::find($request->get('booking_id'))->cus_id;
                $cus_detail = Customer::find($cus_id);

                $ready_for_delivery = [
                    'cus_name'  => $cus_detail->name,
                ]; 
                Mail::send(['html'=>'ready_for_delivery'], $ready_for_delivery, function($message) use ($cus_detail) { 
                     $message->to($cus_detail->email, 'Bike-service')->subject('Delivery-alert');
                     $message->from('thiruscholar@gmail.com','Bike-Service'); 
                });
            }
            return response()->json("success", 200);
        }catch (Exception $e) {
            return response()->json("error", 500);
        }
        
    }

    public function sendMail($cus_detail)
    {
       
    }
}
