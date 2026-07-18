<aside

id="sidebar"

class="
fixed
top-16
left-0
h-[calc(100vh-64px)]
w-72
bg-white
border-r
border-slate-200
z-40
transition-transform
duration-300
lg:translate-x-0
-translate-x-full
flex
flex-col
shadow-sm
">


{{-- ================= PROFIL ================= --}}

<div class="p-5 border-b">


    <div class="flex items-center gap-4">


        <img

            src="{{ auth()->user()->photo_profil_url }}"

            class="
            w-12
            h-12
            rounded-full
            object-cover
            border">


        <div>

            <h3 class="font-bold">

                {{ auth()->user()->name }}

            </h3>


            <p class="text-sm text-slate-500">

                Propriétaire

            </p>



            @if(auth()->user()->is_verified)

                <span class="text-xs text-green-600">

                    ● Compte vérifié

                </span>


            @elseif(auth()->user()->is_suspended)

                <span class="text-xs text-red-600">

                    ● Compte suspendu

                </span>


            @else

                <span class="text-xs text-yellow-600">

                    ● Validation en attente

                </span>


            @endif


        </div>


    </div>


</div>







{{-- ================= MENU ================= --}}

<nav class="flex-1 p-4 space-y-2 overflow-y-auto">





{{-- Tableau de bord --}}

<a

href="{{ route('proprietaire.dashboard') }}"

class="
flex
items-center
gap-3
px-4
py-3
rounded-xl
transition

{{ request()->routeIs('proprietaire.dashboard')
? 'bg-primary text-white'
: 'text-slate-700 hover:bg-slate-100'
}}
">


<span class="material-symbols-outlined">

dashboard

</span>


<span>

Tableau de bord

</span>


</a>







{{-- Mes annonces --}}

<a

href="{{ route('proprietaire.logements.index') }}"

class="
flex
items-center
gap-3
px-4
py-3
rounded-xl
transition

{{ request()->routeIs('proprietaire.logements.*')
? 'bg-primary text-white'
: 'text-slate-700 hover:bg-slate-100'
}}
">


<span class="material-symbols-outlined">

home

</span>


<span>

Mes annonces

</span>


</a>







{{-- Ajouter logement --}}

<a

href="{{ route('proprietaire.logements.create') }}"

class="
flex
items-center
gap-3
px-4
py-3
rounded-xl
text-slate-700
hover:bg-slate-100">


<span class="material-symbols-outlined">

add_home

</span>


<span>

Ajouter un logement

</span>


</a>








{{-- Demandes reçues --}}

<a

href="#"

class="
flex
items-center
gap-3
px-4
py-3
rounded-xl
text-slate-700
hover:bg-slate-100">


<span class="material-symbols-outlined">

calendar_month

</span>


<span>

Demandes reçues

</span>



@if(isset($pendingRequests) && $pendingRequests > 0)

<span

class="
ml-auto
bg-red-600
text-white
text-xs
rounded-full
px-2
py-1">

{{ $pendingRequests }}

</span>


@endif



</a>








{{-- Statistiques --}}

<a

href="#"

class="
flex
items-center
gap-3
px-4
py-3
rounded-xl
text-slate-700
hover:bg-slate-100">


<span class="material-symbols-outlined">

analytics

</span>


<span>

Statistiques

</span>


</a>








{{-- Profil --}}

<div class="pt-5">


<p

class="
px-4
text-xs
uppercase
font-semibold
text-slate-400">

Compte

</p>


</div>





<a

href="#"

class="
flex
items-center
gap-3
px-4
py-3
rounded-xl
text-slate-700
hover:bg-slate-100">


<span class="material-symbols-outlined">

person

</span>


<span>

Mon profil

</span>


</a>






</nav>








{{-- ================= AIDE ================= --}}

<div class="p-4 border-t">


<a

href="#"

class="
flex
items-center
justify-center
gap-2
bg-secondary
text-white
rounded-xl
py-3
font-semibold">


<span class="material-symbols-outlined">

help

</span>


Besoin d'aide ?


</a>


</div>





</aside>
