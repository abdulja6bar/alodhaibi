<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>ملاحظة جديدة</title>
</head>
<body>
    <h2>ملاحظة جديدة من {{ $data['name'] }}</h2>
    <p>البريد الإلكتروني: {{ $data['email'] }}</p>
    <p>رقم الهاتف: {{ $data['phone'] ?? 'غير محدد' }}</p>
    <p>تفاصيل الملاحظة:</p>
    <p>{{ $data['complaint'] }}</p>
</body>
</html>
