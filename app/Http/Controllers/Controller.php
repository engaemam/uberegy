<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\uberusers;
use App\uberfiles;
use App\uberscooters;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function apply_now(Request $request)
    { 
        
        $application = new uberusers();
        $email = $request->email;
        $application->fname=$request->fname;
        $application->lname=$request->lname;
        $application->email=$request->email;
        $application->number=$request->number;
        $application->vehicle=$request->radio;
        $application->govern=$request->govern;
        $application->save();
        
        $data = [
            'fname'  => $request->fname,
            'lname'   => $request->lname,
            'email' => $request->email,
            'number' => $request->number,
            'vehicle' => $request->radio,
            'govern' => $request->govern,
        ];
      
        return view('fileupload')->with($data);

    }

    public function uploadcar(Request $request)
    {
        $application = new uberfiles();
        $application->profile =$request->fname . '.' . $request->file('profile')->getClientOriginalName();
        $fileName = $request->fname . '.' . 
        $request->file('profile')->getClientOriginalName();

        $request->file('profile')->move(
            base_path() . '/public/uploads/', $fileName
        );
        $application->flisence =$request->fname . '.' . $request->file('flisence')->getClientOriginalName();
        $fileName = $request->fname . '.' . 
        $request->file('flisence')->getClientOriginalName();

        $request->file('flisence')->move(
            base_path() . '/public/uploads/', $fileName
        );
        $application->blisence =$request->fname . '.' . $request->file('blisence')->getClientOriginalName();
        
        $fileName = $request->fname . '.' . 
        $request->file('blisence')->getClientOriginalName();

        $request->file('blisence')->move(
            base_path() . '/public/uploads/', $fileName
        );
        $application->dlisence =$request->fname . '.' . $request->file('dlisence')->getClientOriginalName();
        $fileName = $request->fname . '.' . 
        $request->file('dlisence')->getClientOriginalName();

        $request->file('dlisence')->move(
            base_path() . '/public/uploads/', $fileName
        );

        $application->fesh = $request->fname . '.' . $request->file('fesh')->getClientOriginalName();
          $fileName = $request->fname . '.' . 
        $request->file('fesh')->getClientOriginalName();

        $request->file('fesh')->move(
            base_path() . '/public/uploads/', $fileName
        );
        
       
        $application->email=$request->email;
        $application->save();
        return redirect('/thanks');
       

    }

    public function uploadscooter(Request $request)
    {
        $application = new uberscooters();
        $application->profile =$request->fname . '.' . $request->file('profile')->getClientOriginalName();
        $fileName = $request->fname . '.' . 
        $request->file('profile')->getClientOriginalName();

        $request->file('profile')->move(
            base_path() . '/public/uploads/', $fileName
        );
        $application->flisence =$request->fname . '.' . $request->file('flisence')->getClientOriginalName();
        $fileName = $request->fname . '.' . 
        $request->file('flisence')->getClientOriginalName();

        $request->file('flisence')->move(
            base_path() . '/public/uploads/', $fileName
        );
        $application->blisence =$request->fname . '.' . $request->file('blisence')->getClientOriginalName();
        
        $fileName = $request->fname . '.' . 
        $request->file('blisence')->getClientOriginalName();

        $request->file('blisence')->move(
            base_path() . '/public/uploads/', $fileName
        );
        $application->dlisence =$request->fname . '.' . $request->file('dlisence')->getClientOriginalName();
        $fileName = $request->fname . '.' . 
        $request->file('dlisence')->getClientOriginalName();

        $request->file('dlisence')->move(
            base_path() . '/public/uploads/', $fileName
        );

        $application->Uid = $request->fname . '.' . $request->file('Uid')->getClientOriginalName();
        $fileName = $request->fname . '.' . 
        $request->file('Uid')->getClientOriginalName();

        $request->file('Uid')->move(
            base_path() . '/public/uploads/', $fileName
        );
        
       
        $application->email=$request->email;
        $application->save();
        return redirect('/thanks');
       

    }

    public function showfile($email)
    {   

    $users =  DB::table('uberusers')->where('email','=',$email)->orderBy('created_at', 'desc')->paginate(75);
    return view('euser',compact('users'));
    
    }


    public function deleteDoc($id)
    {   
    $subs = uberusers::findOrFail($id);
    $subs->delete();
    return redirect('/uberusers');
    }

    public function deletefile($id)
    {   
    $subs = uberfiles::findOrFail($id);
    $subs->delete();
    return redirect('/uberfiles');
    }
}
