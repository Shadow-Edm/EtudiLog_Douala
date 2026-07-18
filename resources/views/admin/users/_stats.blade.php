<div class="grid md:grid-cols-4 xl:grid-cols-8 gap-5">

    <div class="bg-white rounded-xl shadow p-5">

        <p class="text-gray-500">

            Utilisateurs

        </p>

        <h2 class="text-3xl font-bold mt-2">

            {{ $stats['total'] }}

        </h2>

    </div>

    <div class="bg-blue-50 rounded-xl border border-blue-100 p-5">

        <p class="text-blue-700">

            Étudiants

        </p>

        <h2 class="text-3xl font-bold">

            {{ $stats['etudiants'] }}

        </h2>

    </div>

    <div class="bg-green-50 rounded-xl border border-green-100 p-5">

        <p class="text-green-700">

            Propriétaires

        </p>

        <h2 class="text-3xl font-bold">

            {{ $stats['proprietaires'] }}

        </h2>

    </div>

    <div class="bg-purple-50 rounded-xl border border-purple-100 p-5">

        <p class="text-purple-700">

            Managers

        </p>

        <h2 class="text-3xl font-bold">

            {{ $stats['managers'] }}

        </h2>

    </div>

    <div class="bg-yellow-50 rounded-xl border border-yellow-100 p-5">

        <p class="text-yellow-700">

            Administrateurs

        </p>

        <h2 class="text-3xl font-bold">

            {{ $stats['admins'] }}

        </h2>

    </div>

    <div class="bg-green-50 rounded-xl border border-green-100 p-5">

        <p class="text-green-700">

            Vérifiés

        </p>

        <h2 class="text-3xl font-bold">

            {{ $stats['verifies'] }}

        </h2>

    </div>

    <div class="bg-orange-50 rounded-xl border border-orange-100 p-5">

        <p class="text-orange-700">

            En attente

        </p>

        <h2 class="text-3xl font-bold">

            {{ $stats['en_attente'] }}

        </h2>

    </div>

    <div class="bg-red-50 rounded-xl border border-red-100 p-5">

        <p class="text-red-700">

            Suspendus

        </p>

        <h2 class="text-3xl font-bold">

            {{ $stats['suspendus'] }}

        </h2>

    </div>

</div>
