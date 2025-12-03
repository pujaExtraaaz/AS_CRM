<?php

namespace App\Http\Controllers;

use App\Models\Yard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YardController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $yards = Yard::orderBy('created_at', 'desc')->paginate(10);
        return view('yards.index', compact('yards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('yards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'yard_name' => 'required|string|max:255',
            'yard_address' => 'required|string|max:500',
            'yard_email' => 'required|email|max:255',
            'yard_person_name' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
        ]);

        $yard = new Yard();
        $yard->yard_name = $request->yard_name;
        $yard->yard_address = $request->yard_address;
        $yard->yard_email = $request->yard_email;
        $yard->yard_person_name = $request->yard_person_name;
        $yard->contact = $request->contact;
        // $yard->created_by = Auth::id();
        $yard->save();

        return redirect()->route('yards.index')->with('success', 'Yard created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Yard $yard) {
        return view('yards.show', compact('yard'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Yard $yard) {
        return view('yards.edit', compact('yard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Yard $yard) {
        $request->validate([
            'yard_name' => 'required|string|max:255',
            'yard_address' => 'required|string|max:500',
            'yard_email' => 'required|email|max:255',
            'yard_person_name' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
        ]);

        $yard->yard_name = $request->yard_name;
        $yard->yard_address = $request->yard_address;
        $yard->yard_email = $request->yard_email;
        $yard->yard_person_name = $request->yard_person_name;
        $yard->contact = $request->contact;
        $yard->save();

        return redirect()->route('yards.index')->with('success', 'Yard updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Yard $yard) {
        $yard->delete();
        return redirect()->route('yards.index')->with('success', 'Yard deleted successfully.');
    }

    /**
     * Search yards for AJAX requests
     */
    public function search(Request $request) {
        $search = $request->get('term');
        $yards = Yard::where('yard_name', 'LIKE', "%{$search}%")
                ->orWhere('yard_email', 'LIKE', "%{$search}%")
                ->orWhere('yard_person_name', 'LIKE', "%{$search}%")
                ->orWhere('contact', 'LIKE', "%{$search}%")
                ->orWhere('yard_address', 'LIKE', "%{$search}%")
                ->select('id', 'yard_name', 'yard_email', 'yard_person_name', 'contact', 'yard_address')
                ->limit(10)
                ->get();
        return response()->json($yards);
    }
}
