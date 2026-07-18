@extends('layouts.app')

@section('title','Profil utilisateur')

@section('content')

<div class="max-w-7xl mx-auto">

    <a
        href="{{ route('admin.users.index') }}"
        class="text-primary">

        ← Retour

    </a>

    <div class="bg-white rounded-2xl shadow mt-6 overflow-hidden">

        <div class="p-8">

            <div class="flex flex-col md:flex-row justify-between gap-8">

                <div class="flex gap-6">

                    <img
                        src="https://ui-avatars.com/api/?size=150&name={{ urlencode($user->name) }}"
                        class="w-32 h-32 rounded-full">

                    <div>

                        <h1 class="text-3xl font-bold">

                            {{ $user->name }}

                        </h1>

                        <p class="text-gray-500">

                            {{ $user->email }}

                        </p>

                        <p class="mt-2">

                            Inscrit le

                            {{ $user->created_at->format('d/m/Y') }}

                        </p>

                    </div>

                </div>

                <div class="space-y-3">

                    <div>

                        <span class="font-semibold">

                            Rôle :

                        </span>

                        {{ ucfirst($user->role) }}

                    </div>

                    <div>

                        @if($user->is_verified)

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

                                Vérifié

                            </span>

                        @else

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">

                                En attente

                            </span>

                        @endif

                    </div>

                    @if($user->is_suspended)

                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">

                            Suspendu

                        </span>

                    @endif

                </div>

            </div>

        </div>

    </div>
