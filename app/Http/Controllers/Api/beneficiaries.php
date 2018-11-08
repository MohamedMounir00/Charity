<?php

namespace App\Http\Controllers\Api;

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


    public function index()
    {
        //

        if(auth()->user()->hasRole('admin'))
            $users=Beneficiary::all();

        else
            $users= Beneficiary::where('office_id',auth()->user()->office_id)->get();
        return response()->json(['data'=>$users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


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
        return response()->json(['data'=>'user create']);
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
        $u=[];
        $user= Beneficiary::findOrFail($id);
        $u['user']=$user;
        $office= Office::withTrashed()->where('id',$user->office_id)->first();
        $u['user']=$user;
        $u['officecity']=$office->city->name_ar;
        $u['officeadderss']=$office->address;
        return response()->json(['data'=>$u]);


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

        return response()->json(['data'=>'user update']);

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
        return response()->json(['data'=>'user deleted']);


    }
}
