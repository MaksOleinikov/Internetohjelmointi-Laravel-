<?php

namespace App\Http\Controllers;

use App\Models\Palaute;
use Illuminate\Http\Request;

class PalauteController extends Controller
{
    /**
     * Avataan palautatoiminnon etusivu
     */
    public function index()
    {
        //
        $palaute = Palaute::all();

        //dd($palaute);

        return view('palaute', compact('palaute'));
        //return view('palaute');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Avataan uuden palautteen kirjoituslomake
        return view('palauteForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Tallennettaa uuden palautteen tiedot tietokantaan
        // Tarkistetaan eli validoidaan ennen tallennusta
        $request->validate([
            'nimi' => 'required | string | max:20',
            'teksti' => 'required',
        ]);

        Palaute::create($request->all());
        return redirect()->route('palaute.index')->with('success','Kiitos palautteesta');
    }

    /**
     * Display the specified resource.
     */
    public function show(Palaute $palaute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Palaute $palaute)
    {
        // Avataan palautteen muokkaus lomake
        // Lähetetään yhden palautteen kaikki tiedot
        return view('palautemuokkaa', compact('palaute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Palaute $palaute)
    {
        // Vastaanotettaan muttuneet tiedot
        // Validoidaan saapuneet tiedot
        // Päivitetään tietokannassa olevat yhden palautteen tiedot
        $request->validate([
            'nimi' => 'required | string | max:20',
            'teksti' => 'required',
        ]);

        $palaute->update($request->all());
        return redirect()->route('palaute.index')->with('success','Palautetta on muokattu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Palaute $palaute)
    {
        //
        $palaute->delete();

        return redirect()->route('palaute.index')->with('Success', 'Onnistui');
    }
}
