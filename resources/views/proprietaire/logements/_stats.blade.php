<div class="grid md:grid-cols-4 gap-6">

    <div class="bg-white rounded-xl border p-6">

        <p class="text-gray-500">
            Logements
        </p>

        <h2 class="text-4xl font-bold text-primary mt-2">

            {{ $stats['total'] }}

        </h2>

    </div>

    <div class="bg-green-50 rounded-xl border border-green-200 p-6">

        <p class="text-green-700">

            Disponibles

        </p>

        <h2 class="text-4xl font-bold text-green-700 mt-2">

            {{ $stats['disponibles'] }}

        </h2>

    </div>

    <div class="bg-red-50 rounded-xl border border-red-200 p-6">

        <p class="text-red-700">

            Indisponibles

        </p>

        <h2 class="text-4xl font-bold text-red-700 mt-2">

            {{ $stats['indisponibles'] }}

        </h2>

    </div>

    <div class="bg-blue-50 rounded-xl border border-blue-200 p-6">

        <p class="text-blue-700">

            Vues totales

        </p>

        <h2 class="text-4xl font-bold text-blue-700 mt-2">

            {{ $stats['vues'] }}

        </h2>

    </div>

</div>
