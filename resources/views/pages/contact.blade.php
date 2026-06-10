@extends('layouts.app')

@section('title', 'Contact - Tiefing Sangare')
@section('meta_description', 'Contactez Tiefing Sangare pour vos projets de développement web, applications mobiles ou conseil SEO au Mali.')

@section('content')
<div class="section started">
    <div class="slide" style="background-image: url({{ asset('images/t1.jpg') }});"></div>
    <div class="centrize full-width">
        <div class="vertical-center">
            <div class="st-title align-center">
                <div class="typing-title">
                    <p>Contactez-moi</p>
                    <p>Parlons de votre projet</p>
                    <p>Devis gratuit</p>
                </div>
                <span class="typed-title"></span>
            </div>
        </div>
    </div>
</div>

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
                    <!-- Ajouter Google reCAPTCHA -->
                    {{-- <div class="col col-m-12 col-t-12 col-d-12 animated">
                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                        @error('g-recaptcha-response')
                            <span class="text-danger" style="color: red; font-size: 12px;">{{ $message }}</span>
                        @enderror
                    </div> --}}
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
