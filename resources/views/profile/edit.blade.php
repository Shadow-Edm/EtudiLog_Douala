@extends('layouts.app')

@section('title','Mon profil')


@section('content')


<div class="max-w-5xl mx-auto py-10">


    <div class="text-center mb-10">

        <h1 class="text-4xl font-bold text-primary">
            Mon profil
        </h1>

        <p class="text-on-surface-variant mt-2">
            Gérez vos informations personnelles
        </p>

    </div>




    {{-- Carte principale --}}

    <div class="
        bg-surface-container-lowest
        rounded-3xl
        shadow-xl
        border
        border-outline-variant
        p-8
    ">


        {{-- En-tête utilisateur --}}

        <div class="
            flex
            flex-col
            md:flex-row
            items-center
            gap-6
            mb-10
        ">


            <img

                src="{{ auth()->user()->photo_profil_url }}"

                class="
                    w-32
                    h-32
                    rounded-full
                    object-cover
                    border-4
                    border-primary
                "

            >



            <div class="text-center md:text-left">


                <h2 class="text-3xl font-bold">

                    {{ auth()->user()->name }}

                </h2>



                <p class="text-primary font-semibold mt-2">

                    {{ ucfirst(auth()->user()->role) }}

                </p>



                <p class="text-on-surface-variant">

                    {{ auth()->user()->email }}

                </p>


            </div>


        </div>
