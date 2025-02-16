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
    <div class="h4 text-center">
        INFO-PARC
    </div>
    <div class="row">
        <div class="col-5">
            <dl class="row">
                <dt class="col-3 text-center"><strong>Parc</strong></dt>
                <dd class="col-9">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Ipsam corrupti dicta magni deserunt distinctio nulla pariatur,
                    aut iusto eligendi, in eos, ullam cum quasi. Non aliquam quos modi eos accusantium.
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
            };
            ?>
            <table class="table table-striped bg-info">
                <caption>Répatition de la Flotte.</caption>
                <thead class="table-dark">
                    <tr>
                        <th>véhicule</th>
                        <th>engin</th>
                        <th>camion</th>
                        <th>retrochargeur</th>
                        <th>tracteur</th>
                        <th>chargeur</th>
                    </tr>
                <tbody class="text-center">
                    <tr>
                        <td><?php echo ($v); ?></td>
                        <td><?php echo ($en); ?></td>
                        <td> <?php echo ($ca); ?></td>
                        <td><?php echo ($ret); ?></td>
                        <td><?php echo ($tr); ?></td>
                        <td><?php echo ($ec); ?></td>
                    </tr>
                </tbody>
                </thead>
            </table>
        </div>
        <div class="col-5">
            <div class="container ">
                <table class="table table-striped">
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
    <script src="JQuery 3.7.1.js"></script>
</body>

</html>