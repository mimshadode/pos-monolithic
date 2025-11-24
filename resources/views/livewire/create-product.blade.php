
    @if ($successMessage)
        <div class="mb-4 rounded-md bg-green-100 px-4 py-3 text-sm text-green-800">
            {{ $successMessage }}
        </div>
    @endif

    <form wire:submit.prevent="createProduct">
            <!-- Kode Produk -->
            <div class="mb-4">
              <label for="productCode" class="block text-sm font-medium text-gray-700">
                Kode Produk <span class="text-red-500">*</span>
              </label>
              <input type="text"
                     id="productCode"
                     wire:model.defer="kode_produk"
                     required 
                     class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm"
                     placeholder="Contoh: PRD001">
              @error('kode_produk')
                <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </div>
            
            <!-- Nama Produk -->
            <div class="mb-4">
              <label for="productName" class="block text-sm font-medium text-gray-700">
                Nama Produk <span class="text-red-500">*</span>
              </label>
              <input type="text"
                     id="productName"
                     wire:model.defer="nama_produk"
                     required 
                     class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm"
                     placeholder="Masukkan nama produk">
              @error('nama_produk')
                <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </div>
            
            <!-- Harga dan Stok -->
            <div class="grid grid-cols-2 gap-4 mb-4">
              <!-- Harga -->
              <div>
                <label for="productPrice" class="block text-sm font-medium text-gray-700">
                  Harga <span class="text-red-500">*</span>
                </label>
                <input type="number"
                       id="productPrice"
                       wire:model.defer="harga"
                       required 
                       min="0"
                       step="0.01"
                       class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm"
                       placeholder="0">
                @error('harga')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
              </div>
              
              <!-- Stok -->
              <div>
                <label for="productStock" class="block text-sm font-medium text-gray-700">
                  Stok <span class="text-red-500">*</span>
                </label>
                <input type="number"
                       min="0"
                       id="productStock"
                       wire:model.defer="stok"
                       required 
                       class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm"
                       placeholder="0">
                @error('stok')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
              </div>
            </div>
            
            <!-- Kategori -->
            <div class="mb-4">
              <label for="productCategory" class="block text-sm font-medium text-gray-700">
                Kategori <span class="text-red-500">*</span>
              </label>
              <select id="productCategory"
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
            
            <!-- Deskripsi -->
            <div class="mb-4">
              <label for="productDescription" class="block text-sm font-medium text-gray-700">
                Deskripsi
              </label>
              <textarea id="productDescription"
                        wire:model.defer="deskripsi"
                        rows="3" 
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm"
                        placeholder="Masukkan deskripsi produk (opsional)"></textarea>
              @error('deskripsi')
                <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </div>
            
            <!-- Tombol -->
            <div class="flex justify-end">
              <button type="button" 
                      @click="closeProductModal()" 
                      class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg mr-2">
                Batal
              </button>
              <button type="submit" 
                      class="bg-cyan-500 hover:bg-cyan-600 text-white font-bold py-2 px-4 rounded-lg">
                Simpan Produk
              </button>
            </div>
          </form>

