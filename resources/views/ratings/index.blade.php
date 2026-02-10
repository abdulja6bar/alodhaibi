@extends('layouts.app')

@section('title', 'التقييمات')

@section('content')
@section("breadcrumb")
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2" style="direction: ltr; margin-top: 10px;margin-left: 40px">
         
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href='{{route("home")}}'> Home  </a></li>
              <li class="breadcrumb-item"><a href='{{route("ratings.index")}}'> Ratoing </a></li>
            </ol>
          </div>
     
        </div>
      </div>
    
    </div>
@endsection
<div class="container py-5">

    <!-- Header -->
    <div class="text-center mb-5">
        <h1 class="fw-bold gradient-text">آراء العملاء</h1>
        <p class="text-muted">تجارب حقيقية من عملائنا الكرام</p>
    </div>

    <!-- Summary Cards -->
    <div class="row g-4 mb-5 justify-content-center">
        <div class="col-md-4">
            <div class="glass-card text-center p-4">
                <h6 class="text-muted mb-2">متوسط التقييم</h6>
                <div class="display-4 fw-bold gradient-text">{{ number_format($averageRating ?? 0, 1) }}</div>
                <div class="mt-2">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star {{ $i <= ($averageRating ?? 0) ? 'text-warning' : 'text-secondary' }}"></i>
                    @endfor
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="glass-card text-center p-4">
                <h6 class="text-muted mb-2">عدد التقييمات</h6>
                <div class="display-5 fw-bold">{{ $totalRatings ?? 0 }}</div>
                <p class="small text-muted">تقييم موثوق</p>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="filter-box mb-5">
        <form id="filterForm" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label">نوع الخدمة</label>
                <select name="service_type" class="form-select modern-input">
                    <option value="">الكل</option>
                    <option value="sales">المبيعات</option>
                    <option value="support">الدعم الفني</option>
                    <option value="delivery">التوصيل</option>
                    <option value="quality">الجودة</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">الترتيب</label>
                <select name="sort" class="form-select modern-input">
                    <option value="newest">الأحدث</option>
                    <option value="oldest">الأقدم</option>
                    <option value="highest">الأعلى تقييماً</option>
                    <option value="lowest">الأقل تقييماً</option>
                </select>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="{{ route('ratings.create') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> إضافة تقييم
                </a>
            </div>
        </form>
    </div>

    <!-- Ratings List -->
    <div id="ratingsContainer" class="row g-4">
        @forelse($ratings as $rating)
            <div class="col-md-6">
                <div class="rating-card h-100">
                    <div class="rating-header d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="mb-1 fw-bold">{{ $rating->user_name }}</h6>
                            <small class="text-muted">{{ $rating->created_at->diffForHumans() }}</small>
                        </div>
                        <span class="badge service-badge">{{ __('ratings.service_types.' . $rating->service_type) }}</span>
                    </div>

                    <div class="rating-stars-box my-2">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= $rating->rating ? 'text-warning' : 'text-secondary' }}"></i>
                        @endfor
                    </div>

                    <p class="rating-comment">{{ $rating->comment }}</p>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-star fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">لا توجد تقييمات حالياً</h5>
                <p class="text-muted">كن أول من يشاركنا رأيه</p>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $ratings->links() }}
    </div>
</div>
@endsection

@push('styles')
<style>
.glass-card{
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.filter-box{
    background:#fff;
    padding:25px;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.05);
}

.rating-card{
    background:#fff;
    border-radius:18px;
    padding:20px;
    box-shadow:0 8px 20px rgba(0,0,0,0.06);
    transition:0.3s;
}

.rating-card:hover{
    transform: translateY(-5px);
    box-shadow:0 15px 35px rgba(0,0,0,0.12);
}

.service-badge{
    background: linear-gradient(135deg,#6a11cb,#2575fc);
    color:#fff;
    border-radius:20px;
    padding:6px 12px;
}

.rating-comment{
    font-size:0.95rem;
    color:#444;
    line-height:1.7;
}

.modern-input{
    border-radius:12px;
}

.gradient-text{
    background: linear-gradient(135deg,#6a11cb,#2575fc);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function(){
    $('#filterForm select').on('change', function(){
        $.ajax({
            url: '{{ route("ratings.filter") }}',
            type: 'GET',
            data: $('#filterForm').serialize(),
            success: function(res){
                $('#ratingsContainer').html(res);
            }
        });
    });
});
</script>
@endpush
