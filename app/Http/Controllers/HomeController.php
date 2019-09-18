<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = DB::table('uberusers')->count();
        $files = DB::table('uberfiles')->count(); 
        $files1 = DB::table('uberscooters')->count();   
        $files+=$files1;
        return view('home',compact('users','files'));
    }
   
    public function showmessages()
    {
        $users =  DB::table('uberusers')->orderBy('created_at', 'desc')->paginate(75);
        $files =  DB::table('uberfiles')->orderBy('created_at', 'desc')->paginate(75);
        return view('uploads',compact('users'));
    }
    public function showfiles()
    {
        $files =  DB::table('uberfiles')->orderBy('created_at', 'desc')->paginate(75);
        return view('files',compact('files'));
    }
    public function showscooter()
    {
        $files =  DB::table('uberscooters')->orderBy('created_at', 'desc')->paginate(75);
        return view('filescooter',compact('files'));
    }

}
