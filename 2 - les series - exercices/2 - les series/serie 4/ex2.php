<?php
// 1
$stg = array(
    "Mohamed" => "16",
    "Ahmed" => "14",
    "Rafika" => "13",
    "Aicha" => "15",
    "Samir" => "13",
    "Samar" => "13",
    "Rafik" => "10",
    "Samiha" => "09",
    "Fourat" => "07",
    "Sami" => "07",
    "Noura" => "14"
);

echo "<div class='container'>";
echo "<table class='table table-bordered'>";
echo "<tr><th>Nom</th><th>Note</th></tr>";
foreach ($stg as $nom => $note) {
    echo "<tr><td>$nom</td><td>$note</td></tr>";
}
echo "</table>";
echo "</div>";

// 2 trier par cles croissantes
ksort($stg);
echo "<div class='container'>";
echo "<table class='table table-bordered'><caption>Trie par valeur croissantes</caption>";
echo "<tr><th>Nom</th><th>Note</th></tr>";
foreach ($stg as $nom => $note) {
    echo "<tr><td>$nom</td><td>$note</td></tr>";
}
echo "</table>";
echo "</div>";

// 2 trier par cles decroissantes
arsort($stg);
echo "<div class='container'>";
echo "<table class='table table-bordered'><caption>Trie par valeur decroissantes</caption>";
echo "<tr><th>Nom</th><th>Note</th></tr>";
foreach ($stg as $nom => $note) {
    echo "<tr><td>$nom</td><td>$note</td></tr>";
}
echo "</table>";
echo "</div>";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>