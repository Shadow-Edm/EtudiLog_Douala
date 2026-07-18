<!DOCTYPE html>
<html class="light" lang="fr">

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>
@yield('title','EtudiLog Douala')
</title>



<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>


<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">


<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">



<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>



<style>


body{

font-family:'Inter',sans-serif;

}



.material-symbols-outlined{

font-variation-settings:
'FILL' 0,
'wght' 400,
'GRAD' 0,
'opsz' 24;

display:inline-block;

}



.material-symbols-outlined.filled{

font-variation-settings:
'FILL' 1,
'wght' 500,
'GRAD' 0,
'opsz' 24;

}


</style>



<script>

tailwind.config={

theme:{

extend:{


colors:{


primary:"#00236f",

"primary-container":"#1e3a8a",

secondary:"#9d4300",

"secondary-container":"#fd761a",

background:"#f8f9ff",

surface:"#ffffff",

"surface-container-low":"#eff4ff",

"surface-container":"#e5eeff",

"surface-container-high":"#dce9ff",

"surface-container-highest":"#d3e4fe",

"outline-variant":"#c5c5d3",

"on-surface":"#0b1c30",

"on-surface-variant":"#444651",

error:"#ba1a1a"


}


}

}

}

</script>


</head>



<body
    x-data="{ sidebarOpen:false }"
    class="bg-background text-on-surface min-h-screen">



{{-- HEADER --}}

@include('layouts.header')

<div class="pt-16">



    <div class="flex">



    {{-- SIDEBAR DYNAMIQUE --}}


    @auth


    @if(auth()->user()->isEtudiant())


    @include('layouts.sidebars.etudiant')



    @elseif(auth()->user()->isProprietaire())


    @include('layouts.sidebars.proprietaire')



    @elseif(auth()->user()->isAdmin())


    @include('layouts.sidebars.admin')



    @elseif(auth()->user()->isManager())


    @include('layouts.sidebars.manager')


    @endif


    @endauth





    {{-- CONTENU --}}


    <main class="flex-grow lg:ml-64 p-lg bg-background">


    @include('layouts.alerts')


    @include('layouts.breadcrumbs')


    @yield('content')


    </main>



    </div>

</div>



<div class="pt-16">

{{-- FOOTER --}}

@include('layouts.footer')

</div>



@stack('scripts')


</body>


</html>
