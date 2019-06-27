<?php

namespace App\Http\Controllers\Api;

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
            $delavary=  Delavary::with('type','beneficiary')->orderBy('created_at','desc')->get();
        else
            $delavary=  Delavary::where('user_id',auth()->user()->id)->with('type','beneficiary')->orderBy('created_at','desc')->get();

        return response()->json(['data'=>$delavary]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(auth()->user()->hasRole('admin'))
            $Beneficiary= Beneficiary::all();

        else
            $Beneficiary= Beneficiary::where('office_id',auth()->user()->office_id)->get();

        $type= TypeDonation::all();

        return response()->json(['data'=>$Beneficiary,'type'=>$type]);

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
        return response()->json(['data'=>'تم ارسال التبرع  للمحتاج']);

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
        $u=[];
        $delavary=  Delavary::with('pro')->findOrFail($id);
        $Beneficiary= Beneficiary::where('id',$delavary->be_id)->first();
        $type= TypeDonation::all();
        $u['delavary']=$delavary;
        $u['dataOfPoor']=$Beneficiary;
        $u['type']=$type;
        return response()->json(['data'=>$u]);




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
        return response()->json(['data'=>'تم ارسال التبرع  للمحتاج']);
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
        return response()->json(['data'=>'تم الحذف']);
    }
}
