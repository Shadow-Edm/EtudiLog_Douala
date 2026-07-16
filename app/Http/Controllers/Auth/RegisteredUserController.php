<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {
        return view('auth.register', [
            'role' => $request->get('role', 'etudiant'),
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([

            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'telephone' => ['required', 'string', 'max:20'],

            'role' => ['required', 'in:etudiant,proprietaire'],

            'adresse_residence' => [
                'nullable',
                'string',
                'max:255',
                'required_if:role,proprietaire'
            ],

            'etablissement' => [
                'nullable',
                'string',
                'max:255',
                'required_if:role,etudiant'
            ],

            'photo_profil' => [
                'nullable',
                'image',
                'max:4096',
                'required_if:role,proprietaire'
            ],

            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults(),
            ],

        ]);

        $photo = null;

        if ($request->hasFile('photo_profil')) {

            $photo = $request
                ->file('photo_profil')
                ->store('profils', 'public');

        }

        $user = User::create([

            'name' => $validated['name'],

            'email' => $validated['email'],

            'telephone' => $validated['telephone'],

            'role' => $validated['role'],

            'adresse_residence' => $validated['adresse_residence'] ?? null,

            'etablissement' => $validated['etablissement'] ?? null,

            'photo_profil' => $photo,

            'password' => Hash::make($validated['password']),

        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('logements.index', absolute: false));
    }
}
