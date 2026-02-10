<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RatingController extends Controller
{
    public function create()
    {
        return view('ratings.create');
    }
    
    public function store(Request $request)
    {
         $ip = $request->ip();
$cookie_id = $request->cookie('device_token') ?? Str::uuid();

        $device_id = hash('sha256',
            $request->ip() .
            $request->header('User-Agent') .
            $request->header('Accept-Language')
        );

        // تحقق من التكرار
        $exists = Submission::where('ip_address', $ip)
            ->where('device_id', $device_id)
            ->exists();

        if($exists){
            return response()->json([
                'status' => false,
                'message' => '❌ لا يمكنك الإدخال أكثر من مرة من نفس الجهاز'
            ], 403);
        }

        Submission::create([
            'ip_address' => $ip,
            'device_id' => $device_id,
            'data' => "",
            'device_token' => $cookie_id
        ]);

         $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|max:100',
            'user_email' => 'nullable|email|max:100',
            'rating' => 'required|numeric|min:0|max:5',
            'comment' => 'required|string|max:500',
            'service_type' => 'required|in:sales,support,delivery,quality'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        Rating::create([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'service_type' => $request->service_type,
            'is_approved' => false
        ]);
        
        // return response()->json([
        //     'status' => true,
        //     'message' => '✅ تم الحفظ بنجاح'
        // ]);
       
        return redirect()->route('ratings.create')
            ->with('success', 'تم إرسال تقييمك بنجاح، وسيتم عرضه بعد الموافقة عليه.');
    }

   
}