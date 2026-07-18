<div class="mt-6 grid grid-cols-2 gap-3">

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
