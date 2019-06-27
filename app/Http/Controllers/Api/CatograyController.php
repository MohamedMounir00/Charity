<?php

namespace App\Http\Controllers\Api;

use App\Catogrey;
use App\Http\Requests\Api\CreateCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatograyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:Catogrey-list');
        $this->middleware('permission:Catogrey-create', ['only' => ['create','store']]);
        $this->middleware('permission:Catogrey-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:Catogrey-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $cat = Catogrey::all();
        return response()->json(['data'=>$cat]);
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
    public function store(CreateCat $request)
    {
        Catogrey::create($request->all());
        return response()->json(['data'=>'تم الانشاء بنجاح']);
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
        $cat = Catogrey::findOrFail($id);
        return response()->json(['data'=>$cat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCat $request, $id)
    {
        $cat=Catogrey::findOrFail($id);
        $cat->update($request->all());
        return response()->json(['data'=>'تم التعديل بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat=Catogrey::findOrFail($id);
        $cat->delete();
        return response()->json(['data'=>'تم الحذف']);
    }
}
