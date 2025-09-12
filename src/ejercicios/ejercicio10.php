
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Media de números positivos</title>
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
            box-shadow: 0 4px 16px rgba(255, 140, 0, 0.15);
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

        textarea {
            width: 100%;
            min-height: 80px;
            padding: 8px;
            margin: 10px 0 20px 0;
            border: 1px solid #ff9800;
            border-radius: 6px;
            background: #181818;
            color: #f5f5f5;
            resize: vertical;
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

        ul {
            margin-top: 10px;
            padding-left: 20px;
            color: #ffa726;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Ejercicio 10 <br> Media de números positivos</h1>
        <form method="post">
            <label for="numeros">Introduce números positivos separados por espacios o saltos de línea. <br>Introduce un número negativo para terminar (no se computa en la media):</label>
            <textarea name="numeros" id="numeros" required></textarea>
            <input type="submit" value="Calcular media">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["numeros"])) {
            $input = trim($_POST["numeros"]);
            $partes = preg_split('/[\s,]+/', $input);
            $positivos = [];
            foreach ($partes as $valor) {
                if ($valor === '') continue;
                $num = floatval($valor);
                if ($num < 0) break;
                if ($num >= 0) $positivos[] = $num;
            }
            if (count($positivos) > 0) {
                $media = array_sum($positivos) / count($positivos);
                echo '<div class="resultado">';
                echo "Números introducidos:";
                echo '<ul>';
                foreach ($positivos as $n) {
                    echo "<li>$n</li>";
                }
                echo '</ul>';
                echo "<strong>La media es: " . number_format($media, 2) . "</strong>";
                echo '<div class="detalle">';
                echo "La media se calcula solo con los números positivos introducidos antes del primer negativo. Los posteriores al negativo serán ignorados";
                echo '</div>';
                echo '</div>';
            } else {
                echo '<div class="resultado" style="color:#ff3333;">';
                echo "No se ha introducido ningún número positivo.";
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