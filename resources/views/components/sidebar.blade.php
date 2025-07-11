<div class="bg-light sidebar p-3 d-flex flex-column" id="sidebar" style="width: 250px; height: 100vh; border-right: 2px solid #ddd;">
    <div style="display: flex; align-items: center;" class="mb-4">
        <img src="{{ asset('assets/logo-1.png')}}" alt="Logo" style="height: 40px;">
        <h3 class="text-left" style="margin-right: 10px;">Radiowsdaop</h3>
    </div>
    <ul class="nav flex-column mb-auto" id="sidebar-nav">
        <li class="nav-item mb-2">
            <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ route('dashboard.home') }}">
                Home
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link {{ request()->is('chart') ? 'active' : '' }}" href="{{ route('dashboard.chart') }}">
                Chart
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link {{ request()->is('data') ? 'active' : '' }}" href="{{ route('dashboard.data') }}">
                Data
            </a>
        </li>
    </ul>

    {{-- Logout Button --}}
    <form class="form-inline mt-auto" action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Are you sure you want to logout?')">
        @csrf
        <button class="btn btn-outline-danger w-100" type="submit" style="font-weight: 600;">Logout</button>
    </form>
</div>

<!-- Button to toggle sidebar visibility (for mobile) -->
<button id="toggleSidebar" class="btn btn-outline-primary d-md-none" style="position: fixed; top: 20px; left: 20px; z-index: 1050;">
    ☰
</button>

<script>
    // Menambahkan event listener pada tombol toggle untuk membuka dan menutup sidebar
document.getElementById('toggleSidebar').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('show'); // Toggle sidebar visibility
    document.body.classList.toggle('sidebar-open'); // Tambahkan kelas untuk mengubah margin konten
});

</script>