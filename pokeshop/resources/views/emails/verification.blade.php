<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Verifica tu cuenta en Pokeshop!</title>
</head>
<body>
    <h2>¡Hola, Entrenador!</h2>
    <p>Has dado el primer paso para convertirte en un maestro del intercambio de cartas Pokémon.</p>
    <p>Para comenzar tu aventura en <strong>Pokeshop</strong>, solo necesitas verificar tu cuenta.</p>
    <p>Haz clic en el siguiente enlace para completar tu registro:</p>
    <p>
        <a href="{{ url('/verify/' . $verificationCode) }}">
           Verificar cuenta
        </a>
    </p>
    <p>Si no solicitaste este registro, probablemente fue un Zubat travieso. Puedes ignorar este mensaje.</p>
    <p>¡Nos vemos en Pokeshop!</p>
    <p>— El equipo de Pokeshop</p>
</body>
</html>

