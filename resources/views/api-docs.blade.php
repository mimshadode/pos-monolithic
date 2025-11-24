<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>POS API Reference</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-slate-950 text-slate-100 min-h-screen font-sans">
        <div class="max-w-6xl mx-auto px-4 py-10">
            <header class="mb-10">
                <p class="text-sm uppercase tracking-widest text-slate-400">POS Monolithic</p>
                <h1 class="text-4xl font-bold mt-2">API Documentation Snapshot</h1>
                <p class="text-slate-400 mt-3 max-w-2xl">
                    Ringkasan endpoint utama yang mendukung modul Produk, Pemesanan, Pembayaran,
                    Transaksi, Nota, dan Laporan. Seluruh endpoint berada di bawah prefix <code>/api</code>.
                </p>
            </header>

            <section class="grid gap-6 md:grid-cols-3 mb-12">
                <article class="bg-slate-900/60 rounded-2xl border border-slate-800 p-6">
                    <p class="text-sm text-slate-400">Manajemen Master</p>
                    <h2 class="text-xl font-semibold mt-2">Produk & Kategori</h2>
                    <p class="text-slate-400 mt-3 text-sm">
                        CRUD penuh untuk produk dengan kategori, stok, dan status.
                    </p>
                    <span class="inline-flex items-center gap-1 text-emerald-400 text-sm mt-4">GET • POST • PUT • DELETE</span>
                </article>
                <article class="bg-slate-900/60 rounded-2xl border border-slate-800 p-6">
                    <p class="text-sm text-slate-400">Operasional</p>
                    <h2 class="text-xl font-semibold mt-2">Pemesanan & Pembayaran</h2>
                    <p class="text-slate-400 mt-3 text-sm">
                        Membuat order, menyimpan item snapshot, dan memproses pembayaran hingga transaksi lunas.
                    </p>
                    <span class="inline-flex items-center gap-1 text-amber-400 text-sm mt-4">Transactional Service Layer</span>
                </article>
                <article class="bg-slate-900/60 rounded-2xl border border-slate-800 p-6">
                    <p class="text-sm text-slate-400">Output</p>
                    <h2 class="text-xl font-semibold mt-2">Nota & Laporan</h2>
                    <p class="text-slate-400 mt-3 text-sm">
                        Cetak nota per transaksi dan susun laporan harian, mingguan, atau bulanan.
                    </p>
                    <span class="inline-flex items-center gap-1 text-sky-400 text-sm mt-4">Snapshot Data</span>
                </article>
            </section>

            <section class="bg-slate-900/80 border border-slate-800 rounded-2xl">
                <div class="px-6 py-4 border-b border-slate-800 flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold">Daftar Endpoint</h3>
                        <p class="text-slate-400 text-sm">Contoh ringkas, jalankan <code>php artisan route:list --path=api</code> untuk versi terbaru.</p>
                    </div>
                    <span class="text-xs uppercase tracking-widest text-slate-400">v1</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-slate-900/60 text-slate-400">
                            <tr>
                                <th class="text-left px-6 py-3 font-semibold">Method</th>
                                <th class="text-left px-6 py-3 font-semibold">URI</th>
                                <th class="text-left px-6 py-3 font-semibold">Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t border-slate-800">
                                <td class="px-6 py-3 font-mono text-emerald-400">GET</td>
                                <td class="px-6 py-3 font-mono">/api/produk</td>
                                <td class="px-6 py-3">Daftar produk lengkap dengan kategori.</td>
                            </tr>
                            <tr class="border-t border-slate-800">
                                <td class="px-6 py-3 font-mono text-amber-400">POST</td>
                                <td class="px-6 py-3 font-mono">/api/pemesanan</td>
                                <td class="px-6 py-3">Buat pemesanan baru dan item snapshot harga.</td>
                            </tr>
                            <tr class="border-t border-slate-800">
                                <td class="px-6 py-3 font-mono text-amber-400">POST</td>
                                <td class="px-6 py-3 font-mono">/api/pembayaran</td>
                                <td class="px-6 py-3">Proses checkout, otomatis membuat transaksi ketika lunas.</td>
                            </tr>
                            <tr class="border-t border-slate-800">
                                <td class="px-6 py-3 font-mono text-emerald-400">GET</td>
                                <td class="px-6 py-3 font-mono">/api/transaksi/{id}</td>
                                <td class="px-6 py-3">Detail transaksi + nota jika tersedia.</td>
                            </tr>
                            <tr class="border-t border-slate-800">
                                <td class="px-6 py-3 font-mono text-emerald-400">GET</td>
                                <td class="px-6 py-3 font-mono">/api/laporan</td>
                                <td class="px-6 py-3">Laporan harian/mingguan/bulanan beserta detail transaksi.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <footer class="mt-12 text-xs text-slate-500 text-center">
                Jalankan <code>php artisan serve</code> lalu konsumsi endpoint via Postman/Bruno.
            </footer>
        </div>
    </body>
</html>
