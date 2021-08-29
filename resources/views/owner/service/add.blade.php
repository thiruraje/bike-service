@extends('owner.layout.master')


@section('content')

<div class="row">
        <div class="col-xs-12">
        	<div class="box">
  				<div class="box-header with-border">
  				<h3 class="box-title"> Add Services </h3>	
                </div>
                <div class="box-body">
                	 <form class="form-horizontal" method="post" action="{{ action('OwnerController\ServiceController@store') }}">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div>
                                	<div class="col-sm-6">
	                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                                        <div class="col-sm-12">
	                                            <label>Service Name</label>
	                                            <input type="text" class="form-control" value="{{ old('product_from') }}" placeholder="Enter name" name="name">
	                                        </div>
	                                    </div>
	                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div>
                                	<div class="col-sm-12">
	                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                                        <div class="col-sm-12">
	                                            <label>Detail</label>
	                                            <textarea name="detail" rows="3" class="form-control" value="{{ old('detail') }}" placeholder="Enter the detail" >
	                                            </textarea>


	                                            
	                                        </div>
	                                    </div>
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

