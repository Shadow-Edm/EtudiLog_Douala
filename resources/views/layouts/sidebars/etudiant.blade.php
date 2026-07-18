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
shadow-sm
transition-transform
duration-300
"

:class="sidebarOpen
    ? 'translate-x-0'
    : '-translate-x-full lg:translate-x-0'"
>


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

                Étudiant

            </p>


        </div>


    </div>


</div>







{{-- ================= MENU ================= --}}

<nav class="flex-1 p-4 space-y-2 overflow-y-auto">






{{-- Explorer logements --}}

<a

href="{{ route('logements.index') }}"

class="
flex
items-center
gap-3
px-4
py-3
rounded-xl
transition

{{ request()->routeIs('logements.index')
? 'bg-primary text-white'
: 'text-slate-700 hover:bg-slate-100'
}}

">


<span class="material-symbols-outlined">

search

</span>


<span>

Trouver un logement

</span>


</a>







{{-- Favoris --}}

<a

href="{{ route('favoris.index') }}"

class="
flex
items-center
gap-3
px-4
py-3
rounded-xl
transition

{{ request()->routeIs('favoris.*')
? 'bg-primary text-white'
: 'text-slate-700 hover:bg-slate-100'
}}

">


<span class="material-symbols-outlined">

favorite

</span>


<span>

Mes favoris

</span>


</a>







{{-- Mes demandes --}}

<a

href="{{ route('visites.index') }}"

class="
flex
items-center
gap-3
px-4
py-3
rounded-xl
transition

{{ request()->routeIs('visites.*')
? 'bg-primary text-white'
: 'text-slate-700 hover:bg-slate-100'
}}

">


<span class="material-symbols_outlined">

calendar_month

</span>


<span>

Mes demandes

</span>



@if(isset($pendingVisits) && $pendingVisits > 0)

<span

class="
ml-auto
bg-red-600
text-white
text-xs
px-2
py-1
rounded-full">

{{ $pendingVisits }}

</span>


@endif



</a>








{{-- Notifications --}}

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

notifications

</span>


<span>

Notifications

</span>


</a>







{{-- ================= COMPTE ================= --}}


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

lock

</span>


<span>

Sécurité

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
