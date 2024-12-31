<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <!-- Button to add new kategori -->
                    <a href="{{ route('admin.kategori.create') }}"
                        class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Tambah Kategori</a>

                    <!-- Kategori Table -->
                    <table class="min-w-full mt-6">
                        <thead class="bg-gray-200 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">
                                    ID</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Nama</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Deskripsi</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Gambar</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800">
                            @foreach ($kategoris as $kategori)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $kategori->id }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $kategori->nama }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $kategori->deskripsi }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                        @if ($kategori->image)
                                            <img src="{{ asset('storage/' . $kategori->image) }}" alt="Image"
                                                class="w-16 h-16 object-cover">
                                        @else
                                            <span class="text-gray-500">Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                        <a href="{{ route('admin.kategori.edit', $kategori->id) }}"
                                            class="text-blue-500 hover:text-blue-700">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>