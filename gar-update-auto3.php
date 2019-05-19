<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="Anil Sen">
    <meta charset="UTF-8">
    <title>Garage update auto 3</title>
</head>
<body>
<h1>Garage update auto 3</h1>
<p>
    Autogegevens wijzigen in de tabel
    auto van de database garage.
</p>

<?php
// klantgegevens uit het formulier halen -----------------------------
$autokenteken = $_POST["autokentekenvak"];
$automerk = $_POST ["automerkvak"];
$autotype = $_POST ["autotypevak"];
$autokmstand = $_POST ["autokmstandvak"];
$klantid = $_POST ["klantidvak"];

// klantgegevens invoeren in de tabel ---------------------
require_once "gar-connect.php";

$sql = $conn->prepare("UPDATE auto SET autokenteken = :autokenteken , automerk = :automerk, autotype = :autotype, autokmstand = :autokmstand WHERE klantid = :klantid");

$sql->execute([
    "autokenteken" => $autokenteken,
    "automerk" => $automerk,
    "autotype" => $autotype,
    "autokmstand" => $autokmstand,
    "klantid" => $klantid
]);

echo "De klant is gewijzigd. <br /br>";
echo "<a href='gar-menu.php'> terug naar het menu </a>";

?>
</body>
</html>