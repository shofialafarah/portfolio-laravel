<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Headline;
use Illuminate\Http\Request;

class HeadlineController extends Controller
{
    public function index()
    {
        $headlines = Headline::orderBy('order')->get();
        return view('admin.headlines.index', compact('headlines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        Headline::create([
            'text' => $request->text,
            'is_active' => 1,
            'order' => Headline::max('order') + 1,
        ]);

        return back()->with('success', 'Headline ditambahkan');
    }

    public function update(Request $request, Headline $headline)
    {
        // MODE TOGGLE
        if ($request->has('toggle')) {

            // ❗ Validasi minimal 1 aktif
            if (
                $headline->is_active &&
                Headline::where('is_active', 1)->count() === 1
            ) {

                return back()->withErrors(
                    'Minimal harus ada 1 headline aktif'
                );
            }

            $headline->update([
                'is_active' => !$headline->is_active
            ]);

            return back();
        }

        // MODE EDIT TEXT
        $request->validate([
            'text' => 'required|string|max:255'
        ]);

        $headline->update($request->only('text'));

        return back();

        $headline->update([
            'text' => $request->text,
            'is_active' => $request->has('is_active'),
            'order' => $request->order,
        ]);

        return back()->with('success', 'Headline diperbarui');
    }

    public function destroy(Headline $headline)
    {
        $headline->delete();
        return back()->with('success', 'Headline dihapus');
    }

    public function reorder(Request $request)
    {
        foreach ($request->ids as $index => $id) {
            Headline::where('id', $id)->update([
                'order' => $index + 1
            ]);
        }

        return response()->json(['success' => true]);
    }
}
