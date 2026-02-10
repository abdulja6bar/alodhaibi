@extends('layouts.app')

@section('title', 'إدارة الشكاوى')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="gradient-text"><i class="fas fa-comments me-2"></i>إدارة الشكاوى</h1>
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
    
    <!-- إحصائيات -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            @php
                                $totalComplaints = App\Models\Complaint::count();
                            @endphp
                            <h3 class="mb-0">{{ $totalComplaints }}</h3>
                            <p class="text-muted mb-0">إجمالي الشكاوى</p>
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
                                $pendingCount = App\Models\Complaint::where('status', 'pending')->count();
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
                                $inProgressCount = App\Models\Complaint::where('status', 'in_progress')->count();
                            @endphp
                            <h3 class="mb-0">{{ $inProgressCount }}</h3>
                            <p class="text-muted mb-0">قيد المعالجة</p>
                        </div>
                        <i class="fas fa-cogs fa-2x text-info"></i>
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
                                $resolvedCount = App\Models\Complaint::where('status', 'resolved')->count();
                            @endphp
                            <h3 class="mb-0">{{ $resolvedCount }}</h3>
                            <p class="text-muted mb-0">تم الحل</p>
                        </div>
                        <i class="fas fa-check-circle fa-2x text-success"></i>
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
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
                        <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>قيد المعالجة</option>
                        <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>تم الحل</option>
                    </select>
                </div>
                
                <div class="col-md-3">
                    <label for="category" class="form-label">التصنيف</label>
                    <select name="category" id="category" class="form-select">
                        <option value="">الكل</option>
                        <option value="service" {{ request('category') == 'service' ? 'selected' : '' }}>خدمة</option>
                        <option value="product" {{ request('category') == 'product' ? 'selected' : '' }}>منتج</option>
                        <option value="delivery" {{ request('category') == 'delivery' ? 'selected' : '' }}>توصيل</option>
                        <option value="payment" {{ request('category') == 'payment' ? 'selected' : '' }}>دفع</option>
                        <option value="other" {{ request('category') == 'other' ? 'selected' : '' }}>أخرى</option>
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
                    <a href="{{ route('admin.complaints.index') }}" class="btn btn-secondary">
                        <i class="fas fa-redo me-2"></i>إعادة تعيين
                    </a>
                </div>
            </form>
        </div>
    </div>
    
    <!-- جدول الشكاوى -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>المستخدم</th>
                            <th>العنوان</th>
                            <th>التصنيف</th>
                            <th>الحالة</th>
                            <th>التاريخ</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($complaints as $complaint)
                        <tr>
                            <td>{{ $complaint->id }}</td>
                            <td>
                                <div>{{ $complaint->user_name }}</div>
                                <small class="text-muted">{{ $complaint->user_email }}</small>
                            </td>
                            <td>
                                <div class="text-truncate" style="max-width: 200px;">
                                    {{ $complaint->title }}
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-secondary">{{ $complaint->category }}</span>
                            </td>
                            <td>
                                @if($complaint->status == 'pending')
                                    <span class="status-badge status-pending">قيد الانتظار</span>
                                @elseif($complaint->status == 'in_progress')
                                    <span class="status-badge status-in-progress">قيد المعالجة</span>
                                @else
                                    <span class="status-badge status-resolved">تم الحل</span>
                                @endif
                            </td>
                            <td>{{ $complaint->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href='{{route("show",$complaint )}}' style="color: cadetblue">تفاصيل</a>
                                {{-- <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-info" 
                                            onclick="viewComplaint({{ $complaint->id }})">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary" 
                                            onclick="editComplaint({{ $complaint->id }})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div> --}}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <i class="fas fa-comments fa-2x text-muted mb-3"></i>
                                <h5 class="text-muted">لا توجد شكاوى</h5>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- الترقيم -->
            <div class="d-flex justify-content-center mt-4">
                {{ $complaints->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Modal لعرض الشكوى -->
<div class="modal fade" id="complaintModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تفاصيل الشكوى</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="complaintDetails">
                جاري التحميل...
            </div>
        </div>
    </div>
</div>

<!-- Modal لتعديل الشكوى -->
<div class="modal fade" id="editComplaintModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تحديث حالة الشكوى</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="updateComplaintForm">
                <div class="modal-body">
                    <div id="editComplaintForm">
                        جاري التحميل...
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
function viewComplaint(id) {
    $.ajax({
        url: '/admin/complaints/' + id + '/view',
        method: 'GET',
        success: function(response) {
            $('#complaintDetails').html(response);
            $('#complaintModal').modal('show');
        },
        error: function() {
            alert('حدث خطأ أثناء جلب البيانات');
        }
    });
}

function editComplaint(id) {
    $.ajax({
        url: '/admin/complaints/' + id + '/edit',
        method: 'GET',
        success: function(response) {
            $('#editComplaintForm').html(response);
            $('#editComplaintModal').modal('show');
        },
        error: function() {
            alert('حدث خطأ أثناء جلب البيانات');
        }
    });
}

// تحديث حالة الشكوى
$('#updateComplaintForm').on('submit', function(e) {
    e.preventDefault();
    
    const formData = $(this).serialize();
    const complaintId = $('#complaint_id').val();
    
    $.ajax({
        url: '/admin/complaints/' + complaintId + '/update',
        method: 'POST',
        data: formData,
        success: function(response) {
            if (response.success) {
                $('#editComplaintModal').modal('hide');
                location.reload();
            }
        },
        error: function() {
            alert('حدث خطأ أثناء التحديث');
        }
    });
});
</script>
@endpush
@endsection