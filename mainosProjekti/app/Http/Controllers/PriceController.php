<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $prices = Price::all();

        return view('price.index', compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('price.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'price'  => 'required',
            'kuvaus' => 'required',
            'image'  => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('prices', 'public');
        }
        unset($data['image']);

        Price::create($request->all());
        return redirect()->route('price.index')->with('success','Lisäys onnistui');
    }

    /**
     * Display the specified resource.
     */
    public function show(Price $price)
    {
        //
        return view('price.show', compact('price'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Price $price)
    {
        //
        return view('price.edit', compact('price'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Price $price)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Price $price)
    {
        //
        $price->delete();
        return redirect()->route('price.index')->with('success', 'Poisto onnistui');


    }
}
