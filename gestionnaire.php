<?php
session_start();
if (!isset($_SESSION['nom_role']) || $_SESSION['nom_role'] != 'Gestionnaire') {
    header("Location: LOGINCHAT.php");
    exit;
}

include("bdPROJET.php");

// Fonction pour exporter les données au format Excel
if (isset($_POST['export'])) {
    exportToExcel($con);
}

// Fonction pour récupérer les absences
function getAbsences($con, $filter)
{
    $query = "SELECT s.CEF, s.Nom, s.Prenom, g.Nom_G, f.Nom_F, a.Status, se.DateS, se.HeureD, se.HeureF 
              FROM absence a
              JOIN stagiaire s ON a.CEF = s.CEF
              JOIN seance se ON a.Id_Seance = se.Id_Seance
              JOIN groupe g ON s.Id_Groupe = g.Id_Groupe
              JOIN filiere f ON g.Id_Filiere = f.Id_Filiere";
    if (!empty($filter)) {
        $query .= " WHERE " . $filter;
    }
    $query .= " ORDER BY se.DateS DESC";
    $stmt = $con->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fonction pour exporter les données au format Excel
function exportToExcel($con)
{
    $absences = getAbsences($con, "");

    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=absences.xls");

    $output = fopen("php://output", "w");
    fputcsv($output, array('CEF', 'Nom', 'Prenom', 'Groupe', 'Filiere', 'Status', 'Date', 'Heure Debut', 'Heure Fin'));

    foreach ($absences as $absence) {
        fputcsv($output, $absence);
    }

    fclose($output);
    exit;
}

// Récupérer les absences avec filtres
$filter = "";
if (isset($_POST['filter_period'])) {
    $period = $_POST['filter_period'];
    if ($period == 'day') {
        $filter = "se.DateS = CURDATE()";
    } elseif ($period == 'week') {
        $filter = "YEARWEEK(se.DateS, 1) = YEARWEEK(CURDATE(), 1)";
    } elseif ($period == 'month') {
        $filter = "MONTH(se.DateS) = MONTH(CURDATE()) AND YEAR(se.DateS) = YEAR(CURDATE())";
    }
}
$absences = getAbsences($con, $filter);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Gestionnaire</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, #4B0082, #800080, #8B008B, #9932CC, #9400D3);
        color: #333;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        margin: 0 auto;
        background: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin-top: 50px;
    }

    h1 {
        text-align: center;
        color: #9400D3;
    }

    form {
        text-align: center;
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        margin-right: 10px;
    }

    select {
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .btn {
        padding: 10px 20px;
        background: #9400D3;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-left: 10px;
    }

    .btn:hover {
        background: #800080;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background: #800080;
        color: #fff;
    }

    th,
    td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: center;
    }

    tr:nth-child(even) {
        background: #f2f2f2;
    }

    tr:hover {
        background: #9932CC;
        color: #fff;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Tableau de Bord Gestionnaire</h1>
        <form method="post" action="">
            <label for="filter_period">Filtrer par période:</label>
            <select name="filter_period" id="filter_period">
                <option value="day">Jour</option>
                <option value="week">Semaine</option>
                <option value="month">Mois</option>
            </select>
            <button type="submit" class="btn">Filtrer</button>
            <button type="submit" name="export" class="btn">Exporter au format Excel</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>CEF</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Groupe</th>
                    <th>Filiere</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Heure Debut</th>
                    <th>Heure Fin</th>
                </tr>
            </thead>
            <tbody>
                <!-- Les données seront insérées ici par PHP -->
                <?php foreach ($absences as $absence): ?>
                <tr>
                    <td><?php echo $absence['CEF']; ?></td>
                    <td><?php echo $absence['Nom']; ?></td>
                    <td><?php echo $absence['Prenom']; ?></td>
                    <td><?php echo $absence['Nom_G']; ?></td>
                    <td><?php echo $absence['Nom_F']; ?></td>
                    <td><?php echo $absence['Status']; ?></td>
                    <td><?php echo $absence['DateS']; ?></td>
                    <td><?php echo $absence['HeureD']; ?></td>
                    <td><?php echo $absence['HeureF']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>