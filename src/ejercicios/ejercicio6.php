<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Horóscopo según tu nacimiento</title>
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
        input[type="number"], select {
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
        <h1>Ejercicio 6 <br> Horóscopo</h1>
        <form method="post">
            <label for="dia">Día de nacimiento:</label>
            <input type="number" min="1" max="31" name="dia" id="dia" required>
            <label for="mes">Mes de nacimiento:</label>
            <select name="mes" id="mes" required>
                <option value="">Selecciona el mes</option>
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
                <option value="5">Mayo</option>
                <option value="6">Junio</option>
                <option value="7">Julio</option>
                <option value="8">Agosto</option>
                <option value="9">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
            <input type="submit" value="Ver Horóscopo">
        </form>
        <?php
        function obtenerHoroscopo($dia, $mes) {
            
    
            if (($mes == 1 && $dia >= 20) || ($mes == 2 && $dia <= 18)) return "Acuario";
            if (($mes == 2 && $dia >= 19) || ($mes == 3 && $dia <= 20)) return "Piscis";
            if (($mes == 3 && $dia >= 21) || ($mes == 4 && $dia <= 19)) return "Aries";
            if (($mes == 4 && $dia >= 20) || ($mes == 5 && $dia <= 20)) return "Tauro";
            if (($mes == 5 && $dia >= 21) || ($mes == 6 && $dia <= 20)) return "Géminis";
            if (($mes == 6 && $dia >= 21) || ($mes == 7 && $dia <= 22)) return "Cáncer";
            if (($mes == 7 && $dia >= 23) || ($mes == 8 && $dia <= 22)) return "Leo";
            if (($mes == 8 && $dia >= 23) || ($mes == 9 && $dia <= 22)) return "Virgo";
            if (($mes == 9 && $dia >= 23) || ($mes == 10 && $dia <= 22)) return "Libra";
            if (($mes == 10 && $dia >= 23) || ($mes == 11 && $dia <= 21)) return "Escorpio";
            if (($mes == 11 && $dia >= 22) || ($mes == 12 && $dia <= 21)) return "Sagitario";
            return "Capricornio";
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["dia"]) && isset($_POST["mes"])) {
            $dia = intval($_POST["dia"]);
            $mes = intval($_POST["mes"]);
            $valido = checkdate($mes, $dia, 2000);
            if ($valido) {
                $horoscopo = obtenerHoroscopo($dia, $mes);
                echo '<div class="resultado">';
                echo "Fecha de nacimiento: $dia/$mes<br>";
                echo "<strong>Tu horóscopo es: $horoscopo</strong>";
                echo '<div class="detalle">';
                echo "El horóscopo se calcula según el día y mes de nacimiento.";
                echo '</div>';
                echo '</div>';
            } else {
                echo '<div class="resultado" style="color:#ff3333;">';
                echo "Fecha no válida. Por favor, revisa el día y el mes.";
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