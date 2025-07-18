@extends('layouts.app', ['title' => 'Chart'])

@section('content')
<body>
    <div class="d-flex">
        {{-- Sidebar --}}
        @include('components.sidebar')
        {{-- END Sidebar --}}
        
        {{-- Main Content --}}
        <div class="p-3 w-100">
            <div class="p-3 mb-4 bg-light rounded-3">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="display-5 fw-bold mb-5">Chart Arus dan Tegangan</h1>
                        <div class="d-flex gap-2 ms-auto">
                            <img src="{{ asset('assets/kai.png')}}" alt="Logo" style="height: 30px; margin-right: 15px;">
                            <img src="{{ asset('assets/logo ppi.png')}}" alt="Logo" style="height: 40px; margin-right: 10px; margin-top: -5px;">
                            <img src="{{ asset('assets/1.png')}}" alt="Logo" style="height: 50px; margin-top: -8px;">
                        </div>
                    </div>
                    <canvas id="myChart"></canvas> {{-- Area untuk Chart --}}
                </div>
            </div>
        </div>
        {{-- END Main Content --}}
        
        {{-- CSS --}}
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        {{-- Script Chart.js --}}
        <script>
            // Fetch data dari API
            fetch('/api/vamps/chart')
            .then(response => response.json())
            .then(response => {
                const data = response.data; // ✅ Akses array-nya

                // const labels = data.map(item => item.timestamp);
                const labels = data.map(item => {
                    const date = new Date(item.timestamp);
                    return date.toLocaleString('id-ID', {
                        day: '2-digit',
                        month: 'short',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                });
                const voltageData = data.map(item => item.voltage);
                const currentData = data.map(item => item.current);

                const ctx = document.getElementById('myChart').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'Tegangan',
                                data: voltageData,
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 2,
                                fill: false
                            },
                            {
                                label: 'Arus',
                                data: currentData,
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 2,
                                fill: false
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error:', error));


        </script>
</body>
@endsection
