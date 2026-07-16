{{-- Choix du profil --}}
            <div
                x-show="step===1"
                x-transition
            >
                <h2 class="text-2xl font-bold text-on-surface mb-6 text-center">
                    Quel est votre profil ?
                </h2>


                <div class="grid md:grid-cols-2 gap-6 mb-10">


                    {{-- ================= ETUDIANT ================= --}}
                    <button
                        type="button"
                        @click="role='etudiant'"
                        :class="
                            role==='etudiant'
                            ? 'border-primary bg-primary/10 shadow-lg scale-[1.02]'
                            : 'border-outline-variant bg-surface-container-low'
                        "
                        class="
                            group
                            relative
                            rounded-3xl
                            border-2
                            p-8
                            text-left
                            transition-all
                            duration-300
                            hover:shadow-md
                            hover:-translate-y-1
                        "
                    >

                        <div class="
                            w-16 h-16
                            rounded-2xl
                            bg-primary
                            flex items-center justify-center
                            mb-6
                        ">

                            <span class="material-symbols-outlined text-4xl text-white">
                                school
                            </span>

                        </div>


                        <h3 class="
                            text-xl
                            font-bold
                            text-on-surface
                            mb-2
                        ">

                            Je suis étudiant

                        </h3>


                        <p class="
                            text-on-surface-variant
                            leading-relaxed
                        ">

                            Trouvez un logement proche de votre université,
                            consultez les annonces disponibles et contactez
                            facilement les propriétaires.

                        </p>


                        <div
                            x-show="role==='etudiant'"
                            class="
                                absolute
                                top-5
                                right-5
                                w-8 h-8
                                rounded-full
                                bg-primary
                                flex
                                items-center
                                justify-center
                            "
                        >

                            <span class="material-symbols-outlined text-white">
                                check
                            </span>

                        </div>


                    </button>



                    {{-- ================= PROPRIETAIRE ================= --}}
                    <button
                        type="button"
                        @click="role='proprietaire'"
                        :class="
                            role==='proprietaire'
                            ? 'border-primary bg-primary/10 shadow-lg scale-[1.02]'
                            : 'border-outline-variant bg-surface-container-low'
                        "
                        class="
                            group
                            relative
                            rounded-3xl
                            border-2
                            p-8
                            text-left
                            transition-all
                            duration-300
                            hover:shadow-md
                            hover:-translate-y-1
                        "
                    >

                        <div class="
                            w-16 h-16
                            rounded-2xl
                            bg-secondary-container
                            flex items-center justify-center
                            mb-6
                        ">

                            <span class="material-symbols-outlined text-4xl text-white">
                                apartment
                            </span>

                        </div>


                        <h3 class="
                            text-xl
                            font-bold
                            text-on-surface
                            mb-2
                        ">

                            Je suis propriétaire

                        </h3>


                        <p class="
                            text-on-surface-variant
                            leading-relaxed
                        ">

                            Publiez vos logements, recevez des demandes
                            d'étudiants et gérez vos annonces facilement.

                        </p>


                        <div
                            x-show="role==='proprietaire'"
                            class="
                                absolute
                                top-5
                                right-5
                                w-8 h-8
                                rounded-full
                                bg-primary
                                flex
                                items-center
                                justify-center
                            "
                        >

                            <span class="material-symbols-outlined text-white">
                                check
                            </span>

                        </div>


                    </button>


                </div>
            </div>

            <!-- Bouton de transition 1 -->

            <div
                x-show="step===1"
                class="flex justify-end mt-8"
            >

                <button
                    type="button"
                    @click="if(role){step=2}"
                    class="
                        bg-primary
                        text-white
                        px-8
                        py-3
                        rounded-xl
                        flex
                        items-center
                        gap-2
                        hover:opacity-90
                        transition
                    "
                >

                    Continuer

                    <span class="material-symbols-outlined">
                        arrow_forward
                    </span>

                </button>

            </div>
