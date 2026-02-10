<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>لوحة تحكم - مؤسسة العضيبي</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

<style>
* { box-sizing: border-box; font-family: 'Cairo', sans-serif; }
body { margin:0; padding:0; background:#f5f6fa; color:#333; }

.container { max-width: 1200px; margin: 20px auto; padding: 0 15px; }

/* Header */
.header {
    display:flex;
    justify-content:space-between;
    align-items:center;
    background: linear-gradient(135deg,#4b0082,#6a0dad);
    color:white;
    padding: 15px 25px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(75,0,130,0.2);
}
.header .brand { display:flex; align-items:center; gap:10px; font-size:20px; font-weight:700; }
.header .brand img { width:40px; height:40px; object-fit:contain; border-radius:6px; }

/* Grid للـ Dashboard */
.dashboard-grid {
    display:grid;
    grid-template-columns: repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
    margin-top:20px;
}

/* Cards */
.card {
    background:#fff;
    padding:20px;
    border-radius:12px;
    box-shadow:0 6px 15px rgba(75,0,130,0.1);
    transition: transform 0.3s, box-shadow 0.3s;
}
.card:hover {
    transform: translateY(-5px);
    box-shadow:0 10px 25px rgba(75,0,130,0.2);
}
.card h3 { margin:0 0 10px; color:#4b0082; font-size:18px; font-weight:700; }
.card p { margin:0; font-size:14px; color:#555; }

/* إحصائيات */
.stats { display:flex; justify-content: space-between; align-items:center; font-size:24px; font-weight:700; color:#4b0082; }

/* جدول الملاحظات والشكاوى */
.table-container {
    overflow-x: auto; /* للحفاظ على التمرير الأفقي عند الحاجة */
    overflow-y: auto; /* إضافة التمرير العمودي */
    max-height: 500px; /* ارتفاع ثابت أو مناسب حسب التصميم */
    margin-top: 20px;
}
table { width:100%; border-collapse:collapse; }
th,td { padding:12px 10px; border-bottom:1px solid #eee; text-align:right; }
th { background:#f0f0ff; color:#4b0082; font-weight:600; }
tr:hover { background:#f9f0ff; }
.status-badge { padding:5px 10px; border-radius:8px; font-size:12px; font-weight:600; color:white; }
.status-new { background:#ff4d4d; }
.status-inprogress { background:#ffa500; }
.status-done { background:#4bb543; }

/* Responsive */
@media(max-width:768px){
    .header { flex-direction:column; align-items:flex-start; gap:10px; }
}

</style>
</head>
<body>

<div class="container">

    <!-- Header -->
    <div class="header">
        <div class="brand">
            <img src="https://res.cloudinary.com/dr7xwcpo7/image/upload/v1769682604/favicon_2_xsbp88.png" alt="Logo">
            <span>مؤسسة العضيبي</span>
        </div>
        <div class="user-info">
            مرحباً، <strong>أدمين</strong>
        </div>
    </div>

    <!-- إحصائيات -->
    <div class="dashboard-grid">
        <div class="card">
            <h3>إجمالي الملاحظات</h3>
            <p class="stats">{{ $totalComplaints }}</p>
        </div>
        <div class="card">
            <h3>الملاحظات الجديدة</h3>
            <p class="stats">{{$totalComplaints}}</p>
        </div>
        {{-- <div class="card">
            <h3>إجمالي التقييمات</h3>
            <p class="stats">{{$latestComplaints}}</p>
        </div> --}}
      
    </div>

    <!-- آخر الملاحظات -->
    <div class="card table-container">
        <h3>آخر الملاحظات</h3>
        <table>
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>البريد</th>
                    <th>الهاتف</th>
                    <th>الحالة</th>
                    <th>تاريخ الإرسال</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                {{-- <a href='{{  route("show",$d->id)  }}'> --}}
                      <tr onclick="window.location='{{ route('show', $d->id) }}'">
                    <td  style="color: #333">{{$d->user_name}}</td>
                    <td>{{$d->user_email}}</td>
                    <td>{{$d->phone}}</td>
                    <td><span class="status-badge status-new">جديدة</span></td>
                    <td>{{$d->created_at}}</td>
                </tr>
                {{-- </a> --}}
                @endforeach
              
               
            </tbody>
        </table>
    </div>

    <!-- آخر التقييمات -->
    {{-- <div class="card table-container">
        <h3>آخر التقييمات</h3>
        <table>
            <thead>
                <tr>
                    <th>العميل</th>
                    <th>التقييم</th>
                    <th>التعليق</th>
                    <th>تاريخ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ليلى أحمد</td>
                    <td>5/5</td>
                    <td>خدمة ممتازة!</td>
                    <td>2026-02-09</td>
                </tr>
                <tr>
                    <td>يوسف علي</td>
                    <td>4/5</td>
                    <td>جيد جداً</td>
                    <td>2026-02-08</td>
                </tr>
                <tr>
                    <td>منى سعيد</td>
                    <td>3/5</td>
                    <td>متوسط</td>
                    <td>2026-02-07</td>
                </tr>
            </tbody>
        </table>
    </div> --}}

</div>

</body>
</html>
