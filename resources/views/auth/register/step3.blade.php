<div
                        x-show="step===3"
                        x-transition
                        class="space-y-8"
                    >

                        <div class="bg-surface-container-low rounded-3xl p-8 border border-outline-variant">

                            <h2 class="text-2xl font-bold text-primary mb-2">
                                Informations complémentaires
                            </h2>

                            <p class="text-on-surface-variant mb-8">
                                Quelques informations supplémentaires nous permettront de personnaliser votre compte.
                            </p>

                            <!-- ETUDIANT -->

                            <div
                                x-show="role==='etudiant'"
                                x-transition
                                class="space-y-6"
                            >



                                <div>

                                    <x-input-label
                                        for="etablissement"
                                        value="Établissement universitaire"
                                    />

                                    <x-text-input
                                        id="etablissement"
                                        class="block mt-2 w-full rounded-xl"
                                        type="text"
                                        name="etablissement"
                                        :value="old('etablissement')"
                                        placeholder="Ex : Université de Douala"
                                    />

                                    <x-input-error
                                        :messages="$errors->get('etablissement')"
                                        class="mt-2"
                                    />

                                </div>

                            </div>

                            <!-- PROPRIETAIRE -->

                            <div
                                x-show="role==='proprietaire'"
                                x-transition
                                class="space-y-6"
                            >

                                <!-- Adresse -->

                                <div>

                                    <x-input-label
                                        for="adresse_residence"
                                        value="Adresse de résidence"
                                    />

                                    <x-text-input
                                        id="adresse_residence"
                                        class="block mt-2 w-full rounded-xl"
                                        type="text"
                                        name="adresse_residence"
                                        :value="old('adresse_residence')"
                                        placeholder="Ex : Bonamoussadi, Douala"
                                    />

                                    <x-input-error
                                        :messages="$errors->get('adresse_residence')"
                                        class="mt-2"
                                    />

                                </div>

                                <!-- Photo de profil -->

                                <div
                                    x-data="{
                                        preview: null
                                    }"
                                >

                                    <x-input-label
                                        for="photo_profil"
                                        value="Photo de profil"
                                    />

                                    <label
                                        for="photo_profil"
                                        class="mt-2 flex flex-col items-center justify-center
                                        w-full h-48
                                        border-2 border-dashed border-outline-variant
                                        rounded-2xl
                                        bg-surface-container-low
                                        cursor-pointer
                                        hover:bg-surface-container-high
                                        transition"
                                    >

                                        <!-- Aperçu image -->
                                        <template x-if="preview">
                                            <img
                                                :src="preview"
                                                class="w-28 h-28 rounded-full object-cover mb-3 shadow"
                                            >
                                        </template>


                                        <!-- Icône quand aucune image -->
                                        <template x-if="!preview">

                                            <span class="material-symbols-outlined text-5xl text-primary">
                                                add_a_photo
                                            </span>

                                        </template>


                                        <p class="mt-2 text-sm text-on-surface-variant text-center">

                                            <span class="font-semibold text-primary">
                                                Cliquez pour ajouter une photo
                                            </span>

                                            <br>

                                            JPG, PNG ou JPEG (max 4 Mo)

                                        </p>


                                        <input
                                            id="photo_profil"
                                            type="file"
                                            name="photo_profil"
                                            accept="image/*"
                                            class="hidden"
                                            @change="
                                                const file = $event.target.files[0];
                                                if(file){
                                                    preview = URL.createObjectURL(file)
                                                }
                                            "
                                        >

                                    </label>


                                    <x-input-error
                                        :messages="$errors->get('photo_profil')"
                                        class="mt-2"
                                    />

                                </div>

                            </div>

                        </div>

                        <div class="mt-10 space-y-4">


                            {{-- Bouton inscription --}}
                            <button
                                type="submit"
                                class="
                                    w-full
                                    flex
                                    items-center
                                    justify-center
                                    gap-3
                                    bg-primary
                                    text-white
                                    py-4
                                    rounded-2xl
                                    font-semibold
                                    text-lg
                                    shadow-md
                                    hover:shadow-lg
                                    hover:opacity-95
                                    active:scale-[0.98]
                                    transition-all
                                "
                            >


                                <span
                                    class="material-symbols-outlined"
                                    x-text="
                                        role==='proprietaire'
                                        ? 'handshake'
                                        : 'person_add'
                                    "
                                >
                                </span>


                                <span
                                    x-text="
                                        role==='proprietaire'
                                        ? 'Devenir partenaire EtudiLog'
                                        : 'Créer mon compte étudiant'
                                    "
                                >
                                </span>


                            </button>

                        </div>

                        <!-- Bouton de transition 3 -->

                        <div class="flex justify-between">

                            <button
                                type="button"
                                @click="step=2"
                                class="flex items-center gap-2 px-6 py-3 rounded-xl border border-outline-variant hover:bg-surface-container-low transition"
                            >

                                <span class="material-symbols-outlined">
                                    arrow_back
                                </span>

                                Retour

                            </button>

                        </div>

                    </div>
