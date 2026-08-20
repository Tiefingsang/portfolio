@extends('layouts.app')

@section('title', 'Contact - Tiefing Sangare')
@section('meta_description', 'Contactez Tiefing Sangare pour vos projets de développement web, applications mobiles ou conseil SEO au Mali.')

@section('content')
<div class="section started" style="position: relative; overflow: hidden; min-height: 350px; max-height: 450px;">
    <!-- Image de fond avec taille réduite -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: url('{{ asset('images/contacts/cb1.png') }}'); background-size: cover; background-position: center; background-attachment: fixed;"></div>

    <!-- Overlay dégradé moderne -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(135deg, rgba(26, 26, 46, 0.8) 0%, rgba(15, 52, 96, 0.8) 50%, rgba(255, 106, 0, 0.212) 100%);"></div>

    <!-- Effets décoratifs (plus petits) -->
    <div style="position: absolute; top: -40%; right: -15%; width: 300px; height: 300px; background: radial-gradient(circle, rgba(255, 108, 0, 0.1) 0%, transparent 70%); border-radius: 50%;"></div>
    <div style="position: absolute; bottom: -30%; left: -10%; width: 250px; height: 250px; background: radial-gradient(circle, rgba(255, 255, 255, 0.05) 0%, transparent 70%); border-radius: 50%;"></div>

    <div class="centrize full-width" style="position: relative; z-index: 1; min-height: 350px;">
        <div class="vertical-center" style="display: flex; align-items: center; justify-content: center; min-height: 350px;">
            <div class="st-title align-center" style="text-align: center; padding: 40px 20px;">
                <!-- Icône de contact -->
                <div style="font-size: 40px; margin-bottom: 15px; display: inline-block; background: rgba(255, 108, 0, 0.2); width: 80px; height: 80px; border-radius: 50%; line-height: 80px; backdrop-filter: blur(10px); border: 2px solid rgba(255, 255, 255, 0.1); box-shadow: 0 10px 30px rgba(255, 108, 0, 0.2);">
                    💬
                </div>

                <div class="typing-title" style="color: white;">
                    <h1 style="font-size: 36px; font-weight: 700; margin-bottom: 8px; text-shadow: 0 2px 20px rgba(0,0,0,0.2);">Contactez-moi</h1>
                    <p style="font-size: 18px; color: rgba(255,255,255,0.9); margin: 3px 0; text-shadow: 0 1px 10px rgba(0,0,0,0.1);">Parlons de votre projet</p>
                    <p style="font-size: 15px; color: rgba(255,255,255,0.8); margin: 3px 0; text-shadow: 0 1px 10px rgba(0,0,0,0.1);">Devis gratuit sous 24h</p>
                </div>
                <span class="typed-title"></span>

                <!-- Badge de disponibilité -->
                <div style="margin-top: 20px; display: inline-block; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 6px 20px; border-radius: 30px; border: 1px solid rgba(255,255,255,0.1);">
                    <span style="color: white; font-size: 12px; display: flex; align-items: center; gap: 8px;">
                        <span style="display: inline-block; width: 8px; height: 8px; background: #28a745; border-radius: 50%; animation: pulse-dot 2s infinite;"></span>
                        Disponible pour vos projets
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes pulse-dot {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.5); opacity: 0.5; }
    }
</style>

<style>
    @keyframes pulse-dot {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.5); opacity: 0.5; }
    }
</style>

<!-- Section Contact -->
<div class="section contacts align-left" id="contact-section">
    <div class="fw">
        <div class="titles animated">
            <div class="title">Contactez-moi</div>
        </div>

        <!-- Informations de contact -->
        <div class="row mb-30">
            <div class="col col-m-12 col-t-4 col-d-4">
                <div class="contact-info animated">
                    <i class="icon ion-ios-location-outline"></i>
                    <h3>Localisation</h3>
                    <p>Bamako, Mali</p>
                </div>
            </div>
            <div class="col col-m-12 col-t-4 col-d-4">
                <div class="contact-info animated">
                    <i class="icon ion-ios-email-outline"></i>
                    <h3>Email</h3>
                    <p>tiefingsangare86@gmail.com</p>
                </div>
            </div>
            <div class="col col-m-12 col-t-4 col-d-4">
                <div class="contact-info animated">
                    <i class="icon ion-logo-whatsapp"></i>
                    <h3>WhatsApp</h3>
                    <p>+223 66 89 44 75</p>
                </div>
            </div>
        </div>

        <div class="contact-form">
            @if(session('success'))
            <div class="alert-success">
                <p>{{ session('success') }}</p>
            </div>
            @endif

            @if(session('error'))
            <div class="alert-error">
                <p>{{ session('error') }}</p>
            </div>
            @endif

            @if($errors->any())
            <div class="alert-error">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            <form id="contact-form" method="POST" action="{{ route('contact.send') }}">
                @csrf
                <div class="row">
                    <div class="col col-m-12 col-t-6 col-d-6 animated">
                        <div class="value">
                            <input type="text" name="name" placeholder="Nom complet *" required value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col col-m-12 col-t-6 col-d-6 animated">
                        <div class="value">
                            <input type="tel" name="phone" placeholder="Téléphone" value="{{ old('phone') }}">
                        </div>
                    </div>
                    <div class="col col-m-12 col-t-6 col-d-6 animated">
                        <div class="value">
                            <input type="email" name="email" placeholder="Email *" required value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="col col-m-12 col-t-6 col-d-6 animated">
                        <div class="value">
                            <input type="text" name="subject" placeholder="Sujet *" required value="{{ old('subject') }}">
                        </div>
                    </div>
                    <div class="col col-m-12 col-t-12 col-d-12 animated">
                        <div class="value">
                            <textarea name="message" placeholder="Votre message *" required rows="6">{{ old('message') }}</textarea>
                        </div>
                    </div>

                    <div class="col col-m-12 col-t-12 col-d-12 animated">
                        <button type="submit" class="btn" id="submit-btn">
                            <span>Envoyer le message</span>
                            <i class="icon ion-ios-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('contact-form').addEventListener('submit', function(e) {
        console.log('Formulaire soumis');
        var token = document.querySelector('input[name="_token"]');
        console.log('Token présent:', token ? 'Oui' : 'Non');
        if(token) {
            console.log('Token value:', token.value.substring(0, 20) + '...');
        }
    });
</script>
@endpush
