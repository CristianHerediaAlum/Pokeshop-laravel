<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Cuenta</title>
</head>
<body>
    <p>Gracias por registrarte en nuestro sitio web. Haz clic en el siguiente enlace para verificar tu cuenta:</p>
    <a href="{{ url('/verify/' . $verificationCode) }}">Verificar cuenta</a>
</body>
</html>
