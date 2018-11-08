<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Resignation as  ResignationRequest;
use App\Office;
use App\Resignation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ResignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:Resignation-list');
        $this->middleware('permission:Resignation-create', ['only' => ['store']]);
        $this->middleware('permission:Resignation-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:Resignation-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        //
        if (auth()->user()->hasRole('admin'))
            $resignation=Resignation::with('user_rel','offices_rel')->get();
        else
            $resignation=Resignation::where('user_id',auth()->user()->id)->with('user_rel','offices_rel')->get();

        return response()->json(['data'=>$resignation]);

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
    public function store(ResignationRequest $request)
    {
        $resignation=Resignation::where('user_id',auth()->user()->id)->count();

        //
        if ($resignation<1) {
            $resignation = new Resignation;
            $resignation->desc = $request->desc;
            $resignation->office_id = auth()->user()->office->id;
            $resignation->user_id = auth()->user()->id;
            $resignation->save();
            return response()->json(['data' => 'لقد تم ارسال الاستقاله للمدير']);
        }else{
            return response()->json(['data' => 'لقد قمت بارساال  استقاله من قبل']);

        }

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
        $resignation=Resignation::with('user_rel')->findOrFail($id);
        $office= Office::where('id',$resignation->office_id)->first();
        $u['resignation']=$resignation;
        $u['officecity']=$office->city->name_ar;
        $u['officeadderess']=$office->address;
       // $u['user']=$resignation->user_rel;
        return response()->json(['data'=>$u]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResignationRequest $request, $id)
    {
        //

        $resignation=Resignation::findOrFail($id);
        $resignation->desc= $request->desc;
        $resignation->office_id=auth()->user()->office->id;
        $resignation->user_id=auth()->user()->id;
        $resignation->save();
        return response()->json(['data'=>'Resignation is updateed']);

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
        $resignation=Resignation::findOrFail($id);
        $resignation->delete();
        return response()->json(['data'=>'Resignation is deleted']);


    }
}
