@extends('owner.layout.master')


@section('content')

<div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h4>
                        <center>View Services</center>
                    </h4>
                    <a href="{{ action('OwnerController\ServiceController@create') }}" class="btn btn-info pull-right">Add Services</a>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        @if(!$Services->isEmpty())
                            <table  class="table table-bordered table-striped DataTable table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Detail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Services as $Service)
                                        <tr>
                                           <td>{{ $Service->name }}</td>
                                            <td>{{ $Service->detail }}</td>
                                            <td>
                                                <form action="{{ action('OwnerController\ServiceController@destroy',$Service->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a href="{{ action('OwnerController\ServiceController@edit',$Service->id) }}" class="btn"><i class="fa fa-pencil text-aqua"></i></a>
                                                    <button href="" onclick="return confirm('Are you sure?')" class="btn"><i class="fa fa-trash-o"></i></button>
                                                </form>
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

