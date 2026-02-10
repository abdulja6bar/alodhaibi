@extends('layouts.app')

@section('title', 'الإحصائيات والتقارير')

@section('content')
<div class="container-fluid py-4">
    <h1 class="gradient-text mb-4"><i class="fas fa-chart-bar me-2"></i>الإحصائيات والتقارير</h1>
    
    <!-- مرشحات التقرير -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">مرشحات التقرير</h5>
        </div>
        <div class="card-body">
            <form id="reportForm" class="row g-3">
                <div class="col-md-3">
                    <label for="report_type" class="form-label">نوع التقرير</label>
                    <select name="report_type" id="report_type" class="form-select">
                        <option value="daily">يومي</option>
                        <option value="weekly">أسبوعي</option>
                        <option value="monthly">شهري</option>
                        <option value="yearly">سنوي</option>
                        <option value="custom">مخصص</option>
                    </select>
                </div>
                
                <div class="col-md-3">
                    <label for="start_date" class="form-label">من تاريخ</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" 
                           value="{{ date('Y-m-01') }}">
                </div>
                
                <div class="col-md-3">
                    <label for="end_date" class="form-label">إلى تاريخ</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" 
                           value="{{ date('Y-m-d') }}">
                </div>
                
                <div class="col-md-3">
                    <label class="form-label">&nbsp;</label>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-filter me-2"></i>توليد التقرير
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- إحصائيات سريعة -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-0" id="totalRatings">0</h3>
                            <p class="mb-0">التقييمات</p>
                        </div>
                        <i class="fas fa-star fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-0" id="totalComplaints">0</h3>
                            <p class="mb-0">الشكاوى</p>
                        </div>
                        <i class="fas fa-comments fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-0" id="avgRating">0.0</h3>
                            <p class="mb-0">متوسط التقييم</p>
                        </div>
                        <i class="fas fa-chart-line fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-0" id="responseRate">0%</h3>
                            <p class="mb-0">نسبة الاستجابة</p>
                        </div>
                        <i class="fas fa-bolt fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- الرسوم البيانية -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">توزيع التقييمات</h5>
                </div>
                <div class="card-body">
                    <canvas id="ratingsChart" height="250"></canvas>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">توزيع الشكاوى</h5>
                </div>
                <div class="card-body">
                    <canvas id="complaintsChart" height="250"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <!-- التقييمات حسب النوع -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">التقييمات حسب نوع الخدمة</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>نوع الخدمة</th>
                            <th>عدد التقييمات</th>
                            <th>متوسط التقييم</th>
                            <th>التقييمات المعتمدة</th>
                            <th>قيد الانتظار</th>
                        </tr>
                    </thead>
                    <tbody id="serviceStats">
                        <!-- سيتم تعبئته بالبيانات -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- الشكاوى حسب التصنيف -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">الشكاوى حسب التصنيف</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>التصنيف</th>
                            <th>قيد الانتظار</th>
                            <th>قيد المعالجة</th>
                            <th>تم الحل</th>
                            <th>المجموع</th>
                            <th>نسبة الحل</th>
                        </tr>
                    </thead>
                    <tbody id="complaintStats">
                        <!-- سيتم تعبئته بالبيانات -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(document).ready(function() {
    let ratingsChart, complaintsChart;
    
    // توليد التقرير
    $('#reportForm').on('submit', function(e) {
        e.preventDefault();
        generateReport();
    });
    
    // توليد التقرير الأولي
    generateReport();
    
    function generateReport() {
        const formData = $('#reportForm').serialize();
        
        $.ajax({
            url: '{{ route("admin.statistics.generate") }}',
            method: 'GET',
            data: formData,
            success: function(response) {
                updateStatistics(response);
                updateCharts(response);
                updateTables(response);
            },
            error: function() {
                alert('حدث خطأ أثناء توليد التقرير');
            }
        });
    }
    
    function updateStatistics(data) {
        $('#totalRatings').text(data.totalRatings);
        $('#totalComplaints').text(data.totalComplaints);
        $('#avgRating').text(data.avgRating);
        $('#responseRate').text(data.responseRate + '%');
    }
    
    function updateCharts(data) {
        // توزيع التقييمات
        if (ratingsChart) {
            ratingsChart.destroy();
        }
        
        const ratingsCtx = document.getElementById('ratingsChart').getContext('2d');
        ratingsChart = new Chart(ratingsCtx, {
            type: 'bar',
            data: {
                labels: ['1 نجمة', '2 نجوم', '3 نجوم', '4 نجوم', '5 نجوم'],
                datasets: [{
                    label: 'عدد التقييمات',
                    data: data.ratingsDistribution,
                    backgroundColor: [
                        '#dc3545',
                        '#fd7e14',
                        '#ffc107',
                        '#20c997',
                        '#198754'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
        
        // توزيع الشكاوى
        if (complaintsChart) {
            complaintsChart.destroy();
        }
        
        const complaintsCtx = document.getElementById('complaintsChart').getContext('2d');
        complaintsChart = new Chart(complaintsCtx, {
            type: 'doughnut',
            data: {
                labels: ['قيد الانتظار', 'قيد المعالجة', 'تم الحل'],
                datasets: [{
                    data: data.complaintsByStatus,
                    backgroundColor: [
                        '#ffc107',
                        '#0dcaf0',
                        '#198754'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    }
    
    function updateTables(data) {
        // التقييمات حسب النوع
        let serviceHtml = '';
        data.serviceStats.forEach(function(stat) {
            serviceHtml += `
                <tr>
                    <td>${stat.service_type}</td>
                    <td>${stat.total}</td>
                    <td>${stat.avg_rating}</td>
                    <td>${stat.approved}</td>
                    <td>${stat.pending}</td>
                </tr>
            `;
        });
        $('#serviceStats').html(serviceHtml);
        
        // الشكاوى حسب التصنيف
        let complaintHtml = '';
        data.categoryStats.forEach(function(stat) {
            const resolutionRate = stat.total > 0 ? Math.round((stat.resolved / stat.total) * 100) : 0;
            complaintHtml += `
                <tr>
                    <td>${stat.category}</td>
                    <td>${stat.pending}</td>
                    <td>${stat.in_progress}</td>
                    <td>${stat.resolved}</td>
                    <td>${stat.total}</td>
                    <td>${resolutionRate}%</td>
                </tr>
            `;
        });
        $('#complaintStats').html(complaintHtml);
    }
});
</script>
@endpush
@endsection