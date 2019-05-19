<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="Anil Sen">
    <meta charset="UTF-8">
    <title>Garage update auto2</title>
</head>
<body>
<h1>Garage update auto 2</h1>
<p>
    Dit formulier word gebruikt om autogegevens te wijzigen.
    in de tabel auto van de database garage.
</p>

<?php
$autokenteken = $_POST ["autokentekenvak"];

require_once "gar-connect.php";

$autos = $conn->prepare("SELECT autokenteken, automerk, autotype, autokmstand, klantid FROM auto WHERE autokenteken = :autokenteken");

$autos->execute(["autokenteken" => $autokenteken]);

echo "<form action='gar-update-auto3.php' method='post'>";
foreach ($autos as $auto) {
    echo "autokenteken: <input type='text' ";
    echo "name = 'autokentekenvak' ";
    echo "value = '" . $auto["autokenteken"] . "' ";
    echo "<br />";

    echo "automerk: <input type='text' ";
    echo "name = 'automerkvak' ";
    echo "value = '" . $auto["automerk"] . "' ";
    echo "<br />";

    echo "autotype: <input type='text' ";
    echo "name = 'autotypevak' ";
    echo "value = '" . $auto["autotype"] . "' ";
    echo "<br />";

    echo "automerk: <input type='text' ";
    echo "name = 'autokmstandvak' ";
    echo "value = '" . $auto["autokmstand"] . "' ";
    echo "<br />";

    // klantid mag niet gewijzigd worden
    echo " klantid:" . $auto["klantid"];
    echo " <input type='hidden' name='klantidvak' ";
    echo "value=' " . $auto["klantid"] . " '> <br /> ";
}
echo "<input type='submit'>";
echo "</form>"

?>

</body>
</html>