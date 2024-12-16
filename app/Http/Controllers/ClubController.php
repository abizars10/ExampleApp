<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClubResource;
use id;
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
        return view('clubs.index', ['title' => 'Clubs', 'clubs' => $clubs]);
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
            'name' => 'required|max:255',
            'city' => 'required|max:255',
            'stadium' => 'required|max:255',
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
    public function edit(Club $club)
    {
        // $club = Club::findOrFail($id);
        return view('clubs.edit', ['title' => 'Update Club', 'club' => $club] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'city' => 'required|max:255',
            'stadium' => 'required|max:255',
        ]);

        DB::table('clubs')->where('id', $id)->update([
            'name' => $request->name,
            'city' => $request->city,
            'stadium' => $request->stadium,
        ]);

        return redirect()->route('club.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Club $id)
    {
        $id->delete();
        return redirect()->route('club.index')->with('success', 'Data berhasil di hapus.');
    }
}
