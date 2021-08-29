@extends('owner.layout.master')

@inject('cutomer_model', 'App\Customer')
@inject('service_model', 'App\Service')

@section('content')
<div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h4>
                        <center>View Bookings</center>
                    </h4>
                    
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        @if(!$bookings->isEmpty())
                            <table  class="table table-bordered table-striped DataTable table-hover">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Vehicle Name</th>
                                        <th>Booking Date</th>
                                        <th>Services</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bookings as $booking)
                                        <tr>
                                            <td>{{ $cutomer_model->cus_data($booking->cus_id)->name }}</td>
                                            <td>{{ $booking->vehicle_name }}</td>
                                            <td>{{ $booking->date }}</td>
                                            <td>
                                                 @foreach(explode(',',$booking->services) as $ser)
                                                        <li>{{$service_model->service_data($ser)->name}}</li>
                                                    @endforeach
                                            </td>
                                            @if($booking->status =='0')
                                                <td><button class="btn btn-danger">Not ready</button></td>
                                            @elseif($booking->status =='1')
                                                <td><button class="btn btn-warning">Ready for delivery</button></td>
                                            @else
                                                <td><button class="btn btn-success">Completed</button></td>
                                            @endif

                                            
                                            <td>
                                                @if($booking->status !='2')
                                                <a href="{{ action('OwnerController\BookingController@show',$booking->id) }}" class="btn"><i class="fa fa-pencil text-aqua"></i></a>
                                                @endif
                                                
                                            </td>

                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <blockquote><p>No Services till now added!!</p></blockquote>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

