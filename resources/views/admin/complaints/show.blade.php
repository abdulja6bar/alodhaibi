<div class="container" dir="rtl">

    <!-- Header -->
    <div class="header">
        <div class="brand">
            <span>تفاصيل الملاحظة</span>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="back-btn">← الرجوع</a>
    </div>

    <!-- Card -->
    <div class="card details-card">

        <!-- بيانات المستخدم -->
        <div class="info-grid">
            <div>
                <label>الاسم</label>
                <p>{{ $complaint->user_name }}</p>
            </div>
            <div>
                <label>البريد الإلكتروني</label>
                <p>{{ $complaint->user_email }}</p>
            </div>
            <div>
                <label>الهاتف</label>
                <p>{{ $complaint->phone }}</p>
            </div>
            <div>
                <label>الحالة</label>
               <span class="status-badge status-{{ strtolower($complaint->status) }}">
    {{ ucfirst($complaint->status) }}
</span>
            </div>
        </div>

        <!-- رسالة المستخدم -->
        <div class="message-box">
            <h3>نص الملاحظة</h3>
            <p>{{ $complaint->description }}</p>
        </div>

        {{-- ================== المرفقات ================== --}}
        @if($complaint->files->count() > 0)
        <div class="attachments-box">
            <h3>📎 المرفقات</h3>

            <div class="attachments-grid">
                @foreach($complaint->files as $file)
                    @php
                        $ext = strtolower(pathinfo($file->file_name, PATHINFO_EXTENSION));
                        $fileUrl = route('secure.file', $file->file_path);
                    @endphp

                    <div class="file-card">

                        {{-- صورة --}}
                        @if(in_array($ext, ['jpg','jpeg','png','webp']))
                            <img src="{{ $fileUrl }}" class="file-preview"
                                 onclick="openPreview('{{ $fileUrl }}')" />

                        {{-- PDF --}}
                        @elseif($ext == 'pdf')
                            <div class="file-icon pdf">PDF</div>

                        {{-- ملفات أخرى --}}
                        @else
                            <div class="file-icon file">{{ strtoupper($ext) }}</div>
                        @endif

                        <div class="file-name">
                            {{ $file->file_name }}
                        </div>

                        <div class="file-actions">
                            <a href="{{ $fileUrl }}" target="_blank" class="open-btn">فتح</a>
                            <a href="{{ $fileUrl }}" download class="download-btn">تحميل</a>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- رد المدير -->
        <div class="reply-box">
            <h3>رد الإدارة (سيتم إرساله بالإيميل)</h3>

            @if(session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif
<form method="POST" action="{{ route('admin.complaints.reply',$complaint->id) }}">
    @csrf
    <textarea name="reply_message" id="reply_message" placeholder="اكتب الرد هنا..." required></textarea>
    <button type="submit" class="send-btn">إرسال الرد عبر البريد الإلكتروني</button>
</form>
        </div>

    </div>

</div>

<!-- نافذة المعاينة -->
<div id="previewModal" class="preview-modal">
    <span class="close-btn" onclick="closePreview()">×</span>
    <img id="previewImage" src="">
</div>

<style>
.container{padding:30px;font-family:'Tajawal',sans-serif}
.header{display:flex;justify-content:space-between;align-items:center;margin-bottom:20px}
.back-btn{text-decoration:none;color:#6a1b9a;font-weight:bold}

.card{
background:linear-gradient(145deg,#f7f3ff,#fdfcff);
border-radius:20px;
padding:30px;
box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.info-grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
gap:20px;
margin-bottom:25px;
}

.info-grid label{font-size:13px;color:#777}
.info-grid p{font-size:16px;font-weight:bold;color:#333}

.message-box{
background:#faf7ff;
border-radius:15px;
padding:20px;
margin-bottom:25px;
}

/* ================= المرفقات ================= */
.attachments-box{
background:#fffaf3;
border-radius:15px;
padding:20px;
margin-bottom:25px;
}

.attachments-grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(140px,1fr));
gap:15px;
}

.file-card{
background:#fff;
border-radius:12px;
padding:10px;
text-align:center;
box-shadow:0 4px 10px rgba(0,0,0,.05);
transition:.3s;
}
.file-card:hover{transform:translateY(-5px)}

.file-preview{
width:100%;
height:120px;
object-fit:cover;
border-radius:8px;
cursor:pointer;
}

.file-icon{
height:120px;
display:flex;
align-items:center;
justify-content:center;
font-weight:bold;
border-radius:8px;
font-size:18px;
color:#fff;
}

.file-icon.pdf{background:#e53935;}
.file-icon.file{background:#607d8b;}

.file-name{
font-size:13px;
margin-top:6px;
white-space:nowrap;
overflow:hidden;
text-overflow:ellipsis;
}

.file-actions{
display:flex;
justify-content:space-between;
margin-top:8px;
gap:5px;
}

.open-btn,.download-btn{
text-decoration:none;
font-size:12px;
padding:6px 10px;
border-radius:6px;
color:white;
flex:1;
text-align:center;
}

.open-btn{background:#4caf50;}
.download-btn{background:#2196f3;}

/* ================= الرد ================= */
.reply-box{
background:#f4f9ff;
border-radius:15px;
padding:20px;
}

.reply-box textarea{
width:100%;
min-height:140px;
border-radius:12px;
border:1px solid #ddd;
padding:15px;
font-size:15px;
resize:none;
outline:none;
}

.send-btn{
margin-top:15px;
background:linear-gradient(90deg,#7b2cbf,#4ea8de);
color:white;
border:none;
padding:12px 30px;
border-radius:30px;
cursor:pointer;
font-size:15px;
transition:.3s;
}
.send-btn:hover{transform:scale(1.05)}

.status-badge{
padding:6px 14px;
border-radius:20px;
font-size:13px;
color:#fff;
}
.status-badge { padding:5px 10px; border-radius:8px; font-size:12px; font-weight:600; color:white; }

/* الحالات الجديدة */
.status-pending { background:#ff4d4d; }       /* قيد الانتظار */
.status-in_progress { background:#ffa500; }   /* جاري العمل */
.status-resolved { background:#4bb543; }      /* تم الحل */

.alert-success{
background:#e8fff0;
color:#1b7f4a;
padding:12px;
border-radius:10px;
margin-bottom:10px;
}

/* ================= Modal Preview ================= */
.preview-modal{
display:none;
position:fixed;
top:0;left:0;
width:100%;
height:100%;
background:rgba(0,0,0,.8);
justify-content:center;
align-items:center;
z-index:9999;
}

.preview-modal img{
max-width:90%;
max-height:90%;
border-radius:10px;
box-shadow:0 10px 40px rgba(0,0,0,.5);
}

.close-btn{
position:absolute;
top:20px;
right:30px;
font-size:35px;
color:#fff;
cursor:pointer;
font-weight:bold;
}
</style>

<script>
function openPreview(src){
    document.getElementById('previewImage').src = src;
    document.getElementById('previewModal').style.display = 'flex';
}

function closePreview(){
    document.getElementById('previewModal').style.display = 'none';
}
</script>
