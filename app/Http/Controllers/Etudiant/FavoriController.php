<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\Logement;
use App\Models\Favori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoriController extends Controller
{
    public function index()
    {
        $favoris = auth()->user()
            ->favoris()
            ->with('coverImage', 'proprietaire')
            ->paginate(9);

        return view('etudiant.favoris.index', compact('favoris'));
    }



    public function toggle(Logement $logement)
    {
        auth()->user()
            ->favoris()
            ->toggle($logement->id);

        return back();
    }
}
