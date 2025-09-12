<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $euros = floatval($_POST["euros"]);
    $pesetas = $euros * 166.386;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conversor Euros a Pesetas</title>
    <style>
        body {
            background-color: #181818;
            color: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: #ff9800;
            text-align: center;
            margin-top: 30px;
        }
        form {
            background: #222;
            padding: 20px;
            border-radius: 8px;
            max-width: 350px;
            margin: 30px auto;
            box-shadow: 0 2px 8px rgba(0,0,0,0.5);
        }
        label {
            color: #ff9800;
            display: block;
            margin-bottom: 8px;
        }
        input[type="number"] {
            width: 70%;
            padding: 8px;
            border: 1px solid #ff9800;
            border-radius: 4px;
            background: #181818;
            color: #fff;
            margin-bottom: 12px;
            margin-right: 45px;
        }
        button {
            background: #ff9800;
            color: #181818;
            border: none;
            padding: 10px 18px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.2s;
        }
        button:hover {
            background: #ffa726;
        }
        p {
            text-align: center;
            font-size: 1.2em;
            margin-top: 20px;
        }
        .volver-index {
            display: block;
            width: fit-content;
            margin: 40px auto 10px auto;
            padding: 12px 28px;
            background: #181818;
            color: #ff9800;
            border: 2px solid #ff9800;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1em;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3);
            transition: background 0.2s, color 0.2s, border 0.2s;
            text-align: center;
        }
        .volver-index:hover {
            background: #ff9800;
            color: #181818;
            border-color: #ffa726;
        }
    </style>
</head>
<body>
    <h1>
        Ejercicio 1<br>Conversor de Euros a Pesetas</h1>
    <form method="post" action="">
        <label for="euros">Cantidad en euros:</label>
        <input type="number" step="0.01" name="euros" id="euros" required>
        <button type="submit">Convertir</button>
    </form>

    <?php if (isset($pesetas)): ?>
        <p><?= htmlspecialchars($euros) ?> € son <?= number_format($pesetas, 2, ',', '.') ?> pesetas.</p>
    <?php endif; ?>

    <a href="../index.php" class="volver-index">⟵ Volver al inicio</a>
</body>
</html>
