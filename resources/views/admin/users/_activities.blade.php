@if($user->role=='proprietaire')

<div class="bg-white rounded-xl shadow mt-8 p-6">

    <h2 class="text-2xl font-bold mb-6">

        Logements publiés

    </h2>

    <div class="grid md:grid-cols-2 gap-5">

        @foreach($user->logements as $logement)

            @include('proprietaire.logements._card')

        @endforeach

    </div>

</div>

@endif
@if($user->role=='etudiant')

<div class="bg-white rounded-xl shadow mt-8 p-6">

    <h2 class="text-2xl font-bold mb-6">

        Demandes de visite

    </h2>

    <table class="w-full">

        @foreach($user->visites as $visite)

            <tr class="border-b">

                <td class="py-4">

                    {{ $visite->logement->titre }}

                </td>

                <td>

                    {{ ucfirst($visite->statut) }}

                </td>

            </tr>

        @endforeach

    </table>

</div>

@endif
