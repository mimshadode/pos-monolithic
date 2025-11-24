@extends('layouts.app')

@section('title', 'Detail Nota')

@section('content')
<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow-lg px-8 py-10">
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center">
                <img class="h-8 w-8 mr-2" src="https://tailwindflex.com/public/images/logos/favicon-32x32.png" alt="Logo" />
                <div class="text-gray-700 font-semibold text-lg">
                    {{ config('app.name', 'Your Company Name') }}
                </div>
            </div>
            <div class="text-gray-700 text-right">
                <div class="font-bold text-xl mb-2">INVOICE</div>
                <div class="text-sm">
                    Tanggal:
                    @isset($nota->tanggal_cetak)
                        {{ $nota->tanggal_cetak->format('d/m/Y') }}
                    @endisset
                </div>
                <div class="text-sm">
                    Invoice #:
                    {{ $nota->kode_nota ?? '-' }}
                </div>
            </div>
        </div>

        <div class="border-b-2 border-gray-300 pb-8 mb-8">
            <h2 class="text-2xl font-bold mb-4">Bill To:</h2>
            <div class="text-gray-700 mb-2">
                {{ $nota->transaksi->pemesanan->pengguna->nama ?? 'Customer' }}
            </div>
            <div class="text-gray-700 mb-2">
                {{ $nota->transaksi->pemesanan->pengguna->email ?? '' }}
            </div>
            @php
                $pembayaran = $nota->transaksi->pembayaran ?? null;
            @endphp
            @if($pembayaran)
            <div class="mt-4 grid grid-cols-2 gap-2 text-sm">
                <div class="text-gray-700">
                    <span class="font-semibold">Metode Pembayaran:</span>
                    <span>{{ $pembayaran->metodePembayaran->nama_metode ?? '-' }}</span>
                </div>
                <div class="text-gray-700 text-right">
                    <span class="font-semibold">Status Pembayaran:</span>
                    <span class="uppercase">{{ $pembayaran->status_pembayaran }}</span>
                </div>
            </div>
            @endif
        </div>

        <table class="w-full text-left mb-8">
            <thead>
                <tr>
                    <th class="text-gray-700 font-bold uppercase py-2">Description</th>
                    <th class="text-gray-700 font-bold uppercase py-2">Quantity</th>
                    <th class="text-gray-700 font-bold uppercase py-2">Price</th>
                    <th class="text-gray-700 font-bold uppercase py-2">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nota->transaksi->pemesanan->items ?? [] as $item)
                <tr>
                    <td class="py-4 text-gray-700">
                        {{ $item->produk->nama_produk ?? 'Produk' }}
                    </td>
                    <td class="py-4 text-gray-700">
                        {{ $item->qty }}
                    </td>
                    <td class="py-4 text-gray-700">
                        Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}
                    </td>
                    <td class="py-4 text-gray-700">
                        Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex justify-end mb-2">
            <div class="text-gray-700 mr-2">Subtotal:</div>
            <div class="text-gray-700">
                Rp {{ number_format($nota->total_transaksi ?? 0, 0, ',', '.') }}
            </div>
        </div>

        <div class="flex justify-end mb-2">
            <div class="text-gray-700 mr-2">Tax:</div>
            <div class="text-gray-700">Rp 0</div>
        </div>

        <div class="flex justify-end mb-8">
            <div class="text-gray-700 mr-2">Total:</div>
            <div class="text-gray-700 font-bold text-xl">
                Rp {{ number_format($nota->total_transaksi ?? 0, 0, ',', '.') }}
            </div>
        </div>

        <div class="border-t-2 border-gray-300 pt-8 mb-8">
            <div class="text-gray-700 mb-2">
                Terima kasih atas transaksi Anda.
            </div>
            <div class="text-gray-700 mb-2">
                Silakan simpan nota ini sebagai bukti pembayaran yang sah.
            </div>
        </div>
    </div>
</div>
@endsection
