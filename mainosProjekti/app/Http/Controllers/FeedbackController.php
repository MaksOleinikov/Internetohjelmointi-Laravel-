<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $feedbacks = Feedback::latest()->paginate(20);
        return view('feedback.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        //
        return view('feedback.show', compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        //
        return view('feedback.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
        $data = $request->validate([
            'name'     => 'required|min:2|max:80',
            'email'    => 'nullable|email|max:120',
            'category' => 'required|in:sivusto,majoitus,ajankohtaista',
            'message'  => 'required|min:10|max:2000',
        ]);

        $feedback->update($data);

        return redirect()->route('feedback.index')->with('success', 'Palaute päivitetty');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        //
         $feedback->delete();

        return redirect()->route('feedback.index')->with('success', 'Palaute poistettu');
    }
}
