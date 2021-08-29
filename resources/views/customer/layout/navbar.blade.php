<?php $color = array('text-green', 'text-aqua', 'text-yellow','text-primary','text-purple'); ?>
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
        	<li><a href="{{ url('/customer/home') }}"><i class="fa fa-dashboard {{ $color[array_rand($color,1)] }}"></i> <span>Dashboard</span></a></li>
            
             <li><a href="{{ action('CustomerController\BookingController@create') }}"><i class="fa fa-paper-plane {{ $color[array_rand($color,1)] }}"></i>Booking</a></li>
             <li><a href="{{ action('CustomerController\BookingController@index') }}"><i class="fa fa-paper-plane {{ $color[array_rand($color,1)] }}"></i>Booking List</a></li>
            
        </ul>
    </section>
</aside>
