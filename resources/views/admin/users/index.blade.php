@extends('layouts.app')

@section('title','Gestion des utilisateurs')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-5 mb-10">

        <div>

            <h1 class="text-3xl font-bold text-primary">

                Gestion des utilisateurs

            </h1>

            <p class="text-on-surface-variant mt-2">

                Gérez les étudiants, propriétaires, managers et administrateurs.

            </p>

        </div>

        <a
            href="{{ route('admin.users.create') }}"
            class="bg-primary text-white px-6 py-3 rounded-xl shadow hover:opacity-90">

            + Ajouter un utilisateur

        </a>

    </div>

    @include('admin.users._stats')

    <div class="mt-10">

        <div class="grid lg:grid-cols-2 gap-6">

            @foreach($users as $user)

                @include('admin.users._card')

            @endforeach

        </div>

    </div>

    <div class="mt-10">

        {{ $users->links() }}

    </div>

</div>

@endsection
