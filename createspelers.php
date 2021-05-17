<?php
// De connectie met het database script word hier gelegd
require 'db.php';
$message = '';
// De volgende IF method bevat de volledige create method
if (isset ($_POST['name']) && isset ($_POST['Tussenvoegsel'])  && isset ($_POST['Achternaam']) && isset ($_POST['School']) ) {
  $name = $_POST['name'];
  $Tussenvoegsel = $_POST['Tussenvoegsel'];
  $Achternaam = $_POST['Achternaam'];
  $School = $_POST['School'];
  $sql = 'INSERT INTO spelers( name, Tussenvoegsel, Achternaam, School) VALUES (:name, :Tussenvoegsel, :Achternaam, :School)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([ ':name' => $name, ':Tussenvoegsel' => $Tussenvoegsel, ':Achternaam' => $Achternaam, ':School' => $School])) {
    $message = 'data inserted successfully';
  }
}

 ?>

 
<link rel="stylesheet" href="style.css">
<!-- Alles tot aan de BR bevat de Navigatie module met bijbehorende menustructuur -->
<div class="navbar">
  <div class="dropdown">
    <button class="dropbtn">Basisgegevens 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="index.php">Spelers</a>
      <a href="scholen.php">Scholen</a>
      <a href="inWerking.php">spelersen</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Aanmelden 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="createspelers.php">Handmatig</a>
      <a href="inWerking.php">Importeren</a>
      <a href="aanmeldingsluiten.php">Sluiten</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Wedstrijden 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="spelers.php">spelersoverzicht</a>
      <a href="inWerking.php">Uitslagen Beheren</a>
      <a href="inWerking.php">Indelen volgende ronde</a>
    </div>
  </div>
</div></br>

<!-- Alles in de div 'Container' is wat er in de website body zit, los van de navbar. -->

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Maak een aanmelding aan</h2>
    </div>
    <div class="card-body">

    <!-- Hieronder de invulvelden voor de createmethod -->
    
      <form method="post">
        <div class="form-group">
          <label for="Voornaam">Voornaam</label>
          <input type="text" name="Voornaam" name="Voornaam" class="form-control">
        </div>
        <div class="form-group">
          <label for="id">Tussenvoegsel</label>
          <input type="text" name="Tussenvoegsel" id="Tussenvoegsel" class="form-control">
        </div>
        <div class="form-group">
          <label for="Achternaam">Achternaam</label>
          <input type="text" name="Achternaam" id="Achternaam" class="form-control">
        </div>
        <div class="form-group">
          <label for="spelers">School</label>
          <input type="text" name="School" id="School" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Invoeren</button>
        </div>
      </form>
    </div>
  </div>
</div>
