<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    // Afficher le formulaire
    public function index()
    {
        return view('pages.contact');
    }

    // Traiter l'envoi
    public function send(Request $request)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10|max:5000',
        ], [
            'name.required' => 'Votre nom est requis',
            'email.required' => 'Votre email est requis',
            'email.email' => 'Email invalide',
            'subject.required' => 'Le sujet est requis',
            'message.required' => 'Le message est requis',
            'message.min' => 'Le message doit contenir au moins 10 caractères',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Sauvegarder le message en base
        $message = Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // Envoyer l'email à tiefingsangare86@gmail.com
        try {
            Mail::send('emails.contact', [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'userMessage' => $request->message,
            ], function ($mail) use ($request) {
                $mail->to('tiefingsangare86@gmail.com')
                     ->subject('Nouveau message de ' . $request->name)
                     ->from($request->email, $request->name);
            });

            return back()->with('success', '✅ Message envoyé avec succès ! Je vous répondrai dans les plus brefs délais.');

        } catch (\Exception $e) {
            // Même si l'email échoue, le message est en base
            return back()->with('warning', '⚠️ Message enregistré mais email non envoyé. Je vous contacterai manuellement.');
        }
    }
}
