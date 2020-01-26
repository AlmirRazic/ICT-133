<!--
Fabien Masson
SI-C2a
23.01.19
Rent a snow
-->
<?php
ob_start();
$title = "RentASnow - Snows";
?>
<div class="span12">
    <h1>Les Snows</h1>
    <?php foreach ($snows

    as $onepieceofsnows) { ?>


        <div class="contentArea">
            <div class="divPanel notop page-content">
                <!--Edit Portfolio Content Area here-->
                <div class="row-fluid">
                    <div class="span12">

                        <h1>Disponible !</h1>
                        <div class="yoxview">
                            <div class="row-fluid">
                                <ul class="thumbnails">
                                    <li class="span3">
                                        <div class="thumbnail">
                                            <div class="caption">
                                                <h2 class="col-4"><?= $onepieceofsnows['code'] ?></h2>
                                                <h4 class="col-4"><?= $onepieceofsnows['brand'] ?></h4>
                                                <h4 class="col-4"><?= $onepieceofsnows['model'] ?></h4>
                                                <h4 class="col-4"><?= $onepieceofsnows['length'] ?></h4>
                                                <h4 class="col-4"><?= $onepieceofsnows['price'] ?></h4>
                                                <h4 class="col-4"><?= $onepieceofsnows['qtyAvailable'] ?></h4>
                                                <p><a href="#" class="btn btn-primary">Read More...</a></p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>




<?php } ?>

<?php
$content = ob_get_clean();
require_once "gabarit.php";
?>
