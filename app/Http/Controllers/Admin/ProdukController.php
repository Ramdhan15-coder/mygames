<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
{
    $query = Produk::with('kategori');

    if ($request->has('search') && $request->search) {
        $search = $request->search;
        $query->where('produk', 'LIKE', "%{$search}%");
    }

    $produks = $query->paginate(10);

    return view('admin.produk.index', compact('produks'));
}


    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.produk.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        // Validasi ⬇️
       
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required|string|max:255',
        ]);

        Produk::create([
            'kategori_id' => $request->kategori_id,
            'produk' => $request->produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Produk $produk)
    {
        $kategoris = Kategori::all();
        return view('admin.produk.edit', compact('produk', 'kategoris'));
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required|string|max:255',
        ]);

        $produk->update([
            'kategori_id' => $request->kategori_id,
            'produk' => $request->produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function search(Request $request)
{
    $query = $request->input('query'); // Mengambil input pencarian

    // Mencari produk berdasarkan nama
    $produks = Produk::where('produk', 'like', '%' . $query . '%')->get();

    // Mengembalikan produk dalam bentuk JSON (untuk front-end)
    return response()->json($produks);
}
}
