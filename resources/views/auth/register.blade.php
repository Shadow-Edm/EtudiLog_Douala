@extends('layouts.guest')

@section('title', 'Créer un compte')

@section('content')

<div class="min-h-screen bg-background flex items-center justify-center px-4 py-10">

    <div class="w-full max-w-3xl">

        {{-- Logo + Introduction --}}
        <div class="text-center mb-10">

            <h1 class="text-4xl font-bold text-primary">
                EtudiLog Douala
            </h1>

            <p class="mt-3 text-on-surface-variant text-lg">
                Créez votre compte et rejoignez la première plateforme
                de logement étudiant à Douala.
            </p>

        </div>



        <div
            x-data="{
                role:'{{ old('role',$role) }}',
                step:1
            }"
            class="bg-surface-container-lowest rounded-3xl shadow-xl border border-outline-variant p-8"
        >

        <!-- Barre de progression -->

        @include('auth.register.progress')





            <!-- Formulaire d'inscription -->

            <form
                method="POST"
                action="{{ route('register') }}"
                enctype="multipart/form-data"
            >

                @csrf


                <input
                    type="hidden"
                    name="role"
                    :value="role"
                >

                @include('auth.register.step1')

                @include('auth.register.step2')

                @include('auth.register.step3')


                    {{-- Retour connexion --}}
                    <p class="
                        text-center
                        text-sm
                        text-on-surface-variant
                    ">

                        Vous avez déjà un compte ?

                        <a
                            href="{{ route('login') }}"
                            class="
                                text-primary
                                font-semibold
                                hover:underline
                            "
                        >

                            Se connecter

                        </a>

                    </p>


                </div>


            </form>


        </div>


    </div>


</div>

@endsection
