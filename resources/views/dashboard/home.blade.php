@extends('layouts.app', ['title' => 'Home'])

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
                        <h1 class="display-5 fw-bold mb-5">Data</h1>
                        <div class="d-flex gap-2 ms-auto">
                            <img src="{{ asset('assets/logo ppi.png')}}" alt="Logo" style="height: 30px; margin-right: 10px;">
                            <img src="{{ asset('assets/kai.png')}}" alt="Logo" style="height: 30px;">
                        </div>
                    </div>
                    <h4>Realtime Data</h4>
                
                    <!-- Wrapper untuk voltage gauge -->
                    <div class="row justify-content-center align-items-center mb-4">
                        <div class="col-3 text-center">
                            <span><strong>Voltage</strong></span>
                            <p id="voltage" style="font-size: 1.5rem;">Loading...</p>
                        </div>
                        <div class="col-6">
                            <div id="voltage-gauge" style="width: 200px; height: 160px; margin: 0 auto;"></div>
                        </div>
                        <div class="col-3 text-center">
                            <span><strong>Volts</strong></span>
                        </div>
                    </div>
                
                    <!-- Wrapper untuk current gauge -->
                    <div class="row justify-content-center align-items-center mb-4">
                        <div class="col-3 text-center">
                            <span><strong>Current</strong></span>
                            <p id="current" style="font-size: 1.5rem;">Loading...</p>
                        </div>
                        <div class="col-6">
                            <div id="current-gauge" style="width: 200px; height: 160px; margin: 0 auto;"></div>
                        </div>
                        <div class="col-3 text-center">
                            <span><strong>Amps</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END Main Content --}}

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Tambahkan Raphael.js terlebih dahulu -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>

    <!-- Kemudian tambahkan JustGage -->
    <script src="https://cdn.jsdelivr.net/npm/justgage@1.4.0/justgage.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/justgage@1.4.0/justgage.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function fetchVAmps() {
            $.ajax({
                url: "{{ url('/api/vamps/latest') }}",
                method: 'GET',
                success: function(data) {
                    // $('#voltage').text(data.data.voltage);
                    // $('#current').text(data.data.current);

                    // Ambil nilai voltage dan current dari data yang diterima
                    var voltage = data.data.voltage;
                    var current = data.data.current;

                    // Update nilai pada gauge
                    voltageGauge.refresh(voltage);
                    currentGauge.refresh(current);

                    // Update teks di bawah gauge
                    $('#voltage').text(voltage.toFixed(2));
                    $('#current').text(current.toFixed(2));
                },
                error: function(err) {
                    console.error('Error fetching data', err);
                }
            });
        }

        // Buat gauge untuk Voltage
        var voltageGauge = new JustGage({
            id: "voltage-gauge",
            value: 0, // Nilai awal
            min: 0,
            max: 220, // Atur nilai max untuk voltage, sesuaikan dengan range yang diinginkan
            title: "Voltage",
            label: "V"
        });

        // Buat gauge untuk Current
        var currentGauge = new JustGage({
            id: "current-gauge",
            value: 0, // Nilai awal
            min: 0,
            max: 100, // Atur nilai max untuk current, sesuaikan dengan range yang diinginkan
            title: "Current",
            label: "A"
        });

        setInterval(fetchVAmps, 1000); // fetch every 5 seconds
        fetchVAmps(); // initial call
    </script>
</body>
@endsection