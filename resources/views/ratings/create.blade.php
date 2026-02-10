@extends('layouts.app')

@section('title', 'إضافة تقييم')

@section("breadcrumb")
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2" style="direction: ltr; margin-top: 10px;margin-left: 40px">
         
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route("home")}}">Home </a></li>
              <li class="breadcrumb-item"><a href="{{route("ratings.create")}}">Create Rating </a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    
    </div>
@endsection
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <h4 class="mb-0 gradient-text"><i class="fas fa-star me-2"></i>إضافة تقييم جديد</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    
                    <form action="{{ route('ratings.store') }}" method="POST" id="ratingForm">
                        @csrf
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="user_name" class="form-label">الاسم *</label>
                                <input type="text" class="form-control @error('user_name') is-invalid @enderror" 
                                       id="user_name" name="user_name" value="{{ old('user_name') }}" required>
                                @error('user_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label for="user_email" class="form-label">البريد الإلكتروني</label>
                                <input type="email" class="form-control @error('user_email') is-invalid @enderror" 
                                       id="user_email" name="user_email" value="{{ old('user_email') }}">
                                @error('user_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">التقييم *</label>
                            <div class="d-flex justify-content-center mb-3">
                                <div id="stars" class="stars-container">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star fa-2x star" data-value="{{ $i }}"></i>
                                    @endfor
                                </div>
                            </div>
                            <input type="hidden" name="rating" id="rating" value="{{ old('rating', 5) }}" required>
                            <div class="text-center">
                                <span id="ratingText" class="text-muted">ممتاز</span>
                            </div>
                            @error('rating')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="service_type" class="form-label">نوع الخدمة *</label>
                            <select class="form-select @error('service_type') is-invalid @enderror" 
                                    id="service_type" name="service_type" required>
                                <option value="">اختر نوع الخدمة</option>
                                <option value="sales" {{ old('service_type') == 'sales' ? 'selected' : '' }}>المبيعات</option>
                                <option value="support" {{ old('service_type') == 'support' ? 'selected' : '' }}>الدعم الفني</option>
                                <option value="delivery" {{ old('service_type') == 'delivery' ? 'selected' : '' }}>التوصيل</option>
                                <option value="quality" {{ old('service_type') == 'quality' ? 'selected' : '' }}>الجودة</option>
                            </select>
                            @error('service_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="comment" class="form-label">التعليق *</label>
                            <textarea class="form-control @error('comment') is-invalid @enderror" 
                                      id="comment" name="comment" rows="5" required>{{ old('comment') }}</textarea>
                            <div class="form-text">شاركنا بتجربتك مع خدماتنا (500 حرف كحد أقصى)</div>
                            @error('comment')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-paper-plane me-2"></i>إرسال التقييم
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.stars-container {
    cursor: pointer;
}
.star {
    color: #ddd;
    margin: 0 5px;
    transition: color 0.3s;
}
.star.active {
    color: #FFD700;
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // نظام النجوم التفاعلي
    const stars = $('.star');
    const ratingInput = $('#rating');
    const ratingText = $('#ratingText');
    
    const ratingTexts = {
        1: 'سيء',
        2: 'مقبول',
        3: 'جيد',
        4: 'جيد جداً',
        5: 'ممتاز'
    };
    
    function setRating(value) {
        stars.removeClass('active');
        for (let i = 0; i < value; i++) {
            $(stars[i]).addClass('active');
        }
        ratingInput.val(value);
        ratingText.text(ratingTexts[value]);
    }
    
    stars.on('click', function() {
        const value = $(this).data('value');
        setRating(value);
    });
    
    stars.on('mouseover', function() {
        const value = $(this).data('value');
        stars.removeClass('active');
        for (let i = 0; i < value; i++) {
            $(stars[i]).addClass('active');
        }
    });
    
    stars.on('mouseout', function() {
        const currentRating = ratingInput.val();
        setRating(currentRating);
    });
    
    // تعيين التقييم الافتراضي
    setRating({{ old('rating', 5) }});
    
    // عد الأحرف
    $('#comment').on('input', function() {
        const maxLength = 500;
        const currentLength = $(this).val().length;
        const remaining = maxLength - currentLength;
        
        if (remaining < 0) {
            $(this).val($(this).val().substring(0, maxLength));
        }
    });
});
</script>
@endpush
@endsection
