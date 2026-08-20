<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin | Tiefing Sangare</title>
    @vite(['resources/css/app.css'])
    <style>
        body {
            background: linear-gradient(135deg, #0505051a 0%, #16213e44 50%, #1a1b1d33 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
            position: relative;
            overflow: hidden;
        }

        /* Effets de fond décoratifs */
        body::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255, 108, 0, 0.08) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }
        body::after {
            content: '';
            position: absolute;
            bottom: -40%;
            left: -15%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255, 108, 0, 0.05) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 48px 40px;
            width: 100%;
            max-width: 420px;
            margin: 20px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 1;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .login-container .logo-wrapper {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #ff6c00, #e05a00);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 10px 30px rgba(255, 108, 0, 0.3);
            transition: transform 0.3s;
        }
        .login-container .logo-wrapper:hover {
            transform: scale(1.05) rotate(-5deg);
        }
        .login-container .logo-wrapper span {
            font-size: 36px;
        }

        .login-container h1 {
            font-size: 24px;
            font-weight: 700;
            color: #1a1a2e;
            text-align: center;
            margin-bottom: 5px;
        }

        .login-container .subtitle {
            text-align: center;
            color: #888;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .login-container .subtitle span {
            color: #ff6c00;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #1a1a2e;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .form-group .input-wrapper {
            position: relative;
        }

        .form-group .input-wrapper input {
            width: 100%;
            padding: 12px 16px;
            padding-left: 44px;
            border: 2px solid #e8ecf1;
            border-radius: 12px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #fafbfc;
            color: #1a1a2e;
            outline: none;
        }

        .form-group .input-wrapper input:focus {
            border-color: #ff6c00;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(255, 108, 0, 0.1);
        }

        .form-group .input-wrapper input::placeholder {
            color: #aaa;
        }

        .form-group .input-wrapper .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 18px;
            transition: color 0.3s;
        }

        .form-group .input-wrapper input:focus + .input-icon {
            color: #ff6c00;
        }

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .form-options label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
            font-size: 13px;
            cursor: pointer;
        }

        .form-options label input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #ff6c00;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-options a {
            color: #ff6c00;
            font-size: 13px;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        .form-options a:hover {
            color: #e05a00;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #ff6c00, #e05a00);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(255, 108, 0, 0.3);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .btn-login i {
            font-size: 18px;
        }

        .footer-text {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #aaa;
        }

        .footer-text strong {
            color: #ff6c00;
        }

        /* Messages d'erreur */
        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 12px;
            padding: 12px 16px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #dc2626;
            font-size: 14px;
        }

        .alert-error i {
            font-size: 18px;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .login-container {
                padding: 30px 20px;
                margin: 15px;
            }
            .login-container .logo-wrapper {
                width: 65px;
                height: 65px;
            }
            .login-container .logo-wrapper span {
                font-size: 28px;
            }
            .login-container h1 {
                font-size: 20px;
            }
            .form-options {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Logo -->


        <h1>Administration</h1>
        <p class="subtitle">
            <span>Tiefing Sangare</span>
        </p>

        <!-- Message d'erreur -->
        @if($errors->any())
            <div class="alert-error">
                <i>⚠️</i>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <!-- Formulaire -->
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <!-- Email -->
            <div class="form-group">
                <label>Adresse email</label>
                <div class="input-wrapper">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="admin@exemple.com" required>
                    <span class="input-icon"></span>
                </div>
            </div>

            <!-- Mot de passe -->
            <div class="form-group">
                <label>Mot de passe</label>
                <div class="input-wrapper">
                    <input type="password" name="password" placeholder="••••••••" required>
                    <span class="input-icon"></span>
                </div>
            </div>

            <!-- Options -->
            <div class="form-options">
                <label>
                    <input type="checkbox" name="remember">
                    Se souvenir de moi
                </label>
                <a href="#">Mot de passe oublié ?</a>
            </div>

            <!-- Bouton -->
            <button type="submit" class="btn-login">
                <span>Se connecter</span>

            </button>
        </form>

        <div class="footer-text">
            Accès réservé à l'administrateur · <strong>Masadigitale</strong>
        </div>
    </div>
</body>
</html>
