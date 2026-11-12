<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function send(Request $request)
    {
        // 🍯 Honeypot : si le champ caché est rempli, c'est un bot
        if ($request->filled('website')) {
            return back()->with('success', '✅ Message envoyé avec succès ! Je vous répondrai dans les plus brefs délais.');
        }

        // Validation
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

        // Nettoyage
        $cleanName    = strip_tags($request->name);
        $cleanSubject = strip_tags($request->subject);
        $cleanMessage = strip_tags($request->message);

        // Sauvegarde en BDD
        $message = Message::create([
            'name'    => $cleanName,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'subject' => $cleanSubject,
            'message' => $cleanMessage,
        ]);

        try {
            // ✅ EMAIL 1 : À VOUS (l'admin) — le message du visiteur
            Mail::send('emails.contact', [
                'name'        => $cleanName,
                'email'       => $request->email,
                'phone'       => $request->phone,
                'subject'     => $cleanSubject,
                'userMessage' => $cleanMessage,
            ], function ($mail) use ($request, $cleanName) {
                $mail->to('tiefingsangare86@gmail.com')
                     ->subject('Nouveau message de ' . $cleanName)
                     ->from(config('mail.from.address'), config('mail.from.name'))
                     ->replyTo($request->email, $cleanName);
            });

            // ✅ EMAIL 2 : AU VISITEUR — l'accusé de réception
            Mail::send('emails.confirmation', [
                'name'    => $cleanName,
                'subject' => $cleanSubject,
                'message' => $cleanMessage,
            ], function ($mail) use ($request, $cleanName) {
                $mail->to($request->email, $cleanName)
                     ->subject('✅ Votre message a bien été reçu - Tiefing Sangare')
                     ->from(config('mail.from.address'), config('mail.from.name'));
            });

            return back()->with('success', '✅ Message envoyé avec succès ! Un email de confirmation vous a été envoyé. Je vous répondrai dans les plus brefs délais.');

        } catch (\Exception $e) {
            \Log::error('Échec envoi email contact', [
                'error'      => $e->getMessage(),
                'message_id' => $message->id,
                'ip'         => $request->ip(),
            ]);

            return back()->with('warning', '⚠️ Message enregistré mais email non envoyé. Je vous contacterai manuellement.');
        }
    }
}
