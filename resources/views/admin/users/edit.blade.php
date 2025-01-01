<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <!-- Form for editing user -->
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="space-y-4">
                            <!-- Name -->
                            <div class="mb-4">
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                                <input type="text" name="name" id="name"
                                    value="{{ old('name', $user->name) }}"
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    required>
                            </div>

                            <!-- Email -->
                            <div class="mb-4">
                                <label for="email"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                                <input type="email" name="email" id="email"
                                    value="{{ old('email', $user->email) }}"
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    required>
                            </div>

                            <!-- Password -->
                            <div class="mb-4">
                                <label for="password"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                                <input type="password" name="password" id="password"
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>

                            <!-- Role -->
                            <div class="mb-4">
                                <label for="role_id"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Role</label>
                                <select name="role_id" id="role_id"
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    required>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ $role->id == old('role_id', $user->role_id) ? 'selected' : '' }}>
                                            {{ $role->nama_role }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="mb-4">
                                <button type="submit"
                                    class="mt-4 w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Update
                                    User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
