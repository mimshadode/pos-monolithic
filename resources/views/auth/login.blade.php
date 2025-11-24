<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - POS System</title>
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
</head>
<body class="bg-gradient-to-br from-cyan-500 to-blue-600 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-2xl rounded-3xl overflow-hidden">
            <!-- Header -->
            <div class="bg-cyan-600 text-white text-center py-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <h1 class="text-3xl font-bold">POS System</h1>
                <p class="text-cyan-100 mt-2">Silakan login untuk melanjutkan</p>
            </div>

            <!-- Form -->
            <div class="p-8">
                @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    
                    <div class="mb-6">
                        <label for="username" class="block text-gray-700 text-sm font-semibold mb-2">
                            Username
                        </label>
                        <input 
                            type="text" 
                            name="username" 
                            id="username" 
                            value="{{ old('username') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            placeholder="Masukkan username"
                            required
                            autofocus
                        >
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">
                            Password
                        </label>
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            placeholder="Masukkan password"
                            required
                        >
                    </div>

                    <button 
                        type="submit" 
                        class="w-full bg-cyan-600 hover:bg-cyan-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200 transform hover:scale-105"
                    >
                        Login
                    </button>
                </form>

                <!-- Demo Credentials -->
                {{-- <div class="mt-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <p class="text-xs text-gray-600 font-semibold mb-2">Demo Credentials:</p>
                    <div class="text-xs text-gray-700 space-y-1">
                        <p><strong>Admin:</strong> admin / password</p>
                        <p><strong>Kasir:</strong> kasir / password</p>
                    </div>
                </div> --}}
            </div>
        </div>

        <p class="text-center text-white text-sm mt-4">
            &copy; {{ date('Y') }} POS System. All rights reserved.
        </p>
    </div>
</body>
</html>