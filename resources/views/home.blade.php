{{-- @extends('layouts.app') --}}
{{-- @extends('welcome') --}}

@section('title', 'الرئيسية')

@section('content')

<!-- قسم البطل -->
@section("breadcrumb")
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2" style="direction: ltr; margin-top: 10px;margin-left: 40px">
         
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route("home")}}">Home \</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    
    </div>
@endsection
<section class="hero-section text-center" style="align-content: center" >
        <section class="hero" style="margin-top: 5px">
        <div class="container">
            <h2>اكتشف جمالك الحقيقي</h2>
            <p>أفضل تشكيلة من مستحضرات التجميل والكماليات من أشهر الماركات العالمية والعربية بأسعار تنافسية وعروض مميزة</p>
            {{-- <div class="hero-buttons">
                <button class="btn btn-primary">تسوق الآن</button>
                <button class="btn btn-secondary">استعرض العروض</button>
            </div> --}}
        </div>
    </section>
    {{-- <div class="container-fluid p-5 bg-primary text-white text-center">
  <h1>مؤسسة منصور محمد فهد العضيبي للكماليات</h1>
  <p>وجهتكم الأولى لكل ما هو فاخر ومميز</p> 
</div> --}}
     {{-- <div >
        <img src="https://res.cloudinary.com/dr7xwcpo7/image/upload/v1770535135/Screenshot_479_a6w9jn.png" style="width: 100vw; height: 65vh; overflow: hidden">
    </div> --}}
    <div class="container" style="margin-top: 40px">
       
        {{-- <h1 class="display-4 fw-bold gradient-text mb-4">مرحباً بكم في نظام العضيبي</h1> --}}
        {{-- <p class="lead fs-4 mb-4" style="margin: 20px">نظام تقييم وشكاوى متكامل لخدمتكم</p> --}}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">
                    <h3 class="mb-3">التقييم العام</h3>
                    <div class="display-4 fw-bold gradient-text mb-2">
                        {{ number_format($averageRating, 1) }}/5
                    </div>
                    <div class="mb-3">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= $averageRating ? 'rating-stars' : 'text-secondary' }} fs-4"></i>
                        @endfor
                    </div>
                    <p class="text-muted">بناءً على {{ $totalRatings }} تقييم</p>
                </div>
            </div>
        </div>
    </div>
</section>

<br>
<!-- إحصائيات سريعة -->
<div class="container" >
    <div class="row text-center mb-5">
        <div class="col-md-4">
            <a href="{{ route('ratings.create') }}" class="text-decoration-none">
                <div class="card" style="margin-bottom: 10px">
                    <div class="card-body">
                        <i class="fas fa-star fa-3x gradient-text mb-3"></i>
                        <h4>أضف تقييمك</h4>
                        <p class="text-muted">شاركنا رأيك في خدماتنا</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('complaints.create') }}" class="text-decoration-none">
                <div class="card" style="margin-bottom: 10px">
                    <div class="card-body">
                        <i class="fas fa-comment-dots fa-3x gradient-text mb-3"></i>
                        <h4>تقديم شكوى</h4>
                        <p class="text-muted">نسعى لحل جميع مشاكلكم</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            {{-- <a href="{{ route('ratings.index') }}" class="text-decoration-none"> --}}
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-list fa-3x gradient-text mb-3"></i>
                        <h4>عرض التقييمات</h4>
                        <p class="text-muted">اقرأ تجارب الآخرين</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- أحدث التقييمات -->
    <section class="mb-5">
        <h2 class="text-center mb-4 gradient-text">أحدث التقييمات</h2>
        <div class="row">
            @foreach($ratings as $rating)
         
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title">{{ $rating->user_name }}</h5>
                            <div>
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $rating->rating ? 'rating-stars' : 'text-secondary' }}"></i>
                                @endfor
                            </div>
                        </div>
                        <p class="card-text">{{ Str::limit($rating->comment, 150) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-light text-dark">{{ $rating->service_type }}</span>
                            <small class="text-muted">{{ $rating->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{route('ratings.index')}}" class="btn btn-primary btn-lg">
                <i class="fas fa-eye me-2"></i>عرض جميع التقييمات
            </a>
        </div>
    </section>
</div>
@endsection