@extends('layouts.app')

@section('title','Détails du logement')

@section('content')

<div class="max-w-7xl mx-auto">

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold">

            Détails du logement

        </h1>

        <p class="text-gray-500">

            Consultation complète de l'annonce.

        </p>

    </div>

    <a
        href="{{ route('admin.logements.index') }}"
        class="px-5 py-3 rounded-xl border">

        Retour

    </a>

</div>



<div class="grid lg:grid-cols-2 gap-8">

<div>

@if($logement->coverImage)

<img
src="{{ Storage::url($logement->coverImage->image) }}"
class="rounded-2xl w-full h-96 object-cover">

@endif

<div class="grid grid-cols-4 gap-3 mt-4">

@foreach($logement->images as $image)

<img
src="{{ Storage::url($image->image) }}"
class="rounded-xl h-24 w-full object-cover">

@endforeach

</div>

</div>

<div>

<h2 class="text-3xl font-bold">

{{ $logement->titre }}

</h2>

<p class="text-gray-500 mt-2">

{{ $logement->adresse }}

</p>

<div class="flex gap-3 mt-4">

<span
class="px-4 py-2 rounded-full

{{ $logement->statut=='disponible'
? 'bg-green-100 text-green-700'
: 'bg-red-100 text-red-700' }}">

{{ ucfirst($logement->statut) }}

</span>

@if($logement->est_verifie)

<span
class="px-4 py-2 rounded-full bg-blue-100 text-blue-700">

Vérifié

</span>

@else

<span
class="px-4 py-2 rounded-full bg-gray-100">

Non vérifié

</span>

@endif

</div>


<div class="mt-8">

<p class="text-gray-500">

Prix mensuel

</p>

<h2 class="text-4xl font-bold text-primary">

{{ number_format($logement->prix) }} FCFA

</h2>

</div>

<div class="grid grid-cols-3 gap-5 mt-8">

<div class="border rounded-xl p-4 text-center">

<h3 class="text-2xl font-bold">

{{ $logement->nombre_chambres }}

</h3>

<p>

Chambres

</p>

</div>

<div class="border rounded-xl p-4 text-center">

<h3 class="text-2xl font-bold">

{{ $logement->nombre_douches }}

</h3>

<p>

Douches

</p>

</div>

<div class="border rounded-xl p-4 text-center">

<h3 class="text-2xl font-bold">

{{ $logement->superficie ?? '--' }}

</h3>

<p>

m²

</p>

</div>

</div>

<div class="mt-8">

<h3 class="font-bold mb-4">

Équipements

</h3>

<div class="flex flex-wrap gap-3">

@if($logement->wifi)

<span class="px-4 py-2 rounded-full bg-blue-50">

📶 Wi-Fi

</span>

@endif

@if($logement->forage)

<span class="px-4 py-2 rounded-full bg-cyan-50">

💧 Forage

</span>

@endif

@if($logement->gardien)

<span class="px-4 py-2 rounded-full bg-orange-50">

🛡 Gardien

</span>

@endif

</div>

</div>

<div class="mt-8 border rounded-xl p-5">

<h3 class="font-bold mb-3">

Établissement proche

</h3>

<p>

{{ $logement->etablissement_proche }}

</p>

@if($logement->distance_ecole)

<p class="text-gray-500 mt-2">

Distance :

{{ $logement->distance_ecole }} km

</p>

@endif

</div>

<div class="mt-8 border rounded-xl p-5">

<h3 class="font-bold mb-3">

Propriétaire

</h3>

<p>

{{ $logement->proprietaire->name }}

</p>

<p>

{{ $logement->proprietaire->email }}

</p>

</div>


<div class="mt-8 border rounded-xl p-5">

<h3 class="font-bold mb-3">

Statistiques

</h3>

<p>

Nombre de vues

<strong>

{{ number_format($logement->vues) }}

</strong>

</p>

<p>

Créé le

{{ $logement->created_at->format('d/m/Y H:i') }}

</p>

<p>

Dernière modification

{{ $logement->updated_at->format('d/m/Y H:i') }}

</p>

</div>


<div class="flex gap-4 mt-10">

<a
href="{{ route('admin.logements.index',$logement) }}"
class="bg-primary text-white px-6 py-3 rounded-xl">

Modifier

</a>

@if(!$logement->est_verifie)

<form
action="{{ route('admin.logements.verify',$logement) }}"
method="POST">

@csrf
@method('PATCH')

<button
class="bg-blue-600 text-white px-6 py-3 rounded-xl">

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
class="bg-gray-700 text-white px-6 py-3 rounded-xl">

Retirer validation

</button>

</form>

@endif

<form
action="{{ route('admin.logements.destroy',$logement) }}"
method="POST"
onsubmit="return confirm('Supprimer ce logement ?')">

@csrf
@method('DELETE')

<button
class="bg-red-600 text-white px-6 py-3 rounded-xl">

Supprimer

</button>

</form>

</div>

</div>

</div>

</div>

@endsection
