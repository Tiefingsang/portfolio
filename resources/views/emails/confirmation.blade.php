<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation de réception</title>
</head>
<body style="margin:0; padding:0; background:#f8fafc; font-family: Arial, sans-serif; color:#0f172a;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f8fafc; padding:40px 20px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:16px; overflow:hidden; box-shadow:0 10px 30px rgba(15,23,42,0.08);">

                    <!-- En-tête -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #ff6c00, #e05a00); padding:40px 30px; text-align:center;">
                            <h1 style="margin:0; color:#ffffff; font-size:24px; font-weight:800;">
                                ✅ Message bien reçu !
                            </h1>
                        </td>
                    </tr>

                    <!-- Corps -->
                    <tr>
                        <td style="padding:40px 30px;">
                            <p style="margin:0 0 20px; font-size:16px; line-height:1.6;">
                                Bonjour <strong>{{ $name }}</strong>,
                            </p>

                            <p style="margin:0 0 20px; font-size:15px; line-height:1.6; color:#475569;">
                                Je vous confirme avoir bien reçu votre message concernant :
                            </p>

                            <div style="background:#f8fafc; border-left:4px solid #ff6c00; padding:15px 20px; margin:0 0 25px; border-radius:8px;">
                                <strong style="color:#0f172a; font-size:15px;">{{ $subject }}</strong>
                            </div>

                            <p style="margin:0 0 20px; font-size:15px; line-height:1.6; color:#475569;">
                                Je vous répondrai dans les plus brefs délais (sous 24h ouvrées en général).
                            </p>

                            <p style="margin:0 0 30px; font-size:15px; line-height:1.6; color:#475569;">
                                En attendant, n'hésitez pas à découvrir mes réalisations sur mon portfolio.
                            </p>

                            <p style="margin:0; font-size:15px; line-height:1.6;">
                                Cordialement,<br>
                                <strong style="color:#ff6c00;">Tiefing Sangare</strong><br>
                                <span style="color:#64748b; font-size:13px;">Développeur Web & Mobile</span>
                            </p>
                        </td>
                    </tr>

                    <!-- Pied de page -->
                    <tr>
                        <td style="background:#0f172a; padding:25px 30px; text-align:center;">
                            <p style="margin:0 0 10px; color:#94a3b8; font-size:12px;">
                                Cet email a été envoyé automatiquement suite à votre message sur le formulaire de contact.
                            </p>
                            <p style="margin:0; color:#94a3b8; font-size:12px;">
                                📧 tiefingsangare86@gmail.com • 📍 Bamako, Mali
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>
