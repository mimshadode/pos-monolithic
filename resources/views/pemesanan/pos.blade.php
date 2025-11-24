<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tailwind POS</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../css/app.css">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <script src="https://unpkg.com/idb/build/iife/index-min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
  <script src="js/script.js"></script>
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

@media print {
  .hide-print {
    display: none !important;
  }
  .print-area {
    display: block;
  }
}
  
  </style>
</head>
<body class="bg-blue-gray-50" x-data="initApp()" x-init="initDatabase()">
  <!-- noprint-area -->
  <div class="hide-print flex flex-row h-screen antialiased text-blue-gray-800">
    <!-- left sidebar -->
    <div class="flex flex-row w-auto flex-shrink-0 pl-4 pr-2 py-4">
      <div class="flex flex-col items-center py-4 flex-shrink-0 w-20 bg-cyan-500 rounded-3xl">
        <a href="#"
           class="flex items-center justify-center h-12 w-12 bg-cyan-50 text-cyan-700 rounded-full">
          <svg xmlns="http://www.w3.org/2000/svg" width="123.3" height="123.233" viewBox="0 0 32.623 32.605">
            <path d="M15.612 0c-.36.003-.705.01-1.03.021C8.657.223 5.742 1.123 3.4 3.472.714 6.166-.145 9.758.019 17.607c.137 6.52.965 9.271 3.542 11.768 1.31 1.269 2.658 2 4.73 2.57.846.232 2.73.547 3.56.596.36.021 2.336.048 4.392.06 3.162.018 4.031-.016 5.63-.221 3.915-.504 6.43-1.778 8.234-4.173 1.806-2.396 2.514-5.731 2.516-11.846.001-4.407-.42-7.59-1.278-9.643-1.463-3.501-4.183-5.53-8.394-6.258-1.634-.283-4.823-.475-7.339-.46z" fill="#fff"/><path d="M16.202 13.758c-.056 0-.11 0-.16.003-.926.031-1.38.172-1.747.538-.42.421-.553.982-.528 2.208.022 1.018.151 1.447.553 1.837.205.198.415.313.739.402.132.036.426.085.556.093.056.003.365.007.686.009.494.003.63-.002.879-.035.611-.078 1.004-.277 1.286-.651.282-.374.392-.895.393-1.85 0-.688-.066-1.185-.2-1.506-.228-.547-.653-.864-1.31-.977a7.91 7.91 0 00-1.147-.072zM16.22 19.926c-.056 0-.11 0-.16.003-.925.031-1.38.172-1.746.539-.42.42-.554.981-.528 2.207.02 1.018.15 1.448.553 1.838.204.198.415.312.738.4.132.037.426.086.556.094.056.003.365.007.686.009.494.003.63-.002.88-.034.61-.08 1.003-.278 1.285-.652.282-.374.393-.895.393-1.85 0-.688-.066-1.185-.2-1.506-.228-.547-.653-.863-1.31-.977a7.91 7.91 0 00-1.146-.072zM22.468 13.736c-.056 0-.11.001-.161.003-.925.032-1.38.172-1.746.54-.42.42-.554.98-.528 2.207.021 1.018.15 1.447.553 1.837.205.198.415.313.739.401.132.037.426.086.556.094.056.003.364.007.685.009.494.003.63-.002.88-.035.611-.078 1.004-.277 1.285-.651.282-.375.393-.895.393-1.85 0-.688-.065-1.185-.2-1.506-.228-.547-.653-.864-1.31-.977a7.91 7.91 0 00-1.146-.072z" fill="#00dace"/><path d="M9.937 13.736c-.056 0-.11.001-.161.003-.925.032-1.38.172-1.746.54-.42.42-.554.98-.528 2.207.021 1.018.15 1.447.553 1.837.204.198.415.313.738.401.133.037.427.086.556.094.056.003.365.007.686.009.494.003.63-.002.88-.035.61-.078 1.003-.277 1.285-.651.282-.375.393-.895.393-1.85 0-.688-.066-1.185-.2-1.506-.228-.547-.653-.864-1.31-.977a7.91 7.91 0 00-1.146-.072zM16.202 7.59c-.056 0-.11 0-.16.002-.926.032-1.38.172-1.747.54-.42.42-.553.98-.528 2.206.022 1.019.151 1.448.553 1.838.205.198.415.312.739.401.132.037.426.086.556.093.056.003.365.007.686.01.494.002.63-.003.879-.035.611-.079 1.004-.278 1.286-.652.282-.374.392-.895.393-1.85 0-.688-.066-1.185-.2-1.505-.228-.547-.653-.864-1.31-.978a7.91 7.91 0 00-1.147-.071z" fill="#00bcd4"/><g><path d="M15.612 0c-.36.003-.705.01-1.03.021C8.657.223 5.742 1.123 3.4 3.472.714 6.166-.145 9.758.019 17.607c.137 6.52.965 9.271 3.542 11.768 1.31 1.269 2.658 2 4.73 2.57.846.232 2.73.547 3.56.596.36.021 2.336.048 4.392.06 3.162.018 4.031-.016 5.63-.221 3.915-.504 6.43-1.778 8.234-4.173 1.806-2.396 2.514-5.731 2.516-11.846.001-4.407-.42-7.59-1.278-9.643-1.463-3.501-4.183-5.53-8.394-6.258-1.634-.283-4.823-.475-7.339-.46z" fill="#fff"/><path d="M16.202 13.758c-.056 0-.11 0-.16.003-.926.031-1.38.172-1.747.538-.42.421-.553.982-.528 2.208.022 1.018.151 1.447.553 1.837.205.198.415.313.739.402.132.036.426.085.556.093.056.003.365.007.686.009.494.003.63-.002.879-.035.611-.078 1.004-.277 1.286-.651.282-.374.392-.895.393-1.85 0-.688-.066-1.185-.2-1.506-.228-.547-.653-.864-1.31-.977a7.91 7.91 0 00-1.147-.072zM16.22 19.926c-.056 0-.11 0-.16.003-.925.031-1.38.172-1.746.539-.42.42-.554.981-.528 2.207.02 1.018.15 1.448.553 1.838.204.198.415.312.738.4.132.037.426.086.556.094.056.003.365.007.686.009.494.003.63-.002.88-.034.61-.08 1.003-.278 1.285-.652.282-.374.393-.895.393-1.85 0-.688-.066-1.185-.2-1.506-.228-.547-.653-.863-1.31-.977a7.91 7.91 0 00-1.146-.072zM22.468 13.736c-.056 0-.11.001-.161.003-.925.032-1.38.172-1.746.54-.42.42-.554.98-.528 2.207.021 1.018.15 1.447.553 1.837.205.198.415.313.739.401.132.037.426.086.556.094.056.003.364.007.685.009.494.003.63-.002.88-.035.611-.078 1.004-.277 1.285-.651.282-.375.393-.895.393-1.85 0-.688-.065-1.185-.2-1.506-.228-.547-.653-.864-1.31-.977a7.91 7.91 0 00-1.146-.072z" fill="#00dace"/><path d="M9.937 13.736c-.056 0-.11.001-.161.003-.925.032-1.38.172-1.746.54-.42.42-.554.98-.528 2.207.021 1.018.15 1.447.553 1.837.204.198.415.313.738.401.133.037.427.086.556.094.056.003.365.007.686.009.494.003.63-.002.88-.035.61-.078 1.003-.277 1.285-.651.282-.375.393-.895.393-1.85 0-.688-.066-1.185-.2-1.506-.228-.547-.653-.864-1.31-.977a7.91 7.91 0 00-1.146-.072zM16.202 7.59c-.056 0-.11 0-.16.002-.926.032-1.38.172-1.747.54-.42.42-.553.98-.528 2.206.022 1.019.151 1.448.553 1.838.205.198.415.312.739.401.132.037.426.086.556.093.056.003.365.007.686.01.494.002.63-.003.879-.035.611-.079 1.004-.278 1.286-.652.282-.374.392-.895.393-1.85 0-.688-.066-1.185-.2-1.505-.228-.547-.653-.864-1.31-.978a7.91 7.91 0 00-1.147-.071z" fill="#00bcd4"/></g>
          </svg>
        </a>
        <ul class="flex flex-col space-y-2 mt-12">
          <li>
            <a href="#" x-on:click.prevent="activeMenu = 'pos'"
               class="flex items-center">
              <span
                class="flex items-center justify-center h-12 w-12 rounded-2xl"
                x-bind:class="{
                  'hover:bg-cyan-400 text-cyan-100': activeMenu !== 'pos',
                  'bg-cyan-300 shadow-lg text-white': activeMenu === 'pos',
                }"
              >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
              </span>
            </a>
          </li>
          <li>
            <a href="#" x-on:click.prevent="activeMenu = 'reports'; loadTransactions()"
               class="flex items-center">
              <span class="flex items-center justify-center text-cyan-100 hover:bg-cyan-400 h-12 w-12 rounded-2xl"
                x-bind:class="{
                  'hover:bg-cyan-400 text-cyan-100': activeMenu !== 'reports',
                  'bg-cyan-300 shadow-lg text-white': activeMenu === 'reports',
                }">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
              </span>
            </a>
          </li>
          <li>
            <a href="#" x-on:click.prevent="activeMenu = 'orders'"
               class="flex items-center">
              <span class="flex items-center justify-center text-cyan-100 hover:bg-cyan-400 h-12 w-12 rounded-2xl"
                x-bind:class="{
                  'hover:bg-cyan-400 text-cyan-100': activeMenu !== 'orders',
                  'bg-cyan-300 shadow-lg text-white': activeMenu === 'orders',
                }">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m-6-8h6M7 5h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2z" />
                </svg>
              </span>
            </a>
          </li>
          <li>
            <a href="#" x-on:click.prevent="activeMenu = 'products'"
               class="flex items-center">
              <span class="flex items-center justify-center text-cyan-100 hover:bg-cyan-400 h-12 w-12 rounded-2xl"
                x-bind:class="{
                  'hover:bg-cyan-400 text-cyan-100': activeMenu !== 'products',
                  'bg-cyan-300 shadow-lg text-white': activeMenu === 'products',
                }">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
              </span>
            </a>
          </li>
          <li>
            <a href="#" x-on:click.prevent="activeMenu = 'settings'"
               class="flex items-center">
              <span class="flex items-center justify-center text-cyan-100 hover:bg-cyan-400 h-12 w-12 rounded-2xl"
                x-bind:class="{
                  'hover:bg-cyan-400 text-cyan-100': activeMenu !== 'settings',
                  'bg-cyan-300 shadow-lg text-white': activeMenu === 'settings',
                }">
                <svg class="w-6 h-6"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                  <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
              </span>
            </a>
          </li>
        </ul>
        <a
          href="https://github.com/emsifa/tailwind-pos"
          target="_blank"
          class="mt-auto flex items-center justify-center text-cyan-200 hover:text-cyan-100 h-10 w-10 focus:outline-none"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>

    <!-- page content -->
    <div class="flex-grow flex">
      <!-- POS MENU -->
      <div x-show="activeMenu === 'pos'" class="flex flex-col bg-blue-gray-50 h-full w-full py-4">
        <div class="flex px-2 flex-row relative">
          <div class="absolute left-5 top-3 px-2 py-2 rounded-full bg-cyan-500 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>
          <input
            type="text"
            class="bg-white rounded-3xl shadow text-lg full w-full h-16 py-4 pl-16 transition-shadow focus:shadow-2xl focus:outline-none"
            placeholder="Cari menu ..."
            x-model="keyword"
          />
        </div>
        <div class="h-full overflow-hidden mt-4">
          <div class="h-full overflow-y-auto px-2">
            <div
              class="select-none bg-blue-gray-100 rounded-3xl flex flex-wrap content-center justify-center h-full opacity-25"
              x-show="products.length === 0"
            >
              <div class="w-full text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                </svg>
                <p class="text-xl">
                  YOU DON'T HAVE
                  <br/>
                  ANY PRODUCTS TO SHOW
                </p>
              </div>
            </div>
            <div
              class="select-none bg-blue-gray-100 rounded-3xl flex flex-wrap content-center justify-center h-full opacity-25"
              x-show="filteredProducts().length === 0 && keyword.length > 0"
            >
              <div class="w-full text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <p class="text-xl">
                  EMPTY SEARCH RESULT
                  <br/>
                  "<span x-text="keyword" class="font-semibold"></span>"
                </p>
              </div>
            </div>
            <div x-show="filteredProducts().length" class="grid grid-cols-4 gap-4 pb-3">
              <template x-for="product in filteredProducts()" :key="product.id">
                <div
                  role="button"
                  class="select-none cursor-pointer transition-shadow overflow-hidden rounded-2xl bg-white shadow hover:shadow-lg"
                  :title="product.name"
                  x-on:click="addToCart(product)"
                >
                  <img :src="product.image" :alt="product.name">
                  <div class="flex pb-3 px-3 text-sm -mt-3">
                    <p class="flex-grow truncate mr-1" x-text="product.name"></p>
                    <p class="nowrap font-semibold" x-text="priceFormat(product.price)"></p>
                  </div>
                </div>
              </template>
            </div>
          </div>
        </div>
      </div>
      <!-- end of store menu -->

      <!-- right sidebar -->
      <div x-show="activeMenu === 'pos'" class="w-5/12 flex flex-col bg-blue-gray-50 h-full bg-white pr-4 pl-2 py-4">
        <div class="bg-white rounded-3xl flex flex-col h-full shadow">
          <!-- empty cart -->
          <div x-show="cart.length === 0" class="flex-1 w-full p-4 opacity-25 select-none flex flex-col flex-wrap content-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <p>
              CART EMPTY
            </p>
          </div>

          <!-- cart items -->
          <div x-show="cart.length > 0" class="flex-1 flex flex-col overflow-auto">
            <div class="h-16 text-center flex justify-center">
              <div class="pl-8 text-left text-lg py-4 relative">
                <!-- cart icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <div x-show="getItemsCount() > 0" class="text-center absolute bg-cyan-500 text-white w-5 h-5 text-xs p-0 leading-5 rounded-full -right-2 top-3" x-text="getItemsCount()"></div>
              </div>
              <div class="flex-grow px-8 text-right text-lg py-4 relative">
                <!-- trash button -->
                <button x-on:click="clear()" class="text-blue-gray-300 hover:text-pink-500 focus:outline-none">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </svg>
                </button>
              </div>
            </div>

            <div class="flex-1 w-full px-4 overflow-auto">
              <template x-for="item in cart" :key="item.productId">
                <div class="select-none mb-3 bg-blue-gray-50 rounded-lg w-full text-blue-gray-700 py-2 px-2 flex justify-center">
                  <img :src="item.image" alt="" class="rounded-lg h-10 w-10 bg-white shadow mr-2">
                  <div class="flex-grow">
                    <h5 class="text-sm" x-text="item.name"></h5>
                    <p class="text-xs block" x-text="priceFormat(item.price)"></p>
                  </div>
                  <div class="py-1">
                    <div class="w-28 grid grid-cols-3 gap-2 ml-2">
                      <button x-on:click="addQty(item, -1)" class="rounded-lg text-center py-1 text-white bg-blue-gray-600 hover:bg-blue-gray-700 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-3 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                        </svg>
                      </button>
                      <input x-model.number="item.qty" type="text" class="bg-white rounded-lg text-center shadow focus:outline-none focus:shadow-lg text-sm">
                      <button x-on:click="addQty(item, 1)" class="rounded-lg text-center py-1 text-white bg-blue-gray-600 hover:bg-blue-gray-700 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-3 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>
              </template>
            </div>
          </div>
          <!-- end of cart items -->

          <!-- payment info -->
          <div class="select-none h-auto w-full text-center pt-3 pb-4 px-4">
            <div class="flex mb-3 text-lg font-semibold text-blue-gray-700">
              <div>TOTAL</div>
              <div class="text-right w-full" x-text="priceFormat(getTotalPrice())"></div>
            </div>
            <div class="mb-3 text-blue-gray-700 px-3 pt-2 pb-3 rounded-lg bg-blue-gray-50">
              <div class="flex text-lg font-semibold">
                <div class="flex-grow text-left">CASH</div>
                <div class="flex text-right">
                  <div class="mr-2">Rp</div>
                  <input x-bind:value="numberFormat(cash)" x-on:keyup="updateCash($event.target.value)" type="text" class="w-28 text-right bg-white shadow rounded-lg focus:bg-white focus:shadow-lg px-2 focus:outline-none">
                </div>
              </div>
              <hr class="my-2">
              <div class="grid grid-cols-3 gap-2 mt-2">
                <template x-for="money in moneys">
                  <button x-on:click="addCash(money)" class="bg-white rounded-lg shadow hover:shadow-lg focus:outline-none inline-block px-2 py-1 text-sm">+<span x-text="numberFormat(money)"></span></button>
                </template>
              </div>
            </div>
            <div
              x-show="change > 0"
              class="flex mb-3 text-lg font-semibold bg-cyan-50 text-blue-gray-700 rounded-lg py-2 px-3"
            >
              <div class="text-cyan-800">CHANGE</div>
              <div
                class="text-right flex-grow text-cyan-600"
                x-text="priceFormat(change)">
              </div>
            </div>
            <div
              x-show="change < 0"
              class="flex mb-3 text-lg font-semibold bg-pink-100 text-blue-gray-700 rounded-lg py-2 px-3"
            >
              <div
                class="text-right flex-grow text-pink-600"
                x-text="priceFormat(change)">
              </div>
            </div>
            <div
              x-show="change == 0 && cart.length > 0"
              class="flex justify-center mb-3 text-lg font-semibold bg-cyan-50 text-cyan-700 rounded-lg py-2 px-3"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
              </svg>
            </div>
            <button
              class="text-white rounded-2xl text-lg w-full py-3 focus:outline-none"
              x-bind:class="{
                'bg-cyan-500 hover:bg-cyan-600': submitable(),
                'bg-blue-gray-200': !submitable()
              }"
              :disabled="!submitable()"
              x-on:click="submit()"
            >
              SUBMIT
            </button>
          </div>
          <!-- end of payment info -->
        </div>
      </div>
      <!-- end of right sidebar -->

      <!-- OTHER MENUS -->
      <div x-show="activeMenu !== 'pos'" class="flex-grow p-6 h-full">
        <div class="h-full bg-white p-6 rounded-3xl shadow-xl">
          <h1 class="text-3xl font-semibold mb-4 capitalize" x-text="activeMenu"></h1>
          
          <!-- ORDERS MENU -->
          <div x-show="activeMenu === 'orders'">
            <div class="overflow-auto" style="max-height: 80vh;">
              <table class="min-w-full bg-white">
                <thead class="bg-blue-gray-100">
                  <tr>
                    <th class="py-3 px-4 text-left">No</th>
                    <th class="py-3 px-4 text-left">Pelanggan</th>
                    <th class="py-3 px-4 text-left">Tanggal</th>
                    <th class="py-3 px-4 text-left">Total</th>
                    <th class="py-3 px-4 text-left">Status</th>
                    <th class="py-3 px-4 text-left">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <template x-for="order in orders" :key="order.id_pemesanan">
                    <tr class="border-b">
                      <td class="py-3 px-4" x-text="order.id_pemesanan"></td>
                      <td class="py-3 px-4" x-text="order.pengguna?.username || order.pengguna?.nama || 'Tidak diketahui'"></td>
                      <td class="py-3 px-4" x-text="formatDateTime(order.tanggal_pesan)"></td>
                      <td class="py-3 px-4" x-text="priceFormat(order.total_harga || 0)"></td>
                      <td class="py-3 px-4">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold"
                              :class="{
                                'bg-green-100 text-green-700': order.status_pemesanan === 'selesai',
                                'bg-yellow-100 text-yellow-700': order.status_pemesanan === 'diproses',
                                'bg-blue-100 text-blue-700': order.status_pemesanan === 'baru',
                                'bg-red-100 text-red-700': order.status_pemesanan === 'dibatalkan'
                              }"
                              x-text="order.status_pemesanan || '-'"></span>
                      </td>
                      <td class="py-3 px-4">
                        <div class="flex items-center gap-2 text-sm">
                          <button class="text-blue-500 hover:text-blue-700"
                                  @click="openOrderModal(order)">
                            Edit
                          </button>
                          <button class="text-red-500 hover:text-red-700"
                                  @click="deleteOrder(order.id_pemesanan)">
                            Delete
                          </button>
                        </div>
                      </td>
                    </tr>
                  </template>
                  <template x-if="orders.length === 0">
                    <tr>
                      <td colspan="6" class="text-center py-8 text-blue-gray-400">Belum ada pemesanan.</td>
                    </tr>
                  </template>
                </tbody>
              </table>
            </div>
          </div>

          <!-- PRODUCTS MENU -->
          <div x-show="activeMenu === 'products'">
            <div class="flex justify-end mb-4">
              <button @click="openProductModal()" class="bg-cyan-500 hover:bg-cyan-600 text-white font-bold py-2 px-4 rounded-lg">
                + Add Product
              </button>
            </div>
            <div class="overflow-auto" style="max-height: 75vh;">
              <table class="min-w-full bg-white">
                <thead class="bg-blue-gray-100">
                  <tr>
                    <th class="py-3 px-4 text-left">Image</th>
                    <th class="py-3 px-4 text-left">Name</th>
                    <th class="py-3 px-4 text-left">Price</th>
                    <th class="py-3 px-4 text-left">Actions</th>
                  </tr>
                </thead>
                <!-- Server-rendered fallback while Alpine initializes -->
                <tbody x-show="products.length === 0">
                  @foreach ($produk as $product)
                  <tr class="border-b">
                    <td class="py-3 px-4">
                      <img src="{{ $product->gambar ?? 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=880&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D' }}" alt="{{ $product->nama_produk }}" class="h-12 w-12 rounded-lg object-cover">
                    </td>
                    <td class="py-3 px-4">{{ $product->nama_produk }}</td>
                    <td class="py-3 px-4">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                    <td class="py-3 px-4">
                      <button type="button"
                              @click='openProductModal({
                                id: @json($product->id_produk),
                                code: @json($product->kode_produk),
                                name: @json($product->nama_produk),
                                price: @json($product->harga),
                                stock: @json($product->stok),
                                categoryId: @json($product->id_kategori),
                                description: @json($product->deskripsi),
                                image: @json($product->gambar ?? "https://via.placeholder.com/80?text=No+Image")
                              })'
                              class="text-blue-500 hover:text-blue-700 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                          <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                          <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                        </svg>
                      </button>
                      <button
                          type="button"
                          @click="if (confirm('Hapus produk ini?')) window.Livewire.dispatch('delete-product', {{ $product->id_produk }})"
                          class="text-red-500 hover:text-red-700">
                          Hapus
                      </button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <!-- Reactive Alpine list once products are loaded -->
                <tbody x-show="products.length > 0">
                  <template x-for="product in products" :key="product.id">
                    <tr class="border-b">
                      <td class="py-3 px-4">
                        <img :src="product.image" :alt="product.name" class="h-12 w-12 rounded-lg object-cover">
                      </td>
                      <td class="py-3 px-4" x-text="product.name"></td>
                      <td class="py-3 px-4" x-text="priceFormat(product.price)"></td>
                      <td class="py-3 px-4">
                        <button @click="openProductModal(product)" class="text-blue-500 hover:text-blue-700 mr-2">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                          </svg>
                        </button>
                        <button
                            @click="if (confirm('Hapus produk ini?')) window.Livewire.dispatch('delete-product', product.id)"
                            class="text-red-500 hover:text-red-700">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm4 0a1 1 0 012 0v6a1 1 0 11-2 0V8z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </td>
                    </tr>
                  </template>
                </tbody>
              </table>
            </div>
          </div>

          <!-- REPORTS MENU -->
          <div x-show="activeMenu === 'reports'">
            <div class="overflow-auto" style="max-height: 80vh;">
               <table class="min-w-full bg-white">
                <thead class="bg-blue-gray-100">
                  <tr>
                    <th class="py-3 px-4 text-left">Receipt No.</th>
                    <th class="py-3 px-4 text-left">Date</th>
                    <th class="py-3 px-4 text-left">Items</th>
                    <th class="py-3 px-4 text-left">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <template x-for="tx in transactions" :key="tx.id">
                    <tr class="border-b">
                      <td class="py-3 px-4" x-text="tx.receiptNo"></td>
                      <td class="py-3 px-4" x-text="tx.receiptDate"></td>
                      <td class="py-3 px-4" x-text="tx.items.reduce((acc, item) => acc + item.qty, 0)"></td>
                      <td class="py-3 px-4" x-text="priceFormat(tx.total)"></td>
                    </tr>
                  </template>
                   <template x-if="transactions.length === 0">
                    <tr>
                      <td colspan="4" class="text-center py-8 text-blue-gray-400">No transactions yet.</td>
                    </tr>
                  </template>
                </tbody>
              </table>
            </div>
          </div>

          <!-- SETTINGS MENU -->
          <div x-show="activeMenu === 'settings'">
              <div class="max-w-lg">
                <div class="mb-4">
                  <label for="shopName" class="block text-sm font-medium text-gray-700">Shop Name</label>
                  <input type="text" id="shopName" x-model="settings.shopName" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm">
                </div>
                <div class="mb-6">
                  <label for="shopAddress" class="block text-sm font-medium text-gray-700">Shop Address / Receipt Footer</label>
                  <input type="text" id="shopAddress" x-model="settings.shopAddress" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm">
                </div>
                <button @click="saveSettings()" class="bg-cyan-500 hover:bg-cyan-600 text-white font-bold py-2 px-4 rounded-lg">Save Settings</button>

                <hr class="my-8">

                <div>
                    <h3 class="text-lg font-medium text-red-600">Danger Zone</h3>
                    <p class="text-sm text-gray-600 mt-1">These actions are irreversible. Please be certain.</p>
                    <div class="mt-4">
                        <button @click="confirmClearAllData()" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg">Clear All Data</button>
                        <p class="text-xs text-gray-500 mt-1">This will delete all products, transactions, and settings.</p>
                    </div>
                </div>
              </div>
          </div>
        </div>
      </div>

    </div>

    <!-- modal first time -->
    <div x-show="firstTime" class="fixed glass w-full h-screen left-0 top-0 z-10 flex flex-wrap justify-center content-center p-24">
      <div class="w-96 rounded-3xl p-8 bg-white shadow-xl">
        <div class="text-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="inline-block" width="123.3" height="123.233" viewBox="0 0 32.623 32.605">
            <path d="M15.612 0c-.36.003-.705.01-1.03.021C8.657.223 5.742 1.123 3.4 3.472.714 6.166-.145 9.758.019 17.607c.137 6.52.965 9.271 3.542 11.768 1.31 1.269 2.658 2 4.73 2.57.846.232 2.73.547 3.56.596.36.021 2.336.048 4.392.06 3.162.018 4.031-.016 5.63-.221 3.915-.504 6.43-1.778 8.234-4.173 1.806-2.396 2.514-5.731 2.516-11.846.001-4.407-.42-7.59-1.278-9.643-1.463-3.501-4.183-5.53-8.394-6.258-1.634-.283-4.823-.475-7.339-.46z" fill="#fff"/><path d="M16.202 13.758c-.056 0-.11 0-.16.003-.926.031-1.38.172-1.747.538-.42.421-.553.982-.528 2.208.022 1.018.151 1.447.553 1.837.205.198.415.313.739.402.132.036.426.085.556.093.056.003.365.007.686.009.494.003.63-.002.879-.035.611-.078 1.004-.277 1.286-.651.282-.374.392-.895.393-1.85 0-.688-.066-1.185-.2-1.506-.228-.547-.653-.864-1.31-.977a7.91 7.91 0 00-1.147-.072zM16.22 19.926c-.056 0-.11 0-.16.003-.925.031-1.38.172-1.746.539-.42.42-.554.981-.528 2.207.02 1.018.15 1.448.553 1.838.204.198.415.312.738.4.132.037.426.086.556.094.056.003.365.007.686.009.494.003.63-.002.88-.034.61-.08 1.003-.278 1.285-.652.282-.374.393-.895.393-1.85 0-.688-.066-1.185-.2-1.506-.228-.547-.653-.863-1.31-.977a7.91 7.91 0 00-1.146-.072zM22.468 13.736c-.056 0-.11.001-.161.003-.925.032-1.38.172-1.746.54-.42.42-.554.98-.528 2.207.021 1.018.15 1.447.553 1.837.205.198.415.313.739.401.132.037.426.086.556.094.056.003.364.007.685.009.494.003.63-.002.88-.035.611-.078 1.004-.277 1.285-.651.282-.375.393-.895.393-1.85 0-.688-.065-1.185-.2-1.506-.228-.547-.653-.864-1.31-.977a7.91 7.91 0 00-1.146-.072z" fill="#00dace"/><path d="M9.937 13.736c-.056 0-.11.001-.161.003-.925.032-1.38.172-1.746.54-.42.42-.554.98-.528 2.207.021 1.018.15 1.447.553 1.837.204.198.415.313.738.401.133.037.427.086.556.094.056.003.365.007.686.009.494.003.63-.002.88-.035.61-.078 1.003-.277 1.285-.651.282-.375.393-.895.393-1.85 0-.688-.066-1.185-.2-1.506-.228-.547-.653-.864-1.31-.977a7.91 7.91 0 00-1.146-.072zM16.202 7.59c-.056 0-.11 0-.16.002-.926.032-1.38.172-1.747.54-.42.42-.553.98-.528 2.206.022 1.019.151 1.448.553 1.838.205.198.415.312.739.401.132.037.426.086.556.093.056.003.365.007.686.01.494.002.63-.003.879-.035.611-.079 1.004-.278 1.286-.652.282-.374.392-.895.393-1.85 0-.688-.066-1.185-.2-1.505-.228-.547-.653-.864-1.31-.978a7.91 7.91 0 00-1.147-.071z" fill="#00bcd4"/><g><path d="M15.612 0c-.36.003-.705.01-1.03.021C8.657.223 5.742 1.123 3.4 3.472.714 6.166-.145 9.758.019 17.607c.137 6.52.965 9.271 3.542 11.768 1.31 1.269 2.658 2 4.73 2.57.846.232 2.73.547 3.56.596.36.021 2.336.048 4.392.06 3.162.018 4.031-.016 5.63-.221 3.915-.504 6.43-1.778 8.234-4.173 1.806-2.396 2.514-5.731 2.516-11.846.001-4.407-.42-7.59-1.278-9.643-1.463-3.501-4.183-5.53-8.394-6.258-1.634-.283-4.823-.475-7.339-.46z" fill="#fff"/><path d="M16.202 13.758c-.056 0-.11 0-.16.003-.926.031-1.38.172-1.747.538-.42.421-.553.982-.528 2.208.022 1.018.151 1.447.553 1.837.205.198.415.313.739.402.132.036.426.085.556.093.056.003.365.007.686.009.494.003.63-.002.879-.035.611-.078 1.004-.277 1.286-.651.282-.374.392-.895.393-1.85 0-.688-.066-1.185-.2-1.506-.228-.547-.653-.864-1.31-.977a7.91 7.91 0 00-1.147-.072zM16.22 19.926c-.056 0-.11 0-.16.003-.925.031-1.38.172-1.746.539-.42.42-.554.981-.528 2.207.02 1.018.15 1.448.553 1.838.204.198.415.312.738.4.132.037.426.086.556.094.056.003.365.007.686.009.494.003.63-.002.88-.034.61-.08 1.003-.278 1.285-.652.282-.374.393-.895.393-1.85 0-.688-.066-1.185-.2-1.506-.228-.547-.653-.863-1.31-.977a7.91 7.91 0 00-1.146-.072zM22.468 13.736c-.056 0-.11.001-.161.003-.925.032-1.38.172-1.746.54-.42.42-.554.98-.528 2.207.021 1.018.15 1.447.553 1.837.205.198.415.313.739.401.132.037.426.086.556.094.056.003.364.007.685.009.494.003.63-.002.88-.035.611-.078 1.004-.277 1.285-.651.282-.375.393-.895.393-1.85 0-.688-.065-1.185-.2-1.506-.228-.547-.653-.864-1.31-.977a7.91 7.91 0 00-1.146-.072z" fill="#00dace"/><path d="M9.937 13.736c-.056 0-.11.001-.161.003-.925.032-1.38.172-1.746.54-.42.42-.554.98-.528 2.207.021 1.018.15 1.447.553 1.837.204.198.415.313.738.401.133.037.427.086.556.094.056.003.365.007.686.009.494.003.63-.002.88-.035.61-.078 1.003-.277 1.285-.651.282-.375.393-.895.393-1.85 0-.688-.066-1.185-.2-1.506-.228-.547-.653-.864-1.31-.977a7.91 7.91 0 00-1.146-.072zM16.202 7.59c-.056 0-.11 0-.16.002-.926.032-1.38.172-1.747.54-.42.42-.553.98-.528 2.206.022 1.019.151 1.448.553 1.838.205.198.415.312.739.401.132.037.426.086.556.093.056.003.365.007.686.01.494.002.63-.003.879-.035.611-.079 1.004-.278 1.286-.652.282-.374.392-.895.393-1.85 0-.688-.066-1.185-.2-1.505-.228-.547-.653-.864-1.31-.978a7.91 7.91 0 00-1.147-.071z" fill="#00bcd4"/></g>
          </svg>
          <h3 class="text-center text-2xl mb-8">FIRST TIME?</h3>
        </div>
        <div class="text-left">
          <button x-on:click="startWithSampleData()" class="text-left w-full mb-3 rounded-xl bg-blue-gray-500 text-white focus:outline-none hover:bg-cyan-400 px-4 py-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block -mt-1 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
            </svg>
            LOAD SAMPLE DATA
          </button>
          <button x-on:click="startBlank()" class="text-left w-full rounded-xl bg-blue-gray-500 text-white focus:outline-none hover:bg-teal-400 px-4 py-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block -mt-1 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
            </svg>
            LEAVE IT EMPTY
          </button>
        </div>
      </div>
    </div>

    <!-- modal receipt -->
    <div
      x-show="isShowModalReceipt"
      class="fixed w-full h-screen left-0 top-0 z-10 flex flex-wrap justify-center content-center p-24"
    >
      <div
        x-show="isShowModalReceipt"
        class="fixed glass w-full h-screen left-0 top-0 z-0" x-on:click="closeModalReceipt()"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
      ></div>
      <div
        x-show="isShowModalReceipt"
        class="w-96 rounded-3xl bg-white shadow-xl overflow-hidden z-10"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
      >
        <div id="receipt-content" class="text-left w-full text-sm p-6 overflow-auto">
          <div class="text-center">
            <img src="img/receipt-logo.png" alt="Tailwind POS" class="mb-3 w-8 h-8 inline-block">
            <h2 class="text-xl font-semibold" x-text="settings.shopName">TAILWIND POS</h2>
            <p x-text="settings.shopAddress">CABANG KONOHA SELATAN</p>
          </div>
          <div class="flex mt-4 text-xs">
            <div class="flex-grow">No: <span x-text="receiptNo"></span></div>
            <div x-text="receiptDate"></div>
          </div>
          <hr class="my-2">
          <div>
            <table class="w-full text-xs">
              <thead>
                <tr>
                  <th class="py-1 w-1/12 text-center">#</th>
                  <th class="py-1 text-left">Item</th>
                  <th class="py-1 w-2/12 text-center">Qty</th>
                  <th class="py-1 w-3/12 text-right">Subtotal</th>
                </tr>
              </thead>
              <tbody>
                <template x-for="(item, index) in cart" :key="item.productId">
                  <tr>
                    <td class="py-2 text-center" x-text="index+1"></td>
                    <td class="py-2 text-left">
                      <span x-text="item.name"></span>
                      <br/>
                      <small x-text="priceFormat(item.price)"></small>
                    </td>
                    <td class="py-2 text-center" x-text="item.qty"></td>
                    <td class="py-2 text-right" x-text="priceFormat(item.qty * item.price)"></td>
                  </tr>
                </template>
              </tbody>
            </table>
          </div>
          <hr class="my-2">
          <div>
            <div class="flex font-semibold">
              <div class="flex-grow">TOTAL</div>
              <div x-text="priceFormat(getTotalPrice())"></div>
            </div>
            <div class="flex text-xs font-semibold">
              <div class="flex-grow">PAY AMOUNT</div>
              <div x-text="priceFormat(cash)"></div>
            </div>
            <hr class="my-2">
            <div class="flex text-xs font-semibold">
              <div class="flex-grow">CHANGE</div>
              <div x-text="priceFormat(change)"></div>
            </div>
          </div>
        </div>
        <div class="p-4 w-full">
          <button class="bg-cyan-500 text-white text-lg px-4 py-3 rounded-2xl w-full focus:outline-none" x-on:click="printAndProceed()">PROCEED</button>
        </div>
      </div>
    </div>
    
    <!-- Modal Product -->
    <div x-show="showProductModal" class="fixed glass w-full h-screen left-0 top-0 z-10 flex flex-wrap justify-center content-center p-24">
       <div
        x-show="showProductModal"
        class="w-1/3 rounded-3xl bg-white shadow-xl overflow-hidden z-10"
        @click.away="closeProductModal()"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
      >
        <div class="p-6">
          <h2 class="text-2xl font-bold mb-4" x-text="productToEditId ? 'Edit Product' : 'Add Product'"></h2>
          <livewire:create-product />
          <livewire:edit-product />
        </div>
      </div>
    </div>

    <!-- Modal Order -->
    <div x-show="showOrderModal" class="fixed glass w-full h-screen left-0 top-0 z-10 flex flex-wrap justify-center content-center p-24">
      <div
        x-show="showOrderModal"
        class="w-1/3 rounded-3xl bg-white shadow-xl overflow-hidden z-10"
        @click.away="closeOrderModal()"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
      >
        <div class="p-6">
          <h2 class="text-2xl font-bold mb-4">Edit Pemesanan</h2>
          <p class="text-sm text-gray-600 mb-4">Ubah status pemesanan sesuai kebutuhan.</p>
          <form @submit.prevent="saveOrder()">
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700">ID Pemesanan</label>
              <input type="text" class="mt-1 block w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm sm:text-sm" x-model="orderForm.id" disabled>
            </div>
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700">Status</label>
              <select x-model="orderForm.status"
                      class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm">
                <template x-for="status in statusOptions" :key="status">
                  <option :value="status" x-text="status"></option>
                </template>
              </select>
            </div>
            <div class="flex justify-end">
              <button type="button"
                      @click="closeOrderModal()"
                      class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg mr-2">
                Batal
              </button>
              <button type="submit"
                      class="bg-cyan-500 hover:bg-cyan-600 text-white font-bold py-2 px-4 rounded-lg">
                Simpan
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
  <!-- end of noprint-area -->

  <div id="print-area" class="print-area"></div>

  <livewire:delete-product />
  
  <script>
    const serverProducts = @json($produk);
    const serverCategories = @json($kategori ?? []);
    const serverOrders = @json($pemesanan ?? []);
    const firstCategoryId = (serverCategories && serverCategories.length) ? serverCategories[0].id_kategori : '';
    function initApp() {
      return {
        // Data
        products: [],
        orders: serverOrders || [],
        showOrderModal: false,
        orderToEditId: null,
        orderForm: {
          id: '',
          status: 'baru',
        },
        statusOptions: ['baru', 'diproses', 'selesai', 'dibatalkan'],
        defaultProductImage: 'https://via.placeholder.com/80?text=No+Image',
        categories: serverCategories || [],
        firstCategoryId: firstCategoryId,
        keyword: '',
        cart: [],
        cash: 0,
        change: 0,
        moneys: [1000, 2000, 5000, 10000, 20000, 50000, 100000],
        firstTime: false,
        isShowModalReceipt: false,
        receiptNo: '',
        receiptDate: '',
        activeMenu: 'pos',
        transactions: [],
        showProductModal: false,
        productToEditId: null,
        productForm: {
          code: '',
          name: '',
          price: '',
          stock: 0,
          categoryId: firstCategoryId,
          description: '',
          image: ''
        },
        settings: {
          shopName: 'Tailwind POS',
          shopAddress: 'CABANG KONOHA SELATAN'
        },
        db: null,

        // Methods
        async ensureDb() {
          if (this.db) return;
          this.db = await idb.openDB('tailwind-pos', 2, {
            upgrade(db, oldVersion) {
              if (oldVersion < 1) {
                db.createObjectStore('products', { keyPath: 'id', autoIncrement: true });
                db.createObjectStore('txs', { keyPath: 'id', autoIncrement: true });
              }
              if (oldVersion < 2) {
                db.createObjectStore('settings', { keyPath: 'id' });
              }
            }
          });
        },

        async initDatabase() {
          await this.ensureDb();
          await this.loadSettings();
          if (serverProducts.length) {
            await this.syncProductsFromServer();
            await this.loadProducts();
          } else {
            await this.loadProducts();
            if (this.products.length === 0) {
              this.firstTime = true;
            }
          }
        },

        normalizeProduct(raw) {
          const stock = Number(raw.stock ?? raw.stok ?? 0);
          return {
            id: raw.id ?? raw.id_produk ?? raw.id,
            code: raw.code ?? raw.kode_produk ?? '',
            name: raw.name ?? raw.nama_produk ?? '',
            price: Number(raw.price ?? raw.harga ?? 0),
            stock,
            categoryId: raw.categoryId ?? raw.id_kategori ?? '',
            description: raw.description ?? raw.deskripsi ?? '',
            status: raw.status ?? (stock > 0 ? 'tersedia' : 'habis'),
            image: raw.image ?? raw.gambar ?? this.defaultProductImage
          };
        },

        async loadProducts() {
          await this.ensureDb();
          const storedProducts = await this.db.getAll('products');
          this.products = storedProducts.map(product => this.normalizeProduct(product));
        },

        async syncProductsFromServer() {
          if (!serverProducts || serverProducts.length === 0) {
            return;
          }
          await this.ensureDb();
          const normalizedProducts = serverProducts.map(product => this.normalizeProduct(product));
          const tx = this.db.transaction('products', 'readwrite');
          await tx.store.clear();
          normalizedProducts.forEach(product => tx.store.put(product));
          await tx.done;
        },
        
        async loadTransactions() {
          await this.ensureDb();
          this.transactions = await this.db.getAll('txs');
        },
        
        async loadSettings() {
          await this.ensureDb();
          const settings = await this.db.get('settings', 1);
          if (settings) {
            this.settings = settings.data;
          }
        },

        filteredProducts() {
          const keyword = this.keyword.toLowerCase();
          return this.products.filter(p => p.name.toLowerCase().includes(keyword));
        },

        addToCart(product) {
          const index = this.cart.findIndex(item => item.productId === product.id);
          if (index > -1) {
            this.cart[index].qty++;
          } else {
            this.cart.push({
              productId: product.id,
              name: product.name,
              image: product.image,
              price: product.price,
              qty: 1
            });
          }
        },
        
        addQty(item, amount) {
          const index = this.cart.findIndex(i => i.productId === item.productId);
          if (index > -1) {
            this.cart[index].qty += amount;
            if (this.cart[index].qty <= 0) {
              this.cart.splice(index, 1);
            }
          }
        },
        
        updateQty(item) {
            const index = this.cart.findIndex(i => i.productId === item.productId);
            if (index > -1) {
                if(item.qty <= 0 || !Number.isInteger(item.qty)) {
                    this.cart.splice(index, 1);
                }
            }
        },

        getItemsCount() {
          return this.cart.reduce((acc, item) => acc + item.qty, 0);
        },
        
        getTotalPrice() {
          return this.cart.reduce((acc, item) => acc + (item.price * item.qty), 0);
        },

        clear() {
          this.cart = [];
        },

        submitable() {
          return this.cart.length > 0 && this.cash >= this.getTotalPrice();
        },

        submit() {
          const time = new Date();
          this.receiptNo = `TWPOS-KS-${Math.round(time.getTime() / 1000)}`;
          this.receiptDate = time.toLocaleString('en-US', {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit'
          });
          this.isShowModalReceipt = true;
        },

        closeModalReceipt() {
          this.isShowModalReceipt = false;
        },
        
        async printAndProceed() {
          await this.ensureDb();
          const receiptContent = document.getElementById('receipt-content').innerHTML;
          const printArea = document.getElementById('print-area');
          printArea.innerHTML = receiptContent;
          
          await this.db.add('txs', {
            receiptNo: this.receiptNo,
            receiptDate: this.receiptDate,
            total: this.getTotalPrice(),
            items: JSON.parse(JSON.stringify(this.cart))
          });

          window.print();
          this.clear();
          this.cash = 0;
          this.change = 0;
          this.receiptNo = '';
          this.receiptDate = '';
          this.closeModalReceipt();
        },

        async startWithSampleData() {
          await this.syncProductsFromServer();
          await this.loadProducts();
          this.firstTime = false;
        },

        startBlank() {
          this.firstTime = false;
        },

        formatDateTime(value) {
          if (!value) return '-';
          const date = new Date(value);
          if (Number.isNaN(date.getTime())) {
            return value;
          }
          return date.toLocaleString('id-ID', {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit'
          });
        },

        priceFormat(price) {
          return `Rp ${this.numberFormat(price)}`;
        },

        numberFormat(number) {
          return new Intl.NumberFormat('id-ID').format(number);
        },

        updateCash(amount) {
          let sanitized = amount.replace(/[^0-9]/g, '');
          this.cash = sanitized ? parseInt(sanitized, 10) : 0;
          this.change = this.cash - this.getTotalPrice();
        },

        openOrderModal(order) {
          if (!order || !order.id_pemesanan) return;
          this.orderToEditId = order.id_pemesanan;
          this.orderForm = {
            id: order.id_pemesanan,
            status: order.status_pemesanan || 'baru',
          };
          this.showOrderModal = true;
        },

        closeOrderModal() {
          this.showOrderModal = false;
          this.orderToEditId = null;
          this.orderForm = { id: '', status: 'baru' };
        },

        async saveOrder() {
          if (!this.orderToEditId) return;
          try {
            const response = await fetch(`/api/pemesanan/${this.orderToEditId}`, {
              method: 'PUT',
              headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
              },
              body: JSON.stringify({ status_pemesanan: this.orderForm.status }),
            });

            if (!response.ok) {
              const errorBody = await response.json().catch(() => ({}));
              const message = errorBody.message || 'Gagal memperbarui pemesanan.';
              const details = errorBody.errors ? Object.values(errorBody.errors).flat().join(', ') : '';
              throw new Error([message, details].filter(Boolean).join(' '));
            }

            const updated = await response.json();
            this.orders = this.orders.map(order =>
              order.id_pemesanan === updated.id_pemesanan ? { ...order, ...updated } : order
            );
            this.closeOrderModal();
          } catch (error) {
            console.error(error);
            alert(error.message || 'Gagal memperbarui pemesanan.');
          }
        },

        async deleteOrder(id) {
          if (!id) return;
          if (!confirm('Hapus pemesanan ini?')) return;
          try {
            const response = await fetch(`/api/pemesanan/${id}`, {
              method: 'DELETE',
              headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
              },
            });

            if (!response.ok && response.status !== 204) {
              const errorBody = await response.json().catch(() => ({}));
              const message = errorBody.message || 'Gagal menghapus pemesanan.';
              const details = errorBody.errors ? Object.values(errorBody.errors).flat().join(', ') : '';
              throw new Error([message, details].filter(Boolean).join(' '));
            }

            this.orders = this.orders.filter(order => order.id_pemesanan !== id);
          } catch (error) {
            console.error(error);
            alert(error.message || 'Gagal menghapus pemesanan.');
          }
        },

        addCash(amount) {
          this.cash += amount;
          this.change = this.cash - this.getTotalPrice();
        },
        
        // Product CRUD
        openProductModal(product = null) {
          if (product) {
            this.productToEditId = product.id;
            this.productForm = {
              code: product.code || '',
              name: product.name || '',
              price: product.price || 0,
              stock: product.stock ?? 0,
              categoryId: product.categoryId || this.firstCategoryId,
              description: product.description || '',
              image: product.image || ''
            };
          } else {
            this.productToEditId = null;
            this.productForm = {
              code: '',
              name: '',
              price: '',
              stock: 0,
              categoryId: this.firstCategoryId,
              description: '',
              image: ''
            };
          }
          this.showProductModal = true;
        },

        closeProductModal() {
          this.showProductModal = false;
          this.productToEditId = null;
          this.productForm = {
            code: '',
            name: '',
            price: '',
            stock: 0,
            categoryId: this.firstCategoryId,
            description: '',
            image: ''
          };
        },

        buildProductPayload() {
          const stock = Number(this.productForm.stock) || 0;
          const price = Number(this.productForm.price) || 0;
          const categoryId = Number(this.productForm.categoryId) || null;
          return {
            kode_produk: (this.productForm.code || '').trim(),
            nama_produk: this.productForm.name,
            deskripsi: this.productForm.description,
            harga: price,
            stok: stock,
            id_kategori: categoryId,
            status: stock > 0 ? 'tersedia' : 'habis',
          };
        },

        async saveProduct() {
          if (!this.productForm.categoryId) {
            alert('Please choose a category for the product.');
            return;
          }

          const payload = this.buildProductPayload();
          try {
            let response;
            if (this.productToEditId) {
              response = await fetch(`/api/produk/${this.productToEditId}`, {
                method: 'PUT',
                headers: {
                  'Content-Type': 'application/json',
                  'Accept': 'application/json'
                },
                body: JSON.stringify(payload)
              });
            } else {
              response = await fetch('/api/produk', {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/json',
                  'Accept': 'application/json'
                },
                body: JSON.stringify(payload)
              });
            }

            if (!response.ok) {
              const errorBody = await response.json().catch(() => ({}));
              const message = errorBody.message || 'Failed to save product.';
              const details = errorBody.errors ? Object.values(errorBody.errors).flat().join(', ') : '';
              throw new Error([message, details].filter(Boolean).join(' '));
            }

            const savedProduct = await response.json();
            const savedWithImage = { ...savedProduct, image: this.productForm.image };
            const normalized = this.normalizeProduct(savedWithImage);
            await this.ensureDb();
            await this.db.put('products', normalized);
            await this.loadProducts();
            this.closeProductModal();
          } catch (error) {
            console.error(error);
            alert(error.message || 'Unable to save product.');
          }
        },

        async deleteProduct(id) {
          if (confirm('Are you sure you want to delete this product?')) {
            try {
              await this.ensureDb();
              const response = await fetch(`/api/produk/${id}`, {
                method: 'DELETE',
                headers: { 'Accept': 'application/json' }
              });

              if (!response.ok && response.status !== 204) {
                const errorBody = await response.json().catch(() => ({}));
                const serverError = errorBody.errors?.produk?.[0] || '';
                const message = serverError || errorBody.message || 'Failed to delete product.';

                // Jika produk dipakai di pemesanan, nonaktifkan (stok 0, status habis) agar tidak bisa dijual lagi
                if (serverError.toLowerCase().includes('tidak dapat dihapus')) {
                  await this.archiveProduct(id);
                  return;
                }

                const details = !serverError && errorBody.errors ? Object.values(errorBody.errors).flat().join(', ') : '';
                throw new Error([message, details].filter(Boolean).join(' '));
              }

              await this.db.delete('products', id);
              await this.loadProducts();
            } catch (error) {
              console.error(error);
              alert(error.message || 'Unable to delete product.');
            }
          }
        },

        async archiveProduct(id) {
          try {
            await this.ensureDb();
            const response = await fetch(`/api/produk/${id}`, {
              method: 'PUT',
              headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
              },
              body: JSON.stringify({ stok: 0, status: 'habis' }),
            });

            if (!response.ok) {
              const errorBody = await response.json().catch(() => ({}));
              const message = errorBody.message || 'Produk tidak dapat dinonaktifkan.';
              const details = errorBody.errors ? Object.values(errorBody.errors).flat().join(', ') : '';
              throw new Error([message, details].filter(Boolean).join(' '));
            }

            const updated = await response.json();
            const normalized = this.normalizeProduct(updated);
            await this.ensureDb();
            await this.db.put('products', normalized);
            await this.loadProducts();
            alert('Produk dipakai dalam pemesanan. Stok diset 0 dan status diubah menjadi habis.');
          } catch (error) {
            console.error(error);
            alert(error.message || 'Gagal menonaktifkan produk.');
          }
        },
        
        // Settings
        async saveSettings() {
            await this.db.put('settings', { id: 1, data: this.settings });
            alert('Settings saved!');
        },

        async confirmClearAllData() {
            if (confirm('DANGER! This will delete everything including products, transactions, and settings. This action cannot be undone. Are you absolutely sure?')) {
                await this.db.clear('products');
                await this.db.clear('txs');
                await this.db.clear('settings');
                await this.initDatabase();
                alert('All data has been cleared.');
            }
        }
      }
    }
  </script>
</html>
