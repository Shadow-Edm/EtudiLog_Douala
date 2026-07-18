@extends('layouts.app')

@section('title','Gestion des logements')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-primary">

                Gestion des logements

            </h1>

            <p class="text-on-surface-variant">

                Administration des annonces publiées.

            </p>

        </div>

    </div>

    @include('admin.logements._stats')

    @include('admin.logements._filters')

    @include('admin.logements._cards')

</div>

@endsection
