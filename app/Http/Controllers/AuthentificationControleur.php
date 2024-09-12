<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;

class AuthentificationControleur extends Controller
{
    public function login(Request $request){
        return view("login", []);
    }

    public function traitementLogin(Request $request){
        $mdp = $request->input('password');
        $email = $request->input('email');
        $utilisateur = Utilisateur::where('email', $email)->first();
        $estValide = password_verify($mdp, $utilisateur->password);

        if ($estValide) {
            $request->session()->put('user', $utilisateur);
        } else {
            return redirect('/login')->with('error', 'Identifiants incorrects');
        }
    }

    public function register(Request $request){
        return view("register", []);
    }

    public function traitementRegister(Request $request){
        $mdp = $request->input('password');
        $mail = $request->input('email');
        $name = $request->input('name');
        $hash = password_hash($mdp, PASSWORD_DEFAULT);
        Utilisateur::create(['name' => $name, 'email' => $mail, 'password' => $hash]);
        return redirect("/login");
    }
}
