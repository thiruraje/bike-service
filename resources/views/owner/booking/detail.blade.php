@extends('owner.layout.master')
@inject('service_model', 'App\Service')
@section('content')
<style type="text/css">
body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
</style>
<div class="container">
    <div class="main-body">
         <input type="hidden" id="booking_id" name="boking_id" value="{{ $booking->id }}">


          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>{{$customer->name}}</h4>
                      <p class="text-secondary mb-1">{{$customer->mobile}}</p>
                      <p class="text-muted font-size-sm">{{$booking->address}}</p>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="box-body">
                        <div class="box-body">
                            <div class="row">
                                <div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-12">
                                            <label>Vehicle Name :</label>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-12">
                                            <label>{{$booking->vehicle_name}}</label>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-12">
                                            <label>Booked Date :</label>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-12">
                                            <label>{{$booking->date}}</label>
                                            
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label>Status :</label>
                                                <div>
                                                    <input type="radio" name="status" {{ $booking->status == "0" ?"checked" : "" }} value="0" 
                                                     >
                                                    <label>Not ready</label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="status" value="1" {{ $booking->status == "1" ?"checked" : "" }}>
                                                    <label>Ready for delivery</label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="status" value="2" {{ $booking->status == "2" ?"checked" : "" }}>
                                                    <label>Completed</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        @if($booking->status =='2')
                            <div align="center">
                                <button type="submit" class="btn btn-success">Delivered </button>
                            </div>
                        @else
                            <div align="center">
                                <button type="submit" id ="update_status" class="btn btn-info">Update</button>
                            </div>
                        @endif
                </div>
                </div>
            </div>              

              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3">Vehicle Services</h6>
                        @foreach(explode(',',$booking->services) as $ser)
                            <h4># {{$service_model->service_data($ser)->name}}</h4>
                              <div >
                                {{$service_model->service_data($ser)->detail}}
                              </div>
                        @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript">
    $( "#update_status" ).click(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var status_val = $('input[name="status"]:checked').val();
        var booking_id = $('#booking_id').val();

        $.ajax(
            {headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '{{ action("OwnerController\BookingController@update_booking_status") }}',
            method: "post",
            data: { status: status_val ,booking_id:booking_id,"_token": "{{ csrf_token() }}" },
            success:function(data){
                if(status_val == '1'){
                    alert('Updated the status\nEmail sent successfully');
                }else{
                    alert('Updated the status');
                }
                
            },
            error:function(data){
                alert('Email not send !!');
            }
        });
    });
</script>

@endsection

