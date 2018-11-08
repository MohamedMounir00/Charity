<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\Country;
use App\Http\Requests\Api\Register;
use App\Http\Resources\CreateUsers;
use App\Http\Resources\Users;
use App\Office;
use App\StudyLevel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
       // $this->middleware('permission:user-create', ['only' => ['create','store']]);
    }
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
        $country= Country::all();
        $studyLevel=StudyLevel::all();

        $offices=Office::all();
        return new CreateUsers($country,$studyLevel,$offices);


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
            'level'=>$request->level
        ]);
        $user->assignRole(3);

        return response()->json(['data'=>'تم اضافه موظف جديد']);
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
        $user= User::with('country','city','office','study')->findOrFail($id);

        return response()->json(['country'=>$country,'offices'=>$offices,'studyLevel'=>$studyLevel,'user'=>$user,]);

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


    public function login(Request $request){

        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $user= User::where('email',$request->email)->first();
        if(!$user){
            return response(['status'=>'error','message'=>'User not found']);
        }
        if(Hash::check($request->password, $user->password)){
            $client = \Laravel\Passport\Client::where('password_client', 1)->first();

            $request->request->add([
                'grant_type'    => 'password',
                'client_id'     => $client->id,
                'client_secret' => $client->secret,
                'username'      => $user['email'],
                'password'      => $user['password'],
                'scope'         => null,
                //'type'         => $user->hasRole('translator') ? 'translator' : 'user',
            ]);

            // Fire off the internal request.
            $proxy = Request::create(
                'oauth/token',
                'POST'
            );

            //return \Route::dispatch($proxy);
            $user['token'] =  $user->createToken('MyApp')->accessToken;
            $permissions = [];
            $logged_user = User::find($user->id);
            foreach ($logged_user->roles as $role) {
                foreach ($role->permissions as $permission)
                    $permissions[] = $permission->name;
            }

            $user['permissions'] = $permissions;
            return new Users($user);



        }else{
            return response(['message'=>'password not match','status'=>'error']);
        }
    }

    public function getAllCitiesByCountryId(Request $request)
    {
        $id = $request->country_id;
        if ($request->has('country_id')){
            $city =City::where('country_id',$id)->get() ;
            // return $city;
            // return $city;
            return \App\Http\Resources\City::collection($city);
        } else
            return response()->json(['status'=> 'fail', 'please enter current country']);
    }

    public function getAllofficesBycity(Request $request)
    {
        $id = $request->city_id;
        if ($request->has('city_id')){
            $office =Office::where('city_id',$id)->get() ;

            return response()->json(['data'=> $office]);
        } else
            return response()->json(['status'=> 'fail', 'please enter current country']);
    }
    public function  getprimission()
    {
        $permissions = [];
        $logged_user = auth()->user();
        foreach ($logged_user->roles as $role) {
            foreach ($role->permissions as $permission)
                $permissions[] = $permission->name;
        }

        $user['permissions'] = $permissions;
        return $user;
    }
}
