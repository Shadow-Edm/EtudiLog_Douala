@extends('layouts.app')


@section('content')

<div class="max-w-7xl mx-auto">


<h1 class="text-3xl font-bold mb-6">
Tableau de bord Administrateur
</h1>



<div class="grid md:grid-cols-4 gap-5">


<div class="bg-white shadow p-5 rounded-xl">
<h2>Total</h2>
<p class="text-3xl font-bold">
{{ $stats['total'] }}
</p>
</div>



<div class="bg-white shadow p-5 rounded-xl">
<h2>En attente</h2>

<p class="text-3xl font-bold">
{{ $stats['en_attente'] }}
</p>

</div>



<div class="bg-white shadow p-5 rounded-xl">
<h2>Proposées</h2>

<p class="text-3xl font-bold">
{{ $stats['proposee'] }}
</p>

</div>



<div class="bg-white shadow p-5 rounded-xl">
<h2>Confirmées</h2>

<p class="text-3xl font-bold">
{{ $stats['confirmee'] }}
</p>

</div>



<div class="bg-white shadow p-5 rounded-xl">
<h2>Annulées</h2>

<p class="text-3xl font-bold">
{{ $stats['annulee'] }}
</p>

</div>



<div class="bg-white shadow p-5 rounded-xl">
<h2>Terminées</h2>

<p class="text-3xl font-bold">
{{ $stats['terminee'] }}
</p>

</div>


</div>





<div class="mt-8 bg-white rounded-xl shadow">


<table class="w-full">


<tr class="border-b">

<th class="p-4">
Etudiant
</th>

<th>
Logement
</th>

<th>
Statut
</th>

<th>
Action
</th>

</tr>



@foreach($visites as $visite)


<tr class="border-b">


<td class="p-4">

{{ $visite->etudiant->name }}

</td>



<td>

{{ $visite->logement->titre }}

</td>



<td>

{{ $visite->statut }}

</td>



<td>

<a href="{{route('admin.visites.show',$visite)}}"
class="text-blue-600">

Voir

</a>


</td>


</tr>


@endforeach


</table>


</div>


</div>


@endsection
