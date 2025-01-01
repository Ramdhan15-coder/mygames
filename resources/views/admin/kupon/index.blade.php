<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kupon') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <a href="{{ route('kupon.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Tambah Kupon</a>
                    @if (session('success'))
                        <div class="alert alert-success text-green-600 mt-4">{{ session('success') }}</div>
                    @endif
                    <table class="min-w-full mt-6">
                        <thead class="bg-gray-200 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3">ID</th>
                                <th class="px-6 py-3">Kode</th>
                                <th class="px-6 py-3">Diskon (%)</th>
                                <th class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kupons as $kupon)
                                <tr>
                                    <td class="px-6 py-4">{{ $kupon->id }}</td>
                                    <td class="px-6 py-4">{{ $kupon->kode }}</td>
                                    <td class="px-6 py-4">{{ $kupon->diskon }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('kupon.edit', $kupon->id) }}" class="text-blue-500">Edit</a>
                                        <form action="{{ route('kupon.destroy', $kupon->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus kupon ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-6">
                        {{ $kupons->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
