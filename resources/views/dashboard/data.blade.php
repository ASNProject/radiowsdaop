@extends('layouts.app', ['title' => 'Data'])

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
                    <h1 class="display-5 fw-bold mb-5">Data</h1>
                    
                </div>
            </div>
        </div>
        {{-- END Main Content --}}
        {{-- CSS --}}
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</body>
@endsection