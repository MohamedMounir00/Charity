<?php

namespace App\Http\Controllers\Api;

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
    public function index()
    {
        //

        $office =Office::with('city','country','users_rel')->get();
        return response()->json(['data'=>$office]);
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
        return response()->json(['data'=>$country]);


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
          return response()->json(['data'=>'office created']);



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
        $offce=Office::with('city','country')->findOrFail($id);
        $country= Country::all();
        return response()->json(['country'=>$country,'offce'=>$offce]);

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
        return response()->json(['data'=>'office update']);

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
        return response()->json(['data'=>'office delete']);


    }
}
