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


{{-- ================= PROFIL RAPIDE ================= --}}

<div class="p-5 border-b">


<div class="flex items-center gap-4">


<img

src="{{ auth()->user()->photo_profil_url }}"

class="w-12 h-12 rounded-full object-cover border">


<div>

<h3 class="font-bold">

{{ auth()->user()->name }}

</h3>


<p class="text-sm text-slate-500">

Administrateur

</p>


</div>


</div>


</div>






{{-- ================= MENU ================= --}}

<nav class="flex-1 p-4 space-y-2 overflow-y-auto">





{{-- Dashboard --}}

<a

href="{{ route('admin.dashboard') }}"

class="
flex items-center gap-3
px-4 py-3
rounded-xl
transition

{{ request()->routeIs('admin.dashboard')
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








{{-- Utilisateurs --}}

<a

href="{{ route('admin.users.index') }}"

class="
flex items-center gap-3
px-4 py-3
rounded-xl
transition

{{ request()->routeIs('admin.users.*')
? 'bg-primary text-white'
: 'text-slate-700 hover:bg-slate-100'
}}

">


<span class="material-symbols-outlined">

group

</span>


<span>

Utilisateurs

</span>


</a>









{{-- Logements --}}

<a

href="{{ route('admin.logements.index') }}"

class="
flex items-center gap-3
px-4 py-3
rounded-xl
transition

{{ request()->routeIs('admin.logements.*')
? 'bg-primary text-white'
: 'text-slate-700 hover:bg-slate-100'
}}

">


<span class="material-symbols-outlined">

home

</span>


<span>

Logements

</span>


</a>









{{-- Demandes visites --}}

<a

href="{{ route('admin.visites.index') }}"

class="
flex items-center gap-3
px-4 py-3
rounded-xl
transition

{{ request()->routeIs('admin.visites.*')
? 'bg-primary text-white'
: 'text-slate-700 hover:bg-slate-100'
}}

">


<span class="material-symbols-outlined">

calendar_month

</span>


<span>

Demandes de visite

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








{{-- Validations --}}

<div class="pt-4">


<p class="px-4 text-xs uppercase text-slate-400 font-semibold">

Validation

</p>


</div>





<a

href="{{ route('admin.logements.index') }}"

class="
flex items-center gap-3
px-4 py-3
rounded-xl
text-slate-700
hover:bg-slate-100">

<span class="material-symbols-outlined">

verified

</span>


<span>

Logements à valider

</span>


</a>






<a

href="{{ route('admin.users.index') }}"

class="
flex items-center gap-3
px-4 py-3
rounded-xl
text-slate-700
hover:bg-slate-100">

<span class="material-symbols-outlined">

person_check

</span>


<span>

Comptes à valider

</span>


</a>









{{-- Administration avancée --}}

<div class="pt-4">


<p class="px-4 text-xs uppercase text-slate-400 font-semibold">

Administration

</p>


</div>






<!--
<a

href="{{-- route('admin.managers.index') --}}"

class="
flex items-center gap-3
px-4 py-3
rounded-xl
text-slate-700
hover:bg-slate-100">


<span class="material-symbols-outlined">

manage_accounts

</span>


<span>

Managers

</span>


</a>-->






<!--
<a

href="{{-- route('admin.settings') --}}"

class="
flex items-center gap-3
px-4 py-3
rounded-xl
text-slate-700
hover:bg-slate-100">


<span class="material-symbols-outlined">

settings

</span>


<span>

Paramètres

</span>


</a>-->






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


Aide


</a>


</div>



</aside>
