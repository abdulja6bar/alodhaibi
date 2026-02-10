<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ComplaintReply;
use App\Models\Rating;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
public function reply(Request $request, $id)
{
    // التحقق من وجود الرد
  $request->validate(['reply_message' => 'required|string|min:1']);


    // البحث عن الملاحظة
    $complaint = Complaint::find($id);

    // تحديث الحالة والرد
    $complaint->update([
        'status' => 'resolved',
        'admin_reply' => $request->reply_message
    ]);

    // إرسال البريد
    try {
        Mail::to($complaint->user_email)
            ->send(new ComplaintReply($complaint->admin_reply));
    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'حدث خطأ أثناء إرسال البريد: '.$e->getMessage());
    }

    return redirect()->back()->with('success', 'تم إرسال الرد بنجاح عبر البريد الإلكتروني');
}



    public function index()
    {
                $totalComplaints = Complaint::count();
        $newComplaints   = Complaint::where('status','new')->count();

        // $totalRatings    = Rating::count();
        // $pendingRatings  = Rating::where('status','pending')->count();

        // آخر الملاحظات
        // $latestComplaints = Complaint::orderBy('created_at')->get();
        $data=Complaint::all();
        // آخر التقييمات
        // $latestRatings = Rating::orderBy('created_at','desc')->take(5)->get();

        return view('admin.dashboard', compact(
            'totalComplaints', 
            'newComplaints', 
            'data',
            // 'totalRatings', 
            // 'pendingRatings',
            // 'latestComplaints',
            // 'latestRatings'
        ));
    }
    
    public function ratings2()
    {
        $ratings = Rating::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.ratings.index', compact('ratings'));
    }
    
    public function approveRating($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->update(['is_approved' => true]);
        
        return redirect()->route('admin.ratings2.index')
            ->with('success', 'تمت الموافقة على التقييم بنجاح.');
    }
    
    public function complaints()
    {
        $complaints = Complaint::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.complaints.index', compact('complaints'));
    }
    
    public function updateComplaint(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);
        
        $validated = $request->validate([
            'status' => 'required|in:pending,in_progress,resolved',
            'admin_notes' => 'nullable|string'
        ]);
        
        $complaint->update($validated);
        
        return redirect()->route('admin.complaints.index')
            ->with('success', 'تم تحديث حالة الشكوى بنجاح.');
    }
     public function distroy($id){
       Rating::where("id","=",$id)->get();
    
          return redirect()->route("admin.ratings2.index");
        


    }
}