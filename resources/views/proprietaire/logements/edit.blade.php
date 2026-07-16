@extends('layouts.app')

@section('title','Modifier un logement')

@section('content')

<div class="max-w-4xl mx-auto">

```
<h1 class="text-3xl font-bold mb-3">
    Modifier l'annonce
</h1>

<p class="text-gray-500 mb-10">
    Mettez à jour les informations de votre logement.
</p>

<form
    method="POST"
    action="{{ route('logements.update', $logement) }}"
    enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <!-- INFORMATIONS -->

    <section class="bg-surface-container-lowest p-8 rounded-xl border border-outline-variant mb-8">

        <h2 class="text-xl font-bold mb-6 text-primary">
            ⓘ Informations générales
        </h2>

        <label class="block mb-2">
            Titre de l'annonce
        </label>

        <input
            type="text"
            name="titre"
            value="{{ old('titre', $logement->titre) }}"
            class="w-full border rounded-lg p-3 mb-5">

        <label class="block mb-2">
            Description détaillée
        </label>

        <textarea
            name="description"
            rows="5"
            class="w-full border rounded-lg p-3 mb-5">{{ old('description', $logement->description) }}</textarea>

        <div class="grid md:grid-cols-2 gap-5">

            <div>
                <label>Type logement</label>

                <select
                    name="type"
                    class="w-full border rounded-lg p-3">

                    <option value="Studio"
                        {{ old('type', $logement->type) == 'Studio' ? 'selected' : '' }}>
                        Studio
                    </option>

                    <option value="Appartement"
                        {{ old('type', $logement->type) == 'Appartement' ? 'selected' : '' }}>
                        Appartement
                    </option>

                    <option value="Chambre"
                        {{ old('type', $logement->type) == 'Chambre' ? 'selected' : '' }}>
                        Chambre
                    </option>

                    <option value="Maison"
                        {{ old('type', $logement->type) == 'Maison' ? 'selected' : '' }}>
                        Maison
                    </option>

                </select>
            </div>

            <div>
                <label>Adresse / Quartier</label>

                <input
                    type="text"
                    name="adresse"
                    value="{{ old('adresse', $logement->adresse) }}"
                    class="w-full border rounded-lg p-3">
            </div>

        </div>

    </section>

    <!-- PRIX -->

    <section class="bg-surface-container-lowest p-8 rounded-xl border border-outline-variant mb-8">

        <h2 class="text-xl font-bold mb-6 text-primary">
            📍 Localisation & Prix
        </h2>

        <div class="grid md:grid-cols-2 gap-5">

            <div>
                <label>Loyer mensuel FCFA</label>

                <input
                    type="number"
                    name="prix"
                    value="{{ old('prix', $logement->prix) }}"
                    class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label>Nombre chambres</label>

                <input
                    type="number"
                    name="nombre_chambres"
                    value="{{ old('nombre_chambres', $logement->nombre_chambres) }}"
                    class="w-full border rounded-lg p-3">
            </div>

        </div>

    </section>

    <!-- IMAGE -->

    <section class="bg-surface-container-lowest p-8 rounded-xl border border-outline-variant mb-8">

        <h2 class="text-xl font-bold mb-6 text-primary">
            📷 Photos du logement
        </h2>

        @if($logement->image)
            <div class="mb-6">
                <p class="font-medium mb-3">Image actuelle</p>

                <img
                    src="{{ asset('storage/'.$logement->image) }}"
                    class="w-64 h-48 object-cover rounded-xl border">
            </div>
        @endif

        <div class="border-2 border-dashed rounded-xl p-10 text-center">

            <input
                id="image"
                type="file"
                name="image"
                class="hidden"
                onchange="previewImage(event)">

            <label for="image" class="cursor-pointer">

                <div class="text-primary text-4xl">
                    ☁
                </div>

                <p>
                    Choisir une nouvelle photo
                </p>

                <button
                    type="button"
                    class="mt-4 bg-primary text-white px-5 py-3 rounded-lg">

                    Sélectionner fichier

                </button>

            </label>

            <div id="preview" class="mt-5"></div>

        </div>

    </section>

    <button
        type="submit"
        class="bg-secondary text-white px-10 py-3 rounded-xl">

        Enregistrer les modifications

    </button>

</form>
```

</div>

@endsection

@push('scripts')

<script>

function previewImage(event){

    let file = event.target.files[0];

    document.getElementById('preview').innerHTML = `
        <img
            src="${URL.createObjectURL(file)}"
            class="h-48 mx-auto rounded-xl object-cover border">
    `;
}

</script>

@endpush
