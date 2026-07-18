<span class="px-3 py-1 rounded-full text-xs font-semibold

{{ $logement->statut=='disponible'

? 'bg-green-100 text-green-700'

: 'bg-red-100 text-red-700' }}">

{{ ucfirst($logement->statut) }}

</span>
@if($logement->est_verifie)

<span
class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">

Vérifié

</span>

@else

<span
class="px-3 py-1 rounded-full bg-gray-100 text-gray-600 text-xs font-semibold">

Non vérifié

</span>

@endif
