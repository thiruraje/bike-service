<?php $color = array('text-green', 'text-aqua', 'text-yellow','text-primary','text-purple'); ?>
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
        	<li><a href="{{ url('/owner/home') }}"><i class="fa fa-dashboard {{ $color[array_rand($color,1)] }}"></i> <span>Dashboard</span></a></li>
            
            <li class="treeview @yield('active')" >
                <a href="#">
                    <i class="fa fa-list {{ $color[array_rand($color,1)] }}"></i>
                    <span>Service</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                     <li><a href="{{ action('OwnerController\ServiceController@create') }}"><i class="fa fa-paper-plane {{ $color[array_rand($color,1)] }}"></i>Add Service</a></li>
                      <li><a href="{{ action('OwnerController\ServiceController@index') }}"><i class="fa fa-paper-plane {{ $color[array_rand($color,1)] }}"></i>View Service</a></li>
                    
                </ul>
            </li>
            <li><a href="{{ action('OwnerController\BookingController@index',['type' => 'all']) }}"><i class="fa fa-paper-plane {{ $color[array_rand($color,1)] }}"></i>   Bookings</a></li>
            
        </ul>
    </section>
</aside>
