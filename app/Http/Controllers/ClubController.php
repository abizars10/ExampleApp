<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clubs = Club::paginate(10);
        return view('club', ['title' => 'Clubs', 'clubs' => $clubs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clubs.create', ['title' => 'New Club']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'city' => 'required|max:20',
            'stadium' => 'required|max:20',
        ],[
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama maksimal 20 karakter',
            'city.required' => 'Kota wajib diisi',
            'city.max' => 'Kota maksimal 20 karakter',
            'stadium.required' => 'Stadion wajib diisi',
            'stadium.max' => 'Stadion maksimal 20 karakter',
        ]);

        // DB::table('clubs')->insert([
        //     'name'=>$request->name,
        //     'city'=>$request->city,
        //     'stadium'=>$request->stadium,
        // ]);

        $club = new Club();
        $club->name = $request->name;
        $club->city = $request->city;
        $club->stadium = $request->stadium;
        $club->save();

        return redirect()->route('club.index')->with('success', 'Club added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
