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
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="d-flex justify-content-center vh-100 align-items-center">
  <form method="POST" action="<?php $_SERVER["SCRIPT_NAME"] ?>" class="w-25 border p-4 rounded">
    <fieldset>
      <legend>Factorielle</legend>
      <label class="mb-3" for="nombre">Saisir un nombre</label>
      <input class="w-100 mb-3" min=0 type="number" name="nombre" id="nombre" value="<?php if (isset($nombre)) echo $nombre ?>" required>
      <label class="mb-3" for="resultat">Affichage de resultat</label>
      <input class="w-100 mb-3" type="text" id="resultat" value="<?php if (isset($nombre)) echo $resultat ?>" disabled>
      <input class="w-100 btn btn-primary" type="submit" value="calculer la factorielle" name="env">
    </fieldset>
  </form>

  <!-- bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>