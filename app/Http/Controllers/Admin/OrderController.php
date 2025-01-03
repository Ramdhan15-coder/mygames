<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Produk;
use App\Models\Kupon;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('payment')->paginate(10);
        return view('admin.order.index', compact('orders'));
    }

    public function create(Request $request)
    {
        $kategori_id = $request->get('kategori_id');
        $produks = Produk::where('kategori_id', $kategori_id)->get();
        return view('order.create', compact('produks', 'kategori_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'akun_game' => 'required|string',
            'produk_id' => 'required|exists:produks,id',
            'quantity' => 'required|integer|min:1',
            'bukti_pembayaran' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        $produk = Produk::find($request->produk_id);
        $total_harga = $produk->harga * $request->quantity;

        $diskon = 0;
        $final_harga = $total_harga;

        if ($request->kupon) {
            $kupon = Kupon::where('kode', $request->kupon)->first();
            if ($kupon) {
                $diskon = $kupon->diskon;
                $final_harga = $total_harga - ($total_harga * $diskon / 100);
            }
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'kategori_id' => $produk->kategori_id,
            'produk_id' => $produk->id,
            'akun_game' => $request->akun_game,
            'quantity' => $request->quantity,
            'total_harga' => $total_harga,
            'kupon' => $request->kupon,
            'diskon' => $diskon,
            'final_harga' => $final_harga,
        ]);

        $path = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');

        Payment::create([
            'order_id' => $order->id,
            'bukti_pembayaran' => $path,
            'status' => 'Terbayar',
        ]);

        return redirect()->route('order.create')->with('success', 'Pesanan berhasil dibuat.');
    }

    public function updateStatus(Request $request, $id)
    {
        $payment = Payment::where('order_id', $id)->firstOrFail();

        $request->validate([
            'status' => 'required|in:Terbayar,Pending,Cancelled,Berhasil',
        ]);

        $payment->status = $request->status;
        $payment->save();

        return redirect()->route('order.index')->with('success', 'Status pembayaran berhasil diperbarui.');
    }
}
