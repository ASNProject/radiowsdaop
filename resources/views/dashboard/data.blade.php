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
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="display-5 fw-bold mb-5">Data</h1>
                        <div class="d-flex gap-2 ms-auto">
                            <img src="{{ asset('assets/logo ppi.png')}}" alt="Logo" style="height: 30px; margin-right: 10px;">
                            <img src="{{ asset('assets/kai.png')}}" alt="Logo" style="height: 30px;">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <form action="{{ url('/delete-vamps') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete all data?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Delete All Data
                            </button>
                        </form>
                        <a href="{{ url('/export-vamps') }}" class="btn btn-success">
                            Download CSV
                        </a>
                    </div>     
                    {{-- Table to Display Data --}}
                    <table class="table table-striped" style="width: 100%; overflow-x: auto; table-layout: fixed;">
                      <thead>
                          <tr>
                              <th scope="col">Voltage</th>
                              <th scope="col">Current</th>
                              <th scope="col">Timestamp</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($data as $datas)
                              <tr>
                                  <td>{{ $datas->voltage }}</td>
                                  <td>{{ $datas->current}}</td>
                                  <td>{{ $datas->created_at }}</td>
                              </tr>
                          @endforeach
                      </tbody>
                    </table>
                    {{-- Pagination --}}

                    <div class="d-flex justify-content-center">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
        {{-- END Main Content --}}
        {{-- CSS --}}
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</body>
@endsection