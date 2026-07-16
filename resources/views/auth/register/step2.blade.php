<div
                        x-show="step===2"
                        x-transition
                    >

                        {{-- TES CHAMPS EXISTANTS ICI --}}
                        <!-- Name -->
                        <div>
                            <x-input-label
                                for="name"
                                value="Nom complet" />

                            <x-text-input
                                id="name"
                                class="block mt-1 w-full rounded-xl"
                                type="text"
                                name="name"
                                :value="old('name')"
                                required
                                autofocus
                                autocomplete="name"
                            />

                            <x-input-error
                                :messages="$errors->get('name')"
                                class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">

                            <x-input-label
                                for="email"
                                value="Adresse email" />

                            <x-text-input
                                id="email"
                                class="block mt-1 w-full rounded-xl"
                                type="email"
                                name="email"
                                :value="old('email')"
                                required
                                autocomplete="email"
                            />

                            <x-input-error
                                :messages="$errors->get('email')"
                                class="mt-2" />

                        </div>

                        <!-- Phone -->

                        <div class="mt-4">

                            <x-input-label
                                for="telephone"
                                value="Numéro de téléphone"
                            />

                            <x-text-input
                                id="telephone"
                                class="block mt-1 w-full rounded-xl"
                                type="text"
                                name="telephone"
                                :value="old('telephone')"
                                required
                                placeholder="Ex: 6XXXXXXXX"
                            />

                            <x-input-error
                                :messages="$errors->get('telephone')"
                                class="mt-2"
                            />

                        </div>

                        <!-- Password -->
                        <div class="mt-4">

                            <x-input-label
                                for="password"
                                value="Mot de passe"
                            />

                            <x-text-input
                                id="password"
                                class="block mt-1 w-full rounded-xl"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                            />

                            <x-input-error
                                :messages="$errors->get('password')"
                                class="mt-2"
                            />

                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">

                            <x-input-label
                                for="password_confirmation"
                                value="Confirmer le mot de passe"
                            />

                            <x-text-input
                                id="password_confirmation"
                                class="block mt-1 w-full rounded-xl"
                                type="password"
                                name="password_confirmation"
                                required
                            />

                        </div>

                        <!-- Bouton de transition 2 -->

                        <div class="flex justify-between mt-8">

                            <button
                                type="button"
                                @click="step=1"
                                class="px-6 py-3 rounded-xl border border-outline-variant hover:bg-surface-container-low transition"
                            >
                                <span class="material-symbols-outlined align-middle">arrow_back</span>
                                Retour
                            </button>

                            <button
                                type="button"
                                @click="if(role){step=3}"
                                class="px-6 py-3 rounded-xl bg-primary text-white hover:opacity-90 transition flex items-center gap-2"
                            >
                                Continuer
                                <span class="material-symbols-outlined">arrow_forward</span>
                            </button>

                        </div>

                    </div>
