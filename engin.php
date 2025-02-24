<?php
include_once("funconnecte.php");

if (isset($_POST['sauve'])) {
  $codeEngin = $_POST['codeE'];
  $enginEngin = $_POST['enginE'];
  $imm = $_POST['immE'];

  $select = connxion("unite");
  $select->execute();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <script src="js/bootstrap.bundle.min.js"></script>
  <title>Engin</title>
</head>

<body>
  <nav class="nav nav-pills nav-justified nav-tabs">
    <a href="parcinfo.php" class="nav-link active bg-success">Info-Parc</a>
    <a href="#" class="nav-link ">Ajouter Engin</a>
    <a href="pompe.php" class="nav-link ">pompe_Gasoil</a>
    <a href="#" class="nav-link ">Atelier</a>
    <a href="index.html" class="nav-link ">Retour</a>
  </nav>
  <div class="row">
  <div class="display-4 text-center">TABLES</div>
    <div class="col-4 bg-secondary">
      <h1 class="h5 text-center">Ajouter Engin</h1>
      <form action="" role="form">
        <div class="mb-3">
          <label for="Code" class="from-label"><strong>Code</strong></label>
          <input type="text" class="form-control" placeholder="code engin" name="codeE">
          <div class="form-text">Le code d'engin</div>
        </div>
        <div class="mb-3">
          <label for="engin" class="from-label"><strong>Engin</strong></label>
          <input type="text" class="form-control" placeholder="engin" name="enginE">
          <div class="form-text">engin</div>
        </div>
        <div class="mb-3">
          <label for="immatriculation" class="from-label"><strong>Immatriculation</strong></label>
          <input type="text" class="form-control" placeholder="Immatriculation" name="immE">
          <div class="form-text">Immatriculation</div>
        </div>
        <div class="mb-3">
          <label for="" class="form-label text-warning">sélectionner la classe</label>
          <select>
            <?php
            $cat = 0;
            $selection = connxion("unite")->prepare("select * from type");
            $selection->execute();
            while ($row = $selection->fetch(PDO::FETCH_OBJ)) {
              $cat = $cat+1;
            ?>
              <option><?php echo ($row->types) ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="" class="form-label text-primary">sélectionner le type</label>
          <select>
            <?php
            $typ = 0;
            $selection = connxion("unite")->prepare("select * from catégorie");
            $selection->execute();
            while ($row = $selection->fetch(PDO::FETCH_OBJ)) {
              $typ = $typ+1;
            ?>
              <option><?php echo ($row->Type) ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <button class="btn btn-primary" name="sauve">Sauvegerder</button>
      </form>
    </div>
    <div class="col-4 bg-warning">
      <div class="h5 text-center">Ajouter une Catégorie</div>
      <form action="#" role="form" methode="POST">
        <div class="mb-3">
          <label for="" class="form-label">Catégorie</label>
          <input type="text" class="form-control" placeholder="Nouvelle catégorie">
          <div class="form-text">Nouvelle Catégorie</div>
        </div>
        <button class="btn btn-primary" type="submit">Ajouter</button>
      </form>
    </div>
    <div class="col-4 bg-info">
      <div class="h5 text-center">Ajouter un Type</div>
      <form action="#" role="form" methode="POST">
        <div class="mb-3">
          <label for="" class="form-label">Type</label>
          <input type="text" class="form-control" placeholder="Nouveau Type">
          <div class="form-text">Nouveau Type</div>
        </div>
        <button class="btn btn-primary" type="submit">Ajouter</button>
      </form>
    </div>
  </div>
  <div class="row ">
    <div class="col-4">
      <dl class="row">
        <dt class="col-4">Catégorie :</dt>
        <dd class="col-8">
        <?php echo($cat);?>
        </dd>
      </dl>
      <dl class="row">
        <dt class="col-4">Type</dt>
        <dd class="col-8">
           <?php echo($typ);?></dd>
      </dl>
    </div>
  </div>
  <script src="jquery/JQuery 3.7.1.js"></script>
</body>

</html>