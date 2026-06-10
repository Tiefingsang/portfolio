<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nouveau message de {{ $name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
        }
        .header {
            background: linear-gradient(135deg, #ff6c00, #e05a00);
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: white;
            padding: 20px;
            border-radius: 0 0 10px 10px;
        }
        .field {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            color: #ff6c00;
        }
        .message-box {
            background: #f0f0f0;
            padding: 15px;
            border-radius: 8px;
            margin-top: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>📬 Nouveau message de contact</h2>
        </div>

        <div class="content">
            <div class="field">
                <div class="label">👤 Nom :</div>
                <div>{{ $name }}</div>
            </div>

            <div class="field">
                <div class="label">📧 Email :</div>
                <div>{{ $email }}</div>
            </div>

            @if($phone)
            <div class="field">
                <div class="label">📞 Téléphone :</div>
                <div>{{ $phone }}</div>
            </div>
            @endif

            <div class="field">
                <div class="label">📝 Sujet :</div>
                <div><strong>{{ $subject }}</strong></div>
            </div>

            <div class="field">
                <div class="label">💬 Message :</div>
                <div class="message-box">
                    {{ nl2br(e($userMessage)) }}
                </div>
            </div>
        </div>

        <div class="footer">
            <p>Message envoyé depuis votre portfolio</p>
            <p>Répondre à : {{ $email }}</p>
        </div>
    </div>
</body>
</html>
