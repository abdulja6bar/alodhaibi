<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول | مؤسسة العضيبي</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- خط Cairo -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        *{
            box-sizing:border-box;
            font-family: 'Cairo', sans-serif;
        }

        body{
            margin:0;
            padding:0;
            min-height:100vh;
            background: linear-gradient(135deg, #f5f6fa, #ece9f6);
            display:flex;
            align-items:center;
            justify-content:center;
        }

        /* ====== Card الرئيسي ====== */
        .login-card{
            width:100%;
            max-width:420px;
            background:#fff;
            border-radius:18px;
            box-shadow:0 15px 40px rgba(75,0,130,0.15);
            overflow:hidden;
            animation: fadeIn 0.8s ease;
        }

        /* ====== Header ====== */
        .login-header{
            background: linear-gradient(135deg, #4b0082, #6a0dad);
            padding:20px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            color:#fff;
        }

        .login-header .brand{
            display:flex;
            align-items:center;
            gap:10px;
        }

        .login-header .brand span{
            font-size:18px;
            font-weight:700;
        }

        .login-header img{
            width:45px;
            height:45px;
            object-fit:contain;
        }

        /* ====== Body ====== */
        .login-body{
            padding:30px 25px 35px;
            text-align:center;
        }

        .login-body h2{
            margin:0 0 8px;
            color:#4b0082;
            font-size:22px;
        }

        .login-body p{
            margin:0 0 25px;
            color:#777;
            font-size:14px;
        }

        /* ====== Inputs ====== */
        .form-group{
            margin-bottom:15px;
            text-align:right;
        }

        .form-group label{
            display:block;
            margin-bottom:6px;
            font-weight:600;
            color:#333;
            font-size:14px;
        }

        .form-group input{
            width:100%;
            padding:12px 14px;
            border-radius:10px;
            border:1px solid #ddd;
            font-size:15px;
            transition:0.3s;
        }

        .form-group input:focus{
            outline:none;
            border-color:#4b0082;
            box-shadow:0 0 0 3px rgba(75,0,130,0.1);
        }

        /* ====== زر الدخول ====== */
        .login-btn{
            width:100%;
            padding:14px;
            margin-top:10px;
            border:none;
            border-radius:12px;
            background: linear-gradient(135deg, #4b0082, #6a0dad);
            color:#fff;
            font-size:16px;
            font-weight:700;
            cursor:pointer;
            transition:0.3s;
            box-shadow:0 6px 15px rgba(75,0,130,0.3);
        }

        .login-btn:hover{
            transform:translateY(-2px);
            box-shadow:0 10px 25px rgba(75,0,130,0.4);
        }

        /* ====== روابط ====== */
        .links{
            margin-top:18px;
            display:flex;
            justify-content:space-between;
            font-size:13px;
        }

        .links a{
            text-decoration:none;
            color:#4b0082;
            font-weight:600;
            transition:0.3s;
        }

        .links a:hover{
            color:#6a0dad;
            text-decoration:underline;
        }

        /* ====== أنيميشن ====== */
        @keyframes fadeIn{
            from{
                opacity:0;
                transform:translateY(20px);
            }
            to{
                opacity:1;
                transform:translateY(0);
            }
        }

        /* ====== Responsive ====== */
        @media(max-width:480px){
            .login-card{
                margin:15px;
            }
        }
        .admin-note{
    background: rgba(75,0,130,0.08);
    border:1px solid rgba(75,0,130,0.2);
    color:#4b0082;
    padding:10px 14px;
    border-radius:10px;
    font-size:13px;
    font-weight:600;
    margin-bottom:15px;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    box-shadow:0 4px 10px rgba(75,0,130,0.08);
    animation: fadeIn 1s ease;
}

.admin-note .icon{
    font-size:16px;
}

    </style>
</head>
<body>

    <div class="login-card">

        <!-- Header -->
        <div class="login-header">
            <div class="brand">
                <span>مؤسسة العضيبي</span>
            </div>

            <img src="https://res.cloudinary.com/dr7xwcpo7/image/upload/v1769682604/favicon_2_xsbp88.png" alt="شعار مؤسسة العضيبي">
        </div>

        <!-- Body -->
        <div class="login-body">
            <div class="admin-note">
    <span class="icon">⚠️</span>
    تسجيل الدخول متاح لإدارة الموقع و ادارة المؤسسة فقط
</div>
            <h2>تسجيل الدخول</h2>
            <p>مرحباً بك مرة أخرى 👋</p>

            <form  method="POST" action="{{ route('login.check') }}">
@csrf
                <div class="form-group">
                    <label>البريد الإلكتروني</label>
                    <input type="email" placeholder="example@email.com" name="email" required id="email">
                </div>

                <div class="form-group">
                    <label>كلمة المرور</label>
                    <input type="password" placeholder="********" name="password"  id="password" required>
                </div>

                <button type="submit" class="login-btn">
                    تسجيل الدخول
                </button>

              

            </form>
        </div>

    </div>

</body>
<script>
document.getElementById('loginForm').addEventListener('submit', function(e){
    e.preventDefault();
    const email = document.getElementById('email').value;
    const token = '{{ csrf_token() }}';
    const msgDiv = document.getElementById('loginMessage');
    msgDiv.textContent = '';

    fetch('{{ route("login.check") }}', {
        method:'POST',
        headers:{
            'Content-Type':'application/json',
            'X-CSRF-TOKEN': token,
            'Accept':'application/json'
        },
        body: JSON.stringify({email: email})
    })
    .then(res => res.json())
    .then(data => {
        if(data.success){
            msgDiv.style.color = 'green';
            msgDiv.textContent = data.message;
            setTimeout(()=>{
                window.location.href = data.redirect;
            },1000);
        }else{
            msgDiv.style.color = 'red';
            msgDiv.textContent = data.message;
        }
    })
    .catch(err=>{
        msgDiv.style.color = 'red';
        msgDiv.textContent = 'حدث خطأ، حاول مرة أخرى';
    });
});
</script>
</html>
