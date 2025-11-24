<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'POS System')</title>
    
    <!-- Tailwind CSS -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* width */
::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #cfd8dc;
  border-radius: 5px;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #b0bec5;
  border-radius: 5px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #90a4ae;
}

.bg-cyan-50, .hover\:bg-cyan-50:hover {
    background-color: #e0f7fa;
}
.bg-cyan-100, .hover\:bg-cyan-100:hover {
    background-color: #b2ebf2;
}
.bg-cyan-200, .hover\:bg-cyan-200:hover {
    background-color: #80deea;
}
.bg-cyan-300, .hover\:bg-cyan-300:hover {
    background-color: #4dd0e1;
}
.bg-cyan-400, .hover\:bg-cyan-400:hover {
    background-color: #26c6da;
}
.bg-cyan-500, .hover\:bg-cyan-500:hover {
    background-color: #00bcd4;
}
.bg-cyan-600, .hover\:bg-cyan-600:hover {
    background-color: #00acc1;
}
.bg-cyan-700, .hover\:bg-cyan-700:hover {
    background-color: #0097a7;
}
.bg-cyan-800, .hover\:bg-cyan-800:hover {
    background-color: #00838f;
}
.bg-cyan-900, .hover\:bg-cyan-900:hover {
    background-color: #006064;
}


.text-cyan-50, .hover\:text-cyan-50:hover {
    color: #e0f7fa;
}
.text-cyan-100, .hover\:text-cyan-100:hover {
    color: #b2ebf2;
}
.text-cyan-200, .hover\:text-cyan-200:hover {
    color: #80deea;
}
.text-cyan-300, .hover\:text-cyan-300:hover {
    color: #4dd0e1;
}
.text-cyan-400, .hover\:text-cyan-400:hover {
    color: #26c6da;
}
.text-cyan-500, .hover\:text-cyan-500:hover {
    color: #00bcd4;
}
.text-cyan-600, .hover\:text-cyan-600:hover {
    color: #00acc1;
}
.text-cyan-700, .hover\:text-cyan-700:hover {
    color: #0097a7;
}
.text-cyan-800, .hover\:text-cyan-800:hover {
    color: #00838f;
}
.text-cyan-900, .hover\:text-cyan-900:hover {
    color: #006064;
}

.bg-blue-gray-50, .hover\:bg-blue-gray-50:hover {
    background-color: #eceff1;
}
.bg-blue-gray-100, .hover\:bg-blue-gray-100:hover {
    background-color: #cfd8dc;
}
.bg-blue-gray-200, .hover\:bg-blue-gray-200:hover {
    background-color: #b0bec5;
}
.bg-blue-gray-300, .hover\:bg-blue-gray-300:hover {
    background-color: #90a4ae;
}
.bg-blue-gray-400, .hover\:bg-blue-gray-400:hover {
    background-color: #78909c;
}
.bg-blue-gray-500, .hover\:bg-blue-gray-500:hover {
    background-color: #607d8b;
}
.bg-blue-gray-600, .hover\:bg-blue-gray-600:hover {
    background-color: #546e7a;
}
.bg-blue-gray-700, .hover\:bg-blue-gray-700:hover {
    background-color: #455a64;
}
.bg-blue-gray-800, .hover\:bg-blue-gray-800:hover {
    background-color: #37474f;
}
.bg-blue-gray-900, .hover\:bg-blue-gray-900:hover {
    background-color: #263238;
}

.text-blue-gray-50, .hover\:text-blue-gray-50:hover {
    color: #eceff1;
}
.text-blue-gray-100, .hover\:text-blue-gray-100:hover {
    color: #cfd8dc;
}
.text-blue-gray-200, .hover\:text-blue-gray-200:hover {
    color: #b0bec5;
}
.text-blue-gray-300, .hover\:text-blue-gray-300:hover {
    color: #90a4ae;
}
.text-blue-gray-400, .hover\:text-blue-gray-400:hover {
    color: #78909c;
}
.text-blue-gray-500, .hover\:text-blue-gray-500:hover {
    color: #607d8b;
}
.text-blue-gray-600, .hover\:text-blue-gray-600:hover {
    color: #546e7a;
}
.text-blue-gray-700, .hover\:text-blue-gray-700:hover {
    color: #455a64;
}
.text-blue-gray-800, .hover\:text-blue-gray-800:hover {
    color: #37474f;
}
.text-blue-gray-900, .hover\:text-blue-gray-900:hover {
    color: #263238;
}
.bg-teal-50, .hover\:bg-teal-50:hover {
    background-color: #e0f2f1;
}
.bg-teal-100, .hover\:bg-teal-100:hover {
    background-color: #b2dfdb;
}
.bg-teal-200, .hover\:bg-teal-200:hover {
    background-color: #80cbc4;
}
.bg-teal-300, .hover\:bg-teal-300:hover {
    background-color: #4db6ac;
}
.bg-teal-400, .hover\:bg-teal-400:hover {
    background-color: #26a69a;
}
.bg-teal-500, .hover\:bg-teal-500:hover {
    background-color: #009688;
}
.bg-teal-600, .hover\:bg-teal-600:hover {
    background-color: #00897b;
}
.bg-teal-700, .hover\:bg-teal-700:hover {
    background-color: #00796b;
}
.bg-teal-800, .hover\:bg-teal-800:hover {
    background-color: #00695c;
}
.bg-teal-900, .hover\:bg-teal-900:hover {
    background-color: #004d40;
}

.text-teal-50, .hover\:text-teal-50:hover {
    color: #e0f2f1;
}
.text-teal-100, .hover\:text-teal-100:hover {
    color: #b2dfdb;
}
.text-teal-200, .hover\:text-teal-200:hover {
    color: #80cbc4;
}
.text-teal-300, .hover\:text-teal-300:hover {
    color: #4db6ac;
}
.text-teal-400, .hover\:text-teal-400:hover {
    color: #26a69a;
}
.text-teal-500, .hover\:text-teal-500:hover {
    color: #009688;
}
.text-teal-600, .hover\:text-teal-600:hover {
    color: #00897b;
}
.text-teal-700, .hover\:text-teal-700:hover {
    color: #00796b;
}
.text-teal-800, .hover\:text-teal-800:hover {
    color: #00695c;
}
.text-teal-900, .hover\:text-teal-900:hover {
    color: #004d40;
}

.nowrap {
  white-space: nowrap;
}

.glass {
  background-color: rgba(100, 120, 130, .6);
  backdrop-filter: blur(10px);
}

table td {
  vertical-align: top;
}

#receipt-content {
  max-height: 70vh;
}
    </style>
    
    @stack('styles')
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-cyan-500 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span class="ml-2 text-white text-xl font-bold">POS System</span>
                </div>
                
                <div class="flex items-center space-x-4">
                    @if(in_array('admin', session('pengguna_roles', [])))
                        <a href="{{ route('products.index') }}" class="text-white hover:text-cyan-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            Produk
                        </a>
                        <a href="{{ route('reports.index') }}" class="text-white hover:text-cyan-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            Laporan
                        </a>
                    @endif
                    
                    <a href="{{ route('pos.transaksi.index') }}" class="text-white hover:text-cyan-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Transaksi
                    </a>
                    
                    <a href="{{ route('pos.index') }}" class="text-white hover:text-cyan-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        POS
                    </a>
                    
                    <div class="flex items-center text-white">
                        <span class="mr-2">{{ session('pengguna_username') }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-white hover:text-cyan-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Alert Messages -->
    @if(session('success'))
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    </div>
    @endif

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    
    @stack('scripts')
</body>
</html>