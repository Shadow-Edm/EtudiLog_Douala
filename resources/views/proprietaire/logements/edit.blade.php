@extends('layouts.app')

@section('title','Ajouter un logement')


@section('content')


<div class="max-w-4xl mx-auto">


<h1 class="text-3xl font-bold mb-3">
Modifier votre annonce
</h1>


<p class="text-gray-500 mb-10">
Remplissez les détails de votre logement pour attirer les meilleurs étudiants de Douala.
</p>

@if ($errors->any())

<div class="mb-8 rounded-xl border border-red-300 bg-red-50 p-5">

    <h3 class="font-bold text-red-700 mb-2">

        Veuillez corriger les erreurs suivantes :

    </h3>

    <ul class="list-disc list-inside text-red-600 space-y-1">

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<form
    method="POST"
    action="{{ route('proprietaire.logements.update',$logement) }}"
    enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <!-- Toutes les informations -->

    <!-- INFORMATIONS -->


    <section class="bg-surface-container-lowest p-8 rounded-xl border border-outline-variant mb-8">


    <h2 class="text-xl font-bold mb-6 text-primary">

    ⓘ Informations générales

    </h2>



    <label class="block mb-2">
    Titre de l'annonce
    </label>


    <input

    name="titre"

    value="{{ old('titre', $logement->titre) }}"

    class="w-full rounded-lg p-3 mb-2 border
    @error('titre')
    border-red-500
    @else
    border-outline-variant
    @enderror"

    placeholder="Studio moderne à Bonamoussadi">

    @error('titre')

    <p class="text-red-600 text-sm mb-5">

    {{ $message }}

    </p>

    @enderror


    <label class="block mb-2">

    Description détaillée

    </label>



    <textarea

    name="description"

    rows="5"

    class="w-full rounded-lg p-3 mb-2 border
    @error('description')
    border-red-500
    @else
    border-outline-variant
    @enderror"

    >{{ old('description', $logement->description) }}</textarea>

    @error('description')

    <p class="text-red-600 text-sm">

    {{ $message }}

    </p>

    @enderror






    <div class="grid md:grid-cols-2 gap-5">


    <div>


    <label>

    Type logement

    </label>


    <select

    name="type"

    class="w-full border rounded-lg p-3">


    <option
    value="Studio"
    @selected(old('type', $logement->type)=='Studio')>Studio</option>

    <option
    value="Appartement"
    @selected(old('type', $logement->type)=='Appartement')>Appartement</option>

    <option
    value="Chambre"
    @selected(old('type', $logement->type)=='Chambre')>Chambre</option>

    <option
    value="Maison"
    @selected(old('type', $logement->type)=='Maison')>Maison</option>


    </select>


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


            <label>

            Adresse / Quartier

            </label>


            <input

                name="adresse"

                value="{{ old('adresse', $logement->adresse) }}"

                class="w-full rounded-lg p-3 border
                @error('adresse')
                border-red-500
                @else
                border-outline-variant
                @enderror">

            @error('adresse')

                <p class="text-red-600 text-sm mt-2">

                    {{ $message }}

                </p>

            @enderror


        </div>

        <div>


            <label>

            Loyer mensuel FCFA

            </label>


            <input

                type="number"

                name="prix"

                value="{{ old('prix', $logement->prix) }}"

                class="w-full rounded-lg p-3 border
                @error('prix')
                border-red-500
                @else
                border-outline-variant
                @enderror">

            @error('prix')

                <p class="text-red-600 text-sm mt-2">

                    {{ $message }}

                </p>

            @enderror


        </div>


        <div>

            <label class="block mb-2">
                Établissement le plus proche
            </label>

            <input

                name="etablissement_proche"

                value="{{ old('etablissement_proche', $logement->etablissement_proche) }}"

                class="w-full rounded-lg p-3 border
                @error('etablissement_proche')
                border-red-500
                @else
                border-outline-variant
                @enderror">

            @error('etablissement_proche')

                <p class="text-red-600 text-sm mt-2">

                    {{ $message }}

                </p>

            @enderror

        </div>


        <div>

            <label class="block mb-2">
                Distance de l'établissement (Km)
            </label>

            <input
                type="number"
                step="0.1"
                name="distance_ecole"
                value="{{ old('distance_ecole', $logement->distance_ecole) }}"
                class="w-full border rounded-lg p-3"
                placeholder="1.5">

        </div>





    </div>


    </section>




    <section class="bg-surface-container-lowest p-8 rounded-xl border border-outline-variant mb-8">

        <h2 class="text-xl font-bold mb-6 text-primary">

            🏠 Caractéristiques du logement

        </h2>

        <div class="grid md:grid-cols-3 gap-5">

            <div>

                <label class="block mb-2">
                    Nombre de chambres
                </label>

                <input

                    type="number"

                    name="nombre_chambres"

                    value="{{ old('nombre_chambres', $logement->nombre_chambres) }}"

                    class="w-full rounded-lg p-3 border">

            </div>

            <div>

                <label class="block mb-2">
                    Nombre de douches
                </label>

                <input

                    type="number"

                    name="nombre_douches"

                    value="{{ old('nombre_douches', $logement->nombre_douches) }}"

                    class="w-full rounded-lg p-3 border">

            </div>

            <div>

                <label class="block mb-2">
                    Superficie (m²)
                </label>

                <input

                    type="number"

                    name="superficie"

                    value="{{ old('superficie', $logement->superficie) }}"

                    class="w-full rounded-lg p-3 border">

            </div>

        </div>

        <div class="mt-8">

            <label class="block mb-4 font-semibold">

                Équipements disponibles

            </label>

            <div class="grid md:grid-cols-2 gap-4">

                <label class="flex items-center gap-3 p-4 border rounded-xl cursor-pointer hover:bg-surface-container-low">

                    <input
                        type="checkbox"
                        name="wifi"
                        value="1"
                        @checked(old('wifi', $logement->wifi))>

                    <span>📶 Wi-Fi</span>

                </label>

                <label class="flex items-center gap-3 p-4 border rounded-xl cursor-pointer hover:bg-surface-container-low">

                    <input
                        type="checkbox"
                        name="forage"
                        value="1"
                        @checked(old('forage', $logement->forage))>

                    <span>💧 Forage</span>

                </label>

                <label class="flex items-center gap-3 p-4 border rounded-xl cursor-pointer hover:bg-surface-container-low">

                    <input
                        type="checkbox"
                        name="gardien"
                        value="1"
                        @checked(old('gardien', $logement->gardien))>

                    <span>🛡️ Gardien</span>

                </label>

                <label class="flex items-center gap-3 p-4 border rounded-xl cursor-pointer hover:bg-surface-container-low">

                    <input
                        type="checkbox"
                        name="est_verifie"
                        value="1"
                        @checked(old('est_verifie', $logement->est_verifie))>

                    <span>✅ Logement vérifié</span>

                </label>

            </div>

        </div>

        <div class="mt-9">

            <button
                type="submit"
                class="bg-primary text-white px-8 py-3 rounded-lg">

                Enregistrer les modifications

            </button>
        </div>

    </section>
    <!-- titre -->
    <!-- description -->
    <!-- prix -->
    <!-- adresse -->
    <!-- etc... -->


</form>


<!-- IMAGE -->


<section class="bg-surface-container-lowest p-8 rounded-xl border border-outline-variant mb-8">


<h2 class="text-xl font-bold mb-6 text-primary">

📷 Photos du logement

</h2>

<div class="grid md:grid-cols-3 gap-6">

@foreach($logement->images as $image)

<div class="rounded-xl overflow-hidden border">

    <img
        src="{{ Storage::url($image->image) }}"
        class="h-52 w-full object-cover">

    @if($image->is_cover)

        <div
            class="bg-green-600 text-white text-center py-2">

            ⭐ Photo de couverture

        </div>

    @else

        <form
            method="POST"
            action="{{ route('proprietaire.logement-images.cover',$image) }}">

            @csrf

            <button
                class="w-full bg-blue-600 text-white py-2">

                Définir comme couverture

            </button>

        </form>

    @endif

    <form
        method="POST"
        action="{{ route('proprietaire.logement-images.destroy',$image) }}">

        @csrf
        @method('DELETE')

        <button
            onclick="return confirm('Supprimer cette photo ?')"
            class="w-full bg-red-600 text-white py-2">

            Supprimer

        </button>

    </form>

</div>

@endforeach

</div>

<form
    method="POST"
    action="{{ route('proprietaire.logement-images.store',$logement) }}"
    enctype="multipart/form-data">

    @csrf

    <input id="images" type="file" name="images[]"
        multiple class="hidden"
        onchange="previewImages(event)">
    <div class="mt-8" w-center>
        <label for="images" class="cursor-pointer bg-center">

            <div class="text-primary text-4xl">
                ☁
            </div>
            <p> Glissez vos photos ici </p>

            <button type="button"
                class="mt-4 bg-primary text-white
                px-5 py-3 rounded-lg">

                Sélectionner fichier
            </button>
        </label>
    </div>

    <div
        id="preview"
        class="grid grid-cols-3 gap-4 mt-5">

    </div>

    <button
        class="mt-5 bg-primary text-white px-6 py-3 rounded">

        Ajouter les photos

    </button>

</form>







</div>



@endsection





@push('scripts')


<script>


function previewImages(event) {

    let preview = document.getElementById('preview');

    preview.innerHTML = "";

    Array.from(event.target.files).forEach(file => {

        preview.innerHTML += `

            <img
                src="${URL.createObjectURL(file)}"
                class="h-32 w-full object-cover rounded-xl border">

        `;

    });

}
</script>

@endpush
