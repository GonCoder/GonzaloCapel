<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Saludo según la hora</title>
    <style>
        body {
            background-color: #181818;
            color: #f1f1f1;
            font-family: Arial, sans-serif;
        }
        input, button {
            background-color: #282828;
            color: #ffae34ff;
            border: 1px solid #444;
            padding: 8px;
            margin: 5px 0;
            border-radius: 4px;
        }
        label {
            color: #ffd47eff;
        }
        form {
            background-color: #222;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.5);
            max-width: 300px;
            margin: 40px auto;
        }
        p {
            text-align: center;
            font-size: 1.2em;
            margin-top: 20px;
        }
        h1 {
            background-color: #222;
            color: #ff9100ff;
            text-align: center;
            padding: 16px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.5);
            margin-bottom: 30px;
        }
        .volver-index {
            display: block;
            margin: 30px auto 0 auto;
            background-color: #282828;
            color: #ffc144ff;
            text-align: center;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            max-width: 200px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.5);
        }
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
    </style>
</head>
<body>
     <h1>
        Ejercicio 4<br>Pide la Hora</h1>
    <form method="post">
        <label for="hora">Introduce la hora (0-23):</label>
        <input type="number" id="hora" name="hora" min="0" max="23" required>
        <button type="submit">Enviar</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $hora = intval($_POST["hora"]);
        if ($hora >= 6 && $hora <= 12) {
            echo "<p>Buenos días</p>";
        } elseif ($hora >= 13 && $hora <= 20) {
            echo "<p>Buenas tardes</p>";
        } else {
            echo "<p>Buenas noches</p>";
        }
    }
    ?>
    <br>
    <br>
    <a href="../index.php" class="volver-index">⟵ Volver al inicio</a>
</body>
</html>