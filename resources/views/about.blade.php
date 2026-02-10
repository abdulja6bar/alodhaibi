@extends('layouts.app')

@section('title', 'عن الشركة')
@section("breadcrumb")
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2" style="direction: ltr; margin-top: 10px;margin-left: 40px">
         
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route("home")}}">Home </a></li>
              <li class="breadcrumb-item"><a href="{{route("home")}}">Abute </a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    
    </div>
@endsection

@section('content')
<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-6">
              <div class="logo">
                    <!-- <div class="logo-icon"> -->
                        {{-- <img src="https://res.cloudinary.com/dr7xwcpo7/image/upload/v1769682604/favicon_2_xsbp88.png" width="40 " height="50"  /> --}}
                        <!-- <i class="fas fa-crown"></i> -->
                    <!-- </div> -->
                    <h1>العضـ<span>ـيبي</span></h1>
                </div>
                
            {{-- <h1 class="gradient-text display-4 fw-bold mb-4">شركة العضيبي</h1> --}}
            <p class="lead fs-5 mb-4">
                شركة العضيبي هي شركة رائدة في مجال الخدمات، تأسست بهدف تقديم أفضل الحلول لعملائنا الكرام.
                نؤمن بأن رضا العملاء هو أولويتنا الأساسية، ونعمل باستمرار على تحسين خدماتنا بناءً على ملاحظاتكم.
            </p>
            
            <div class="row mt-5">
                <div class="col-md-6 mb-3">
                    <div class="d-flex align-items-center">
                        <div class="bg-light p-3 rounded-circle me-3">
                            <i class="fas fa-bullseye fa-2x gradient-text"></i>
                        </div>
                        <div>
                            <h5>رؤيتنا</h5>
                            <p class="text-muted mb-0">الريادة في تقديم خدمات متميزة</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="d-flex align-items-center">
                        <div class="bg-light p-3 rounded-circle me-3">
                            <i class="fas fa-handshake fa-2x gradient-text"></i>
                        </div>
                        <div>
                            <h5>رسالتنا</h5>
                            <p class="text-muted mb-0">رضا العميل هو غايتنا</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-body p-4">
                    <h4 class="mb-4">معلومات الشركة</h4>
                    <div class="row mb-3">
                        <div class="col-1">
                            <i class="fas fa-map-marker-alt gradient-text"></i>
                        </div>
                        <div class="col-11">
                            <strong>العنوان:</strong>
                            <p class="text-muted mb-0">المملكة العربية السعودية، حائل</p>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-1">
                            <i class="fas fa-phone gradient-text"></i>
                        </div>
                        <div class="col-11">
                            <strong>الهاتف:</strong>
                            <p class="text-muted mb-0">0559616449</p>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-1">
                            <i class="fas fa-envelope gradient-text"></i>
                        </div>
                        <div class="col-11">
                            <strong>البريد الإلكتروني:</strong>
                            <p class="text-muted mb-0">info@alodhaibi.sa</p>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-1">
                            <i class="fas fa-clock gradient-text"></i>
                        </div>
                        <div class="col-11">
                            <strong>ساعات العمل:</strong>
                            <p class="text-muted mb-0">السبت - الخميس: 8 صباحاً - 11:30 مساءً</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- قيم الشركة -->
    <section class="mt-5">
        <h2 class="text-center gradient-text mb-5">قيمنا</h2>
        <div class="row text-center">
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="bg-light p-3 rounded-circle d-inline-block mb-3">
                            <i class="fas fa-heart fa-2x gradient-text"></i>
                        </div>
                        <h5>النزاهة</h5>
                        <p class="text-muted">نعمل بشفافية وأمانة في جميع تعاملاتنا</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="bg-light p-3 rounded-circle d-inline-block mb-3">
                            <i class="fas fa-users fa-2x gradient-text"></i>
                        </div>
                        <h5>العمل الجماعي</h5>
                        <p class="text-muted">نؤمن بقوة العمل الجماعي لتحقيق الأهداف</p>
                    </div>
                </div>
            </div>
            
           
            
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="bg-light p-3 rounded-circle d-inline-block mb-3">
                            <i class="fas fa-star fa-2x gradient-text"></i>
                        </div>
                        <h5>الجودة</h5>
                        <p class="text-muted">نلتزم بأعلى معايير الجودة</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection