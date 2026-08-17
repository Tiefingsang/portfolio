<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function index()
    {
        // Récupérer l'utilisateur admin (le premier ou celui connecté)
        $user = User::where('email', 'tiefingsangare86@gmail.com')->first();

        // Si l'utilisateur n'est pas trouvé, prendre le premier utilisateur
        if (!$user) {
            $user = User::first();
        }

        // Si toujours pas d'utilisateur, créer un objet par défaut
        if (!$user) {
            $user = new \stdClass();
            $user->name = 'Tiefing Sangare';
            $user->title = 'Développeur Full Stack & Expert SEO';
            $user->bio = 'Développeur web passionné et entrepreneur digital basé à Bamako, Mali.';
            $user->about = 'Passionné par le développement web et les nouvelles technologies, je crée des solutions digitales performantes pour les entreprises au Mali.';
            $user->email = 'tiefingsangare86@gmail.com';
            $user->phone = '+223 66 89 44 75';
            $user->location = 'Bamako, Mali';
            $user->company = 'Masadigitale';
            $user->avatar = null;
            $user->youtube = null;
            $user->facebook = null;
            $user->twitter = null;
            $user->linkedin = null;
            $user->github = null;
        }

        return view('pages.about', compact('user'));
    }
}
