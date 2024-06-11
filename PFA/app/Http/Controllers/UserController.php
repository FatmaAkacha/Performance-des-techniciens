<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all(); // Récupère tous les utilisateurs
        return view('users.index', compact('users')); // Retourne une vue avec les utilisateurs
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'location' => 'required|string|in:Tunis,Sousse,Sfax',
            'specific_location' => 'nullable|string|required_if:location,Sfax|in:7 Novembre,Menzel Cheker',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->location = $request->location;
        $user->specific_location = $request->specific_location; // Enregistrement de la localisation spécifique pour Sfax
        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Calculate the installation rate based on user's location.
     *
     * @param  User  $user
     * @return float
     */
    public function calculateInstallationRate(User $user)
    {
        $rate = $this->getBaseRate(); // Méthode fictive pour obtenir le taux de base

        if ($user->location === 'Sfax') {
            if ($user->specific_location === '7 Novembre' || $user->specific_location === 'Menzel Cheker') {
                $rate /= 2;
            }
        }

        return $rate;
    }

    /**
     * Get the base installation rate.
     *
     * @return float
     */
    protected function getBaseRate()
    {
        // Remplacez ceci par la logique réelle pour obtenir le taux de base
        return 10.0;
    }
}
