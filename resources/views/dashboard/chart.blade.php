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
                    <h1 class="display-5 fw-bold mb-5">Chart</h1>
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

                const labels = data.map(item => item.timestamp);
                const voltageData = data.map(item => item.voltage);
                const currentData = data.map(item => item.current);

                const ctx = document.getElementById('myChart').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'Voltage',
                                data: voltageData,
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 2,
                                fill: false
                            },
                            {
                                label: 'Current',
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
