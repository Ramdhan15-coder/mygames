<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Pesanan') }}
        </h2>
    </x-slot>
    <style>
        /* resources/css/app.css */
        .badge-warning {
            background-color: #f39c12;
        }

        .badge-info {
            background-color: #17a2b8;
        }

        .badge-danger {
            background-color: #dc3545;
        }

        .badge-success {
            background-color: #28a745;
        }

        .badge-secondary {
            background-color: #6c757d;
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    @if (session('success'))
                        <div class="alert alert-success text-green-600 mt-4">{{ session('success') }}</div>
                    @endif
                    <table class="min-w-full mt-6">
                        <thead class="bg-gray-200 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">No
                                </th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Akun Game</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Produk</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Jumlah</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Total Harga</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Status</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $order->akun_game }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                        {{ $order->produk->produk }} {{ $order->produk->satuan }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $order->quantity }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">Rp
                                        {{ number_format($order->final_harga, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                        @if ($order->payment)
                                            <span
                                                class="badge 
                                                    @if ($order->payment->status == 'Terbayar') badge-warning 
                                                    @elseif($order->payment->status == 'Pending') badge-info
                                                    @elseif($order->payment->status == 'Cancelled') badge-danger
                                                    @elseif($order->payment->status == 'Berhasil') badge-success 
                                                    @else badge-secondary @endif">
                                                {{ $order->payment->status }}
                                            </span>
                                        @else
                                            <span class="badge badge-secondary">Belum Dibayar</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                        @if ($order->payment)
                                            <form action="{{ route('order.updateStatus', $order->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('PUT')
                        
                                                <select name="status" class="form-select form-select-sm text-black"
                                                    onchange="this.form.submit()">
                                                    <option value="Pending"
                                                        {{ $order->payment->status == 'Pending' ? 'selected' : '' }}>Pending
                                                    </option>
                                                    <option value="Terbayar"
                                                        {{ $order->payment->status == 'Terbayar' ? 'selected' : '' }}>Terbayar
                                                    </option>
                                                    <option value="Cancelled"
                                                        {{ $order->payment->status == 'Cancelled' ? 'selected' : '' }}>Cancelled
                                                    </option>
                                                    <option value="Berhasil"
                                                        {{ $order->payment->status == 'Berhasil' ? 'selected' : '' }}>Berhasil
                                                    </option>
                                                </select>
                                            </form>
                                        @else
                                            <span class="text-gray-500">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    <div class="mt-6">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
