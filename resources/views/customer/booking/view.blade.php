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
                                                <!-- <a href="{{ action('OwnerController\BookingController@show',$booking->id) }}" class="btn"><i class="fa fa-eye "></i></a> -->
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye "></i></button>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <blockquote><p>No Services till now added!!</p></blockquote>
                        @endif
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                            
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Services List</h4>
                                </div>
                                <div class="modal-body">
                                     @foreach(explode(',',$booking->services) as $ser)
                                        <p> # {{$service_model->service_data($ser)->name}}</p>
                                    @endforeach
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                              
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

