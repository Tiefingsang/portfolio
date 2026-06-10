<?php

namespace App\Http\Requests;

use App\Models\ContactLog;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\RateLimiter;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'phone' => 'nullable|string|max:20|regex:/^[0-9+\-\s()]+$/',
            'subject' => 'required|string|max:255|min:3',
            'message' => 'required|string|min:10|max:5000',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom est obligatoire.',
            'name.regex' => 'Le nom ne peut contenir que des lettres et des espaces.',
            'email.required' => 'L\'email est obligatoire.',
            'email.email' => 'Veuillez entrer un email valide.',
            'email.regex' => 'Veuillez entrer un email valide.',
            'subject.min' => 'Le sujet doit contenir au moins 3 caractères.',
            'message.min' => 'Le message doit contenir au moins 10 caractères.',
            'message.max' => 'Le message ne peut pas dépasser 5000 caractères.',
            'g-recaptcha-response.required' => 'Veuillez vérifier que vous n\'êtes pas un robot.',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // Vérifier le rate limiting
            $ip = $this->ip();
            $key = 'contact_' . $ip;

            if (RateLimiter::tooManyAttempts($key, 3)) {
                $seconds = RateLimiter::availableIn($key);
                $validator->errors()->add('email', "Trop de tentatives. Veuillez réessayer dans {$seconds} secondes.");

                // Loguer la tentative bloquée
                ContactLog::create([
                    'ip_address' => $ip,
                    'email' => $this->email,
                    'action' => 'blocked_rate_limit',
                    'is_blocked' => true,
                    'user_agent' => $this->userAgent(),
                ]);
            }

            // Vérifier si l'IP est blacklistée
            $recentBlocks = ContactLog::where('ip_address', $ip)
                ->where('is_blocked', true)
                ->where('created_at', '>=', now()->subHours(24))
                ->count();

            if ($recentBlocks >= 5) {
                $validator->errors()->add('email', 'Votre IP a été temporairement bloquée.');
            }
        });
    }
}
