<?php

namespace App\Http\Controllers\Backend;

use App\Beneficiary;
use App\Delavary;
use App\Http\Requests\Api\CreatDelavary;
use App\TypeDonation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DelavaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:Delavary-list');
        $this->middleware('permission:Delavary-create', ['only' => ['create','store']]);
        $this->middleware('permission:Delavary-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:Delavary-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        //

        if(auth()->user()->hasRole('admin'))
            $delavary=  Delavary::all();
        else
            $delavary=  Delavary::where('user_id',auth()->user()->id)->get();
        return view('delavery.index',compact('delavary'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Beneficiary= Beneficiary::all();
        $type= TypeDonation::all();

        return view('delavery.create',compact('Beneficiary','type'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatDelavary $request)
    {

        $delavary= new Delavary;
        $delavary->price=$request->price;
        $delavary->type=$request->type;           ///'type',['cash','goods'
        $delavary->be_id=$request->be_id;
        $delavary->type_id=$request->type_id;

        $delavary->office_id=auth()->user()->office->id;
        $delavary->user_id=auth()->user()->id;
        $delavary->save();
        session()->flash('success' , trans('admin.addsystem'));
        return redirect()->route('delavery.index');
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
        $delavary=  Delavary::with('type')->findOrFail($id);
        $Beneficiary= Beneficiary::all();
        $type= TypeDonation::all();

        return view('delavery.edit',compact('delavary','Beneficiary','type'));




    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatDelavary $request, $id)
    {
        //

        $delavary=  Delavary::findOrFail($id);
        $delavary->price=$request->price;
        $delavary->type=$request->type;           ///'type',['cash','goods'
        $delavary->be_id=$request->be_id;
        $delavary->type_id=$request->type_id;

        $delavary->office_id=auth()->user()->office->id;
        $delavary->user_id=auth()->user()->id;
        $delavary->save();
        session()->flash('success',trans('admin.systemupdate'));
        return redirect()->route('delavery.index');
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
        $delavary=  Delavary::findOrFail($id);

        $delavary->delete();
        session()->flash('success',trans('admin.deleted'));
        return redirect()->route('delavery.index');    }
}
