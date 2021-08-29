Hello,
<p> I am  {!! $name !!} and my mobile number is {!! $mobile !!}.</p> 
<p> my service booked on {!! $date !!}. </p> 
Services List
<ul>
  @foreach( $services as $service )
    <li>{{$service->name}}</li>
  @endforeach
</ul>  
<p> Thank you</p>
