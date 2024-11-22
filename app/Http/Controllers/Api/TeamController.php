<?php

namespace App\Http\Controllers\Api;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    // Method untuk mengambil data tim dengan pagination
    public function index()
    {
        $teams = Team::latest()->paginate(5);

        // Menggunakan TeamResource untuk mengatur output
        return TeamResource::collection($teams);
    }

    // Method untuk menyimpan data tim baru
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:18|max:60',
            'position' => 'required|string|max:255',
            'national' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
        ]);

        // Jika validasi gagal, kembalikan respons dengan kode 422
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors()
            ], 422);
        }

        // Membuat data tim baru
        $team = Team::create([
            'name' => $request->name,
            'age' => $request->age,
            'position' => $request->position,
            'national' => $request->national,
            'salary' => $request->salary,
        ]);

        // Kembalikan respons sukses dengan data yang baru dibuat
        return response()->json([
            'success' => true,
            'message' => 'Data team berhasil ditambahkan.',
            'data' => new TeamResource($team)
        ], 201); // Gunakan kode status 201 untuk Created
    }
}
