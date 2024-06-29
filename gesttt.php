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