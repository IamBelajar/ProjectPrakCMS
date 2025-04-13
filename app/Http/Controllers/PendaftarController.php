<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;

class PendaftarController extends Controller
{
public function index()

    {
        $pendaftars = Pendaftar::all();
        return view('pendaftar\index', compact('pendaftars'));
    }

    public function show($id)
    {
        $pendaftar = pendaftar::find($id);
        if (!$pendaftar) {
            abort(404);
        }
        return view('pendaftar\show', compact('pendaftar'));
    }
}
