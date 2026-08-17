<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Supprimer l'ancien utilisateur s'il existe
        User::where('email', 'tiefingsangare86@gmail.com')->delete();

        // Créer l'administrateur
        $admin = User::create([
            // Informations personnelles
            'name' => 'Tiefing Sangare',
            'email' => 'tiefingsangare86@gmail.com',
            'password' => Hash::make('admin123@'),
            'email_verified_at' => now(),

            // Contact
            'phone' => '+223 66 89 44 75',
            'location' => 'Bamako, Mali',

            // Profil professionnel
            'title' => 'Développeur Full Stack & Expert SEO',
            'company' => 'Masadigitale',
            'bio' => 'Développeur web passionné, créateur de solutions digitales innovantes au Mali. Spécialisé en Laravel, React, Flutter et SEO.',
            'about' => "Je suis Tiefing Sangare, développeur web full stack avec plus de 5 ans d'expérience. Passionné par les nouvelles technologies, je crée des sites web performants, des applications mobiles et des solutions IA pour les entreprises maliennes.\n\nMon objectif est d'accompagner les entreprises dans leur transformation digitale en leur fournissant des solutions sur mesure, modernes et optimisées pour le référencement.\n\nN'hésitez pas à me contacter pour discuter de vos projets !",

            // Réseaux sociaux
            'youtube' => 'https://youtube.com/@tiefingsangare-y4u?si=aH1AGOAiHaWNHgw5',
            'facebook' => 'https://www.facebook.com/profile.php?id=61590223301110',
            'twitter' => 'https://twitter.com/tiefingsangare',
            'instagram' => 'https://www.instagram.com/tiefing_sangare_ts?igsh=ZWJpcmdrczVueHk5&utm_source=qr',
            'linkedin' => 'https://linkedin.com/in/tiefingsangare',
            'github' => 'https://github.com/tiefingsang',
            'whatsapp' => 'https://wa.me/22366894475',
            'telegram' => 'https://t.me/tiefingsangare',
            'tiktok' => 'https://tiktok.com/@tiefingsangare',
            'discord' => 'https://discord.gg/tiefingsangare',

            // Liens professionnels
            'portfolio_url' => 'https://tiefingsangare.com',
            'blog_url' => 'https://blog.tiefingsangare.com',
            'calendly_url' => 'https://calendly.com/tiefingsangare',

            // Paramètres
            'role' => 'admin',
            'is_active' => true,
            'show_social' => true,
        ]);

        $this->command->info('✅ Compte administrateur créé avec succès !');
        $this->command->info('📧 Email: tiefingsangare86@gmail.com');
        $this->command->info('🔑 Mot de passe: admin123@');
        $this->command->info('🌐 Site: http://127.0.0.1:8000/admin/login');

        // Afficher un message de rappel
        $this->command->warn('⚠️  N\'oubliez pas de changer ce mot de passe après la première connexion !');
    }
}
