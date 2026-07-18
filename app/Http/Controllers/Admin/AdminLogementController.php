<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logement;
use Illuminate\Http\Request;

class AdminLogementController extends Controller
{
    public function index(Request $request)
    {
        $logements = Logement::with([
            'proprietaire',
            'coverImage'
        ])
        ->latest()
        ->paginate(12);



        $stats = [

            'total' => Logement::count(),


            'disponible' => Logement::where('statut','disponible')
                ->count(),


            'indisponible' => Logement::where('statut','indisponible')
                ->count(),


            'verifie' => Logement::where('est_verifie',true)
                ->count(),


            'non_verifie' => Logement::where('est_verifie',false)
                ->count(),


            'vues' => Logement::sum('vues'),

        ];

        /*if($request->filled('search')){

            $query->where(function($q) use ($request){

                $q->where(
                    'titre',
                    'like',
                    '%'.$request->search.'%'
                )
                ->orWhere(
                    'adresse',
                    'like',
                    '%'.$request->search.'%'
                );

            });

        }
        $logements = $query
            ->latest()
            ->paginate(12);*/



        return view('admin.logements.index', compact(
            'logements',
            'stats'
        ));

    }

    public function show(Logement $logement)
    {
        $logement->load([
            'proprietaire',
            'images',
            'coverImage',
        ]);

        return view(
            'admin.logements.show',
            compact('logement')
        );
    }

    public function edit(Logement $logement)
    {
        return view(
            'admin.logements.edit',
            compact('logement')
        );
    }

    public function update(Request $request, Logement $logement)
    {
        $data = $request->validate([

            'titre'=>'required',

            'description'=>'required',

            'adresse'=>'required',

            'prix'=>'required|numeric',

            'type'=>'required',

            'nombre_chambres'=>'required',

            'nombre_douches'=>'required',

            'superficie'=>'nullable',

            'etablissement_proche'=>'nullable',

            'distance_ecole'=>'nullable'

        ]);

        $data['wifi']=$request->boolean('wifi');

        $data['forage']=$request->boolean('forage');

        $data['gardien']=$request->boolean('gardien');

        $logement->update($data);

        return back()->with(
            'success',
            'Annonce modifiée.'
        );
    }

    public function destroy(Logement $logement)
    {
        $logement->delete();

        return back()->with(
            'success',
            'Annonce supprimée.'
        );
    }

    public function verify(Logement $logement)
    {
        $logement->update([

            'est_verifie'=>true

        ]);

        return back()->with(
            'success',
            'Annonce validée.'
        );
    }
    public function unverify(Logement $logement)
    {
        $logement->update([
            'est_verifie'=>false
        ]);

        return back()->with(
            'success',
            'Validation retirée.'
        );
    }
}
