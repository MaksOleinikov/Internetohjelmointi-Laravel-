<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PriceController extends Controller
{
    public function index()
    {
        $prices = Price::all();

        return view('price.index', compact('prices'));
    }

    public function create()
    {
        return view('price.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'price'  => 'required',
            'kuvaus' => 'required',
            'image'  => 'nullable|image|max:10240',
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('prices', 'public');
        }
        unset($data['image']);

        Price::create($data);

        return redirect()->route('price.index')->with('success', 'Lisäys onnistui');
    }

    public function show(Price $price)
    {
        return view('price.show', compact('price'));
    }

    public function edit(Price $price)
    {
        return view('price.edit', compact('price'));
    }

    public function update(Request $request, Price $price)
    {
        $data = $request->validate([
            'price'  => 'required',
            'kuvaus' => 'required',
            'image'  => 'nullable|image|max:10240',
        ]);

        if ($request->hasFile('image')) {
            if ($price->image_path) {
                Storage::disk('public')->delete($price->image_path);
            }
            $data['image_path'] = $request->file('image')->store('prices', 'public');
        }
        unset($data['image']);

        $price->update($data);

        return redirect()->route('price.index')->with('success', 'Päivitys onnistui');
    }

    public function destroy(Price $price)
    {
        if ($price->image_path) {
            Storage::disk('public')->delete($price->image_path);
        }
        $price->delete();

        return redirect()->route('price.index')->with('success', 'Poisto onnistui');
    }
}
