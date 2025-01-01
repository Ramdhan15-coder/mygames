e<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Role') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('role.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="nama_role">Role Name</label>
                        <input id="nama_role" name="nama_role" type="text" required class="block mt-1 w-full">
                    </div>
                    <div>
                        <label for="deskripsi">Description</label>
                        <textarea id="deskripsi" name="deskripsi" class="block mt-1 w-full"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
