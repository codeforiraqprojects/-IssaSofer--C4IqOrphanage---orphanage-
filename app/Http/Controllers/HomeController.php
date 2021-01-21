<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orphans;
use App\Myorphan;
use App\Adopted;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orphanCount = Orphans::all('id');

        $helpCount = Myorphan::all('id');

        $adoptedCount = Adopted::all('id');

        return view('home')->with(array('orphanCount' => $orphanCount, 'helpCount' => $helpCount, 'adoptedCount' => $adoptedCount));
    }
}
