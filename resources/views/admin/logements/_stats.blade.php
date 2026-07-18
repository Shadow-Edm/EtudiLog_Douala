<div class="grid lg:grid-cols-6 md:grid-cols-3 gap-5 mb-8">

<div class="bg-white rounded-xl border p-5">

<p class="text-sm text-gray-500">

Logements

</p>

<h2 class="text-3xl font-bold">

{{ $stats['total'] }}

</h2>

</div>

<div class="bg-green-50 rounded-xl border border-green-200 p-5">

<p class="text-green-700">

Disponibles

</p>

<h2 class="text-3xl font-bold text-green-700">

{{ $stats['disponible'] }}

</h2>

</div>

<div class="bg-red-50 rounded-xl border border-red-200 p-5">

<p class="text-red-700">

Indisponibles

</p>

<h2 class="text-3xl font-bold text-red-700">

{{ $stats['indisponible'] }}

</h2>

</div>

<div class="bg-blue-50 rounded-xl border border-blue-200 p-5">

<p class="text-blue-700">

Vérifiés

</p>

<h2 class="text-3xl font-bold text-blue-700">

{{ $stats['verifie'] }}

</h2>

</div>

<div class="bg-gray-100 rounded-xl border p-5">

<p>

Non vérifiés

</p>

<h2 class="text-3xl font-bold">

{{ $stats['non_verifie'] }}

</h2>

</div>

<div class="bg-amber-50 rounded-xl border border-amber-200 p-5">

<p class="text-amber-700">

Vues

</p>

<h2 class="text-3xl font-bold text-amber-700">

{{ number_format($stats['vues']) }}

</h2>

</div>

</div>
