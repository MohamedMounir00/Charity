<?php

namespace App\Http\Controllers\Backend;
use App\ArchiveDonation;
use App\Http\Requests\Api\Donation as don;

use App\Catogrey;
use App\Http\Requests\Api\UpdateDonation;
use App\Http\Resources\EditDonation;
use App\Order;
use App\TypeDonation;
use Illuminate\Support\Facades\Auth;
use Validator;

use App\Country;
use App\Donation;
use App\Http\Resources\CreateDonation;
use App\Office;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:donation-list');
        $this->middleware('permission:donation-create', ['only' => ['create','store']]);
        $this->middleware('permission:donation-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:donation-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        //
        if (auth()->user()->hasRole('admin'))
            $donations=Donation::all();
        else
            $donations=Donation::where('user_id',auth()->user()->id)->get();
        return view('donation.index',compact('donations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $catogrey=Catogrey::all();
        $type=TypeDonation::all();

        $offices=Office::with('city')->get();
        return view('donation.create',compact('catogrey','offices','type'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(don $r)
    {
        //


        $add= new Donation;
        $add->name =$r->input('name');
        $add->price =$r->input('price');
        $add->office_id =$r->input('office_id');
        $add->cat_id =$r->input('cat_id');
        $add->type_id =$r->input('type_id');
        $add->date = date(DATE_ATOM);
        $add->payment_method = $r->input('payment_method');
        $add->user_id = auth()->user()->id;
        $add->save();
        session()->flash('success' , trans('admin.addsystem'));
        return redirect()->route('donation.index');
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
            $offices=Office::with('city')->get();
           $type=TypeDonation::all();

            $catogrey = Catogrey::all();
            $order = Order::where('donation_id', $id)->where('status', 'open')->get();
            $donation = Donation::find($id);
          return view('donation.edit',compact('catogrey','offices','order','donation','type'));



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDonation $request, $id)
    {
        //


            $donation = Donation::find($id);
            $addarch = new  ArchiveDonation;
            $addarch->name = $donation->name;
            $addarch->price = $donation->price;
            $addarch->office_id = $donation->office_id;
            $addarch->cat_id = $donation->cat_id;
            $addarch->date = $donation->date;
            $addarch->user_id = $donation->user_id;
            $addarch->payment_method = $donation->payment_method;
            $addarch->proccess_type = 'edit';
            $addarch->reason = $request->input('reason');
            $addarch->order_id = $request->input('order_id');

            if ($addarch->save()) {

                $order_edit = Order::find($request->input('order_id'));
                $order_edit->status = 'close';
                $order_edit->save();
                $donation->update($request->all());

            }
            session()->flash('success',trans('admin.systemupdate'));
            return redirect()->route('donation.index');



    }

    public function gettorderdonation($id){
        $donation = Donation::find($id);
        $offices=Office::with('city')->get();
        $type=TypeDonation::all();

        $catogrey = Catogrey::all();
        return view('donation.editorder',compact('donation','offices','catogrey','type'));

    }
    public function postorderdonation(Request $request,$id){
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
        ]);
        $order= new Order;
        $order->title=$request->title;
        $order->content=$request->desc;
        $order->user_id=auth()->user()->id;
        $order->donation_id=$id;
        $order->office_id=auth()->user()->office->id;
        $order->save();
        session()->flash('success' ,'لقد تم ارسال طلبك للاداره');
        return redirect()->route('donation.index');

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
       // $donation =  Donation::find($id);
       //// $order=Order::where('donation_id',$id)->where('status','open')->get();
      //  return response()->json(['donation'=>$donation,'order'=>$order]);

    }





    public function getdelete($id)
    {
        //
        $donation = Donation::find($id);
        $offices=Office::with('city')->get();
        $type=TypeDonation::all();

        $catogrey = Catogrey::all();
        $order = Order::where('donation_id', $id)->get();

        return view('donation.del',compact('donation','offices','catogrey','order','type'));
    }



    public function postdonationdel(Request $r,$id)
    {
        $deletdonamtion = Donation::find($id);
        if ($deletdonamtion) {

                    $r->validate([
                        'reason' => 'required',
                        'order_id' => 'required'
                    ]);


            $donation = Donation::find($id);
            if ($donation) {
                $addarch = new  ArchiveDonation;
                $addarch->name = $donation->name;
                $addarch->price = $donation->price;
                $addarch->office_id = $donation->office_id;
                $addarch->cat_id = $donation->cat_id;
                $addarch->date = $donation->date;
                $addarch->user_id = $donation->user_id;
                $addarch->payment_method = $donation->payment_method;
                $addarch->proccess_type = 'delete';
                $addarch->reason = $r->input('reason');
                $addarch->order_id = $r->input('order_id');
                if ($addarch->save()) {
                    $order_edit = Order::find($r->input('order_id'));
                    $order_edit->status = 'close';
                    $order_edit->save();

                    $donation->delete();
                    $orders = Order::where('donation_id', $id)->get();
                   foreach ($orders as $order) {
                        $order->delete();
                    }
                    session()->flash('success' , trans('admin.deleted'));
                    return redirect()->route('donation.index');
                }
            }




    }
        }

public function ArchiveDonation(){

    $archive=ArchiveDonation::all();
    return view('donation.archive',compact('archive'));



}



}
