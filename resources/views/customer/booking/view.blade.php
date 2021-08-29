@extends('customer.layout.master')
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
                                        <th>Vehicle Name</th>
                                        <th>Booking Date</th>
                                        <th>Status</th>
                                        <th>Services</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bookings as $booking)
                                        <tr>
                                            <td>{{ $booking->vehicle_name }}</td>
                                            <td>{{ $booking->date }}</td>
                                            @if($booking->status =='0')
                                                <td><button class="btn btn-danger">Not ready</button></td>
                                            @elseif($booking->status =='1')
                                                <td><button class="btn btn-warning">Ready for delivery</button></td>
                                            @else
                                                <td><button class="btn btn-success">Completed</button></td>
                                            @endif
                                            <td>
                                                @foreach(explode(',',$booking->services) as $ser)
                                                    <li>{{$service_model->service_data($ser)->name}}</li>
                                                @endforeach
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

