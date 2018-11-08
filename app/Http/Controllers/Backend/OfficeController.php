<?php

namespace App\Http\Controllers\Backend;

use App\Country;
use App\Http\Requests\Api\CreateOffice;
use App\Office;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:Office-list');
        $this->middleware('permission:Office-create', ['only' => ['create','store']]);
        $this->middleware('permission:Office-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:Office-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        //

        $offices =Office::all();
        return view('office.index',compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      $country= Country::all();
        return view('office.create',compact('country'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOffice $request)
    {
        //
        Office::create($request->all());
        session()->flash('success' , trans('admin.addsystem'));
        return redirect()->route('office.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //  //
      $offce=Office::findOrFail($id);
       $country= Country::all();
        return view('office.edit',compact('offce','country'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateOffice $request, $id)
    {
        //
       $offce=Office::findOrFail($id);
      $offce->update($request->all());
        session()->flash('success',trans('admin.systemupdate'));
        return redirect()->route('office.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       $offce=Office::findOrFail($id);
      $offce->delete();
        session()->flash('success',trans('admin.deleted'));
        return redirect()->route('office.index');

    }
}
