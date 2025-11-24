@extends('layouts.app')

@section('title', 'Riwayat Transaksi')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Riwayat Transaksi</h1>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode Transaksi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Metode Bayar</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nota</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($transaksi as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->kode_transaksi }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->tanggal_transaksi->format('d/m/Y H:i') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->pembayaran->metodePembayaran->nama_metode ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($item->status_transaksi === 'selesai')
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                        @elseif($item->status_transaksi === 'pending')
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                        @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Batal</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        @if($item->nota)
                        <button
                            type="button"
                            class="text-cyan-600 font-medium hover:underline"
                            onclick="openNotaModal('{{ $item->nota->kode_nota }}')"
                        >
                            {{ $item->nota->kode_nota }}
                        </button>
                        @else
                        -
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada transaksi</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        <div class="px-6 py-4">
            {{ $transaksi->links() }}
        </div>
    </div>
</div>

<!-- Nota Modal -->
<div
    id="nota-modal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50"
>
    <div class="bg-white rounded-lg shadow-xl max-w-3xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center px-6 py-4 border-b">
            <h2 class="text-lg font-semibold text-gray-800">Detail Nota</h2>
            <button
                type="button"
                class="text-gray-500 hover:text-gray-700"
                onclick="closeNotaModal()"
            >
                ✕
            </button>
        </div>
        <div id="nota-modal-body" class="p-6">
            <p class="text-gray-500">Memuat data nota...</p>
        </div>
    </div>
</div>

@push('scripts')
<script>
    async function openNotaModal(idNota) {
        const modal = document.getElementById('nota-modal');
        const body = document.getElementById('nota-modal-body');

        body.innerHTML = '<p class="text-gray-500">Memuat data nota...</p>';
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        try {
            const response = await fetch('{{ route('pos.nota.show', ['kode_nota' => '__ID__']) }}'.replace('__ID__', idNota), {
                headers: {
                    'Accept': 'application/json',
                },
            });

            if (!response.ok) {
                let errorMessage = 'Gagal memuat data nota';

                try {
                    const errorBody = await response.json();
                    if (errorBody?.message) {
                        errorMessage = errorBody.message;
                    }
                } catch (_) {
                    // ignore JSON parse error, fallback to default message
                }

                throw new Error(errorMessage);
            }

            const nota = await response.json();
            const pembayaran = nota.transaksi?.pembayaran ?? null;
            const metode = pembayaran?.metode_pembayaran?.nama_metode ?? '-';
            const statusPembayaran = pembayaran?.status_pembayaran ?? '-';

            const items = nota.transaksi?.pemesanan?.items ?? [];
            const total = items.reduce((sum, item) => {
                const qty = Number(item.qty ?? 0);
                const price = Number(item.harga_satuan ?? 0);
                return sum + (qty * price);
            }, 0);

            body.innerHTML = `
                <div class="bg-white rounded-lg px-4 py-4">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <div class="text-gray-700 font-semibold text-lg">{{ config('app.name', 'Your Company Name') }}</div>
                            <div class="text-sm text-gray-500">Kode Nota: ${nota.kode_nota}</div>
                        </div>
                        <div class="text-right text-gray-700 text-sm">
                            <div class="font-bold text-base mb-1">INVOICE</div>
                            <div>Tanggal: ${nota.tanggal_cetak ?? ''}</div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-2 mb-4 text-sm text-gray-700">
                        <div>
                            <span class="font-semibold">Metode Pembayaran:</span>
                            <span>${metode}</span>
                        </div>
                        <div class="text-right">
                            <span class="font-semibold">Status Pembayaran:</span>
                            <span class="uppercase">${statusPembayaran}</span>
                        </div>
                    </div>

                    <table class="w-full text-left mb-4">
                        <thead>
                            <tr>
                                <th class="text-gray-700 font-bold uppercase py-2">Description</th>
                                <th class="text-gray-700 font-bold uppercase py-2">Quantity</th>
                                <th class="text-gray-700 font-bold uppercase py-2">Price</th>
                                <th class="text-gray-700 font-bold uppercase py-2">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${items.map(item => {
                                const qty = Number(item.qty ?? 0);
                                const price = Number(item.harga_satuan ?? 0);
                                const lineTotal = qty * price;

                                return `
                                <tr>
                                    <td class="py-2 text-gray-700">${item.produk?.nama_produk ?? 'Produk'}</td>
                                    <td class="py-2 text-gray-700">${qty}</td>
                                    <td class="py-2 text-gray-700">Rp ${new Intl.NumberFormat('id-ID').format(price)}</td>
                                    <td class="py-2 text-gray-700">Rp ${new Intl.NumberFormat('id-ID').format(lineTotal)}</td>
                                </tr>
                                `;
                            }).join('')}
                        </tbody>
                    </table>

                    <div class="flex justify-end mb-1">
                        <div class="text-gray-700 mr-2">Total:</div>
                        <div class="text-gray-700 font-bold">
                            Rp ${new Intl.NumberFormat('id-ID').format(total)}
                        </div>
                    </div>
                </div>
            `;
        } catch (error) {
            console.error(error);
            body.innerHTML = `<p class="text-red-500">Gagal memuat data nota: ${error.message}</p>`;
        }
    }

    function closeNotaModal() {
        const modal = document.getElementById('nota-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>
@endpush
@endsection
