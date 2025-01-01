<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-6">
                <a href="{{ route('role.create') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Role</a>
                @if (session('success'))
                    <div class="alert alert-success text-green-600 mt-4">{{ session('success') }}</div>
                @endif
                <table class="min-w-full mt-6">
                    <thead class="bg-gray-200 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">ID</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">Name
                            </th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">
                                Description</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $role->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $role->nama_role }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $role->deskripsi }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                    <a href="{{ route('role.edit', $role->id) }}" class="text-blue-500">Edit</a>
                                    <form action="{{ route('role.destroy', $role->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
