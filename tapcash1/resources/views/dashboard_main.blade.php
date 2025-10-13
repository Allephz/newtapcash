
@extends('layouts.main')

@section('content')
<div class="container py-4" style="background:#f8f6f2;min-height:100vh;">
    <h3 class="mb-4" style="color:#5c3a6f;">Dashboard</h3>
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="p-4 mb-3 rounded-4 shadow-sm" style="background:#f3e9e1;">
                <div class="fw-bold text-secondary mb-2">Total Tapcash</div>
                <div class="display-6 fw-bold" id="totalAll" style="color:#5c3a6f;">0</div>
            </div>
            <div class="p-4 mb-3 rounded-4 shadow-sm" style="background:#f3e9e1;">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <div class="fw-bold text-secondary mb-2">Total Tipe</div>
                <div class="display-6 fw-bold" id="totalTipeCard" style="color:#5c3a6f;">0</div>
            </div>
            <div class="p-4 rounded-4 shadow-sm" style="background:#f3e9e1;">
                <div class="fw-bold text-secondary mb-2">Total Status</div>
                <div class="display-6 fw-bold" id="totalStatusCard" style="color:#5c3a6f;">0</div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="rounded-4 shadow-sm p-4" style="background:#fff7f0;">
                <div class="fw-bold mb-2" style="color:#5c3a6f;">Persentase Tipe Tapcash</div>
                <div style="width:240px;max-width:100%;margin:0 auto;">
                    <canvas id="tipeChart" width="240" height="240"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="rounded-4 shadow-sm p-4" style="background:#fff7f0;">
                <div class="fw-bold mb-2" style="color:#5c3a6f;">Persentase Status Tapcash</div>
                <div style="width:240px;max-width:100%;margin:0 auto;">
                    <canvas id="statusChart" width="240" height="240"></canvas>
                </div>
            </div>




    <script>
        // Data dari controller
        const tipeLabels = @json($tipeLabels);
        const tipeData = @json($tipeData);
        const statusLabels = @json($statusLabels);
        const statusData = @json($statusData);

        // Warna
        const tipeColors = ['#7b4b94', '#c7b198', '#e9dac1', '#a5a58d', '#f7b267', '#f4845f'];
        const statusColors = ['#7b4b94', '#c7b198', '#e9dac1', '#a5a58d'];

        // Update card total
        document.getElementById('totalAll').textContent = tipeData.reduce((a, b) => a + b, 0);
        document.getElementById('totalTipeCard').textContent = tipeLabels.length;
        document.getElementById('totalStatusCard').textContent = statusLabels.length;

        // Doughnut chart: Persentase Tipe
        new Chart(document.getElementById('tipeChart'), {
            type: 'doughnut',
            data: {
                labels: tipeLabels,
                datasets: [{
                    data: tipeData,
                    backgroundColor: tipeColors,
                    borderWidth: 2,
                    borderColor: '#fff',
                    hoverOffset: 8
                }]
            },
            options: {
                responsive: true,
                cutout: '70%',
                plugins: {
                    legend: {position: 'bottom', labels: {color: '#5c3a6f', font: {size: 14}}},
                    tooltip: {enabled: true, backgroundColor: '#fff', titleColor: '#5c3a6f', bodyColor: '#5c3a6f'},
                }
            }
        });

        // Doughnut chart: Persentase Status
        new Chart(document.getElementById('statusChart'), {
            type: 'doughnut',
            data: {
                labels: statusLabels,
                datasets: [{
                    data: statusData,
                    backgroundColor: statusColors,
                    borderWidth: 2,
                    borderColor: '#fff',
                    hoverOffset: 8
                }]
            },
            options: {
                responsive: true,
                cutout: '70%',
                plugins: {
                    legend: {position: 'bottom', labels: {color: '#5c3a6f', font: {size: 14}}},
                    tooltip: {enabled: true, backgroundColor: '#fff', titleColor: '#5c3a6f', bodyColor: '#5c3a6f'},
                }
            }
        });
    </script>

    <!-- Bar Charts Section (moved below doughnut charts) -->
</div>
@endsection
