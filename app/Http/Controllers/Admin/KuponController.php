<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kupon;
use Illuminate\Http\Request;

class KuponController extends Controller
{
    public function index()
    {
        $kupons = Kupon::paginate(10);
        return view('admin.kupon.index', compact('kupons'));
    }

    public function create()
    {
        return view('admin.kupon.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255|unique:kupons',
            'diskon' => 'required|numeric|min:0|max:100',
        ]);

        Kupon::create($request->all());

        return redirect()->route('kupon.index')->with('success', 'Kupon berhasil ditambahkan.');
    }

    public function edit(Kupon $kupon)
    {
        return view('admin.kupon.edit', compact('kupon'));
    }

    public function update(Request $request, Kupon $kupon)
    {
        $request->validate([
            'kode' => 'required|string|max:255|unique:kupons,kode,' . $kupon->id,
            'diskon' => 'required|numeric|min:0|max:100',
        ]);

        $kupon->update($request->all());

        return redirect()->route('kupon.index')->with('success', 'Kupon berhasil diperbarui.');
    }

    public function destroy(Kupon $kupon)
    {
        $kupon->delete();

        return redirect()->route('kupon.index')->with('success', 'Kupon berhasil dihapus.');
    }
}
