<?php

namespace App\Http\Controllers\OwnerController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services to view page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Data['Services'] =  Service::get();
        return view('owner.service.view',$Data);
    }

    /**
     * Show the form for creating a new service.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owner.service.add');
    }

    /**
     * Store a newly created service in table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'detail' =>'required',
            
        ]);
        try {
            $service=new Service;
            $service->name=$request->get('name');
            $service->detail = $request->get('detail');
            $service->save();
            return redirect()->action('OwnerController\ServiceController@index')->with('success', ['Service', 'Created Successfully!']);
        } catch (Exception $e) {
            return back()->with('danger','Something went wrong!');
        }
    }

    /**
     * Show the form for editing the specified service.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Data['Service'] = Service::findorfail($id);
        return view('owner.service.edit',$Data);
    }

    /**
     * Update the specified service in table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         try {
            $edit_service=Service::findorfail($id);
            $edit_service->name=$request->get('name');
            $edit_service->detail = $request->get('detail');
            $edit_service->save();
            return redirect()->action('OwnerController\ServiceController@index')->with('success', ['Service', 'Updated Successfully!']);

        } catch (Exception $e) {
            return back()->with('danger','Something went wrong!');
        }
    }

    /**
     * Remove the specified service from table.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Service::findOrfail($id)->delete();
            return back()->with('success',['Service','Deleted Successfully!']);
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with('danger','Something went wrong! Delete Not Allowed!');
        }
    }
}
