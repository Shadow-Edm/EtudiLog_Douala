<div
class="bg-white rounded-2xl border shadow-sm hover:shadow-lg transition p-6">

    <div class="flex justify-between items-start">

        <div class="flex gap-4">

            <img
                src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}"
                class="w-16 h-16 rounded-full">

            <div>

                <h2 class="font-bold text-xl">

                    {{ $user->name }}

                </h2>

                <p class="text-sm text-gray-500">

                    {{ $user->email }}

                </p>

            </div>

        </div>

        @switch($user->role)

            @case('admin')

                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">

                    Admin

                </span>

            @break

            @case('manager')

                <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full">

                    Manager

                </span>

            @break

            @case('proprietaire')

                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

                    Propriétaire

                </span>

            @break

            @default

                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">

                    Étudiant

                </span>

        @endswitch

    </div>

    <div class="flex gap-2 mt-6 flex-wrap">

        @if($user->is_suspended)

            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">

                Suspendu

            </span>

        @elseif($user->is_verified)

            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

                Vérifié

            </span>

        @else

            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">

                En attente

            </span>

        @endif

    </div>

    <p class="mt-5 text-sm text-gray-500">

        Inscrit le

        {{ $user->created_at
            ? $user->created_at->format('d/m/Y')
            : 'Date inconnue'
        }}

    </p>

    <div class="grid grid-cols-2 gap-3 mt-6">

        <a
            href="{{ route('admin.users.show',$user) }}"
            class="bg-primary text-white rounded-xl py-3 text-center">

            Voir

        </a>

        <a
            href="{{ route('admin.users.edit',$user) }}"
            class="bg-secondary text-white rounded-xl py-3 text-center">

            Modifier

        </a>

    </div>

    <div class="grid grid-cols-3 gap-3 mt-4">

        @if(!$user->is_verified)

            <form
                action="{{ route('admin.users.verify',$user) }}"
                method="POST">

                @csrf
                @method('PATCH')

                <button
                    class="w-full bg-green-600 text-white rounded-xl py-2">

                    Vérifier

                </button>

            </form>

        @endif

        <form
            action="{{ route('admin.users.suspend',$user) }}"
            method="POST">

            @csrf
            @method('PATCH')

            <button
                class="w-full bg-orange-500 text-white rounded-xl py-2">

                {{ $user->is_suspended ? 'Réactiver' : 'Suspendre' }}

            </button>

        </form>

        <form
            action="{{ route('admin.users.destroy',$user) }}"
            method="POST">

            @csrf
            @method('DELETE')

            <button
                onclick="return confirm('Supprimer ce compte ?')"
                class="w-full bg-red-600 text-white rounded-xl py-2">

                Supprimer

            </button>

        </form>

    </div>

</div>
