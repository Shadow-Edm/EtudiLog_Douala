<div class="grid md:grid-cols-4 gap-5 mt-8">

    @if($user->role=='proprietaire')

        <div class="bg-white rounded-xl shadow p-5">

            <p>Logements</p>

            <h2 class="text-3xl font-bold">

                {{ $user->logements->count() }}

            </h2>

        </div>

        <div class="bg-white rounded-xl shadow p-5">

            <p>Vues</p>

            <h2 class="text-3xl font-bold">

                {{ $user->logements->sum('vues') }}

            </h2>

        </div>

    @endif

    @if($user->role=='etudiant')

        <div class="bg-white rounded-xl shadow p-5">

            <p>Demandes</p>

            <h2 class="text-3xl font-bold">

                {{ $user->visites->count() }}

            </h2>

        </div>

        <div class="bg-white rounded-xl shadow p-5">

            <p>Favoris</p>

            <h2 class="text-3xl font-bold">

                {{ $user->favoris->count() }}

            </h2>

        </div>

    @endif

</div>
