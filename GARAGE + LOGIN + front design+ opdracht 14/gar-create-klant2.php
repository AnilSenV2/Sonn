<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="Anil Sen">
    <meta charset="UTF-8">
    <title>Garage create klant 2</title>
</head>
<body>
<h1>Garage create klant 2</h1>
<p>
    Een klant toevoegen aan de tabel
    klant in de database garage.
</p>

<?php
// klantgegevens uit het formulier halen -----------------------------
$id = NULL; // komt niet uit het formulier
$klantnaam = $_POST ["klantnaamvak"];
$klantadres = $_POST ["klantadresvak"];
$klantpostcode = $_POST ["klantpostcodevak"];
$klantplaats = $_POST ["klantplaatsvak"];

// klantgegevens invoeren in de tabel ---------------------
require_once "gar-connect.php";

$sql = $conn->prepare("insert into klant values (:id, :klantnaam, :klantadres, :klantpostcode, :klantplaats)");

$sql->execute([
        "id" => $id,
        "klantnaam" => $klantnaam,
        "klantadres" => $klantadres,
        "klantpostcode" => $klantpostcode,
        "klantplaats" => $klantplaats
]);

echo "De klant is toegevoegd <br /br>";
echo "<a href='gar-menu.php'> terug naar het menu </a>";

?>
</body>
</html>