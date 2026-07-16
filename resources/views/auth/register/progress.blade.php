<div class="mb-10">

            <!-- Barre -->
            <div class="flex justify-center">


                <div class="flex items-center">



                    <div class="flex items-center">

                        <!-- Cercle -->
                        <div class="flex justify-center">

                        <div class="flex items-center">

                            <!-- Étape 1 -->
                            <div class="flex items-center">

                                <div
                                    class="w-12 h-12 rounded-full flex items-center justify-center transition-all duration-300"
                                    :class="step >= 1
                                        ? 'bg-primary text-white shadow-md'
                                        : 'bg-surface-container-high text-on-surface-variant'"
                                >

                                    <span
                                        class="material-symbols-outlined"
                                        x-text="step > 1 ? 'check' : 'badge'"
                                    ></span>

                                </div>

                                <div
                                    class="w-32 h-1 mx-3 rounded-full"
                                    :class="step > 1
                                        ? 'bg-primary'
                                        : 'bg-outline-variant'"
                                ></div>

                            </div>

                            <!-- Étape 2 -->
                            <div class="flex items-center">

                                <div
                                    class="w-12 h-12 rounded-full flex items-center justify-center transition-all duration-300"
                                    :class="step >= 2
                                        ? 'bg-primary text-white shadow-md'
                                        : 'bg-surface-container-high text-on-surface-variant'"
                                >

                                    <span
                                        class="material-symbols-outlined"
                                        x-text="step > 2 ? 'check' : 'person'"
                                    ></span>

                                </div>

                                <div
                                    class="w-32 h-1 mx-3 rounded-full"
                                    :class="step > 2
                                        ? 'bg-primary'
                                        : 'bg-outline-variant'"
                                ></div>

                            </div>

                            <!-- Étape 3 -->
                            <div
                                class="w-12 h-12 rounded-full flex items-center justify-center transition-all duration-300"
                                :class="step >= 3
                                    ? 'bg-primary text-white shadow-md'
                                    : 'bg-surface-container-high text-on-surface-variant'"
                            >

                                <span
                                    class="material-symbols-outlined"
                                    x-text="step === 3 ? 'verified' : 'task_alt'"
                                ></span>

                            </div>

                        </div>

                    </div>

                            <!-- Ligne -->
                            <div
                                x-show="i < 3"
                                class="w-32 h-1 mx-3 rounded-full transition-all duration-300"
                                :class="
                                    step > i
                                    ? 'bg-primary'
                                    : 'bg-outline-variant'
                                "
                            ></div>

                        </div>



                </div>

            </div>

            <!-- Titres -->
            <div class="flex justify-center mt-4">

                <div class="flex items-center">

                    <div class="w-12 text-center">
                        <span class="text-sm font-medium">
                            Profil
                        </span>
                    </div>

                    <div class="w-36"></div>

                    <div class="w-12 text-center">
                        <span class="text-sm font-medium">
                            Compte
                        </span>
                    </div>

                    <div class="w-36"></div>

                    <div class="w-12 text-center">
                        <span class="text-sm font-medium">
                            Validation
                        </span>
                    </div>

                </div>

            </div>

        </div>
