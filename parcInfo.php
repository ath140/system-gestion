<?php
include_once("funconnecte.php");
$var = connxion("unite");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>
<nav class="nav nav-pills nav-justified nav-tabs">
    <a href="parcinfo.php" class="nav-link active bg-success">Info-Parc</a>
    <a href="engin.php" class="nav-link ">Ajouter Engin</a>
    <a href="#" class="nav-link ">pompe_Gasoil</a>
    <a href="#" class="nav-link ">Atelier</a>
    <a href="index.html" class="nav-link ">Retour</a>
  </nav>
    <div class="h4 text-center bg-secondary text-light">
        INFO-PARC
    </div>
    <div class="row bg-secondary text-light">
        <div class="col-5">
            <dl class="row ">
                <dt class="col-3 text-center"><strong style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;font-size: 20px;">PARC</strong></dt>
                <dd class="col-9" style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;font-size: 15px;">
                    <strong>ADRESSE</strong> : BP 222 ZONE INDUSTRIELLE ZAAROURA - TIARET ROUTE VERS MELAKOU.</br></br>
                    <strong>1 - SUPERFICIE</strong>: de 4 ects environ.</br>
                    <strong>2 - HANGAR</strong>: = 03 .</br>
                    <strong>3 - ATELIER</strong>: = 01.</br>
                    <strong>4 - DIRECTION.</strong></br>
                    <strong>5 - ACCEES</strong> = 01.
                </dd>
            </dl>
        </div>
        <div class="col-7">
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="mb-3">
                <?php
                $numbre = 0;
                $v = 0;
                $en = 0;
                $ret = 0;
                $ca = 0;
                $tr = 0;
                $ec = 0;
                $select = $var->prepare("select* from flotte_1");
                $select->execute();
                while ($row = $select->fetch(PDO::FETCH_OBJ)) {
                    $numbre = $numbre + 1;
                }
                ?>
                <h4 class="h4 text-white bg-dark">Flotte de = <?php echo ($numbre); ?> Elements</h4>
            </div>
        </div>
        <div class="col-4">
            <?php
            $numbre = 0;
            $v = 0;
            $l_v = 0;
            $r_v = 0;
            $en = 0; 
            $ret = 0;
            $ca = 0;
            $tr = 0;
            $ec = 0;
            $select = $var->prepare("select* from flotte_1");
            $select->execute();
            while ($row = $select->fetch(PDO::FETCH_OBJ)) {
                $numbre = $numbre + 1;
                $type = $row->type;
                $cat = $row->catégorie;
                switch ($type) {
                    case "VEHICULE":
                        $v = $v + 1;
                        break;
                    case "ENGIN":
                        $en = $en + 1;
                        break;
                    case "CAMION":
                        $ca = $ca + 1;
                        break;
                    case "ENGIN RETRO-CHARCHEUR":
                        $ret = $ret + 1;
                        break;
                    case "TRACTEUR":
                        $tr = $tr + 1;
                        break;
                    case "ENGIN CHARCHEUR":
                        $ec = $ec + 1;
                        break;
                }
                switch ($cat) {
                    case "leger":
                        $l_v = $l_v + 1;
                        break;
                    case "lourd":
                        $r_v = $r_v + 1;
                        break;
                }
            };
            ?>
            <table class="table table-striped bg-info table-bordered">
                <caption>Répatition de la Flotte.</caption>
                <thead class="table-dark text-center">
                    <tr>
                        <th>Transport</th>
                        <th>Terrassement</th>
                        <th>Tracteur</th>
                    </tr>
                <tbody class="text-center">
                    <tr>
                        <td><?php echo ($l_v + $r_v); ?>
                            <table class="table table-bordered">
                                <thead class="bg-dark text-light">
                                    <tr>
                                        <th>leger</th>
                                        <th>lourd</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-warning">
                                    <tr>
                                        <td><?php echo ($l_v) ?></td>
                                        <td><?php echo ($r_v) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td>
                            <?php echo($en+$ret+$ec);?>
                            <table class="table table-bordered">
                                <thead class="bg-dark text-light">
                                    <tr>
                                        <th>Engin</th>
                                        <th>Retro</th>
                                        <th>Chargeur</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-warning"> 
                                    <tr>
                                        <td><?php echo ($en) ?></td>
                                        <td><?php echo ($ret) ?></td>
                                        <td><?php echo ($ec) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td><?php echo ($tr); ?></td>
                    </tr>
                </tbody>
                </thead>
            </table>
        </div>
        <div class="col-5">
            <div class="container ">
                <table class="table table-striped table-bordered">
                    <caption>Répartition des Moyens</caption>
                    <thead class="text-center">
                        <tr>
                            <th>M-TRANSPORT</th>
                            <th>M-TERRASSEMENT</th>
                            <th>Autres</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <h6 class="text-primary"><?php echo (($v + $ca) / $numbre) * 100 ?> %</h6>
                            </td>

                            <td>
                                <h6 class="text-info"><?php echo (($en + $ret + $ec) / $numbre) * 100 ?> %</h6>
                            </td>

                            <td>
                                <h6 class="text-warning"><?php echo ($tr / $numbre) * 100 ?> %</h6>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="jquery/JQuery 3.7.1.js"></script>
</body>

</html>