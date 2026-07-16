<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visite;
use Illuminate\Http\Request;

class VisiteController extends Controller
{
    /**
     * Tableau de bord des visites
     */
    public function index()
    {

        $visites = Visite::with([
            'etudiant',
            'logement'
        ])
        ->latest()
        ->paginate(10);



        $stats = [

            'total' => Visite::count(),

            'en_attente' => Visite::where(
               'statut',
                'en_attente'
            )->count(),


            'proposee' => Visite::where(
                'statut',
                'proposee'
            )->count(),


            'confirmee' => Visite::where(
                'statut',
                'confirmee'
            )->count(),


            'annulee' => Visite::where(
                'statut',
                'annulee'
            )->count(),


            'terminee' => Visite::where(
                'statut',
                'terminee'
            )->count(),

        ];



        return view(
            'admin.visites.index',
            compact(
                'visites',
                'stats'
            )
        );
    }



    /**
     * Afficher une visite
     */
    public function show(Visite $visite)
    {

        $visite->load([
            'etudiant',
            'logement.proprietaire'
        ]);



        return view(
            'admin.visites.show',
            compact('visite')
        );
    }



    /**
     * Mise à jour d'une visite
     */
    public function update(
        Request $request,
        Visite $visite
    )
    {

        $request->validate([

            'statut'=>[
                'required',
                'in:proposee,confirmee,annulee,terminee'
            ],


            'date_visite'=>'nullable|date',

            'heure_visite'=>'nullable',


            'note_admin'=>'nullable|string'

        ]);



        $visite->update([

            'statut'=>$request->statut,

            'date_visite'=>$request->date_visite,

            'heure_visite'=>$request->heure_visite,

            'note_admin'=>$request->note_admin,


            'admin_id'=>auth()->id(),


            'confirmee_at'=>

                $request->statut === 'confirmee'
                ? now()
                : null

        ]);



        return redirect()

            ->route('admin.visites.index')

            ->with(
                'success',
                'Visite mise à jour avec succès'
            );

    }
}
