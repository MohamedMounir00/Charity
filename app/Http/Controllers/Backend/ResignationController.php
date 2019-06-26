<?php

namespace App\Http\Controllers\Backend;

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
        $this->middleware('permission:Resignation-create', ['only' => ['create','store']]);
        $this->middleware('permission:Resignation-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:Resignation-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        //
        $resignation=Resignation::all();
        return view('resignation.index',compact('resignation'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('resignation.index');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResignationRequest $request)
    {
        //
        $resignation= new Resignation;
        $resignation->desc= $request->desc;
        $resignation->office_id=auth()->user()->office->id;
        $resignation->user_id=auth()->user()->id;
        $resignation->save();

        session()->flash('success' , trans('admin.addsystem'));
        return redirect()->route('resignation.index');
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
        $r=Resignation::findOrFail($id);

        // $u['user']=$resignation->user_rel;
        return view('resignation.show',compact('r'));
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

        $resignation=Resignation::findOrFail($id);

       // $u['user']=$resignation->user_rel;
        return view('resignation.index',compact('resignation'));

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
        session()->flash('success' , trans('admin.systemupdate'));
        return redirect()->route('resignation.index');
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
        if (auth()->user()->id==$id)
        {
            session()->flash('success' , trans('admin.deleted'));
            return redirect()->route('resignation.index');

        }
        else{
            $resignation=Resignation::findOrFail($id);
            $resignation->delete();

            session()->flash('success' , trans('admin.deleted'));
            return redirect()->route('resignation.index');
        }

    }

    public function accept($id)
    {
        //
        if (auth()->user()->id==$id)
        {
            session()->flash('success' , trans('admin.deleted'));
            return redirect()->route('resignation.index');

        }
        else{
            $resignation=Resignation::findOrFail($id);
            $resignation->delete();
            $resignation->user_rel->delete();

            session()->flash('success' , trans('admin.deleted'));
            return redirect()->route('resignation.index');
        }



    }
}
