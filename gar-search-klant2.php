<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="Anil Sen ">
    <meta charset="UTF-8">
    <title>Garage search klant2</title>
</head>
<body>
<h1>Garage zoek op klantid 2</h1>
<p>
    Op klantid gegevens zoeken uit de tabel
    klanten van de database garage.
</p>
<?php
// klantid uit het formulier halen
$klantid = $_POST["klantidvak"];

require_once "gar-connect.php";

$klanten = $conn->prepare("SELECT id, klantnaam, klantadres, klantpostcode, klantplaats FROM klant WHERE id = :id");

$klanten->execute(["id"=> $klantid]);

echo "<table>";
foreach ($klanten as $klant)
{
    echo "<tr>";
    echo "<td>" . $klant["id"] . "</td>";
    echo "<td>" . $klant["klantnaam"] . "</td>";
    echo "<td>" . $klant["klantadres"] . "</td>";
    echo "<td>" . $klant["klantpostcode"] . "</td>";
    echo "<td>" . $klant["klantplaats"] . "</td>";
    echo "</tr>";
}

echo "</table>";
echo "<a href='gar-menu.php'> Terug nar het menu </a>";

?>
</body>
</html>