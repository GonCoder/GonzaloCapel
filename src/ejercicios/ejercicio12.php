<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pirámide con imagen</title>
    <style>
        body {
            background-color: #181818;
            color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 400px;
            margin: 60px auto;
            background: #232323;
            padding: 30px 25px;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(255,140,0,0.15);
        }
        h1 {
            color: #ff9800;
            text-align: center;
            margin-bottom: 25px;
        }
        label {
            color: #ff9800;
            font-weight: bold;
        }
        select, input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 10px 0 20px 0;
            border: 1px solid #ff9800;
            border-radius: 6px;
            background: #181818;
            color: #f5f5f5;
        }
        input[type="submit"] {
            background: #ff9800;
            color: #181818;
            border: none;
            padding: 10px 0;
            width: 100%;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }
        input[type="submit"]:hover {
            background: #ffa726;
        }
        .resultado {
            margin-top: 20px;
            background: #262626;
            padding: 15px;
            border-radius: 8px;
            color: #ff9800;
            font-size: 1.1em;
            text-align: center;
        }
        .piramide {
            margin-top: 18px;
            text-align: center;
        }
        .detalle {
            color: #ffa726;
            font-size: 0.98em;
            margin-top: 8px;
        }
        .img-opcion {
            width: 32px;
            height: 32px;
            vertical-align: middle;
            margin-right: 6px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ejercicio 12 <br> Pirámide con imagen</h1>
        <form method="post">
            <label for="altura">Altura de la pirámide:</label>
            <input type="number" name="altura" id="altura" min="1" max="13" required>
            <label for="imagen">Elige el tipo de emotes 👌:</label>
            <select name="imagen" id="imagen" required>
                <option value="bolita">🔵 Bolita azul</option>
                <option value="ladrillo">🧱 Ladrillo</option>
                <option value="estrella">⭐ Estrella</option>
                <option value="corazon">❤️ Corazón</option>
                <option value="hoja">🍃 Hoja</option>
            </select>
            <input type="submit" value="Mostrar pirámide">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["altura"]) && isset($_POST["imagen"])) {
            $altura = intval($_POST["altura"]);
            $imagen = $_POST["imagen"];
            $bloques = [
                "bolita" => "🔵",
                "ladrillo" => "🧱",
                "estrella" => "⭐",
                "corazon" => "❤️",
                "hoja" => "🍃"
            ];
            $bloque = isset($bloques[$imagen]) ? $bloques[$imagen] : "🔵";
            echo '<div class="resultado">';
            echo "Pirámide de altura <strong>$altura</strong> usando <strong>$bloque</strong>:";
            echo '<div class="piramide" style="margin-top:18px; text-align:center;">';
            echo '<div style="display:inline-block; text-align:left; font-family: monospace;">';
            for ($i = 1; $i <= $altura; $i++) {
                $espacios = $altura - $i;
                echo str_repeat('&nbsp;', $espacios * 2);
                echo str_repeat($bloque . ' ', $i);
                echo '<br>';
            }
            echo '</div>';
            echo '</div>';
            echo '<div class="detalle">';
            echo "Puedes elegir entre 5 emotes para construir la pirámide.";
            echo '</div>';
            echo '</div>';
        }
        ?>
        <a href="../index.php" style="
            display: block;
            margin: 30px auto 0 auto;
            text-align: center;
            background: #ff9800;
            color: #181818;
            padding: 12px 0;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 2px 8px rgba(255,140,0,0.10);
            transition: background 0.2s;
            max-width: 200px;
        ">Volver al inicio</a>
    </div>
</body>
</html>