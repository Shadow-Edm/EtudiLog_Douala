@php
use Illuminate\Support\Facades\Storage;

$image = $logement->coverImage
    ? Storage::url($logement->coverImage->image)
    : asset('images/no-image.jpg');
@endphp



<div class="group bg-surface-container-lowest rounded-2xl border border-outline-variant overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col">

    {{-- ================= IMAGE ================= --}}
    <div class="relative aspect-[4/3] overflow-hidden">

        <img
            src="{{ $image }}"
            alt="{{ $logement->titre }}"
            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

        {{-- Badges --}}
        <div class="absolute top-4 left-4 flex gap-2 flex-wrap">

            <span
                class="px-3 py-1 rounded-full text-xs font-semibold backdrop-blur bg-white/90

                {{ $logement->statut == 'disponible'
                    ? 'text-green-700'
                    : 'text-red-700' }}">

                {{ ucfirst($logement->statut) }}

            </span>

            @if($logement->est_verifie)

                <span
                    class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">

                    Vérifié

                </span>

            @endif

        </div>




    </div>

    {{-- ================= CONTENU ================= --}}
    <div class="p-5 flex flex-col flex-1">

        {{-- Prix --}}
        <div class="flex justify-between items-start">

            <div>

                <h2
                    class="text-xl font-bold group-hover:text-primary transition">

                    {{ $logement->titre }}

                </h2>

                <p
                    class="text-sm text-on-surface-variant mt-1 flex items-center gap-1">

                    <span class="material-symbols-outlined text-base">

                        location_on

                    </span>

                    {{ $logement->adresse }}

                </p>

                @if($logement->etablissement_proche)

                    <p
                        class="text-sm text-primary mt-1">

                        🎓 {{ $logement->etablissement_proche }}

                        @if($logement->distance_ecole)

                            • {{ $logement->distance_ecole }} km

                        @endif

                    </p>

                @endif

            </div>

            <div class="text-right">

                <h3
                    class="text-2xl font-extrabold text-primary">

                    {{ number_format($logement->prix,0,',',' ') }}

                </h3>

                <span
                    class="text-xs text-on-surface-variant">

                    FCFA / mois

                </span>

            </div>

        </div>

        {{-- Caractéristiques --}}
        <div
            class="grid grid-cols-3 gap-4 mt-6 py-5 border-y border-outline-variant">

            <div class="flex flex-col items-center">

                <span
                    class="material-symbols-outlined text-primary">

                    bed

                </span>

                <span class="text-sm mt-1">

                    {{ $logement->nombre_chambres }}

                </span>

                <span class="text-xs text-on-surface-variant">

                    Chambre(s)

                </span>

            </div>

            <div class="flex flex-col items-center">

                <span
                    class="material-symbols-outlined text-primary">

                    shower

                </span>

                <span class="text-sm mt-1">

                    {{ $logement->nombre_douches }}

                </span>

                <span class="text-xs text-on-surface-variant">

                    Douche(s)

                </span>

            </div>

            <div class="flex flex-col items-center">

                <span
                    class="material-symbols-outlined text-primary">

                    square_foot

                </span>

                <span class="text-sm mt-1">

                    {{ $logement->superficie ?? '--' }}

                </span>

                <span class="text-xs text-on-surface-variant">

                    m²

                </span>

            </div>

        </div>

        {{-- Equipements --}}
        <div class="flex flex-wrap gap-2 mt-5">

            @if($logement->wifi)

                <span
                    class="px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs">

                    📶 WiFi

                </span>

            @endif

            @if($logement->forage)

                <span
                    class="px-3 py-1 rounded-full bg-cyan-50 text-cyan-700 text-xs">

                    💧 Forage

                </span>

            @endif

            @if($logement->gardien)

                <span
                    class="px-3 py-1 rounded-full bg-orange-50 text-orange-700 text-xs">

                    🛡 Gardien

                </span>

            @endif

        </div>
    </div>

<a
href="{{ route('admin.logements.show',$logement) }}"
class="text-center rounded-xl border py-3">

Voir

</a>



<a
href="{{ route('admin.logements.edit',$logement) }}"
class="text-center rounded-xl bg-primary text-white py-3">

Modifier

</a>


@if(!$logement->est_verifie)

<form
action="{{ route('admin.logements.verify',$logement) }}"
method="POST">

@csrf
@method('PATCH')

<button
class="w-full rounded-xl bg-blue-600 text-white py-3">

Valider

</button>

</form>

@else

<form
action="{{ route('admin.logements.unverify',$logement) }}"
method="POST">

@csrf
@method('PATCH')

<button
class="w-full rounded-xl bg-gray-700 text-white py-3">

Retirer validation

</button>

</form>

@endif

<form
action="{{ route('admin.logements.destroy',$logement) }}"
method="POST"
onsubmit="return confirm('Supprimer cette annonce ?')">

@csrf
@method('DELETE')

<button
class="w-full rounded-xl bg-red-600 text-white py-3">

Supprimer

</button>

</form>

</div>
