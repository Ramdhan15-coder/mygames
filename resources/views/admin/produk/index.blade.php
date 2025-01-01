<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <!-- Button to add new produk -->
                    <a href="{{ route('produk.create') }}"
                        class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Tambah Produk</a>
                    @if (session('success'))
                        <div class="alert alert-success text-green-600 mt-4">{{ session('success') }}</div>
                    @endif
                    <!-- Produk Table -->
                    <table class="min-w-full mt-6">
                        <thead class="bg-gray-200 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">ID
                                </th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Kategori</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Produk</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Satuan</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Harga</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Stok</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800">
                            @foreach ($produks as $produk)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $produk->id }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                        {{ $produk->kategori->nama }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $produk->produk }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $produk->satuan }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $produk->harga }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $produk->stok }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100 flex space-x-4">
                                        <a href="{{ route('produk.edit', $produk->id) }}"
                                            class="text-blue-500 hover:text-blue-700">Edit</a>
                                        <form action="{{ route('produk.destroy', $produk->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this product?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-500 hover:text-red-700">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination Links -->
                    <div class="mt-6">
                        {{ $produks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
