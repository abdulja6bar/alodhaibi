{{-- <!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تقديم شكوى</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'Cairo', sans-serif;
            background: #f5f6fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 700px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        h2 { text-align: center; color: #4b0082; margin-bottom: 25px; }
        form { display: flex; flex-direction: column; gap: 15px; }
        label { font-weight: 600; margin-bottom: 5px; }
        input[type="text"], input[type="email"], input[type="tel"], textarea {
            width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; font-size: 16px; transition: border 0.3s;
        }
        input:focus, textarea:focus { border-color: #4b0082; outline: none; }
        textarea { resize: vertical; min-height: 120px; }

        .file-upload {
            border: 2px dashed #ccc;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: border 0.3s, background 0.3s;
            color: #555;
        }
        .file-upload:hover { border-color: #4b0082; background: #f0f0ff; }
        .file-list { margin-top: 10px; }
        .file-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f1f1f1;
            padding: 8px 12px;
            border-radius: 6px;
            margin-bottom: 6px;
        }
        .file-item button { background: #ff4d4d; border: none; color: white; padding: 4px 8px; border-radius: 4px; cursor: pointer; font-size: 14px; }
        .file-item button:hover { background: #e60000; }

        button[type="submit"] {
            padding: 14px;
            background: #4b0082;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button[type="submit"]:hover { background: #330066; }

        /* Loader and Checkmark */
        .loader {
            border: 6px solid #f3f3f3;
            border-top: 6px solid #4b0082;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite;
            margin: 0 auto 10px auto;
        }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }

        .checkmark { width: 80px; height: 80px; margin: 0 auto; position: relative; }
        .checkmark-circle { width: 80px; height: 80px; border-radius: 50%; background: #4b0082; position: absolute; top: 0; left: 0; opacity: 0.2; }
        .checkmark-stem {
            position: absolute; width: 6px; height: 40px; background-color: #4bb543;
            left: 36px; top: 20px; transform: rotate(45deg); transform-origin: left top; animation: stem 0.5s forwards; opacity: 0;
        }
        .checkmark-kick {
            position: absolute; width: 6px; height: 20px; background-color: #4bb543;
            left: 36px; top: 40px; transform: rotate(-45deg); transform-origin: left top; animation: kick 0.5s 0.5s forwards; opacity: 0;
        }
        @keyframes stem { 0% { height:0; opacity:0; } 100% { height:40px; opacity:1; } }
        @keyframes kick { 0% { height:0; opacity:0; } 100% { height:20px; opacity:1; } }

        /* Responsive */
        @media (max-width: 600px) { .container { margin: 20px; padding: 20px; } }

        /* Header */
        .header-bar { display: flex; justify-content: space-between; align-items: center; height: 100%; direction: rtl; }
        .left-group { display: flex; align-items: center; gap: 12px; }
        .brand-name { font-size: 20px; font-weight: 700; color: #4b0082; }
        .brand-logo img { width: 50px; height: 50px; object-fit: contain; }
        .login-icon-btn {
            width: 25px; height: 25px;
            background: linear-gradient(135deg, #4b0082, #6a0dad);
            border-radius: 80%; display: flex; align-items: center; justify-content: center;
            text-decoration: none; box-shadow: 0 4px 10px rgba(75,0,130,0.3); transition: all 0.3s ease;
        }
        .login-icon-btn:hover { transform: translateY(-2px) scale(1.05); box-shadow: 0 6px 15px rgba(75,0,130,0.4); }
    </style>
</head>
<body>
 <div class="container card mt-4" style="height:70px;">
    <div class="card-body header-bar">
        <div class="left-group">
            <div class="brand-name">مؤسسة العضيبي</div>
            <a href="/login" class="login-icon-btn" title="تسجيل الدخول">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 24 24">
                    <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z"/>
                </svg>
            </a>
        </div>
        <div class="brand-logo">
            <img src="https://res.cloudinary.com/dr7xwcpo7/image/upload/v1769682604/favicon_2_xsbp88.png" alt="شعار مؤسسة العضيبي">
        </div>
    </div>
</div>

<div class="container">
    <h2>تقديم ملاحظة</h2>
    <form id="complaintForm" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">الاسم <span style="color: #e60000">*</span></label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">البريد الإلكتروني <span style="color: #e60000">*</span></label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="phone">الهاتف <span style="color: #e60000">*</span></label>
            <input type="tel" id="phone" name="phone" required>
        </div>
        <div>
            <label for="complaint">نص الملاحظة <span style="color: #e60000">*</span></label>
            <textarea id="complaint" name="complaint" required></textarea>
        </div>

        <div>
            <label>إرفاق ملفات وصور</label>
            <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <div class="file-upload" id="fileUpload">📁 إضافة ملفات</div>
                <div class="file-upload" id="cameraBtn" style="border-color:#4bb543; color:#4bb543;">📷 فتح الكاميرا</div>
            </div>

            <!-- عرض الكاميرا -->
            <div id="cameraContainer" style="display:none; margin-top:10px; text-align:center;">
                <video id="video" autoplay playsinline style="width:100%; max-width:400px; border-radius:10px;"></video>
                <br>
                <button type="button" id="captureBtn" style="margin-top:10px; padding:10px 20px; background:#4bb543; color:white; border:none; border-radius:8px; cursor:pointer;">التقاط الصورة</button>
            </div>

            <input type="file" id="fileInput" multiple style="display:none;">
            <div class="file-list" id="fileList"></div>
        </div>

        <button type="submit">إرسال الملاحظة</button>
    </form>

    <!-- Status Container -->
    <div id="statusContainer" style="display:none; text-align:center; margin-top:20px;">
        <div id="sendingStatus" style="display:none;">
            <div class="loader"></div>
            <p>جارٍ إرسال الملاحظة...</p>
        </div>
        <div id="successStatus" style="display:none;">
            <div class="checkmark">
                <div class="checkmark-circle"></div>
                <div class="checkmark-stem"></div>
                <div class="checkmark-kick"></div>
            </div>
            <p>تم الإرسال بنجاح!</p>
        </div>
    </div>
</div>

<script>
let filesArray = [];

const fileUpload = document.getElementById('fileUpload');
const fileInput = document.getElementById('fileInput');
const fileList = document.getElementById('fileList');

fileUpload.addEventListener('click', () => fileInput.click());
fileInput.addEventListener('change', e => {
    filesArray = filesArray.concat(Array.from(e.target.files));
    renderFiles();
    fileInput.value = '';
});

function renderFiles() {
    fileList.innerHTML = '';
    filesArray.forEach((file,index) => {
        const div = document.createElement('div');
        div.className = 'file-item';
        div.innerHTML = `<span>${file.name}</span><button type="button" onclick="removeFile(${index})">حذف</button>`;
        fileList.appendChild(div);
    });
}

function removeFile(index) {
    filesArray.splice(index,1);
    renderFiles();
}
navigator.permissions.query({ name: 'camera' })
  .then(permissionStatus => {
      console.log('Camera permission status:', permissionStatus.state);
      permissionStatus.onchange = () => {
          console.log('Camera permission changed to', permissionStatus.state);
      };
  });

// الهاتف: 05 ثابت + 8 أرقام
const phoneInput = document.getElementById('phone');
phoneInput.value='05';
phoneInput.addEventListener('input', ()=>{
    let val = phoneInput.value.replace(/\D/g,'');
    if(!val.startsWith('05')) val='05'+val.slice(2);
    if(val.length>10) val=val.slice(0,10);
    phoneInput.value=val;
});
phoneInput.addEventListener('focus', ()=>{ if(phoneInput.value==='') phoneInput.value='05'; });

// إرسال الفورم
document.getElementById('complaintForm').addEventListener('submit', (e)=>{
    e.preventDefault();
    const form = document.getElementById('complaintForm');
    const statusContainer = document.getElementById('statusContainer');
    const sendingStatus = document.getElementById('sendingStatus');
    const successStatus = document.getElementById('successStatus');

    form.style.display='none';
    statusContainer.style.display='block';
    sendingStatus.style.display='block';
    successStatus.style.display='none';

    const formData = new FormData();
    formData.append('_token', document.querySelector('input[name="_token"]').value);
    formData.append('user_name', document.getElementById('name').value);
    formData.append('user_email', document.getElementById('email').value);
    formData.append('phone', document.getElementById('phone').value);
    formData.append('description', document.getElementById('complaint').value);
    filesArray.forEach(f => formData.append('files[]', f));

    const xhr = new XMLHttpRequest();
    xhr.open('POST','{{ route("complaints.store") }}',true);
    xhr.onload = ()=>{
        if(xhr.status>=200 && xhr.status<300){
            const data = JSON.parse(xhr.responseText);
            if(data.success){
                sendingStatus.style.display='none';
                successStatus.style.display='block';
                setTimeout(()=>{
                    form.style.display='flex';
                    statusContainer.style.display='none';
                    form.reset();
                    filesArray=[];
                    renderFiles();
                    phoneInput.value='05';
                },2500);
            }else{
                alert('حدث خطأ أثناء الإرسال.');
                form.style.display='flex';
                statusContainer.style.display='none';
            }
        }else{
            alert('حدث خطأ أثناء الإرسال.');
            form.style.display='flex';
            statusContainer.style.display='none';
        }
    };
    xhr.onerror = ()=>{
        alert('حدث خطأ أثناء الإرسال.');
        form.style.display='flex';
        statusContainer.style.display='none';
    };
    xhr.send(formData);
});

// ==== الكاميرا ====
const cameraBtn = document.getElementById('cameraBtn');
const cameraContainer = document.getElementById('cameraContainer');
const video = document.getElementById('video');
const captureBtn = document.getElementById('captureBtn');

cameraBtn.addEventListener('click', async ()=>{
    cameraContainer.style.display='block';
    try{
        const stream = await navigator.mediaDevices.getUserMedia({ video:{ facingMode:'environment' } });
        video.srcObject = stream;
    }catch(err){ alert("لم يتمكن من الوصول إلى الكاميرا: "+err); }
});

captureBtn.addEventListener('click', ()=>{
    const canvas = document.createElement('canvas');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video,0,0,canvas.width,canvas.height);
    canvas.toBlob(blob=>{
        const file = new File([blob], `photo_${Date.now()}.png`, { type:'image/png' });
        filesArray.push(file);
        renderFiles();
    }, 'image/png');
});
</script>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>تقديم شكوى</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
<style>
* { box-sizing: border-box; }
body { font-family: 'Cairo', sans-serif; background: #f5f6fa; margin:0; padding:0; }
.container { max-width:700px; margin:50px auto; background:#fff; padding:30px; border-radius:12px; box-shadow:0 8px 25px rgba(0,0,0,0.1); }
h2 { text-align:center; color:#4b0082; margin-bottom:25px; }
form { display:flex; flex-direction:column; gap:15px; }
label { font-weight:600; margin-bottom:5px; }
input, textarea { width:100%; padding:12px; border:1px solid #ccc; border-radius:8px; font-size:16px; transition:border 0.3s; }
input:focus, textarea:focus { border-color:#4b0082; outline:none; }
textarea { resize:vertical; min-height:120px; }

.file-upload { border:2px dashed #ccc; border-radius:8px; padding:20px; text-align:center; cursor:pointer; transition:border 0.3s, background 0.3s; color:#555; }
.file-upload:hover { border-color:#4b0082; background:#f0f0ff; }
.file-list { margin-top:10px; }
.file-item { display:flex; justify-content:space-between; align-items:center; background:#f1f1f1; padding:8px 12px; border-radius:6px; margin-bottom:6px; }
.file-item button { background:#ff4d4d; border:none; color:white; padding:4px 8px; border-radius:4px; cursor:pointer; font-size:14px; }
.file-item button:hover { background:#e60000; }

button[type="submit"] { padding:14px; background:#4b0082; color:#fff; border:none; border-radius:8px; font-size:18px; cursor:pointer; transition:background 0.3s; }
button[type="submit"]:hover { background:#330066; }

/* الكاميرا Modal */
#cameraModal {
    display:none; position:fixed; top:0; left:0; width:100%; height:100%;
    background:rgba(0,0,0,0.8); justify-content:center; align-items:center; z-index:9999; flex-direction:column;
}
#cameraModal video { width:90%; max-width:400px; border-radius:12px; }
#cameraModal canvas { display:none; }
.camera-controls { display:flex; gap:15px; margin-top:10px; }
.camera-controls button { padding:10px 20px; font-size:16px; border:none; border-radius:8px; cursor:pointer; background:#4b0082; color:#fff; transition:background 0.3s; }
.camera-controls button:hover { background:#330066; }

/* Header */
.header-bar { display:flex; justify-content:space-between; align-items:center; height:100%; direction:rtl; }
.left-group { display:flex; align-items:center; gap:12px; }
.brand-name { font-size:20px; font-weight:700; color:#4b0082; }
.brand-logo img { width:50px; height:50px; object-fit:contain; }
.login-icon-btn { width:25px; height:25px; background:linear-gradient(135deg, #4b0082, #6a0dad); border-radius:80%; display:flex; align-items:center; justify-content:center; text-decoration:none; box-shadow:0 4px 10px rgba(75,0,130,0.3); transition:all 0.3s ease; }
.login-icon-btn:hover { transform:translateY(-2px) scale(1.05); box-shadow:0 6px 15px rgba(75,0,130,0.4); }

/* Loader & Checkmark */
.loader { border:6px solid #f3f3f3; border-top:6px solid #4b0082; border-radius:50%; width:60px; height:60px; animation:spin 1s linear infinite; margin:0 auto 10px auto; }
@keyframes spin {0%{transform:rotate(0deg);}100%{transform:rotate(360deg);}}
.checkmark { width:80px; height:80px; margin:0 auto; position:relative; }
.checkmark-circle { width:80px; height:80px; border-radius:50%; background:#4b0082; position:absolute; top:0; left:0; opacity:0.2; }
.checkmark-stem { position:absolute; width:6px; height:40px; background-color:#4bb543; left:36px; top:20px; transform:rotate(45deg); transform-origin:left top; animation:stem 0.5s forwards; opacity:0; }
.checkmark-kick { position:absolute; width:6px; height:20px; background-color:#4bb543; left:36px; top:40px; transform:rotate(-45deg); transform-origin:left top; animation:kick 0.5s 0.5s forwards; opacity:0; }
@keyframes stem {0%{height:0;opacity:0;}100%{height:40px;opacity:1;}}
@keyframes kick {0%{height:0;opacity:0;}100%{height:20px;opacity:1;}}
</style>
</head>
<body>

<div class="container card mt-4" style="height:70px;">
    <div class="card-body header-bar">
        <div class="left-group">
            <div class="brand-name">مؤسسة العضيبي</div>
            <a href="/login" class="login-icon-btn" title="تسجيل الدخول">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 24 24">
                    <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z"/>
                </svg>
            </a>
        </div>
        <div class="brand-logo">
            <img src="https://res.cloudinary.com/dr7xwcpo7/image/upload/v1769682604/favicon_2_xsbp88.png" alt="شعار مؤسسة العضيبي">
        </div>
    </div>
</div>

<div class="container">
    <h2>تقديم ملاحظة</h2>
    <form id="complaintForm" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">الاسم <span style="color: #e60000">*</span></label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">البريد الإلكتروني <span style="color: #e60000">*</span></label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="phone">الهاتف <span style="color: #e60000">*</span></label>
            <input type="tel" id="phone" name="phone" required>
        </div>
        <div>
            <label for="complaint">نص الملاحظة <span style="color: #e60000">*</span></label>
            <textarea id="complaint" name="complaint" required></textarea>
        </div>

        <div>
            <label>إرفاق ملفات وصور</label>
            <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <div class="file-upload" id="fileUpload">📁 إضافة ملفات</div>
                <div class="file-upload" id="cameraBtn" style="border-color:#4bb543; color:#4bb543;">📷 فتح الكاميرا</div>
            </div>
            <input type="file" id="fileInput" multiple style="display:none;">
            <div class="file-list" id="fileList"></div>
        </div>

        <button type="submit">إرسال الملاحظة</button>
    </form>

    <!-- Status Container -->
    <div id="statusContainer" style="display:none; text-align:center; margin-top:20px;">
        <div id="sendingStatus" style="display:none;">
            <div class="loader"></div>
            <p>جارٍ إرسال الملاحظة...</p>
        </div>
        <div id="successStatus" style="display:none;">
            <div class="checkmark">
                <div class="checkmark-circle"></div>
                <div class="checkmark-stem"></div>
                <div class="checkmark-kick"></div>
            </div>
            <p>تم الإرسال بنجاح!</p>
        </div>
    </div>
</div>

<!-- كاميرا Modal -->
<div id="cameraModal">
    <video id="cameraVideo" autoplay playsinline></video>
    <canvas id="cameraCanvas"></canvas>
    <div class="camera-controls">
        <button id="captureBtn">📸 التقاط</button>
        <button id="switchBtn">🔄 تبديل الكاميرا</button>
        <button id="closeCameraBtn">❌ إغلاق</button>
    </div>
</div>

<script>
// ملفات

let filesArray = [];
const fileUpload = document.getElementById('fileUpload');
const fileInput = document.getElementById('fileInput');
const fileList = document.getElementById('fileList');

fileUpload.addEventListener('click', ()=>fileInput.click());
fileInput.addEventListener('change', e=>{
    filesArray = filesArray.concat(Array.from(e.target.files));
    renderFiles();
    fileInput.value='';
});

function renderFiles(){
    fileList.innerHTML='';
    filesArray.forEach((file,index)=>{
        const div=document.createElement('div');
        div.className='file-item';
        div.innerHTML=`<span>${file.name}</span><button type="button" onclick="removeFile(${index})">حذف</button>`;
        fileList.appendChild(div);
    });
}
function removeFile(index){
    filesArray.splice(index,1);
    renderFiles();
}

// الفورم
const phoneInput = document.getElementById('phone');
phoneInput.value='05';
phoneInput.addEventListener('input', ()=>{ 
    let val = phoneInput.value.replace(/\D/g,''); 
    if(!val.startsWith('05')) val='05'+val.slice(2); 
    if(val.length>10) val=val.slice(0,10); 
    phoneInput.value=val; 
});
phoneInput.addEventListener('focus', ()=>{ if(phoneInput.value==='') phoneInput.value='05'; });

document.getElementById('complaintForm').addEventListener('submit',(e)=>{
    e.preventDefault();
    const form=document.getElementById('complaintForm');
    const statusContainer=document.getElementById('statusContainer');
    const sendingStatus=document.getElementById('sendingStatus');
    const successStatus=document.getElementById('successStatus');
    form.style.display='none';
    statusContainer.style.display='block';
    sendingStatus.style.display='block';
    successStatus.style.display='none';

    const formData = new FormData();
    formData.append('_token', document.querySelector('input[name="_token"]').value);
    formData.append('user_name', document.getElementById('name').value);
    formData.append('user_email', document.getElementById('email').value);
    formData.append('phone', document.getElementById('phone').value);
    formData.append('description', document.getElementById('complaint').value);
    filesArray.forEach(f=>formData.append('files[]', f));

    const xhr=new XMLHttpRequest();
    xhr.open('POST','{{ route("complaints.store") }}',true);
    xhr.onload=()=>{
        if(xhr.status>=200 && xhr.status<300){
            const data = JSON.parse(xhr.responseText);
            if(data.success){
                sendingStatus.style.display='none';
                successStatus.style.display='block';
                setTimeout(()=>{
                    form.style.display='flex';
                    statusContainer.style.display='none';
                    form.reset();
                    filesArray=[];
                    renderFiles();
                    phoneInput.value='05';
                },2500);
            }else{ alert('حدث خطأ أثناء الإرسال.'); form.style.display='flex'; statusContainer.style.display='none'; }
        }else{ alert('حدث خطأ أثناء الإرسال.'); form.style.display='flex'; statusContainer.style.display='none'; }
    };
    xhr.onerror=()=>{ alert('حدث خطأ أثناء الإرسال.'); form.style.display='flex'; statusContainer.style.display='none'; };
    xhr.send(formData);
});

// ==== الكاميرا Modal ====
const cameraBtn = document.getElementById('cameraBtn');
const cameraModal = document.getElementById('cameraModal');
const video = document.getElementById('cameraVideo');
const canvas = document.getElementById('cameraCanvas');
const captureBtn = document.getElementById('captureBtn');
const switchBtn = document.getElementById('switchBtn');
const closeCameraBtn = document.getElementById('closeCameraBtn');

let stream=null;
let useFront=false;

async function startCamera(){
    if(stream) stream.getTracks().forEach(track=>track.stop());
    try{
        stream = await navigator.mediaDevices.getUserMedia({ video:{ facingMode: useFront?'user':'environment' }, audio:false });
        video.srcObject = stream;
    }catch(err){
        alert('لم نتمكن من الوصول إلى الكاميرا. تأكد من السماح للأذونات وتشغيل الصفحة عبر HTTPS.');
        cameraModal.style.display='none';
    }
}

cameraBtn.addEventListener('click', ()=>{
    cameraModal.style.display='flex';
    startCamera();
});

switchBtn.addEventListener('click', ()=>{
    useFront = !useFront;
    startCamera();
});

closeCameraBtn.addEventListener('click', ()=>{
    cameraModal.style.display='none';
    if(stream) stream.getTracks().forEach(track=>track.stop());
});

captureBtn.addEventListener('click', ()=>{
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video,0,0,canvas.width,canvas.height);
    canvas.toBlob(blob=>{
        const file = new File([blob], `photo_${Date.now()}.png`, { type:'image/png' });
        filesArray.push(file);
        renderFiles();
    });
});
</script>

</body>
</html>
