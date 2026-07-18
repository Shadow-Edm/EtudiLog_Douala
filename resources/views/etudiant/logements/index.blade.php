@extends('layouts.app')

@section('title', 'Trouver un logement')

@section('content')

<div class="max-w-container-max mx-auto px-4 lg:px-6 py-8">

    {{-- Header --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-8">

        <div>

            <h1 class="font-headline-lg text-headline-lg text-primary">
                Logements à Douala
            </h1>

            <p class="mt-2 text-on-surface-variant">
                {{-- $logements --}}
                {{ $logements->total() }}

                logement(s) trouvé(s)

            </p>

        </div>

        {{-- Tri --}}
        <form method="GET">

            {{-- conserver tous les filtres --}}
            @foreach(request()->except('sort','page') as $key=>$value)

                @if(is_array($value))

                    @foreach($value as $v)

                        <input
                            type="hidden"
                            name="{{ $key }}[]"
                            value="{{ $v }}">

                    @endforeach

                @else

                    <input
                        type="hidden"
                        name="{{ $key }}"
                        value="{{ $value }}">

                @endif

            @endforeach

            <div class="flex items-center gap-3">

                <span
                    class="text-sm text-on-surface-variant">

                    Trier par

                </span>

                <select
                    name="sort"
                    onchange="this.form.submit()"
                    class="rounded-xl border-outline-variant bg-surface-container-lowest">

                    <option
                        value="recent"
                        @selected(request('sort')=="recent")>

                        Plus récents

                    </option>

                    <option
                        value="prix_asc"
                        @selected(request('sort')=="prix_asc")>

                        Prix croissant

                    </option>

                    <option
                        value="prix_desc"
                        @selected(request('sort')=="prix_desc")>

                        Prix décroissant

                    </option>

                    <option
                        value="distance"
                        @selected(request('sort')=="distance")>

                        Les plus proches

                    </option>

                </select>

            </div>

        </form>

    </div>

    {{-- Corps --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

        {{-- Sidebar --}}
        <aside class="lg:col-span-3">

            @include('etudiant.logements._filters')

        </aside>

        {{-- Liste --}}
        <section class="lg:col-span-9">

            @if($logements->count())

                <div class="grid
                            grid-cols-1
                            md:grid-cols-2
                            2xl:grid-cols-2
                            gap-6">

                    @foreach($logements as $logement)

                        @include(
                            'etudiant.logements._card',
                            compact('logement')
                        )

                    @endforeach

                </div>

            @else

                <div
                    class="rounded-2xl
                    border
                    border-outline-variant
                    bg-surface-container-lowest
                    p-16
                    text-center">

                    <span
                        class="material-symbols-outlined
                        text-6xl
                        text-outline">

                        home

                    </span>

                    <h2
                        class="mt-4
                        text-2xl
                        font-bold">

                        Aucun logement trouvé

                    </h2>

                    <p
                        class="mt-3
                        text-on-surface-variant">

                        Essayez de modifier vos critères
                        de recherche.

                    </p>

                </div>

            @endif

            {{-- Pagination --}}
            <div class="mt-10">

                {{ $logements->withQueryString()->links() }}

            </div>

        </section>

    </div>

</div>

@endsection
