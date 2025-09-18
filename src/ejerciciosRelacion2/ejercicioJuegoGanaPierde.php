<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Apuesta y gana</title>
    <style>
        body {
            background-color: #181818;
            color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 420px;
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

        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 10px 0 20px 0;
            border: 1px solid #ff9800;
            border-radius: 6px;
            background: #181818;
            color: #f5f5f5;
        }

        input[type="submit"],
        button {
            background: #ff9800;
            color: #181818;
            border: none;
            padding: 10px 0;
            width: 100%;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.2s;
        }

        input[type="submit"]:hover,
        button:hover {
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

        .imagen-juego {
            font-size: 3em;
            margin: 18px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Apuesta y gana</h1>
        <?php

        if (!isset($_SESSION["dinero"]) || isset($_POST["reiniciar"])) {
            $_SESSION["dinero"] = null;
            $_SESSION["jugar"] = false;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cantidad"]) && $_SESSION["dinero"] === null) {
            $cantidad = floatval($_POST["cantidad"]);
            if ($cantidad > 0) {
                $_SESSION["dinero"] = $cantidad;
                $_SESSION["jugar"] = true;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["accion"]) && $_SESSION["jugar"]) {
            $imagenes = [
                ["nombre" => "Calavera", "emoji" => "💀"],
                ["nombre" => "Medio limón", "emoji" => "🍋"],
                ["nombre" => "Gato de la suerte", "emoji" => "🐱‍👤"]
            ];
            $aleatorio = rand(0, 2);
            $imagen = $imagenes[$aleatorio];
            $dinero = $_SESSION["dinero"];
            echo '<div class="resultado">';
            echo '<div class="imagen-juego">' . $imagen["emoji"] . '</div>';
            if ($imagen["nombre"] == "Calavera") {
                $_SESSION["dinero"] = 0;
                $_SESSION["jugar"] = false;
                echo "¡Ha salido una calavera!<br>Has perdido todo tu dinero.<br>";
                echo "<strong>Dinero actual: 0 €</strong>";
                echo '<div class="detalle">Fin del juego.</div>';
                echo '<form method="post"><button type="submit" name="reiniciar">Jugar de nuevo</button></form>';
            } elseif ($imagen["nombre"] == "Medio limón") {
                $_SESSION["dinero"] = $dinero / 2;
                echo "¡Ha salido medio limón!<br>Has perdido la mitad de tu dinero.<br>";
                echo "<strong>Dinero actual: " . number_format($_SESSION["dinero"], 2) . " €</strong>";
                echo '<form method="post"><button type="submit" name="accion" value="jugar">Seguir jugando</button></form>';
                echo '<form method="post"><button type="submit" name="reiniciar">Terminar y reiniciar</button></form>';
            } else {
                $_SESSION["dinero"] = $dinero * 2;
                echo "¡Ha salido el gato chino de la suerte!<br>Tu dinero se duplica.<br>";
                echo "<strong>Dinero actual: " . number_format($_SESSION["dinero"], 2) . " €</strong>";
                echo '<form method="post"><button type="submit" name="accion" value="jugar">Seguir jugando</button></form>';
                echo '<form method="post"><button type="submit" name="reiniciar">Terminar y reiniciar</button></form>';
            }
            echo '</div>';
        }

        if ($_SESSION["dinero"] === null) {
            echo '<form method="post">';
            echo '<label for="cantidad">Introduce la cantidad de dinero inicial (€):</label>';
            echo '<input type="number" name="cantidad" id="cantidad" min="1" step="0.01" required>';
            echo '<input type="submit" value="Empezar juego">';
            echo '</form>';
        } elseif ($_SESSION["jugar"]) {
            echo '<div class="resultado">';
            echo "Dinero actual: <strong>" . number_format($_SESSION["dinero"], 2) . " €</strong><br>";
            echo '<form method="post">';
            echo '<button type="submit" name="accion" value="jugar">Jugar ronda</button>';
            echo '</form>';
            echo '<form method="post">';
            echo '<button type="submit" name="reiniciar">Terminar y reiniciar</button>';
            echo '</form>';
            echo '<div class="detalle">Si sale 💀 pierdes todo, 🍋 pierdes la mitad, 🐱‍👤 duplicas tu dinero.</div>';
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