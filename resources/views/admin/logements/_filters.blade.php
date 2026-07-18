<form
method="GET"
class="bg-white rounded-xl border p-5 mb-8">

<div class="grid lg:grid-cols-4 gap-4">

<input
type="text"
name="search"
value="{{ request('search') }}"
placeholder="Rechercher un logement..."
class="border rounded-lg p-3">

<select
name="statut"
class="border rounded-lg p-3">

<option value="">

Tous les statuts

</option>

<option
value="disponible"
@selected(request('statut')=='disponible')>

Disponible

</option>

<option
value="indisponible"
@selected(request('statut')=='indisponible')>

Indisponible

</option>

</select>

<select
name="verification"
class="border rounded-lg p-3">

<option value="">

Toutes les annonces

</option>

<option
value="1"
@selected(request('verification')==='1')>

Vérifiées

</option>

<option
value="0"
@selected(request('verification')==='0')>

Non vérifiées

</option>

</select>

<button
class="bg-primary text-white rounded-lg">

Filtrer

</button>

</div>

</form>
