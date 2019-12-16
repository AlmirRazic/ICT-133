
<!--name: Almir Razic
title: exo2_array_and_string
date: 02.12.2019
version: 1.0
-->







<link href="exo2_array_and_string.css" type="text/css" rel="stylesheet">
<?php

$index = 0;

echo date("F") . '<br>';
echo '<table>';
echo '<tr>';
for ($i = 1; $i < 31; $i++) {

    if (($i % 2 )!= 0){
        echo '<td class="td1">';
        echo $i;
    }else{
        echo '<td class="td2">';
        echo $i;
    }
    if ($i == 7 || $i == 14 || $i == 21 || $i == 28) {
        echo '</td>';
        echo '</tr>';
    }

}

echo '</table>';


?>
<html>



<h1>CSS Calendar</h1>

<div class="month">
    <ul>
        <li class="prev">&#10094;</li>
        <li class="next">&#10095;</li>
        <li>
            <?php
            $mois = date("F");
            echo $mois;
            ?>
            <br>
            <span style="font-size:18px">
                <?php
                $annee = date("Y");
                echo $annee;
                ?>
            </span>
        </li>
    </ul>
</div>

<ul class="weekdays">
    <?php
    $tableau = array(1,2,3,4,5,6,0);
    $aujourdhui = date("w");
    ?>
    <li>Lun</li>
    <li>Mar</li>
    <li>Mer</li>
    <li>Jeu</li>
    <li>Ven</li>
    <li>Sam</li>
    <li>Dim</li>
</ul>

<ul class="days">
    <?php

    switch ($aujourdhui){
        case 0:
            echo '<li></li>';echo '<li></li>';echo '<li></li>';echo '<li></li>';echo '<li></li>';
            break;
        case 1:
            echo '<li></li>';echo '<li></li>';echo '<li></li>';echo '<li></li>';echo '<li></li>';echo '<li></li>';
            break;
        case 2:
            echo "";
            break;
        case 3:
            echo '<li></li>';
            break;
        case 4:
            echo '<li></li>';echo '<li></li>';
            break;
        case 5:
            echo '<li></li>';echo '<li></li>';echo '<li></li>';
            break;
        default:
            echo '<li></li>';echo '<li></li>';echo '<li></li>';echo '<li></li>';
    }

    $jours = date("j");
    $nbjours = date("t");
    for ($q = 1; $q < $nbjours; $q++) {
        /*foreach($jours as $element) {
        echo $element.'<br>'; 			//affichera toutes les valeurs de $jours*/
        if ($q == $jours) {
            echo '<li class="td1">';
            echo $q;
            echo '</li>';
        } else {
            echo '<li>';
            echo $q;
            echo '</li>';
        }
    }

    ?>
</ul>

</html>