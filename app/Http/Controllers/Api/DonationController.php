<?php

namespace App\Http\Controllers\Api;
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
    }
    public function index()
    {
        //

        if(auth()->user()->hasRole('admin'))
        {
            $donation=Donation::with('type','offices_rel','cat_rel','user_rel')->orderBy('created_at','desc')->get();

        }
        else
        {
            $donation=Donation::where('user_id',auth()->user()->id)->with('type','offices_rel','cat_rel','user_rel')->orderBy('created_at','desc')->get();


        }

        return response()->json(['data'=>$donation]);

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
        return response()->json(['catogrey'=>$catogrey,'offices'=>$offices,'type'=>$type]);
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
        return response()->json(['data'=>' تم الانشاء ']);
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
           // $offices=Office::with('city')->get();

         //   $catogrey = Catogrey::all();
           // $order = Order::where('donation_id', $id)->where('status', 'open')->get();



            $donation = Donation::with('type','offices_rel','cat_rel','user_rel')->find($id);

       return response()->json(['donation'=>$donation]);
     //  return new EditDonation($donation,$offices,$order,$catogrey);


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








    public function postDelete(Request $r,$id)
    {
        $r->validate([
            'title' => 'required',
            'desc' => 'required',
        ]);
        $count = Order::where('donation_id',$id)->where('status','open')->count();

        if ($count <1){
        $order = new Order;
        $order->title = $r->title;
        $order->content = $r->desc;
        $order->user_id = auth()->user()->id;
        $order->donation_id = $id;
        $order->office_id=auth()->user()->office->id;
        $order->save();
        return response()->json(['data' => 'لقد تم ارسال طلبك الى المدير']);
        }
        else
            return response()->json(['data' => 'لقد قمت بارسال طلب مسبقا لم يتم الرد عليه حتى الان']);

    }


    public function ArchiveDonation(){

    $archive=ArchiveDonation::all();
    return response()->json(['data'=>$archive]);



}



}
