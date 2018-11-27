<?php

namespace App\Http\Controllers;

use App\Delavary;
use App\Donation;
use App\Office;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $donation = Donation::count();
            $delavery= Delavary::count();
                $office=Office::count();
                    $users= User::count();

        return view('home',compact('users','donation','delavery','office'));
    }
}
