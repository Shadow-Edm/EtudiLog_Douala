<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\Visite;
use App\Models\Logement;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class VisiteController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {

        $visites = auth()->user()
            ->visitesEtudiant()
            ->with([
                'logement.coverImage',
                'logement.proprietaire',
                'admin'
            ])
            ->latest()
            ->paginate(10);

        return view(
            'etudiant.visites.index',
            compact('visites')
        );
    }

    public function store(Request $request, Logement $logement)
    {
        $this->authorize('create', Visite::class);

        $existe = Visite::where('etudiant_id', auth()->id())
            ->where('logement_id', $logement->id)
            ->whereNotIn('statut', ['annulee', 'terminee'])
            ->exists();

        if ($existe) {
            return back()->with(
                'error',
                'Vous avez déjà une demande de visite en cours pour ce logement.'
            );
        }

        Visite::create([

            'etudiant_id' => auth()->id(),

            'logement_id' => $logement->id,

            'message' => $request->message,

            'statut' => 'en_attente',

        ]);

        return back()->with(
            'success',
            'Votre demande de visite a été envoyée.'
        );
    }

    public function show(Visite $visite, Logement $logement)
    {
        $this->authorize('view', $visite);


        $visite->load([
            'logement.images',
            'logement.proprietaire',
            'admin'
        ]);

        return view(
            'etudiant.visites.show',
            compact('visite')
        );
    }

    public function destroy(Visite $visite)
    {
        $this->authorize('delete', $visite);

        $visite->delete();

        return redirect()
            ->route('visites.index')
            ->with(
                'success',
                'La demande de visite a été supprimée.'
            );
    }

    public function confirmer(Visite $visite)
    {
        $this->authorize('view', $visite);

        abort_if(
            $visite->statut != 'proposee',
            403
        );

        $visite->update([

            'statut' => 'confirmee',

            'confirmee_at' => now()

        ]);

        return back()->with(
            'success',
            'Visite confirmée.'
        );
    }

    public function annuler(Visite $visite)
    {
        $this->authorize('view', $visite);

        $visite->update([

            'statut' => 'annulee'

        ]);

        return back()->with(
            'success',
            'Visite annulée.'
        );
    }

}
