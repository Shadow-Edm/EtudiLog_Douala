<div class="sticky top-24">

    <div class="bg-surface-container-lowest rounded-2xl border border-outline-variant shadow-sm overflow-hidden">

        {{-- En-tête --}}
        <div class="flex items-center justify-between p-6 border-b border-outline-variant">

            <div class="flex items-center gap-2">

                <span class="material-symbols-outlined text-primary">

                    filter_alt

                </span>

                <h2 class="font-bold text-xl">

                    Filtres

                </h2>

            </div>

            <a
                href="{{ route('logements.index') }}"
                class="text-primary text-sm hover:underline">

                Réinitialiser

            </a>

        </div>

        <form
            method="GET"
            action="{{ route('logements.index') }}"
            class="p-6 space-y-8">

            {{-- ================= RECHERCHE ================= --}}

            <div>

                <label class="block font-semibold mb-2">

                    Recherche

                </label>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Titre, quartier..."

                    class="w-full rounded-xl">

            </div>

            {{-- ================= ETABLISSEMENT ================= --}}

            <div>

                <label class="block font-semibold mb-2">

                    Établissement proche

                </label>

                <input
                    type="text"
                    name="etablissement"

                    value="{{ request('etablissement') }}"

                    placeholder="Université de Douala"

                    class="w-full rounded-xl">

            </div>

            {{-- ================= PRIX ================= --}}

            <div>

                <label class="block font-semibold mb-3">

                    Budget (FCFA)

                </label>

                <div class="grid grid-cols-2 gap-3">

                    <input

                        type="number"

                        name="prix_min"

                        value="{{ request('prix_min') }}"

                        placeholder="Min"

                        class="rounded-xl">

                    <input

                        type="number"

                        name="prix_max"

                        value="{{ request('prix_max') }}"

                        placeholder="Max"

                        class="rounded-xl">

                </div>

            </div>

            {{-- ================= TYPE ================= --}}

            <div>

                <label class="block font-semibold mb-3">

                    Type de logement

                </label>

                <div class="space-y-3">

                    @foreach([
                        'Chambre',
                        'Studio',
                        'Appartement',
                        'Maison'
                    ] as $type)

                    <label
                        class="flex items-center gap-3 cursor-pointer">

                        <input

                            type="checkbox"

                            name="type[]"

                            value="{{ $type }}"

                            @checked(in_array($type,(array)request('type')))

                        >

                        {{ $type }}

                    </label>

                    @endforeach

                </div>

            </div>

            {{-- ================= CHAMBRES ================= --}}

            <div>

                <label class="block font-semibold mb-3">

                    Chambres

                </label>

                <div class="grid grid-cols-4 gap-2">

                    @foreach([1,2,3,4] as $i)

                    <label>

                        <input

                            type="radio"

                            class="hidden peer"

                            name="chambres"

                            value="{{ $i }}"

                            @checked(request('chambres')==$i)

                        >

                        <div
                            class="text-center py-2 rounded-xl border border-outline-variant cursor-pointer

                            peer-checked:bg-primary

                            peer-checked:text-white

                            peer-checked:border-primary">

                            {{ $i }}{{ $i==4 ? '+' : '' }}

                        </div>

                    </label>

                    @endforeach

                </div>

            </div>

            {{-- ================= DISTANCE ================= --}}

            <div>

                <label class="block font-semibold mb-2">

                    Distance maximale (km)

                </label>

                <input

                    type="number"

                    name="distance"

                    value="{{ request('distance') }}"

                    class="w-full rounded-xl"

                    placeholder="Ex : 2">

            </div>

            {{-- ================= EQUIPEMENTS ================= --}}

            <div>

                <h3 class="font-semibold mb-4">

                    Equipements

                </h3>

                <div class="space-y-3">

                    <label class="flex justify-between items-center">

                        <span class="flex items-center gap-2">

                            📶 WiFi

                        </span>

                        <input
                            type="checkbox"
                            name="wifi"
                            value="1"
                            @checked(request('wifi'))>

                    </label>

                    <label class="flex justify-between items-center">

                        <span class="flex items-center gap-2">

                            💧 Forage

                        </span>

                        <input
                            type="checkbox"
                            name="forage"
                            value="1"
                            @checked(request('forage'))>

                    </label>

                    <label class="flex justify-between items-center">

                        <span class="flex items-center gap-2">

                            🛡 Gardien

                        </span>

                        <input
                            type="checkbox"
                            name="gardien"
                            value="1"
                            @checked(request('gardien'))>

                    </label>

                </div>

            </div>

            {{-- ================= OPTIONS ================= --}}

            <div class="space-y-3">

                <label class="flex items-center gap-3">

                    <input
                        type="checkbox"
                        name="verifie"
                        value="1"
                        @checked(request('verifie'))>

                    Logements vérifiés

                </label>

                <label class="flex items-center gap-3">

                    <input
                        type="checkbox"
                        name="disponible"
                        value="1"
                        @checked(request('disponible',1))>

                    Seulement disponibles

                </label>

            </div>

            {{-- ================= BOUTONS ================= --}}

            <div class="pt-2">

                <button

                    class="w-full

                    bg-primary

                    text-white

                    py-3

                    rounded-xl

                    font-semibold

                    hover:opacity-90

                    transition">

                    Appliquer les filtres

                </button>

            </div>

        </form>

    </div>

</div>
