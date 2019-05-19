<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="Anil sen">
    <meta charset="UTF-8">
    <title>gar-search-auto2.php</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
<div class="next-pages-klant&auto">
    <h1>garage zoek op autokenteken 2</h1>
    <p>
        Dit formulier zoekt een autokenteken op uit
        de tabel auto van database garage.
    </p>
    <?php
    // autotype en klantid uit het formulier halen
    $klantenautotype = $_POST["autotypevak"];

    require_once "gar-connect.php";

    $autotype = $conn->prepare("SELECT klant.id, klantnaam, klantadres, klantpostcode, klantplaats, autotype, auto.klantid
FROM klant, auto
where auto.klantid = klant.id
   and autotype = :autotype");

    $autotype->execute(["autotype" => $klantenautotype]);


    echo "<table>";
    foreach ($autotype as $klantmetautotype){
        echo "<tr>";
        echo "<td>" . $klantmetautotype["id"] . "</td>";
        echo "<td>" . $klantmetautotype["klantnaam"] . "</td>";
        echo "<td>" . $klantmetautotype["klantadres"] . "</td>";
        echo "<td>" . $klantmetautotype["klantpostcode"] . "</td>";
        echo "<td>" . $klantmetautotype["klantplaats"] . "</td>";
        echo "<td>" . $klantmetautotype["autotype"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<a href='gar-menu.php'> Terug naar het menu </a>";

    ?>
</div>
</body>
</html>