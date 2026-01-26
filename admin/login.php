<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        /* TUS VARIABLES DE COLOR */
        :root {
            --color-primary: #690809;
            /* Rojo vino / Primary */
            --color-primary-foreground: #ffffff;
            --color-secondary: #CBCAC7;
            /* Gris claro fondo página */
            --color-background: #ffffff;
            --color-card: #ffffff;
            --color-muted-foreground: black;
            --color-accent: #252523;
            /* Gris muy oscuro (casi negro) para botones */
            --color-accent-foreground: white;
            --color-border: #e5e7eb;
        }

        /* RESET BÁSICO */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* CUERPO: Centrado perfecto con Flexbox */
        body {
            background-color: var(--color-secondary);
            /* Usamos el secundario para contraste */
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* TARJETA DE LOGIN */
        .login-card {
            background-color: var(--color-card);
            width: 100%;
            max-width: 400px;
            /* Ancho máximo elegante */
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            /* Sombra suave */
            border: 1px solid var(--color-border);
        }

        /* HEADER DE LA TARJETA */
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h2 {
            color: var(--color-primary);
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        .login-header p {
            color: #666;
            /* Un gris suave para el subtítulo */
            font-size: 0.9rem;
        }

        .login-header img {
            width: 250px;
            height: 250px;
        }

        /* GRUPO DE INPUTS */
        .input-group {
            margin-bottom: 1.25rem;
        }

        .input-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--color-muted-foreground);
            font-weight: 500;
            font-size: 0.95rem;
        }

        .input-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--color-border);
            border-radius: 6px;
            font-size: 1rem;
            outline: none;
            transition: all 0.3s ease;
            background-color: var(--color-background);
        }

        /* EFECTO FOCUS: Se ilumina con el color primario */
        .input-group input:focus {
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(105, 8, 9, 0.1);
            /* Sombra roja sutil */
        }

        /* BOTÓN */
        .btn-login {
            width: 100%;
            padding: 0.85rem;
            background-color: var(--color-accent);
            /* Usando el accent para el botón */
            color: var(--color-accent-foreground);
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.1s;
        }

        .btn-login:hover {
            opacity: 0.9;
        }

        .btn-login:active {
            transform: scale(0.98);
            /* Pequeño efecto de click */
        }

        /* LINKS ADICIONALES */
        .login-footer {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 0.9rem;
        }

        .login-footer a {
            color: var(--color-primary);
            text-decoration: none;
            font-weight: 600;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .forgot-pass {
            display: block;
            text-align: right;
            margin-bottom: 1rem;
            font-size: 0.85rem;
            color: #666;
            text-decoration: none;
        }

        .forgot-pass:hover {
            color: var(--color-primary);
        }
    </style>
</head>

<body>

    <div class="login-card">
        <div class="login-header">
            <img src="../public/imagenes/envolpaq_logo.png" alt="Logo Evolpaq">
            <h2>Bienvenido</h2>
            <p>Ingresa tus credenciales para continuar</p>

            <?php if (isset($_GET['error'])): ?>
                <div style="color: red; margin-top: 10px; font-weight: bold;">
                    <?php
                    if ($_GET['error'] == 'invalid_credentials')
                        echo "Usuario o contraseña incorrectos.";
                    if ($_GET['error'] == 'empty_fields')
                        echo "Por favor llena todos los campos.";
                    ?>
                </div>
            <?php endif; ?>
        </div>

        <form action="auth/auth.php" method="POST">
            <div class="input-group">
                <label for="username">Usuario</label>
                <input type="text" id="username" name="username" placeholder="Nombre de usuario" required>
            </div>

            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn-login">Ingresar</button>
        </form>

    </div>

</body>

</html>