<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logement;

class LogementController extends Controller
{
    public function index(Request $request)
    {
        $query = Logement::with('coverImage','proprietaire');



        // Recherche
        if($request->filled('search')){
            $query->where(function($q) use($request){
                $q->where('titre','LIKE','%'.$request->search.'%')
                ->orWhere('adresse','LIKE','%'.$request->search.'%');
            });
        }

        // Type (plusieurs types)
        if($request->filled('type')){
            $query->whereIn('type', (array)$request->type);
        }

        // Chambres
        if($request->filled('chambres')){
            $query->where('nombre_chambres',$request->chambres);
        }

        // Prix minimum
        if($request->filled('prix_min')){
            $query->where('prix','>=',$request->prix_min);
        }

        // Prix maximum
        if($request->filled('prix_max')){
            $query->where('prix','<=',$request->prix_max);
        }

        // Disponible
        if($request->boolean('disponible')){
            $query->where('statut','disponible');
        }

        // Wifi
        if($request->boolean('wifi')){
            $query->where('wifi',1);
        }

        // Forage
        if($request->boolean('forage')){
            $query->where('forage',1);
        }

        // Gardien
        if($request->boolean('gardien')){
            $query->where('gardien',1);
        }

        // Vérifié
        if($request->boolean('verifie')){
            $query->where('est_verifie',1);
        }

        // Etablissement
        if($request->filled('etablissement')){
            $query->where(
                'etablissement_proche',
                'LIKE',
                '%'.$request->etablissement.'%'
            );
        }

        // Distance
        if($request->filled('distance')){
            $query->where(
                'distance_ecole',
                '<=',
                $request->distance
            );
        }

        // Toujours afficher uniquement les logements disponibles
        $query->where('statut','disponible');

        // Tri
        switch($request->sort){

            case 'prix_asc':
                $query->orderBy('prix');
                break;

            case 'prix_desc':
                $query->orderByDesc('prix');
                break;

            case 'distance':
                $query->orderBy('distance_ecole');
                break;

            default:
                $query->latest();
        }

        /*$logements = $query
            ->paginate(9)
            ->withQueryString();*/
        $logements = $query
            ->with('favoris')
            ->paginate(9)
            ->withQueryString();

        return view('etudiant.logements.index', compact('logements'));
    }

    public function show(Logement $logement)
    {
         $logement->load([
            'images',
            'coverImage',
            'proprietaire',
            'favoris',
        ]);

        $logement->increment('vues');

        return view('etudiant.logements.show', compact('logement'));
    }
}
