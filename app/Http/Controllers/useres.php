<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\museres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\Fluent\Concerns\Has;

class useres extends Controller
{

    public function showLoginForm()
    {
        return view('admin.login'); // اسم الملف Blade الخاص بالفورم
    }
    //
   
     public function chek(Request $request ){
          $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
       $data= museres::where("email",$request->email)->first();
        if(!empty($data)){
            Auth::login($data);
 return redirect()->route("admin.dashboard");
     }
     else{
 return redirect()->route("complaints.create");

     }


    }
}
