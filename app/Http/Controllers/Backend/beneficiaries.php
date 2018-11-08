<?php

namespace App\Http\Controllers\Backend;

use App\Beneficiary;
use App\Http\Requests\Api\Createben;
use App\Office;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class beneficiaries extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:beneficiary-list');
        $this->middleware('permission:Beneficiary-create', ['only' => ['create','store']]);
        $this->middleware('permission:Beneficiary-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:Beneficiary-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        //
        $users=Beneficiary::all();
        return view('ben.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ben.create');



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Createben $request)
    {
        //
        $adduser= new Beneficiary;
        $adduser->username=$request->username;
        $adduser->personal_id=$request->personal_id;
        $adduser->typePoor=$request->typePoor;
        $adduser->sons=$request->sons;
        $adduser->Wives=$request->Wives;

        $adduser->adderss=$request->adderss;
        $adduser->content=$request->desc;
        $adduser->office_id=auth()->user()->office->id;
        $adduser->user_id=auth()->user()->id;
        $adduser->save();
        session()->flash('success' , trans('admin.addsystem'));
        return redirect()->route('beneficiary.index');
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
        $user= Beneficiary::findOrFail($id);
        $office= Office::all();
        return view('ben.edit',compact('user'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Createben $request, $id)
    {
        //

        //
        $adduser= Beneficiary::findOrFail($id);
        $adduser->username=$request->username;
        $adduser->personal_id=$request->personal_id;
        $adduser->adderss=$request->adderss;
        $adduser->typePoor=$request->typePoor;
        $adduser->sons=$request->sons;
        $adduser->Wives=$request->Wives;
        $adduser->content=$request->desc;
        $adduser->office_id=auth()->user()->office->id;
        $adduser->user_id=auth()->user()->id;
        $adduser->save();

        session()->flash('success' , trans('admin.systemupdate'));
        return redirect()->route('beneficiary.index');
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
        $adduser= Beneficiary::findOrFail($id);
        $adduser->delete();
        session()->flash('success',trans('admin.deleted'));
        return redirect()->route('beneficiary.index');

    }
}
