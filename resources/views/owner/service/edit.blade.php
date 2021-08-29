@extends('owner.layout.master')


@section('content')

<div class="row">
        <div class="col-xs-12">
        	<div class="box">
  				<div class="box-header with-border">
  				<h3 class="box-title"> Edit Services </h3>	
                </div>
                <div class="box-body">
                	 <form class="form-horizontal"  action="{{ action('OwnerController\ServiceController@update',$Service->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div>
                                	<div class="col-sm-6">
	                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                                        <div class="col-sm-12">
	                                            <label>Service Name</label>
	                                            <input type="text" class="form-control" value="{{ old('name',$Service->name) }}" placeholder="Enter name" name="name">
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
	                                            <textarea name="detail"  class="form-control" value="{{ old('detail',) }}" placeholder="Enter the detail" >
                                                    {{$Service->detail}}
	                                            </textarea>
	                                        </div>
	                                    </div>
	                                </div>
                                </div>
                                
                            </div>
                        </div>
                        <br>
                        <div align="center">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                     	
                    </form>
				 	   


				</div>
            </div>
        </div>
</div>


@endsection

