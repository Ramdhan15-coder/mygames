<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Kupon') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('kupon.update', $kupon->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="kode" class="block text-gray-700">Kode</label>
                            <input type="text" name="kode" id="kode" class="form-input w-full" value="{{ $kupon->kode }}">
                            @error('kode') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="diskon" class="block text-gray-700">Diskon (%)</label>
                            <input type="number" name="diskon" id="diskon" class="form-input w-full" value="{{ $kupon->diskon }}">
                            @error('diskon') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                        </div>
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Perbarui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
