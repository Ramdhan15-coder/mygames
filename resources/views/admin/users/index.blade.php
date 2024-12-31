<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <!-- Button to add new user -->
                    <a href="{{ route('admin.users.create') }}"
                        class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Add New User</a>

                    <!-- Users Table -->
                    <table class="min-w-full mt-6">
                        <thead class="bg-gray-200 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">ID
                                </th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Name</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Email</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Role</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $user->id }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $user->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                        {{ $user->role->nama_role }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                        <a href="{{ route('admin.users.edit', $user->id) }}"
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
