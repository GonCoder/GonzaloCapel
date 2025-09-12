
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Segundos hasta la medianoche</title>
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
        input[type="number"] {
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
        .detalle {
            color: #ffa726;
            font-size: 0.98em;
            margin-top: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ejercicio 7 <br> Segundos hasta la medianoche</h1>
        <form method="post">
            <label for="hora">Hora (0-23):</label>
            <input type="number" min="0" max="23" name="hora" id="hora" required>
            <label for="minuto">Minutos (0-59):</label>
            <input type="number" min="0" max="59" name="minuto" id="minuto" required>
            <input type="submit" value="Calcular segundos">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["hora"]) && isset($_POST["minuto"])) {
            $hora = intval($_POST["hora"]);
            $minuto = intval($_POST["minuto"]);
            if ($hora >= 0 && $hora <= 23 && $minuto >= 0 && $minuto <= 59) {
                $segundos_actuales = $hora * 3600 + $minuto * 60;
                $segundos_medianoche = 24 * 3600;
                $faltan = $segundos_medianoche - $segundos_actuales;
                echo '<div class="resultado">';
                echo "Hora introducida: " . sprintf("%02d", $hora) . ":" . sprintf("%02d", $minuto) . "<br>";
                echo "<strong>Faltan $faltan segundos para la medianoche.</strong>";
                echo '<div class="detalle">';
                echo "La medianoche es a las 00:00 del día siguiente.";
                echo '</div>';
                echo '</div>';
            } else {
                echo '<div class="resultado" style="color:#ff3333;">';
                echo "Hora o minutos no válidos. Por favor, revisa los valores.";
                echo '</div>';
            }
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