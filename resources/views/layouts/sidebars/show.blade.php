@extends('layouts.app')

@section('title', $logement->titre)


@section('content')


<div class="max-w-container-max mx-auto">


{{-- Breadcrumb --}}

<div class="flex items-center gap-sm mb-lg text-on-surface-variant">

<a href="{{ route('logements.index') }}"
class="hover:text-primary">

Logements

</a>


<span class="material-symbols-outlined">
chevron_right
</span>


<span class="text-primary font-bold">

{{ $logement->adresse }}

</span>

</div>





{{-- GALERIE + INFORMATIONS --}}

<div class="grid grid-cols-1 lg:grid-cols-12 gap-lg">



{{-- GALERIE --}}

<div class="lg:col-span-8">


<div class="grid grid-cols-4 grid-rows-2 gap-sm h-[400px] md:h-[600px]">



{{-- IMAGE PRINCIPALE --}}

<div class="col-span-3 row-span-2 rounded-xl overflow-hidden">


@php

$cover = $logement->images
->where('is_cover',true)
->first();

@endphp



@if($cover)


<img

src="{{ asset('storage/'.$cover->image) }}"

class="w-full h-full object-cover"


>


@else


<img

src="https://via.placeholder.com/800"

class="w-full h-full object-cover"

>


@endif



<div class="absolute">

</div>


</div>





{{-- MINIATURES --}}


@foreach($logement->images->take(2) as $image)


<div class="rounded-xl overflow-hidden">


<img

src="{{asset('storage/'.$image->image)}}"

class="w-full h-full object-cover"

>


</div>


@endforeach



</div>





{{-- TITRE --}}

<div class="mt-lg">


<h1 class="text-headline-lg text-primary font-bold">

{{ $logement->titre }}

</h1>



<div class="flex flex-wrap gap-md mt-md text-on-surface-variant">


<span class="flex items-center gap-xs">

<span class="material-symbols-outlined text-primary">
location_on
</span>


{{ $logement->adresse }}

</span>



<span class="flex items-center gap-xs">

<span class="material-symbols-outlined text-primary">
bed
</span>


{{ $logement->nombre_chambres }} chambre(s)

</span>



<span class="flex items-center gap-xs">

<span class="material-symbols-outlined text-primary">
home
</span>


{{ ucfirst($logement->type) }}

</span>


</div>


</div>






<hr class="my-xl border-outline-variant">






{{-- DESCRIPTION --}}


<section>


<h2 class="text-headline-md font-bold mb-md">

Description

</h2>



<p class="text-body-lg text-on-surface-variant leading-relaxed">

{{ $logement->description }}

</p>


</section>



</div>






{{-- CARTE DROITE --}}


<div class="lg:col-span-4">


<div class="sticky top-24 space-y-lg">



{{-- PRIX --}}

<div class="bg-surface-container-low border border-outline-variant rounded-xl p-lg shadow">


<p class="text-on-surface-variant">

Loyer mensuel

</p>


<h2 class="text-display text-primary font-bold">

{{ number_format($logement->prix,0,' ',' ') }}

FCFA

</h2>



<div class="mt-lg space-y-sm">


<div class="flex justify-between border-b pb-sm">


<span>

Statut

</span>


<span class="font-bold text-secondary">

{{ ucfirst($logement->statut) }}

</span>


</div>



</div>






<button

class="w-full mt-lg bg-secondary text-white py-md rounded-lg font-bold hover:opacity-90">


<span class="material-symbols-outlined align-middle">

chat

</span>


Contacter le propriétaire


</button>





<button

class="w-full mt-md border-2 border-primary text-primary py-md rounded-lg font-bold">


<span class="material-symbols-outlined align-middle">

calendar_month

</span>


Demander une visite


</button>



</div>







{{-- PROPRIETAIRE --}}


<div class="bg-white border rounded-xl p-md flex items-center gap-md">


<img

src="{{ $logement->proprietaire->avatar_url ?? asset('images/avatar.png') }}"

class="w-16 h-16 rounded-full object-cover"

>



<div>


<p class="text-on-surface-variant">

Propriétaire

</p>


<h3 class="font-bold text-primary">

{{ $logement->proprietaire->name }}

</h3>


</div>



</div>



</div>


</div>




</div>







{{-- LOCALISATION --}}


<section class="mt-xl">


<h2 class="text-headline-md font-bold mb-lg">

Emplacement

</h2>



<div class="bg-surface-container-high rounded-xl h-80 flex items-center justify-center">


<span class="material-symbols-outlined text-primary text-5xl">

location_on

</span>


</div>



<p class="mt-md text-on-surface-variant">

{{ $logement->adresse }}, Douala Cameroun

</p>


</section>




</div>


@endsection
