<!DOCTYPE html>
<html>

<head>
    <title>Table de multiplication</title>
</head>

<body>

    <table border="1">
        <thead>
            <tr>
                <th style="background-color:aqua">X</th>
                <?php
            
            for ($i = 1; $i <= 10; $i++) {
                echo "<th>$i</th>";
            }
            ?>
            </tr>
        </thead>
        <tbody>
            <?php
        
        for ($i = 1; $i <= 10; $i++) {
            echo "<th>$i</th>"; 
            for ($j = 1; $j <= 10; $j++) {
                echo "<td>" . ($i * $j) . "</td>"; 
            }
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

</body>

</html>