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
    <?php foreach ($snows as $onepieceofsnows) { ?>
        <div class="row mt-4">
            <h4 class="col-4"><?= $onepieceofsnows['code'] ?></h4>
            <h4 class="col-4"><?= $onepieceofsnows['brand'] ?></h4>
            <h4 class="col-4"><?= $onepieceofsnows['model'] ?></h4>
            <h4 class="col-4"><?= $onepieceofsnows['length'] ?></h4>
            <h4 class="col-4"><?= $onepieceofsnows['price'] ?></h4>
            <h4 class="col-4"><?= $onepieceofsnows['qtyAvailable'] ?></h4>
        </div>
    <?php } ?>
</div>
<?php
$content = ob_get_clean();
require_once "gabarit.php";
?>
