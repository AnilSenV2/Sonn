<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="Anil Sen">
    <meta charset="UTF-8">
    <title>Garage delete auto2</title>
</head>
<body>
<h1>Garage delete auto 2</h1>
<p>
    op autokenteken gegevens zoeken uit de
    tabel auto's van de database garage
    zodat ze verwijderd kunnen worden.
</p>

<?php
$autokenteken = $_POST ["autokentekenvak"];

require_once "gar-connect.php";

$autos = $conn->prepare("SELECT autokenteken, automerk, autotype, autokmstand, klantid FROM auto WHERE autokenteken = :autokenteken");

$autos->execute(["autokenteken" => $autokenteken]);

echo "<table>";
foreach ($autos as $auto)
{
    echo "<tr>";
    echo "<td>" . $auto["autokenteken"] . "</td>";
    echo "<td>" . $auto["automerk"] . "</td>";
    echo "<td>" . $auto["autotype"] . "</td>";
    echo "<td>" . $auto["autokmstand"] . "</td>";
    echo "<td>" . $auto["klantid"] . "</td>";
    echo "</tr>";
}

echo "</table><br />";

echo "<form action='gar-delete-auto3.php' method='post'>";

echo "<input type='hidden' name='autokentekenvak' value=$autokenteken>";

echo "<input type='hidden' name='verwijdervak' value='0'>";
echo "<input type='checkbox' name='verwijdervak' value='1'>";
echo "Verwijder deze klant. <br />";
echo "<input type='submit'>";

?>

</body>
</html>
