<div>
    @if ($successMessage)
        <div class="mb-4 rounded-md bg-green-100 px-4 py-3 text-sm text-green-800">
            {{ $successMessage }}
        </div>
    @endif

    <form wire:submit.prevent="updateProduct">
        <div class="mb-4">
            <label for="editProductCode" class="block text-sm font-medium text-gray-700">
                Kode Produk <span class="text-red-500">*</span>
            </label>
            <input type="text"
                   id="editProductCode"
                   wire:model.defer="kode_produk"
                   required
                   class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm">
            @error('kode_produk')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="editProductName" class="block text-sm font-medium text-gray-700">
                Nama Produk <span class="text-red-500">*</span>
            </label>
            <input type="text"
                   id="editProductName"
                   wire:model.defer="nama_produk"
                   required
                   class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm">
            @error('nama_produk')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label for="editProductPrice" class="block text-sm font-medium text-gray-700">
                    Harga <span class="text-red-500">*</span>
                </label>
                <input type="number"
                       id="editProductPrice"
                       wire:model.defer="harga"
                       required
                       min="0"
                       step="0.01"
                       class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm">
                @error('harga')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="editProductStock" class="block text-sm font-medium text-gray-700">
                    Stok <span class="text-red-500">*</span>
                </label>
                <input type="number"
                       id="editProductStock"
                       wire:model.defer="stok"
                       required
                       min="0"
                       class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm">
                @error('stok')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="editProductCategory" class="block text-sm font-medium text-gray-700">
                Kategori <span class="text-red-500">*</span>
            </label>
            <select id="editProductCategory"
                    wire:model.defer="id_kategori"
                    required
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm">
                <option value="">Pilih Kategori</option>
                @foreach ($kategoriList as $kategori)
                    <option value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
            @error('id_kategori')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="editProductDescription" class="block text-sm font-medium text-gray-700">
                Deskripsi
            </label>
            <textarea id="editProductDescription"
                      wire:model.defer="deskripsi"
                      rows="3"
                      class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm"></textarea>
            @error('deskripsi')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit"
                    class="bg-cyan-500 hover:bg-cyan-600 text-white font-bold py-2 px-4 rounded-lg">
                Update Produk
            </button>
        </div>
    </form>
</div>

