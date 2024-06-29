<?php

declare(strict_types=1);
function factorial($n)
{
  if ($n == 0) {
    return 1;
  } else {
    return $n * factorial($n - 1);
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  extract($_POST); // when we do this, we can use the names directly
  if (isset($nombre)) {

    $resultat = factorial($nombre);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorielle</title>


</head>

<body>
    <form method="POST" action="<?php $_SERVER["SCRIPT_NAME"] ?>" class="w-25 border p-4 rounded">
        <fieldset>
            <legend>Factorielle</legend>
            <label for="nombre">Saisir un nombre</label>
            <input min=0 type="number" name="nombre" id="nombre" value="<?php if (isset($nombre)) echo $nombre ?>"
                required><br><br>
            <label for="resultat">Affichage de resultat</label>
            <input type="text" id="resultat" value="<?php if (isset($nombre)) echo $resultat ?>" readonly><br><br>
            <input type="submit" value="calculer la factorielle" name="env">
        </fieldset>
    </form>



</body>

</html>