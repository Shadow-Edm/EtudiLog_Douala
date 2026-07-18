<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(15);

        $stats = [

            'total'=>User::count(),

            'etudiants'=>User::where('role','etudiant')->count(),

            'proprietaires'=>User::where('role','proprietaire')->count(),

            'admins'=>User::where('role','admin')->count(),

            'managers'=>User::where('role','manager')->count(),

            'verifies'=>User::where('is_verified',true)->count(),

            'en_attente'=>User::where('is_verified',false)->count(),

            'suspendus'=>User::where('is_suspended',true)->count(),

        ];

        return view(
            'admin.users.index',
            compact('users','stats')
        );
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:etudiant,proprietaire,manager,admin',
        ]);

        // Un manager ne peut pas créer d'admin ni de manager
        if (
            auth()->user()->role == 'manager'
            && in_array($request->role, ['admin', 'manager'])
        ) {
            abort(403);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

            'role' => $request->role,

            'is_verified' => in_array(
                $request->role,
                ['admin', 'manager']
            ),

            'is_suspended' => false,
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Utilisateur créé avec succès.');
    }

    public function show(User $user)
    {

        if ($user->isProprietaire()) {

            $user->load([
                'logements.images',
            ]);

        } elseif ($user->isEtudiant()) {

            $user->load([
                'visites.logement',
                'favoris',
            ]);

        }

        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view(
            'admin.users.edit',
            compact('user')
        );
    }

    public function update(Request $request, User $user)
    {
        $request->validate([

            'name'=>'required',

            'email'=>[
                'required',
                'email',
                Rule::unique('users')->ignore($user)
            ],

            'role'=>'required|in:etudiant,proprietaire,manager,admin'

        ]);

        if(
            auth()->user()->role=='manager'
            && in_array($request->role,['manager','admin'])
        ){
            abort(403);
        }

        $user->update([

            'name'=>$request->name,

            'email'=>$request->email,

            'role'=>$request->role,

        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success','Utilisateur modifié.');
    }

    public function verify(User $user)
    {
        $user->update([

            'is_verified'=>true

        ]);

        return back()
            ->with(
                'success',
                'Compte validé.'
            );
    }

    public function suspend(User $user)
    {
        $user->update([

            'is_suspended'=>!$user->is_suspended

        ]);

        return back()
            ->with(
                'success',
                $user->is_suspended
                    ? 'Compte suspendu.'
                    : 'Compte réactivé.'
            );
    }

    public function destroy(User $user)
    {
        if($user->id==auth()->id()){

            return back()
                ->with(
                    'error',
                    'Vous ne pouvez pas supprimer votre propre compte.'
                );

        }

        $user->delete();

        return back()
            ->with(
                'success',
                'Compte supprimé.'
            );
    }
}
