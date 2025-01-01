<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('produk.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="kategori_id"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Kategori</label>
                            <select id="kategori_id" name="kategori_id" required
                                class="block w-full mt-1 rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="produk"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Produk</label>
                            <input type="text" id="produk" name="produk" required
                                class="block w-full mt-1 rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        </div>
                        <div class="mb-4">
                            <label for="satuan"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Satuan</label>
                            <input type="text" id="satuan" name="satuan" required
                                class="block w-full mt-1 rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        </div>
                        <div>
                            <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                            <input type="number" name="harga" id="harga" step="0.01"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="stok" class="block text-sm font-medium text-gray-700">Stok</label>
                            <input type="number" name="stok" id="stok"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <button type="submit"
                            class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
