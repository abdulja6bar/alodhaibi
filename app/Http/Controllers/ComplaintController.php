<?php

namespace App\Http\Controllers;

use App\Mail\ComplaintMail;
use App\Models\Complaint;
use App\Models\ComplaintFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ComplaintController extends Controller
{
    public function create()
    {
        return view('complaints.create');
    }
public function store(Request $request)
{
    try {
        // 1️⃣ Validation
        $validator = Validator::make($request->all(), [
            'user_name'   => 'required|string|max:100',
            'user_email'  => 'required|email|max:100',
            'description' => 'required|string',
            'files.*'     => 'nullable|file|max:10240', // 10MB لكل ملف
            'phone'       => 'nullable|string|max:11'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'type'    => 'validation',
                'errors'  => $validator->errors()
            ], 422);
        }

        // 2️⃣ حفظ الشكوى
        $complaint = Complaint::create([
            'user_name'   => $request->user_name,
            'user_email'  => $request->user_email,
            'description' => $request->description,
            'status'      => 'pending',
            'phone'       => $request->phone,
        ]);

        // 3️⃣ رفع الملفات
        $uploadedFiles = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // تنظيف اسم الملف
                $originalName = $file->getClientOriginalName();
                $safeName = preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $originalName);
                $fileName = uniqid() . '_' . $safeName;

                // تخزين الملف
                $filePath = $file->storeAs('complaint_files', $fileName, 'public');

                ComplaintFile::create([
                    'complaint_id' => $complaint->id,
                    'file_name'    => $originalName,
                    'file_path'    => $filePath
                ]);

                $uploadedFiles[] = [
                    'path' => storage_path('app/public/' . $filePath),
                    'name' => $originalName,
                    'mime' => $file->getClientMimeType(),
                ];
            }
        }

        // 4️⃣ إرسال البريد
        $data = [
            'name'      => $request->user_name,
            'email'     => $request->user_email,
            'complaint' => $request->description,
            'phone'     => $request->phone,
        ];

        Mail::to('abduljab6ar@gmail.com')->send(new ComplaintMail($data, $uploadedFiles));

        // 5️⃣ Response JSON
        return response()->json([
            'success' => true,
            'message' => 'تم إرسال الشكوى بنجاح'
        ]);

    } catch (\Exception $e) {
        Log::error('Complaint Error', [
            'message' => $e->getMessage(),
            'file'    => $e->getFile(),
            'line'    => $e->getLine(),
            'trace'   => $e->getTraceAsString()
        ]);

        return response()->json([
            'success' => false,
            'type'    => 'server',
            'message' => $e->getMessage()
        ], 500);
    }
}

    
   public function reply(Request $request, $id)
    {
        $request->validate([
            'reply_message' => 'required|string|min:5'
        ]);

        $complaint = Complaint::findOrFail($id);

        // إرسال الإيميل
        Mail::raw($request->reply_message, function ($message) use ($complaint) {
            $message->to($complaint->email)
                    ->subject('رد على ملاحظتك - مؤسسة العضيبي');
        });

        // (اختياري) حفظ الرد في DB
        $complaint->admin_reply = $request->reply_message;
        $complaint->status = 'done';
        $complaint->save();

        return redirect()->back()->with('success','تم إرسال الرد بنجاح عبر البريد الإلكتروني');
    }
    public function show($id){
       $complaint = Complaint::with('files')->findOrFail($id);

    return view('admin.complaints.show', compact('complaint'));
    }

}