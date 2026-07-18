@extends('layouts.app')

@section('title','Ajouter un logement')


@section('content')


<div class="max-w-4xl mx-auto">


<h1 class="text-3xl font-bold mb-3">
Déposer une nouvelle annonce
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
action="{{route('proprietaire.logements.store')}}"
enctype="multipart/form-data">

@csrf





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

value="{{ old('titre') }}"

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

>{{ old('description') }}</textarea>

@error('description')

<p class="text-red-600 text-sm">

{{ $message }}

</p>

@enderror

</textarea>




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
@selected(old('type')=='Studio')>Studio</option>

<option
value="Appartement"
@selected(old('type')=='Appartement')>Appartement</option>

<option
value="Chambre"
@selected(old('type')=='Chambre')>Chambre</option>

<option
value="Maison"
@selected(old('type')=='Maison')>Maison</option>


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

            value="{{ old('adresse') }}"

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

            value="{{ old('prix') }}"

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

            value="{{ old('etablissement_proche') }}"

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

                value="{{ old('nombre_chambres') }}"

                class="w-full rounded-lg p-3 border">

        </div>

        <div>

            <label class="block mb-2">
                Nombre de douches
            </label>

            <input

                type="number"

                name="nombre_douches"

                value="{{ old('nombre_douches',1) }}"

                class="w-full rounded-lg p-3 border">

        </div>

        <div>

            <label class="block mb-2">
                Superficie (m²)
            </label>

            <input

                type="number"

                name="superficie"

                value="{{ old('superficie') }}"

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
                    @checked(old('wifi'))>

                <span>📶 Wi-Fi</span>

            </label>

            <label class="flex items-center gap-3 p-4 border rounded-xl cursor-pointer hover:bg-surface-container-low">

                <input
                    type="checkbox"
                    name="forage"
                    value="1"
                    @checked(old('forage'))>

                <span>💧 Forage</span>

            </label>

            <label class="flex items-center gap-3 p-4 border rounded-xl cursor-pointer hover:bg-surface-container-low">

                <input
                    type="checkbox"
                    name="gardien"
                    value="1"
                    @checked(old('gardien'))>

                <span>🛡️ Gardien</span>

            </label>

            <!--<label class="flex items-center gap-3 p-4 border rounded-xl cursor-pointer hover:bg-surface-container-low">

                <input
                    type="checkbox"
                    name="est_verifie"
                    value="1"
                    {{-- @checked(old('est_verifie')) --}}>

                <span>✅ Logement vérifié</span>

            </label>-->

        </div>

    </div>

</section>







<!-- IMAGE -->


<section class="bg-surface-container-lowest p-8 rounded-xl border border-outline-variant mb-8">


<h2 class="text-xl font-bold mb-6 text-primary">

📷 Photos du logement

</h2>




<div class="border-2 border-dashed rounded-xl p-10 text-center">



<input

id="images"

type="file"

name="images[]"

multiple

class="hidden"

onchange="previewImages(event)">



<label for="images" class="cursor-pointer">



<div class="text-primary text-4xl">

☁

</div>



<p>

Glissez vos photos ici

</p>



<button

type="button"

class="mt-4 bg-primary text-white px-5 py-3 rounded-lg">

Sélectionner fichier

</button>



</label>

<div class="mt-6">

    <div class="flex items-center gap-3">

        <input
            type="checkbox"
            id="cover"
            checked>

        <label for="cover">

            La première photo sélectionnée sera utilisée comme photo principale.

        </label>

    </div>

</div>




<div id="preview" class="grid grid-cols-3 gap-4 mt-5"></div>



</div>


</section>








<button

type="submit"

class="bg-secondary hover:opacity-90 text-white font-semibold px-10 py-4 rounded-xl transition duration-300 shadow-md">

Publier l'annonce

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
