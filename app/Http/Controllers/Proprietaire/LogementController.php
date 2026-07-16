<?php

namespace App\Http\Controllers\Proprietaire;
use App\Http\Controllers\Controller;
use App\Models\Logement;
use App\Models\LogementImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class LogementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logements = Logement::with('images')
            ->where('proprietaire_id', auth()->id())
            ->get();


        return view(
            'proprietaire.logements.index',
            compact('logements')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proprietaire.logements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([

            'titre' => 'required|string|max:255',

            'description' => 'required|string',

            'adresse' => 'required|string|max:255',

            'etablissement_proche' => 'required|string|max:255',

            'distance_ecole' => 'nullable|numeric|min:0',

            'prix' => 'required|numeric|min:0',

            'type' => 'required|in:Studio,Appartement,Chambre,Maison',

            'nombre_chambres' => 'required|integer|min:1',

            'nombre_douches' => 'required|integer|min:1',

            'superficie' => 'nullable|integer|min:1',

            'wifi' => 'nullable|boolean',

            'forage' => 'nullable|boolean',

            'gardien' => 'nullable|boolean',

            'est_verifie' => 'nullable|boolean',

            'images' => 'required|array|min:1',

            'images.*' => 'image|max:4096',

        ]);

        DB::transaction(function () use ($request, $validated) {

        $logement = Logement::create([

            'proprietaire_id' => auth()->id(),

            'titre' => $validated['titre'],

            'description' => $validated['description'],

            'adresse' => $validated['adresse'],

            'etablissement_proche' => $validated['etablissement_proche'],

            'distance_ecole' => $validated['distance_ecole'],

            'prix' => $validated['prix'],

            'type' => $validated['type'],

            'nombre_chambres' => $validated['nombre_chambres'],

            'nombre_douches' => $validated['nombre_douches'],

            'superficie' => $validated['superficie'],

            'wifi' => $request->boolean('wifi'),

            'forage' => $request->boolean('forage'),

            'gardien' => $request->boolean('gardien'),

            'est_verifie' => $request->boolean('est_verifie'),

            'statut' => 'disponible',

        ]);

        foreach ($request->file('images') as $index => $image) {

            $path = $image->store('logements', 'public');

            LogementImage::create([

                'logement_id' => $logement->id,

                'image' => $path,

                'is_cover' => $index === 0,

            ]);
        }
    });





        return redirect()
            ->route('logements.index')
            ->with('success','Logement ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Logement $logement)
    {
        /*$logement->load([
            'images',
            'coverImage',
            'proprietaire',
        ]);

        return view(
            'proprietaire.logements.show',
            compact('logement')
        );*/
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Logement $logement)
    {

        abort_if(
            $logement->proprietaire_id !== Auth::id(),
            403
        );

        return view(
            'proprietaire.logements.edit',
            compact('logement')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Logement $logement)
    {

        abort_if($logement->proprietaire_id !== Auth::id(), 403);

        $data = $request->validate([

            'titre' => 'required|string|max:255',

            'description' => 'required|string',

            'adresse' => 'required|string|max:255',

            'etablissement_proche' => 'required|string|max:255',

            'distance_ecole' => 'nullable|numeric|min:0',

            'prix' => 'required|numeric|min:0',

            'type' => 'required|in:Studio,Appartement,Chambre,Maison',

            'nombre_chambres' => 'required|integer|min:1',

            'nombre_douches' => 'required|integer|min:1',

            'superficie' => 'nullable|integer|min:1',

        ]);

        $data['wifi'] = $request->boolean('wifi');

        $data['forage'] = $request->boolean('forage');

        $data['gardien'] = $request->boolean('gardien');

        $data['est_verifie'] = $request->boolean('est_verifie');

        $logement->update($data);

        return redirect()
            ->route('logements.index')
            ->with('success', 'Logement modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Logement $logement)
    {
        abort_if($logement->proprietaire_id !== Auth::id(), 403);

        DB::transaction(function () use ($logement) {

            $logement->load('images');

            foreach ($logement->images as $image) {

                Storage::disk('public')->delete($image->image);

                $image->delete();

            }

            $logement->delete();

        });

        return redirect()
            ->route('logements.index')
            ->with('success', 'Logement supprimé avec succès.');
    }
}
