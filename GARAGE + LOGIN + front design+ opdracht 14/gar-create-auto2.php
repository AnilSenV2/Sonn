<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="Anil Sen">
    <meta charset="UTF-8">
    <title>Garage create auto 2</title>
</head>
<body>
<h1>Garage create auto 2</h1>
<p>
    Een klant toevoegen aan de tabel
    klant in de database garage.
</p>

<?php
// klantgegevens uit het formulier halen -----------------------------
$id = NULL; // komt niet uit het formulier
$autokenteken = $_POST ["autokentekenvak"];
$automerk = $_POST ["automerkvak"];
$autotype = $_POST ["autotypevak"];
$autokmstand = $_POST ["autokmstandvak"];
$klantid = $_POST ["klantidvak"];

// klantgegevens invoeren in de tabel ---------------------
require_once "gar-connect.php";

$sql = $conn->prepare("insert into auto values (:autokenteken, :automerk, :autotype, :autokmstand, :klantid)");

$sql->execute([
    "autokenteken" => $autokenteken,
    "automerk" => $automerk,
    "autotype" => $autotype,
    "autokmstand" => $autokmstand,
    "klantid" => $klantid
]);

echo "De auto is toegevoegd <br /br>";
echo "<a href='gar-menu.php'> terug naar het menu </a>";

?>
</body>
</html>