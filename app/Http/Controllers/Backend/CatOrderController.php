<?php

namespace App\Http\Controllers\Api;

use App\Delavary;
use App\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use DB;
class CatOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }


    public function printDon($don_id)
    {
        $don= Donation::find($don_id);

        $pdf = PDF::loadView('print', compact('don'));
        return $pdf->stream('التبرع رقم #'.$don->id.'.pdf');
    }

    public function printdelavey($id)
    {
        $don2= Delavary::find($id);
        $pdf = PDF::loadView('print2', compact('don2'));
        return $pdf->stream('صرف تبرع رقم #'.$don2->id.'.pdf');
    }

    public function  reportfordon()
    {
        if(auth()->user()->hasRole('admin')){
            $printmony =   DB::table('donations')->where('payment_method','cash')->sum('price');
            $printgoods=   DB::table('donations')->where('payment_method','goods')->sum('price');
        }
        else{
    $printmony =   DB::table('donations')->where('office_id',auth()->user()->office_id)->where('payment_method','cash')->sum('price');
    $printgoods=   DB::table('donations')->where('office_id',auth()->user()->office_id)->where('payment_method','goods')->sum('price');
        }
       $pdf = PDF::loadView('report', compact('printmony','printgoods'));
       return $pdf->stream('تقرير تبرعات.pdf');
    }


    public function  reportfordelavary()
    {
        if(auth()->user()->hasRole('admin')){
            $printmony =   DB::table('delavaries')->where('type','cash')->sum('price');
            $printgoods=   DB::table('delavaries')->where('type','goods')->sum('price');
        }
        else{
            $printmony =   DB::table('delavaries')->where('office_id',auth()->user()->office_id)->where('type','cash')->sum('price');
            $printgoods=   DB::table('delavaries')->where('office_id',auth()->user()->office_id)->where('type','goods')->sum('price');
        }
        $pdf = PDF::loadView('report2', compact('printmony','printgoods'));
        return $pdf->stream('تقرير مصروفات.pdf');
    }
}
