@extends('layouts.app')
{{-- @extends("welcome") --}}


@section('title', 'إدارة التقييمات')

{{-- @section('indexrating') --}}


@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="gradient-text"><i class="fas fa-star me-2"></i>إدارة التقييمات</h1>
        <div>
            <button class="btn btn-primary" onclick="location.reload()">
                <i class="fas fa-sync-alt me-2"></i>تحديث
            </button>
        </div>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    
    <!-- إحصائيات سريعة -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-0">{{ $ratings->total() }}</h3>
                            <p class="text-muted mb-0">إجمالي التقييمات</p>
                        </div>
                        <i class="fas fa-list fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            @php
                                $approvedCount = App\Models\Rating::where('is_approved', true)->count();
                            @endphp
                            <h3 class="mb-0">{{ $approvedCount }}</h3>
                            <p class="text-muted mb-0">التقييمات المعتمدة</p>
                        </div>
                        <i class="fas fa-check-circle fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            @php
                                $pendingCount = App\Models\Rating::where('is_approved', false)->count();
                            @endphp
                            <h3 class="mb-0">{{ $pendingCount }}</h3>
                            <p class="text-muted mb-0">قيد الانتظار</p>
                        </div>
                        <i class="fas fa-clock fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            @php
                                $avgRating = App\Models\Rating::where('is_approved', true)->avg('rating') ?? 0;
                            @endphp
                            <h3 class="mb-0">{{ number_format($avgRating, 1) }}/5</h3>
                            <p class="text-muted mb-0">متوسط التقييم</p>
                        </div>
                        <i class="fas fa-chart-line fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- فلترة -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-3">
                    <label for="status" class="form-label">الحالة</label>
                    <select name="status" id="status" class="form-select">
                        <option value="">الكل</option>
                        <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>معتمد</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
                    </select>
                </div>
                
                <div class="col-md-3">
                    <label for="service_type" class="form-label">نوع الخدمة</label>
                    <select name="service_type" id="service_type" class="form-select">
                        <option value="">الكل</option>
                        <option value="sales" {{ request('service_type') == 'sales' ? 'selected' : '' }}>المبيعات</option>
                        <option value="support" {{ request('service_type') == 'support' ? 'selected' : '' }}>الدعم الفني</option>
                        <option value="delivery" {{ request('service_type') == 'delivery' ? 'selected' : '' }}>التوصيل</option>
                        <option value="quality" {{ request('service_type') == 'quality' ? 'selected' : '' }}>الجودة</option>
                    </select>
                </div>
                
                <div class="col-md-3">
                    <label for="date_from" class="form-label">من تاريخ</label>
                    <input type="date" name="date_from" id="date_from" class="form-control" 
                           value="{{ request('date_from') }}">
                </div>
                
                <div class="col-md-3">
                    <label for="date_to" class="form-label">إلى تاريخ</label>
                    <input type="date" name="date_to" id="date_to" class="form-control" 
                           value="{{ request('date_to') }}">
                </div>
                
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-filter me-2"></i>فلترة
                    </button>
                    <a href="{{ route('admin.ratings2.index') }}" class="btn btn-secondary">
                        <i class="fas fa-redo me-2"></i>إعادة تعيين
                    </a>
                </div>
            </form>
        </div>
    </div>
    
    <!-- جدول التقييمات -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>المستخدم</th>
                            <th>التقييم</th>
                            <th>نوع الخدمة</th>
                            <th>التعليق</th>
                            <th>الحالة</th>
                            <th>التاريخ</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ratings as $rating)
                        <tr>
                            <td>{{ $rating->id }}</td>
                            <td>
                                <div>{{ $rating->user_name }}</div>
                                <small class="text-muted">{{ $rating->user_email }}</small>
                            </td>
                            <td>
                                <div class="mb-1">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star {{ $i <= $rating->rating ? 'rating-stars' : 'text-secondary' }}"></i>
                                    @endfor
                                </div>
                                <span class="badge bg-light text-dark">{{ $rating->rating }}/5</span>
                            </td>
                            <td>
                                <span class="badge bg-info">{{ $rating->service_type }}</span>
                            </td>
                            <td style="max-width: 250px;">
                                <div class="text-truncate" style="max-width: 250px;" 
                                     title="{{ $rating->comment }}">
                                    {{ $rating->comment }}
                                </div>
                            </td>
                            <td>
                                @if($rating->is_approved)
                                    <span class="badge bg-success">معتمد</span>
                                @else
                                    <span class="badge bg-warning text-dark">قيد الانتظار</span>
                                @endif
                            </td>
                            <td>{{ $rating->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    @if(!$rating->is_approved)
                                        <form action="{{ route('admin.ratings.approve', $rating->id) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success" 
                                                    onclick="return confirm('هل تريد الموافقة على هذا التقييم؟')">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                    @endif
                                    <button type="button" class="btn btn-info" 
                                            onclick="viewRating({{ $rating->id }})">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <div>
                                                                            <a style="color: crimson" href='{{route("admin.ratings.distroy",$rating->id)}}'> حذف</a> 

                                    </div>
                                    {{-- <button type="button" class="btn btn-danger" 
                                            onclick="deleteRating({{ $rating->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button> --}}
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">
                                <i class="fas fa-star fa-2x text-muted mb-3"></i>
                                <h5 class="text-muted">لا توجد تقييمات</h5>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- الترقيم -->
            <div class="d-flex justify-content-center mt-4">
                {{ $ratings->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Modal لعرض التقييم -->
<div class="modal fade" id="ratingModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تفاصيل التقييم</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="ratingDetails">
                جاري التحميل...
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function viewRating(id) {
    
    $.ajax({
        url: '/admin/ratings/' + id + '/view',
        method: 'GET',
        success: function(response) {
            $('#ratingDetails').html(response);
            $('#ratingModal').modal('show');
        },
        error: function() {
            alert('حدث خطأ أثناء جلب البيانات');
        }
    });
}

function deleteRating(id) {
    if (confirm('هل أنت متأكد من حذف هذا التقييم؟')) {
        $.ajax({
            url: '/admin/ratings/' + id,
            method: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    location.reload();
                }
            },
            error: function() {
                alert('حدث خطأ أثناء الحذف');
            }
        });
    }
}
</script>
@endpush
@endsection
{{-- @endsection --}}