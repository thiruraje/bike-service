@extends('customer.layout.master')


@section('content')
<div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title"> Add Booking </h3>   
                </div>
                <div class="box-body">
                     <form class="form-horizontal" method="post" action="{{ action('CustomerController\BookingController@store') }}">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div>
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('vehicle_name') ? ' has-error' : '' }}">
                                            <div class="col-sm-12">
                                                <label>Vehicle Name</label>
                                                <input type="text" class="form-control" value="{{ old('vehicle_name') }}" placeholder="Enter vehicle name" name="vehicle_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('vehicle_name') ? ' has-error' : '' }}">
                                            <div class="col-sm-12">
                                                <label>Address</label>
                                                <input type="text" class="form-control" value="{{ old('address') }}" placeholder="Enter address" name="address">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('vehicle_name') ? ' has-error' : '' }}">
                                        <div class="col-sm-12">
                                            <label>Date</label>
                                            <input type="date" class="form-control" value="{{ old('date') }}" placeholder="Enter date" name="date" min="{{ now()->toDateString('Y-m-d') }}" max="2021-10-20">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label>Select Services</label>
                                            </div>
                                            @if(!$services->isEmpty())
                                                @foreach($services as $service)
                                                    <div class="col-sm-12">
                                                            <input type="checkbox" name="services[]" value="{{$service->id}}"> <label>{{$service->name}}</label>

                                                           
                                                    </div>
                                                @endforeach
                                            @else
                                                <blockquote><p>No Services till now added!!</p></blockquote>
                                            @endif
                                        </div>
                                    </div>
                            </div>
                            
                        </div>
                        <br>
                        <div align="center">
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                        
                    </form>
                       


                </div>
            </div>
        </div>
</div>

@endsection

