<?php

namespace App\Http\Controllers\Backend;

use App\City;
use App\Country;
use App\Http\Requests\Register;
use App\Http\Resources\CreateUsers;
use App\Http\Resources\Users;
use App\Office;
use App\StudyLevel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:user-list');
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        //
        $users= User::with('country','city','office','study')->get();
        return view('user.index',compact('users'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();

        $country= Country::all();
        $studyLevel=StudyLevel::all();

        $offices=Office::all();
        return view('user.create',compact('country','studyLevel','offices','roles'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Register $request)
    {
        //
        $user= User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> bcrypt($request->password),
            'country_id'=>$request->country_id,
            'city_id'=>$request->city_id,
            'address'=>$request->address,
            'pesonal_id'=>$request->pesonal_id,
            'mobile_1'=>$request->mobile_1,
            'mobile_2'=>$request->mobile_2,
            'pirthdata'=>$request->pirthdata,
            'level_id'=>$request->level_id,
            'office_id'=>$request->office_id,
            'level'=>'user',
        ]);

        $user->assignRole($request->input('roles'));

        session()->flash('success' , trans('admin.addsystem'));
        return redirect()->route('user.index');
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
        $user= User::with('country','city','office','study')->findOrFail($id);
        return response()->json(['data'=>$user]);
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

        $country= Country::all();
        $studyLevel=StudyLevel::all();

        $offices=Office::all();
        $user= User::findOrFail($id);
        $roles = Role::all();
        return view('user.edit',compact('country','studyLevel','offices','user','roles'));

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
        $user= User::findOrFail($id);

        $request->validate([
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|min:6',
            'roles'=>'required'


        ]);

            $user->name=$request->name;
             $user->email=$request->email;
          if (isset($request->password))
            $user->password = bcrypt($request->password);
            $user->country_id=$request->country_id;
             $user->city_id=$request->city_id;
             $user->address=$request->address;
             $user->pesonal_id=$request->pesonal_id;
             $user->mobile_1=$request->mobile_1;
             $user->mobile_2=$request->mobile_2;
             $user->pirthdata=$request->pirthdata;
            $user->level_id=$request->level_id;
             $user->office_id=$request->office_id;
            $user->level='user'   ;
            $user->save();

            DB::table('model_has_roles')->where('model_id', $id)->delete();


            $user->assignRole($request->input('roles'));
             session()->flash('success' , trans('admin.systemupdate'));
        return redirect()->route('user.index');

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
        $user= User::findOrFail($id);
        $user->delete();
        session()->flash('success',trans('admin.deleted'));
        return redirect()->route('user.index');


    }



    public function get_cities(Request $request)
    {
        $id = $request->country_id;
        if ($request->has('country_id')){
            $value =City::where('country_id', $id)->get(['name_ar AS name', 'id']    )   ;     // return $city;
            // return $city;
                    return response()->json($value);

        } else
            return response()->json(['status'=> 'fail', 'please enter current country']);
    }

}
