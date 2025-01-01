<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Kategori') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="nama"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                            <input type="text" id="nama" name="nama" value="{{ $kategori->nama }}"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="deskripsi"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ $kategori->deskripsi }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="image"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gambar</label>
                            <input type="file" id="image" name="image"
                                class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-100 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-gray-200 dark:file:bg-gray-600 file:text-gray-700 dark:file:text-gray-100 hover:file:bg-gray-300">
                            @if ($kategori->image)
                                <img src="{{ asset('storage/' . $kategori->image) }}" alt="Image"
                                    class="w-16 h-16 object-cover mt-2">
                            @endif
                        </div>
                        <button type="submit"
                            class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
