@extends('layouts.app')

@section('title','Mes annonces')


@section('content')


<div class="max-w-7xl mx-auto">


<!-- TITRE -->

<div class="flex justify-between items-center mb-xl">


<div>

<h1 class="text-3xl font-bold text-primary">

Mes Annonces

</h1>


<p class="text-on-surface-variant">

Suivez vos performances immobilières à Douala.

</p>


</div>



<a href="{{route('proprietaire.logements.create')}}"

class="bg-secondary-container text-white px-6 py-3 rounded-xl shadow">

+ Ajouter un nouveau logement

</a>


</div>





<!-- STATISTIQUES -->


<div class="grid md:grid-cols-4 gap-lg mb-xl">



<div class="bg-surface-container-low p-6 rounded-xl border">

<p class="text-on-surface-variant">

Logements

</p>


<h2 class="text-4xl font-bold text-primary mt-3">

{{count($logements)}}

</h2>


</div>






<div class="bg-surface-container p-6 rounded-xl border">


<p>

Vues Totales

</p>


<h2 class="text-4xl font-bold text-primary mt-3">

2481

</h2>


</div>







<div class="bg-secondary-fixed p-6 rounded-xl border">


<p>

Demandes

</p>


<h2 class="text-4xl font-bold text-secondary mt-3">

45

</h2>


</div>








<div class="bg-secondary-container/20 p-6 rounded-xl border">


<p>

Revenu estimé

</p>


<h2 class="text-4xl font-bold text-secondary mt-3">

750k FCFA

</h2>


</div>



</div>









<!-- LISTE LOGEMENTS -->


<div class="bg-white rounded-xl border overflow-hidden">


<table class="w-full">


<thead class="bg-surface-container">


<tr>


<th class="p-5 text-left">

Logement

</th>


<th>

Adresse

</th>


<th>

Type

</th>


<th>

Prix

</th>


<th>

Action

</th>


</tr>


</thead>




<tbody>


@foreach($logements as $logement)


<tr class="border-t hover:bg-surface-container-low">


<td class="p-5">


<div class="flex items-center gap-4">



@if($logement->images && $logement->images->where('is_cover',true)->first())

@php
$cover = $logement->images->where('is_cover',true)->first();
@endphp

@if($cover)

<img
src="{{asset('storage/'.$cover->image)}}"
class="w-20 h-14 rounded-lg object-cover">

@else

<img
src="https://via.placeholder.com/150"
class="w-20 h-14 rounded-lg object-cover">

@endif


@else

<img

src="/images/default.jpg"

class="w-20 h-14 rounded-lg">


@endif



<div>


<h3 class="font-bold">

{{$logement->titre}}

</h3>


<p class="text-sm text-gray-500">

ID : {{$logement->id}}

</p>


</div>



</div>


</td>





<td>

{{$logement->adresse}}

</td>






<td>


<span class="px-3 py-1 bg-primary-fixed rounded-full text-primary">

{{$logement->type}}

</span>


</td>







<td class="font-bold text-primary">


{{number_format($logement->prix)}} FCFA


</td>








<td>


<a href="{{route('proprietaire.logements.edit',$logement)}}"

class="text-primary mr-3">

Modifier

</a>




<form

action="{{route('proprietaire.logements.destroy',$logement)}}"

method="POST"

class="inline">


@csrf

@method('DELETE')


<button class="text-red-600">

Supprimer

</button>


</form>



</td>



</tr>



@endforeach



</tbody>


</table>


</div>




</div>


@endsection
