<?php

namespace App\Http\Controllers\Api;

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
        $this->middleware('permission:TypeDonation-create', ['only' => ['store']]);
        $this->middleware('permission:TypeDonation-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:TypeDonation-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        //
        $type = TypeDonation::all();
        return response()->json(['data'=>$type]);

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
    public function store(DonationTypeRequest $request)
    {
        //
        TypeDonation::create($request->all());
        return response()->json(['data'=>'تم الانشاء بنجاخ']);
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
        return response()->json(['data'=>$type]);

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
        return response()->json(['data'=>'تم التعديل ']);
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

        return response()->json(['data'=>'تم الحذف']);

    }
}
