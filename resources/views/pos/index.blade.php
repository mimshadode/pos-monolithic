<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>POS - Kasir</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <style>
        .glass { backdrop-filter: blur(10px); background: rgba(0,0,0,0.3); }
        @media print { .hide-print { display: none !important; } }
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
    </style>
</head>
<body class="bg-blue-gray-50" x-data="posApp()" x-init="loadProducts()">
    
    <div class="hide-print flex flex-row h-screen antialiased text-blue-gray-800">
        <!-- Sidebar -->
        <div class="flex flex-row w-auto flex-shrink-0 pl-4 pr-2 py-4">
            <div class="flex flex-col items-center py-4 flex-shrink-0 w-20 bg-cyan-500 rounded-3xl">
                <a href="{{ route('pos.index') }}" class="flex items-center justify-center h-12 w-12 bg-cyan-50 text-cyan-700 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </a>
                
                <ul class="flex flex-col space-y-2 mt-12">
                    <li>
                        <a href="{{ route('pos.index') }}" class="flex items-center">
                            <span class="flex items-center justify-center h-12 w-12 rounded-2xl bg-cyan-300 shadow-lg text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('transaksi.index') }}" class="flex items-center">
                            <span class="flex items-center justify-center text-cyan-100 hover:bg-cyan-400 h-12 w-12 rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </span>
                        </a>
                    </li>
                    @if(in_array('admin', session('pengguna_roles', [])))
                    <li>
                        <a href="{{ route('products.index') }}" class="flex items-center">
                            <span class="flex items-center justify-center text-cyan-100 hover:bg-cyan-400 h-12 w-12 rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </span>
                        </a>
                    </li>
                    @endif
                </ul>
                
                <form action="{{ route('logout') }}" method="POST" class="mt-auto">
                    @csrf
                    <button type="submit" class="flex items-center justify-center text-cyan-200 hover:text-cyan-100 h-10 w-10 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <!-- Products Area -->
        <div class="flex-grow flex">
            <div class="flex flex-col bg-blue-gray-50 h-full w-full py-4">
                <div class="flex px-2 flex-row relative">
                    <div class="absolute left-5 top-3 px-2 py-2 rounded-full bg-cyan-500 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" x-model="keyword" class="bg-white rounded-3xl shadow text-lg w-full h-16 py-4 pl-16 transition-shadow focus:shadow-2xl focus:outline-none" placeholder="Cari produk...">
                </div>
                
                <div class="h-full overflow-hidden mt-4">
                    <div class="h-full overflow-y-auto px-2">
                        <div x-show="loading" class="flex justify-center items-center h-full">
                            <div class="text-center">
                                <svg class="animate-spin h-12 w-12 text-cyan-500 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <p class="mt-4 text-gray-600">Loading products...</p>
                            </div>
                        </div>
                        
                        <div x-show="!loading && filteredProducts().length === 0 && keyword.length > 0" class="select-none bg-blue-gray-100 rounded-3xl flex flex-wrap content-center justify-center h-full opacity-25">
                            <div class="w-full text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                <p class="text-xl">TIDAK ADA HASIL<br/>"<span x-text="keyword"></span>"</p>
                            </div>
                        </div>
                        
                        <div x-show="!loading && filteredProducts().length > 0" class="grid grid-cols-4 gap-4 pb-3">
                            <template x-for="product in filteredProducts()" :key="product.id">
                                <div @click="addToCart(product)" class="select-none cursor-pointer transition-shadow overflow-hidden rounded-2xl bg-white shadow hover:shadow-lg">
                                    <img :src="product.image" :alt="product.name" class="w-full h-32 object-cover">
                                    <div class="flex pb-3 px-3 text-sm -mt-3">
                                        <p class="flex-grow truncate mr-1" x-text="product.name"></p>
                                        <p class="nowrap font-semibold" x-text="formatPrice(product.price)"></p>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cart Sidebar -->
            <div class="w-5/12 flex flex-col bg-blue-gray-50 h-full bg-white pr-4 pl-2 py-4">
                <div class="bg-white rounded-3xl flex flex-col h-full shadow">
                    <div x-show="cart.length === 0" class="flex-1 w-full p-4 opacity-25 select-none flex flex-col flex-wrap content-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <p>KERANJANG KOSONG</p>
                    </div>

                    <div x-show="cart.length > 0" class="flex-1 flex flex-col overflow-auto">
                        <div class="h-16 text-center flex justify-center">
                            <div class="pl-8 text-left text-lg py-4 relative">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <div x-show="getItemsCount() > 0" class="text-center absolute bg-cyan-500 text-white w-5 h-5 text-xs p-0 leading-5 rounded-full -right-2 top-3" x-text="getItemsCount()"></div>
                            </div>
                            <div class="flex-grow px-8 text-right text-lg py-4 relative">
                                <button @click="clearCart()" class="text-blue-gray-300 hover:text-pink-500 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="flex-1 w-full px-4 overflow-auto">
                            <template x-for="item in cart" :key="item.id">
                                <div class="select-none mb-3 bg-blue-gray-50 rounded-lg w-full text-blue-gray-700 py-2 px-2 flex justify-center">
                                    <img :src="item.image" alt="" class="rounded-lg h-10 w-10 bg-white shadow mr-2">
                                    <div class="flex-grow">
                                        <h5 class="text-sm" x-text="item.name"></h5>
                                        <p class="text-xs block" x-text="formatPrice(item.price)"></p>
                                    </div>
                                    <div class="py-1">
                                        <div class="w-28 grid grid-cols-3 gap-2 ml-2">
                                            <button @click="updateQty(item, -1)" class="rounded-lg text-center py-1 text-white bg-blue-gray-600 hover:bg-blue-gray-700 focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-3 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                                </svg>
                                            </button>
                                            <input x-model.number="item.qty" type="text" class="bg-white rounded-lg text-center shadow focus:outline-none focus:shadow-lg text-sm" readonly>
                                            <button @click="updateQty(item, 1)" class="rounded-lg text-center py-1 text-white bg-blue-gray-600 hover:bg-blue-gray-700 focus:outline-none">
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

                    <div class="select-none h-auto w-full text-center pt-3 pb-4 px-4">
                        <div class="flex mb-3 text-lg font-semibold text-blue-gray-700">
                            <div>TOTAL</div>
                            <div class="text-right w-full" x-text="formatPrice(getTotalPrice())"></div>
                        </div>
                        <div x-show="isCashSelected()" class="mb-3 text-blue-gray-700 px-3 pt-2 pb-3 rounded-lg bg-blue-gray-50">
                            <div class="flex text-lg font-semibold">
                                <div class="flex-grow text-left">TUNAI</div>
                                <div class="flex text-right">
                                    <div class="mr-2">Rp</div>
                                    <input x-model="cash" @input="cash = $event.target.value.replace(/\D/g, '')" type="text" class="w-28 text-right bg-white shadow rounded-lg focus:bg-white focus:shadow-lg px-2 focus:outline-none">
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="grid grid-cols-3 gap-2 mt-2">
                                <template x-for="money in [10000, 20000, 50000, 100000, 200000, 500000]">
                                    <button @click="cash = parseInt(cash || 0) + money" class="bg-white rounded-lg shadow hover:shadow-lg focus:outline-none inline-block px-2 py-1 text-sm" x-text="'+' + formatNumber(money)"></button>
                                </template>
                            </div>
                        </div>
                        <div class="mb-3 text-blue-gray-700 px-3 pt-2 pb-3 rounded-lg bg-blue-gray-50">
                            <div class="flex text-lg font-semibold mb-2">
                                <div class="flex-grow text-left">Metode Pembayaran</div>
                            </div>
                            <select
                                x-model="selectedPaymentMethod"
                                class="w-full bg-white shadow rounded-lg px-3 py-2 focus:outline-none focus:shadow-lg text-left"
                            >
                                <option value="">-- Pilih Metode Pembayaran --</option>
                                <template x-for="method in paymentMethods" :key="method.id">
                                    <option :value="method.id" x-text="method.name"></option>
                                </template>
                            </select>
                        </div>
                        <div x-show="isCashSelected() && getChange() > 0" class="flex mb-3 text-lg font-semibold bg-cyan-50 text-blue-gray-700 rounded-lg py-2 px-3">
                            <div class="text-cyan-800">KEMBALIAN</div>
                            <div class="text-right flex-grow text-cyan-600" x-text="formatPrice(getChange())"></div>
                        </div>
                        <div x-show="isCashSelected() && getChange() < 0" class="flex mb-3 text-lg font-semibold bg-pink-100 text-blue-gray-700 rounded-lg py-2 px-3">
                            <div class="text-right flex-grow text-pink-600" x-text="formatPrice(getChange())"></div>
                        </div>
                        <button @click="submitOrder()" :disabled="!canSubmit()" :class="canSubmit() ? 'bg-cyan-500 hover:bg-cyan-600' : 'bg-blue-gray-200 cursor-not-allowed'" class="text-white rounded-2xl text-lg w-full py-3 focus:outline-none">
                            PROSES TRANSAKSI
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Result Modal (Success / Failure) -->
    <div
        x-show="showResultModal"
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
    >
        <div class="bg-white rounded-lg shadow-2xl w-11/12 md:w-1/2 max-w-lg">
            <div class="flex items-center justify-between px-4 py-3 border-b">
                <h2 class="text-lg font-semibold" x-text="resultSuccess ? 'Transaksi Berhasil' : 'Transaksi Gagal'"></h2>
                <button
                    type="button"
                    class="text-gray-500 hover:text-gray-700"
                    @click="closeResultModal()"
                >
                    ✕
                </button>
            </div>
            <div class="px-4 py-4">
                <p class="text-gray-700" x-text="resultMessage"></p>

                <template x-if="resultSuccess && resultKodeNota">
                    <div class="mt-4 text-sm text-gray-600">
                        <span class="font-semibold">Kode Nota: </span>
                        <span x-text="resultKodeNota"></span>
                    </div>
                </template>
            </div>
            <div class="px-4 py-3 border-t flex justify-end space-x-2">
                <button
                    type="button"
                    class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300"
                    @click="closeResultModal()"
                >
                    Tutup
                </button>
                <template x-if="resultSuccess && resultKodeNota">
                    <div class="flex space-x-2">
                        <button
                            type="button"
                            class="px-4 py-2 rounded-lg bg-cyan-500 text-white hover:bg-cyan-600"
                            @click="openNotaModal(resultKodeNota)"
                        >
                            Tampilkan Nota
                        </button>
                        <button
                            type="button"
                            class="px-4 py-2 rounded-lg bg-teal-500 text-white hover:bg-teal-600"
                            @click="printNota(resultKodeNota)"
                        >
                            Cetak Nota
                        </button>
                    </div>
                </template>
            </div>
        </div>
    </div>

    <!-- Nota Modal -->
    <div
        x-show="showNotaModal"
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
    >
        <div class="bg-white rounded-lg shadow-2xl w-11/12 md:w-3/4 lg:w-1/2 h-5/6 flex flex-col overflow-hidden">
            <div class="flex items-center justify-between px-4 py-2 border-b">
                <h2 class="text-lg font-semibold text-gray-800">Nota Transaksi</h2>
                <button
                    type="button"
                    class="text-gray-500 hover:text-gray-700"
                    @click="closeNotaModal()"
                >
                    ✕
                </button>
            </div>
            <div class="flex-1 bg-gray-100">
                <iframe
                    x-show="notaIframeSrc"
                    :src="notaIframeSrc"
                    class="w-full h-full border-0"
                    title="Nota"
                ></iframe>
            </div>
        </div>
    </div>

    <script>
    function posApp() {
        return {
            products: [],
            cart: [],
            keyword: '',
            cash: 0,
            paymentMethods: @json($metodePembayaran->map(fn($m) => ['id' => $m->id_metode_pembayaran, 'name' => $m->nama_metode])),
            selectedPaymentMethod: '',
            cashMethodId: {{ $cashMethodId ?? 'null' }},
            showResultModal: false,
            resultSuccess: false,
            resultMessage: '',
            resultKodeNota: null,
            showNotaModal: false,
            notaIframeSrc: '',
            loading: true,

            async loadProducts() {
                try {
                    const response = await fetch('{{ route("pos.products") }}');
                    this.products = await response.json();
                } catch (error) {
                    console.error('Error loading products:', error);
                    alert('Gagal memuat produk');
                } finally {
                    this.loading = false;
                }
            },

            filteredProducts() {
                if (!this.keyword) return this.products;
                const search = this.keyword.toLowerCase();
                return this.products.filter(p => 
                    p.name.toLowerCase().includes(search) ||
                    p.kode.toLowerCase().includes(search)
                );
            },

            addToCart(product) {
                const existing = this.cart.find(item => item.id === product.id);
                if (existing) {
                    if (existing.qty < product.stock) {
                        existing.qty++;
                    } else {
                        alert('Stok tidak mencukupi');
                    }
                } else {
                    this.cart.push({
                        id: product.id,
                        name: product.name,
                        price: product.price,
                        qty: 1,
                        stock: product.stock,
                        image: product.image
                    });
                }
            },

            updateQty(item, change) {
                const newQty = item.qty + change;
                if (newQty <= 0) {
                    this.cart = this.cart.filter(i => i.id !== item.id);
                } else if (newQty <= item.stock) {
                    item.qty = newQty;
                } else {
                    alert('Stok tidak mencukupi');
                }
            },

            clearCart() {
                if (confirm('Hapus semua item dari keranjang?')) {
                    this.cart = [];
                    this.cash = 0;
                }
            },

            getTotalPrice() {
                return this.cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
            },

            getItemsCount() {
                return this.cart.reduce((sum, item) => sum + item.qty, 0);
            },

            getChange() {
                return parseInt(this.cash || 0) - this.getTotalPrice();
            },

            isCashSelected() {
                if (!this.cashMethodId) {
                    return false;
                }

                return Number(this.selectedPaymentMethod) === Number(this.cashMethodId);
            },

            canSubmit() {
                if (!this.selectedPaymentMethod || this.cart.length === 0) {
                    return false;
                }

                if (this.isCashSelected()) {
                    return this.getChange() >= 0;
                }

                return true;
            },

            openNotaModal(kodeNota) {
                this.notaIframeSrc = '{{ route('pos.nota.show', ['kode_nota' => '__KODE__']) }}'.replace('__KODE__', kodeNota);
                this.showNotaModal = true;
            },

            closeNotaModal() {
                this.showNotaModal = false;
                this.notaIframeSrc = '';
            },

            openResultModal(success, message, kodeNota = null) {
                this.resultSuccess = success;
                this.resultMessage = message;
                this.resultKodeNota = kodeNota;
                this.showResultModal = true;
            },

            closeResultModal() {
                this.showResultModal = false;
            },

            printNota(kodeNota) {
                const url = '{{ route('pos.nota.show', ['kode_nota' => '__KODE__']) }}'.replace('__KODE__', kodeNota);
                window.open(url, '_blank');
            },

            async submitOrder() {
                if (!this.canSubmit()) return;

                // Check if user is logged in
                if (!document.querySelector('meta[name="csrf-token"]')) {
                    alert('Session expired. Silakan login kembali.');
                    window.location.href = '/login';
                    return;
                }

                const items = this.cart.map(item => ({
                    id_produk: item.id,
                    qty: item.qty,
                    catatan: null
                }));

                try {
                    // Create order
                    const orderResponse = await fetch('/api/pemesanan', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        },
                        credentials: 'same-origin',
                        body: JSON.stringify({ items })
                    });

                    if (!orderResponse.ok) {
                        const errorData = await orderResponse.json();
                        throw new Error(errorData.message || 'Gagal membuat pesanan');
                    }

                    const orderData = await orderResponse.json();
                    if (!orderData.success) throw new Error(orderData.message);

                    const isCash = this.isCashSelected();
                    const amountPaid = isCash ? this.cash : this.getTotalPrice();
                    const selectedMethod = this.paymentMethods.find(
                        method => Number(method.id) === Number(this.selectedPaymentMethod)
                    );

                    // Create payment
                    const paymentResponse = await fetch('/api/pembayaran', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        },
                        credentials: 'same-origin',
                        body: JSON.stringify({
                            id_pemesanan: orderData.data.id_pemesanan,
                            id_metode_pembayaran: this.selectedPaymentMethod,
                            jumlah_dibayar: amountPaid,
                            keterangan: selectedMethod ? `Pembayaran ${selectedMethod.name}` : 'Pembayaran'
                        })
                    });

                    if (!paymentResponse.ok) {
                        const errorData = await paymentResponse.json();
                        throw new Error(errorData.message || 'Gagal memproses pembayaran');
                    }

                    const paymentData = await paymentResponse.json();
                    if (!paymentData.success) throw new Error(paymentData.message);

                    const kodeNota = paymentData.data.transaksi?.nota?.kode_nota ?? null;

                    this.openResultModal(true, 'Transaksi berhasil diproses.', kodeNota);

                    this.cart = [];
                    this.cash = 0;
                    this.loadProducts();

                } catch (error) {
                    console.error('Error:', error);

                    // Check if it's authentication error
                    if (error.message.includes('terautentikasi') || error.message.includes('401')) {
                        this.openResultModal(false, 'Session expired. Silakan login kembali.');
                        window.location.href = '/login';
                    } else {
                        this.openResultModal(false, 'Gagal memproses transaksi: ' + error.message);
                    }
                }
            },

            formatPrice(value) {
                return 'Rp ' + this.formatNumber(value);
            },

            formatNumber(value) {
                return new Intl.NumberFormat('id-ID').format(value);
            }
        }
    }
    </script>
</body>
</html>
