<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\DonationTypeRequest;
use App\TypeDonation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:TypeDonation-list');
        $this->middleware('permission:TypeDonation-create', ['only' => ['create','store']]);
        $this->middleware('permission:TypeDonation-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:TypeDonation-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        //
        $type = TypeDonation::all();
        return view('donationType.index',compact('type'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('donationType.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DonationTypeRequest $request)
    {
        //
        TypeDonation::create($request->all());
        session()->flash('success' , trans('admin.addsystem'));
        return redirect()->route('typeDonation.index');
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
        //
        $type = TypeDonation::findOrFail($id);
        return view('donationType.edit',compact('type'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DonationTypeRequest $request, $id)
    {
        //
        $type = TypeDonation::findOrFail($id);

        $type->update($request->all());
        session()->flash('success',trans('admin.systemupdate'));
        return redirect()->route('typeDonation.index');
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
        $type = TypeDonation::findOrFail($id);
        $type->delete();

        session()->flash('success',trans('admin.systemupdate'));
        return redirect()->route('typeDonation.index');
    }
}
