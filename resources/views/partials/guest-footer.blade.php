<!-- ================= FOOTER ================= -->

<footer class="bg-surface-container-highest border-t border-outline-variant mt-24">

    <div class="max-w-7xl mx-auto px-6 py-16">

        <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-10">

            <!-- Logo -->

            <div class="lg:col-span-2">

                <h2 class="text-3xl font-bold text-primary">
                    EtudiLog Douala
                </h2>

                <p class="mt-5 text-on-surface-variant leading-7">

                    La plateforme qui facilite la mise en relation entre les
                    étudiants et les propriétaires de logements à proximité des
                    établissements d'enseignement supérieur de Douala.

                </p>

                <div class="flex items-center gap-3 mt-8">

                    <span class="material-symbols-outlined text-primary">
                        location_on
                    </span>

                    <span class="text-on-surface-variant">

                        Douala, Cameroun

                    </span>

                </div>

                <div class="flex items-center gap-3 mt-4">

                    <span class="material-symbols-outlined text-primary">
                        call
                    </span>

                    <span>

                        +237 686 650 063

                    </span>

                </div>

                <div class="flex items-center gap-3 mt-4">

                    <span class="material-symbols-outlined text-primary">
                        mail
                    </span>

                    <span>

                        contact@etudilog.cm

                    </span>

                </div>

            </div>

            <!-- Plateforme -->

            <div>

                <h3 class="font-bold text-lg mb-5">

                    Plateforme

                </h3>

                <ul class="space-y-3">

                    <li>

                        <a href="{{ url('/') }}"
                           class="hover:text-primary transition">

                            Accueil

                        </a>

                    </li>

                    <li>

                        <a href="{{ route('logements.index') }}"
                           class="hover:text-primary transition">

                            Logements

                        </a>

                    </li>

                    <li>

                        <a href="#"
                           class="hover:text-primary transition">

                            Comment ça marche ?

                        </a>

                    </li>

                    <li>

                        <a href="#"
                           class="hover:text-primary transition">

                            FAQ

                        </a>

                    </li>

                </ul>

            </div>

            <!-- Propriétaires -->

            <div>

                <h3 class="font-bold text-lg mb-5">

                    Propriétaires

                </h3>

                <ul class="space-y-3">

                    <li>

                        <a href="{{ route('register') }}?role=proprietaire"
                           class="hover:text-primary transition">

                            Devenir partenaire

                        </a>

                    </li>

                    <li>

                        <a href="#"
                           class="hover:text-primary transition">

                            Publier un logement

                        </a>

                    </li>

                    <li>

                        <a href="#"
                           class="hover:text-primary transition">

                            Gestion des annonces

                        </a>

                    </li>

                </ul>

            </div>

            <!-- Légal -->

            <div>

                <h3 class="font-bold text-lg mb-5">

                    Informations

                </h3>

                <ul class="space-y-3">

                    <li>

                        <a href="#"
                           class="hover:text-primary transition">

                            À propos

                        </a>

                    </li>

                    <li>

                        <a href="#"
                           class="hover:text-primary transition">

                            Politique de confidentialité

                        </a>

                    </li>

                    <li>

                        <a href="#"
                           class="hover:text-primary transition">

                            Conditions d'utilisation

                        </a>

                    </li>

                    <li>

                        <a href="#"
                           class="hover:text-primary transition">

                            Contact

                        </a>

                    </li>

                </ul>

            </div>

        </div>

        <!-- Réseaux sociaux -->

        <div class="border-t border-outline-variant mt-14 pt-8 flex flex-col lg:flex-row justify-between items-center gap-6">

            <div>

                <p class="text-on-surface-variant">

                    © {{ date('Y') }} EtudiLog Douala.
                    Tous droits réservés.

                </p>

            </div>

            <div class="flex gap-5">

                <a href="#"
                   class="hover:text-primary transition">

                    <span class="material-symbols-outlined">

                        public

                    </span>

                </a>

                <a href="#"
                   class="hover:text-primary transition">

                    <span class="material-symbols-outlined">

                        alternate_email

                    </span>

                </a>

                <a href="#"
                   class="hover:text-primary transition">

                    <span class="material-symbols-outlined">

                        call

                    </span>

                </a>

            </div>

        </div>

    </div>

</footer>
